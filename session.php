<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Session</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url("https://img.freepik.com/free-photo/scenic-view-trees-against-cloudy-sky_23-2147831006.jpg?t=st=1715081331~exp=1715084931~hmac=4bc74b9df776309c42e9dd79af93ab9272cef84fa4b374e0788b0266539c6bf6&w=826");
        }

        .container {
            max-width: 500px;
            margin: 100px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: rgba(99, 99, 99, 0.7);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form .col-md-4 {
            margin-bottom: 20px;
            text-align: center;
        }

        input[type="text"] {
            padding: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;

            width: 100%;
            box-sizing: border-box;
        }

        label {
            margin-top: 10px;
            display: block;
            font-weight: bold;
        }

        .center-content {
            text-align: center;
        }

        button[type="submit"] {
            padding: 10px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-hapus {
            background-color: red;
            color: white;
        }

        .btn-hapus:hover {
            background-color: #c82333;
        }

        .data-section {
            margin-top: 20px;
            padding: 20px;
            border-radius: 10px;
            background-color: #f0f0f0;
            box-shadow: 0 4px 8px rgba(99, 99, 99, 0.1);
            overflow-y: scroll;
        }

        .data-section h3 {
            margin-bottom: 30px;
        }

        .data-section p {
            margin: 5px 0;
        }

        .col {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Masukan Data Siswa</h2>
        <form class="row g-3 needs-validation" novalidate method="post">
            <div class="col-md-4">
                <label for="validationCustom01">Name Siswa</label>
                <input type="text" class="form-control" id="validationCustom01" placeholder="Username" name="nama"
                    required>
                <div class="valid-feedback"></div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom02">Nis Siswa</label>
                <input type="text" class="form-control" id="validationCustom02" placeholder="Nis" name="nis" required>
                <div class="valid-feedback"></div>
            </div>
            <div class="col-md-4">
                <label for="validationCustomUsername">Rayon</label>
                <input type="text" class="form-control" id="validationCustomUsername" placeholder="Rayon"
                    aria-describedby="inputGroupPrepend" name="rayon" required>
                <div class="invalid-feedback"></div>
            </div>
            <div class="col">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
                    <button type="button" class="btn btn-success"> Print </button>
                    <button type="submit" class="btn btn-danger btn-hapus" name="hapus_semua">Reset</button>
                </div>
            </div>
        </form>
        <div class="data-section text-center">
            <?php
            session_start();

            if (!isset($_SESSION['dataSiswa'])) {
                $_SESSION['dataSiswa'] = array();
            }

            if (isset($_POST['tambah'])) {
                if ($_POST['nama'] == "" || $_POST['nis'] == "" || $_POST['rayon'] == "") {
                    echo "Isi data terlebih dahulu";
                } else {
                    $siswa = array(
                        "nama" => $_POST['nama'],
                        "nis" => $_POST['nis'],
                        "rayon" => $_POST['rayon']
                    );
                    array_push($_SESSION['dataSiswa'], $siswa);
                    header("Location: {$_SERVER['PHP_SELF']}");
                    exit();
                }
            }

            if (!empty($_SESSION['dataSiswa'])) {
                foreach ($_SESSION['dataSiswa'] as $key => $value) {
                    echo "<p>Nama: " . $value['nama'] . "</p>";
                    echo "<p>NIS: " . $value['nis'] . "</p>";
                    echo "<p>Rayon: " . $value['rayon'] . "</p>";
                    echo "<form method='post'><input type='hidden' name='index' value='$key'><button type='submit' class='btn btn-danger btn-hapus' name='hapus_satu'>Hapus</button></form>";
                }
            }

            if (isset($_POST['hapus_satu'])) {
                $index = $_POST['index'];
                unset($_SESSION['dataSiswa'][$index]);
                exit();
            }

            if (isset($_POST['hapus_semua'])) {
                unset($_SESSION['dataSiswa']);
                exit();
            }
            ?>
        </div>

    </div>
</body>

</html>
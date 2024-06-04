<?php
session_start();

if (!isset($_SESSION['dataSiswa'])) $_SESSION['dataSiswa'] = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tambah'])) {
        if (!empty($_POST['nama']) && !empty($_POST['nis']) && !empty($_POST['rayon'])) {
            $_SESSION['dataSiswa'][] = [
                "nama" => htmlspecialchars($_POST['nama']),
                "nis" => htmlspecialchars($_POST['nis']),
                "rayon" => htmlspecialchars($_POST['rayon'])
            ];
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            $error = "Isi data terlebih dahulu";
        }
    } elseif (isset($_POST['hapus_satu'])) {
        unset($_SESSION['dataSiswa'][$_POST['index']]);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } elseif (isset($_POST['hapus_semua'])) {
        unset($_SESSION['dataSiswa']);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Session</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url("https://img.freepik.com/free-photo/scenic-view-trees-against-cloudy-sky_23-2147831006.jpg") no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 100px auto;
            padding: 30px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.50);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {    
            text-align: center;
            font-size: 40px;
            margin-bottom: 30px;
            color: black;
        }
        .form-group {
            margin-bottom: 20px;
        }
        input[type="text"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 100%;
            box-sizing: border-box;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .data-section {
            margin-top: 30px;
            padding: 20px;
            border-radius: 10px;
            background-color: #999999;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>Masukan Data Siswa</h2>
        <form method="post">
            <div class="form-group">
                <label for="nama">Nama Siswa</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
            </div>
            <div class="form-group">
                <label for="nis">NIS Siswa</label>
                <input type="text" class="form-control" id="nis" name="nis" placeholder="NIS" required>
            </div>
            <div class="form-group">
                <label for="rayon">Rayon</label>
                <input type="text" class="form-control" id="rayon" name="rayon" placeholder="Rayon" required>
            </div>
            <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
                <button type="button" class="btn btn-success">Print</button>
                <button type="submit" class="btn btn-danger" name="hapus_semua">Reset</button>
            </div>
        </form>
        <div class="data-section">
            <h3>Data Siswa</h3>
            <?php if (!empty($_SESSION['dataSiswa'])): ?>
                <?php foreach ($_SESSION['dataSiswa'] as $key => $value): ?>

                    <p>Nama: <?php echo $value['nama']; ?></p>
                    <p>NIS: <?php echo $value['nis']; ?></p>
                    <p>Rayon: <?php echo $value['rayon']; ?></p>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="index" value="<?php echo $key; ?>">
                        <button type="submit" class="btn btn-danger btn-hapus" name="hapus_satu">Hapus</button>
                    </form>
                    <hr>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Belum ada data siswa yang dimasukkan.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

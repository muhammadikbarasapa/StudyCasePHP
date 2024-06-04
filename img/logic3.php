<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h2>Form Data Siswa</h2>
    <form action="submit.php" method="post">
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>NIS</th>
                    <th>Rayon</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" name="nama" required></td>
                    <td><input type="text" name="nis" required></td>
                    <td><input type="text" name="rayon" required></td>
                </tr>
            </tbody>
        </table>
        <br>
        <button type="submit">Submit</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = htmlspecialchars($_POST['nama']);
        $nis = htmlspecialchars($_POST['nis']);
        $rayon = htmlspecialchars($_POST['rayon']);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Siswa Diterima</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }

            table,
            th,
            td {
                border: 1px solid black;
            }

            th,
            td {
                padding: 10px;
                text-align: left;
            }
        </style>
    </head>

    <body>
        <h2>Data Siswa Diterima</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>NIS</th>
                    <th>Rayon</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $nama; ?></td>
                    <td><?php echo $nis; ?></td>
                    <td><?php echo $rayon; ?></td>
                </tr>
            </tbody>
        </table>
    </body>

    </html>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = htmlspecialchars($_POST['nama']);
        $nis = htmlspecialchars($_POST['nis']);
        $rayon = htmlspecialchars($_POST['rayon']);
    }
    ?>
</body>

</html>
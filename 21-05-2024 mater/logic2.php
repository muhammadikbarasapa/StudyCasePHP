<style>
    body {
        background: url("https://img.freepik.com/free-photo/scenic-view-trees-against-cloudy-sky_23-2147831006.jpg") no-repeat center center fixed;
        background-size: cover;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 400px;
        margin: 80px auto;
        padding: 50px;
        border-radius: 10px;
        background-color: rgba(255, 255, 255, 0.50);
        box-shadow: 0 4px 10px rgba(99,99, 99, 0.1);
    }

    h2 {
        text-align: center;
        font-size: 50px;
        margin-bottom: 30px;
        color: black;
    }

    .form-group {
        margin-bottom: 20px;
    }

    input[type="text"],
    input[type="number"],
    select {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        width: calc(100% - 22px);
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

    .btn:hover {
        background-color: red;

    }

    .data-section {
        margin-top: 30px;
        padding: 20px;
        text-align: center;
        border-radius: 10px;
        background-color: #f5f5f5;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h2>Rental Motor</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="nama">Nama:</label><br>
                <input type="text" id="nama" name="nama" required><br>
            </div>

            <div class="form-group">
                <label for="jenis">Jenis Motor:</label><br>
                <select id="jenis" name="jenis" required>
                    <option value="Scooter">Scooter</option>
                    <option value="Sport">Sport</option>
                    <option value="SportTouring">Sport Touring</option>
                    <option value="Cross">Cross</option>
                </select><br>
            </div>

            <div class="form-group">
                <label for="lamarental">Lama Rental (hari):</label><br>
                <input type="number" id="lamarental" name="lamarental" min="1" required><br>
            </div>

            <input type="submit" name="submit" value="Submit" class="btn">
        </form>

        <?php
        $proses = new rentall();
        $proses->setHarga(70000, 90000, 95000, 100000);
        if (isset($_POST['submit'])) {
            $proses->member = $_POST['nama'];
            $proses->jenis = $_POST['jenis'];
            $proses->waktu = $_POST['lamarental'];
            $proses->pembayaran();
        }

        class Data
        {
            public $member;
            public $jenis;
            public $waktu;
            public $diskon;
            protected $pajak;
            private $Scooter, $Sport, $SportTouring, $Cross;
            private $listMember = ['ana', 'sam', 'alex', 'ara'];

            function __construct()
            {
                $this->pajak = 10000;
            }

            public function getMember()
            {
                if (in_array($this->member, $this->listMember)) {
                    return "Member";
                } else {
                    return "Non Member";
                }
            }

            public function setHarga($jenis, $jenis2, $jenis3, $jenis4)
            {
                $this->Scooter = $jenis;
                $this->Sport = $jenis2;
                $this->SportTouring = $jenis3;
                $this->Cross = $jenis4;
            }

            public function getHarga()
            {
                $data['Scooter'] = $this->Scooter;
                $data['Sport'] = $this->Sport;
                $data['SportTouring'] = $this->SportTouring;
                $data['Cross'] = $this->Cross;
                return $data;
            }
        }

        class Rental extends Data
        {
            public function hargaRental()
            {
                $dataHarga = $this->getHarga()[$this->jenis];
                $diskon = $this->getMember() == "Member" ?  : 5;
                if ($this->waktu === 1) {
                    $bayar = ($dataHarga - ($dataHarga * $diskon / 100)) + $this->pajak;
                } else {
                    $bayar = (($dataHarga * $this->waktu) - ($dataHarga * $diskon / 100)) + $this->pajak;
                }
                return [$bayar, $diskon];
            }

            public function pembayaran()
            {
                echo "<div class='data-section'>";
                echo "-------------------------------------------------------------------------------------------------------";
                echo "<p>" . $this->member . " berstatus sebagai " . $this->getMember() . " mendapatkan diskon sebesar " . $this->hargaRental()[1] . "%</p>";
                echo "<p>jenis motor yang dirental adalah " . $this->jenis . " selama " . $this->waktu . " hari</p>";
                echo "<p>Harga per harinya : Rp." . number_format($this->getHarga()[$this->jenis], 0, '', '.') . "</p>";
                echo "<p>Besar yang harus dibayarkan adalah Rp." . number_format($this->hargaRental()[0], 0, ',', '.') . "</p>";
                echo "------------------------------------------------------------------------------------------------------";
                echo "</div>";
            }
        }
        ?>
    </div>
</body>

</html>
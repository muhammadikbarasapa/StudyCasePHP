<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
    <style>
        body {
            background-image: url('https://st4.depositphotos.com/1741969/29457/i/450/depositphotos_294571810-stock-photo-blackground-of-abstract-glitter-lights.jpg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 300px;
            margin: 40px auto;
            padding: 20px;
            background-color: rgba(225, 225, 225, 0.5);
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }


        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            text-align: left;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px 20px;
            background-color: aqua;
            color: black;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: wheat;
        }

        .output {
            margin-top: 20px;
            padding: 20px;
            background-color: navajowhite;
            border-radius: 10px;
        }

        .output h2 {
            margin-top: 0;
            margin-bottom: 20px;
        }

        .output p {
            margin: 10px 0;
        }

        @media only screen and (max-width: 600px) {
            .container {
                max-width: 90%;
            }

            input,
            select {
                width: calc(100% - 16px);
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Rental Motor</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="nama-pelanggan">Nama Pelanggan:</label>
            <input type="text" id="nama-pelanggan" name="nama_pelanggan" required>
            <label for="lama-rental">Lama Waktu Rental (per hari):</label>
            <input type="number" id="lama-rental" name="lama_rental" min="1" required>
            <label for="jenis-motor">Jenis Motor:</label>
            <select id="jenis-motor" name="jenis_motor" required>
                <option value="Scooter">Scooter</option>
                <option value="Nmax">Nmax</option>
                <option value="Adv">Adv</option>
                <option value="Beat">Beat</option>
                <option value="Alva Cervo">Alva Cervo</option>
            </select>
            <button type="submit" name="submit">Submit</button>
        </form>

        <?php

        class Data
        {
            public $member;
            public $jenis;
            public $waktu;
            protected $pajak;
            private $harga = [
                'Scooter' => 70000,
                'Nmax' => 90000,
                'Adv' => 90000,
                'Beat' => 100000,
                'Alva Cervo' => 0 // You need to specify the price for this type of motor
            ];
            private $listMember = ['ana', 'sam', 'akex', 'ara'];

            function __construct()
            {
                $this->pajak = 10000;
            }

            public function getMemberStatus()
            {
                return in_array(strtolower($this->member), $this->listMember) ? 'Member' : 'Non Member';
            }

            public function getHargaPerHari()
            {
                return isset($this->harga[$this->jenis]) ? $this->harga[$this->jenis] : 0;
            }
        }

        class Rentall extends Data
        {
            public function hargaRental()
            {
                $harga = $this->getHargaPerHari();
                $diskon = ($this->getMemberStatus() == "Member") ? 5 : 0;
                $bayar = ($harga * $this->waktu - ($harga * $diskon / 100)) + $this->pajak;
                return [$bayar, $diskon];
            }

            public function pembayaran()
            {
                echo "<center>";
                echo $this->member . " berstatus sebagai " . $this->getMemberStatus() . " mendapatkan diskon sebesar " . $this->hargaRental()[1] . "%";
                echo "<br/>";
                echo "Jenis motor yang dirental adalah " . $this->jenis . " selama " . $this->waktu . " hari";
                echo "<br/>";
                echo "Harga per harinya: Rp." . number_format($this->getHargaPerHari(), 0, '', '.');
                echo "<br/>";
                echo "<br/>";
                echo "Total yang harus dibayarkan adalah Rp." . number_format($this->hargaRental()[0], 0, ',', '.');
                echo "</center>";
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $proses = new Rentall();
            $proses->member = $_POST['nama_pelanggan'];
            $proses->jenis = $_POST['jenis_motor'];
            $proses->waktu = $_POST['lama_rental'];
            
            if (!empty($proses->member) && !empty($proses->jenis) && $proses->waktu > 0) {
                $proses->pembayaran();
            } else {
                echo "Please fill all the fields correctly.";
            }
        }
        ?>


    </div>

</body>

</html>
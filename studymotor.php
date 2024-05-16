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

        class RentalCalculator
        {
            private $nama_pelanggan;
            private $lama_rental;
            private $jenis_motor;
            private $diskon;
            private $harga_per_hari;
            private $pajak;

            public function __construct($nama_pelanggan, $lama_rental, $jenis_motor)
            {
                $this->nama_pelanggan = $nama_pelanggan;
                $this->lama_rental = $lama_rental;
                $this->jenis_motor = $jenis_motor;
                $this->diskon = ($nama_pelanggan == 'ana') ? 0.05 : 0;
                $this->harga_per_hari = 70000;
                $this->pajak = 10000;
            }

            public function calculateTotal()
            {
                $total = ($this->lama_rental * $this->harga_per_hari) - ($this->lama_rental * $this->harga_per_hari * $this->diskon) + $this->pajak;
                return $total;
            }

            public function displayDetails()
            {
                $total = $this->calculateTotal();
                echo "<div class='output'>";
                echo "<h2>Detail Rental</h2>";
                echo "<p><strong>Nama Pelanggan:</strong> " . htmlspecialchars($this->nama_pelanggan) . "</p>";
                echo "<p><strong>Lama Waktu Rental (per hari):</strong> " . htmlspecialchars($this->lama_rental) . "</p>";
                echo "<p><strong>Jenis Motor:</strong> " . htmlspecialchars($this->jenis_motor) . "</p>";
                echo "<p><strong>Total Harga:</strong> Rp. " . number_format($total, 2) . "</p>";
                echo "</div>";
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama_pelanggan = $_POST['nama_pelanggan'];
            $lama_rental = $_POST['lama_rental'];
            $jenis_motor = $_POST['jenis_motor'];

            $rental = new RentalCalculator($nama_pelanggan, $lama_rental, $jenis_motor);
            $rental->displayDetails();
        }
        ?>


    </div>

</body>

</html>
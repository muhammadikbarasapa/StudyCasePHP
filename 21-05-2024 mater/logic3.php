<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
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
            box-shadow: 0 4px 10px rgba(99, 99, 99, 0.1);
            text-align: center;
        }

        h2 {
            font-size: 30px;
            margin-bottom: 30px;
            color: black;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
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
            margin: 10px;
        }

        .btn-primary {
            background-color: blue;
            color: white;
        }

        .btn-primary:hover {
            background-color: darkblue;
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
</head>

<body>
    <div class="container">
        <h2>Rental Motor</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>
            </div>

            <div class="form-group">
                <label for="jenis">Jenis Motor:</label>
                <select id="jenis" name="jenis" required>
                    <option value="Scooter">Scooter</option>
                    <option value="Sport">Sport</option>
                    <option value="SportTouring">Sport Touring</option>
                    <option value="Cross">Cross</option>
                </select>
            </div>

            <div class="form-group">
                <label for="lamarental">Lama Rental (hari):</label>
                <input type="number" id="lamarental" name="lamarental" min="1" required>
            </div>

            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form>

        <?php
        class Rental
        {
            // Menyimpan nama penyewa.
            public $name;
            //menyimpan jenis motor yang disewa
            public $type;
            public $days;
            private $memberDiscount = 0.1;
            private $nonMemberDiscount = 0.05;
            private $tax = 10000;
            private $members = ['ana', 'sam', 'alex', 'ara'];

            private $prices = [
                'Scooter' => 70000,
                'Sport' => 90000,
                'SportTouring' => 90000,
                'Cross' => 100000
            ];

            public function __construct($name, $type, $days)
            {
                $this->name = $name;
                $this->type = $type;
                $this->days = $days;
            }

            public function isMember()
            {
                return in_array(strtolower($this->name), $this->members);
            }
            
            //Mengembalikan diskon yang berlaku berdasarkan status keanggotaan.
            public function getDiscount() 
            {
                return $this->isMember() ? $this->memberDiscount : $this->nonMemberDiscount;
            }

            public function calculateTotal()
            {
                $pricePerDay = $this->prices[$this->type];
                $basePrice = $pricePerDay * $this->days;
                $discount = $basePrice * $this->getDiscount();
                $total = $basePrice - $discount + $this->tax;
                return $total;
            }

            public function displayReceipt()
            {
                $total = $this->calculateTotal();
                $discountPercentage = $this->getDiscount() * 100;
                echo "<div class='data-section'>";
                echo "<p>Nama: $this->name</p>";
                echo "<p>Status: " . ($this->isMember() ? 'Member' : 'Non Member') . "</p>";
                echo "<p>Diskon: $discountPercentage%</p>";
                echo "<p>Jenis Motor: $this->type</p>";
                echo "<p>Lama Rental: $this->days hari</p>";
                echo "<p>Harga per hari: Rp." . number_format($this->prices[$this->type], 0, '', '.') . "</p>";
                echo "<p>Total Pembayaran: Rp." . number_format($total, 0, '', '.') . "</p>";
                echo "</div>";
            }
        }

        if (isset($_POST['submit'])) {
            $rental = new Rental($_POST['nama'], $_POST['jenis'], $_POST['lamarental']);
            $rental->displayReceipt();
        }
        ?>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menghitung Harga dengan Konsep OOP</title>
    <style>
        body {
            background-image: url(https://img.freepik.com/free-vector/dark-jeans-texture_1035-3476.jpg?t=st=1716261772~exp=1716265372~hmac=3829e37c633b2c963035af01644358b61578eb89910cf7aebb7d3269e0d5ae50&w=740);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            text-align: center ;
            background-color: #999999;
            border-radius: 9px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            font-size: 30px;
            color: black;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 10px;
        }

        input[type="number"],
        select {
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: red;
        }

        .receipt {
            margin-top: 20px;
            border-top: 2px solid #ccc;
            padding-top: 20px;
        }

        .receipt p {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Pembelian Bahan Bakar</h2>
        <form action="" method="post">
            <div>
                <label for="liter">Masukan jumlah liter</label>
                <input type="number" name="liter" id="liter" required>
            </div>
            <div>
                <label for="jenis">Pilih jenis bahan Bakar</label>
                <select name="jenis" required>
                    <option value="SSuper">Shell Super</option>
                    <option value="SVpower">Shell V-power</option>
                    <option value="SVpowerDisel">Shell V-power Disel</option>
                    <option value="SVpowerNitro">Shell V-power Nitro</option>
                </select>
            </div>
            <button type="submit" name="beli">Beli</button>
        </form>

        <?php
        session_start();

        $logic = new pembelian();
        $logic->setharga(10000, 15000, 18000, 20000);

        if (isset($_POST['beli'])) {
            $logic->jenisyangdipilih = $_POST['jenis'];
            $logic->totalliter = $_POST['liter'];

            $logic->totalharga();
            $logic->cetakbukti();
        }


        class DataBahanBakar
        {
            private $HargaSSuper;
            private $HargaSVpower;
            private $HargaSVpowerDisel;
            private $HargaSVpowerNitro;

            public $jenisyangdipilih;
            public $totalliter;

            protected $totalpembayaran;

            public function setharga($valSSuper, $valSVpower, $valSVpowerDisel, $valSVpowerNitro)
            {
                $this->HargaSSuper = $valSSuper;
                $this->HargaSVpower = $valSVpower;
                $this->HargaSVpowerDisel = $valSVpowerDisel;
                $this->HargaSVpowerNitro = $valSVpowerNitro;
            }

            public function getharga()
            {
                $semuadatasolar = [
                    "SSuper" => $this->HargaSSuper,
                    "SVpower" => $this->HargaSVpower,
                    "SVpowerDisel" => $this->HargaSVpowerDisel,
                    "SVpowerNitro" => $this->HargaSVpowerNitro
                ];
                return $semuadatasolar;
            }
        }

        class pembelian extends DataBahanBakar
        {
            public function totalharga()
            {
                $harga = $this->getharga();
                $this->totalpembayaran = $harga[$this->jenisyangdipilih] * $this->totalliter;
            }

            public function cetakbukti()
            {
                echo "<div class='receipt'>";
                echo "-------------------------------------------------";
                echo "<p>Jenis Bahan Bakar : " . $this->jenisyangdipilih . "</p>";
                echo "<p>Total Liter : " . $this->totalliter . "</p>";
                echo "<p>Harga Bayar : Rp. " . number_format($this->totalpembayaran, 0, ',', '.') . "</p>";
                echo "</div>";
                echo "-------------------------------------------------";
            }
        }

        ?>
    </div>
</body>

</html>
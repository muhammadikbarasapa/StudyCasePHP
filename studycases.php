<?php
$transaksi = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && $_POST['jumlah'] && $_POST['tipe'] && $_POST['metode_pembayaran'] && $_POST['uang']) {
    $liter = $_POST['jumlah'];
    $jenis = $_POST['tipe'];
    $uang = $_POST['uang'];

    class Shell
    {
        protected $harga;
        public $jumlah;
        public $jenis;
        public $ppn;

        public function __construct($harga, $jumlah, $jenis, $ppn = 10)
        {
            $this->harga = $harga;
            $this->jumlah = $jumlah;
            $this->jenis = $jenis;
            $this->ppn = $ppn;
        }

        public function hitungTotal()
        {
            return $this->harga * $this->jumlah * (1 + $this->ppn / 100);
        }
    }

    class Beli extends Shell
    {
        public function __construct($harga, $jumlah, $jenis)
        {
            parent::__construct($harga, $jumlah, $jenis);
        }

        public function buktiTransaksi($metodePembayaran)
        {
            return "<h1>Transaksi</h1>"
                . "Anda membeli bahan bakar minyak tipe {$this->jenis}<br>"
                . "Dengan jumlah : {$this->jumlah} Liter<br>"
                . "Metode Pembayaran : {$metodePembayaran}<br>"
                . "Total yang harus anda bayar : Rp. " . number_format($this->hitungTotal(), 2) . "<br>";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['jumlah'], $_POST['tipe'], $_POST['metode_pembayaran'])) {
        $pilihan = $_POST['tipe'];
        $jumlah = floatval($_POST['jumlah']);
        $metodePembayaran = $_POST['metode_pembayaran'];

        $beli = new Beli(
            ($pilihan === 'Shell Super' ? 15420 :
                ($pilihan === 'Shell V-Power' ? 16130 :
                    ($pilihan === 'Shell V-Power Diesel' ? 18310 :
                        ($pilihan === 'Shell V-Power Nitro' ? 16510 : 0)
                    )
                )
            ),
            $jumlah,
            $pilihan
        );

        $transaksi = $beli->buktiTransaksi($metodePembayaran);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bahan Bakar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://img.freepik.com/free-photo/painting-mountain-lake-with-mountain-background_188544-9126.jpg');
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: rgba(99, 99, 99, 0.5);
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            width: 400px;
            color: whitesmoke;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="number"] {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            width: 100%;
        }

        select {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            width: 100%;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: aqua;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button[type="submit"]:hover {
            background-color: red;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php echo $transaksi; ?>
        <h1>Bahan Bakar</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="jumlah">Masukkan Jumlah Liter:</label>
            <input type="number" name="jumlah" id="jumlah" step="0.1" required>
            <br><br>
            <label for="tipe">Pilih Tipe Bahan Bakar:</label>
            <select name="tipe" id="tipe" required>
                <option value="">Pilih Tipe</option>
                <option value="Shell Super">Shell Super</option>
                <option value="Shell V-Power">Shell V-Power</option>
                <option value="Shell V-Power Diesel">Shell V-Power Diesel</option>
                <option value="Shell V-Power Nitro">Shell V-Power Nitro</option>
            </select>
            <br><br>
            <label for="metode_pembayaran">Pilih Metode Pembayaran:</label><br>
            <select name="metode_pembayaran" id="metode_pembayaran" required>
                <option value="">Pilih Metode Pembayaran</option>
                <option value="Tunai">Tunai</option>
                <option value="OVO">OVO</option>
                <option value="Dana">Dana</option>
                <option value="BNI">BNI</option>
                <option value="GoPay">GoPay</option>
            </select>
            <br><br>
            <label for="uang">Masukkan Jumlah Uang:</label>
            <input type="number" name="uang" id="uang" required>
            <br><br>
            <button type="submit" name="submit">Beli</button>
        </form>
    </div>
</body>

</html>

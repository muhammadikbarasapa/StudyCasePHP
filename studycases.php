<?php
$transaksi = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && $_POST['jumlah'] && $_POST['tipe'] && $_POST['metode_pembayaran'] && $_POST['uang']) {
    $jumlah = $_POST['jumlah'];
    $tipe = $_POST['tipe'];
    $uang = $_POST['uang'];

    $harga_per_liter = [
        'Shell Super' => 15420,
        'Shell V-Power' => 16130,
        'Shell V-Power Diesel' => 18310,
        'Shell V-Power Nitro' => 16510,
    ];

    $total_harga = $harga_per_liter[$tipe] * $jumlah;

    $metode_pembayaran = $_POST['metode_pembayaran'];

    $transaksi = "<h1>Transaksi</h1>";
    $transaksi .= "<p>Anda membeli bahan bakar minyak tipe $tipe</p>";
    $transaksi .= "<p>Dengan jumlah : $jumlah Liter</p>";
    $transaksi .= "<p>Metode Pembayaran : $metode_pembayaran</p>";
    $transaksi .= "<p>Total yang harus anda bayar : Rp. " . number_format($total_harga, 2) . "</p>";
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

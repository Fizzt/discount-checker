<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Pembeli</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Input Data Pembeli</h2>
    <div class="form">
      <form action="diskon.php" method="post">
        <label for="customer_name">Nama Pembeli:</label><br>
        <input type="text" id="customer_name" name="customer_name" required><br>
        <label for="item_name">Nama Barang:</label><br>
        <input type="text" id="item_name" name="item_name" required><br>
        <label for="quantity">Jumlah Barang:</label><br>
        <input type="number" id="quantity" name="quantity" required><br>
        <label for="unit_price">Harga Satuan (Rp):</label><br>
        <input type="number" id="unit_price" name="unit_price" required><br><br>
        <input type="submit" value="Submit">
      </form>
    </div>
</body>
</html>

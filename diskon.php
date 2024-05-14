<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan Diskon</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .result-container {
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
            display: flex;
            justify-content: center;
            flex-direction: column;
        }

        .result-heading {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .result-item {
            margin-bottom: 10px;
        }

        .result-label {
            font-weight: bold;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="result-container">
            <h2 class="result-heading">Hasil Perhitungan Diskon</h2>
            <?php
            include 'koneksi.php';

            // Mendapatkan data dari form
            $customer_name = $_POST['customer_name'];
            $item_name = $_POST['item_name'];
            $quantity = $_POST['quantity'];
            $unit_price = $_POST['unit_price'];

            // Menghitung total harga
            $total_price = $quantity * $unit_price;

            // Menghitung diskon
            $discount = 0;
            if ($total_price >= 100000) {
                $discount = 0.1 * $total_price; // Diskon 10%
            } elseif ($total_price >= 50000) {
                $discount = 0.05 * $total_price; // Diskon 5%
            }

            // Menghitung total yang harus dibayar
            $total_payment = $total_price - $discount;

            // Menyimpan data ke database
            $sql = "INSERT INTO customers (customer_name, item_name, quantity, unit_price) 
                    VALUES ('$customer_name', '$item_name', $quantity, $unit_price)";
            if ($conn->query($sql) === TRUE) {
                $customer_id = $conn->insert_id;
                $sql = "INSERT INTO transactions (customer_id, total_price, discount, total_payment) 
                        VALUES ($customer_id, $total_price, $discount, $total_payment)";
                if ($conn->query($sql) === TRUE) {
                    echo "Data berhasil disimpan.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            ?>

            <div class="result-item">
                <span class="result-label">Nama Pembeli:</span>
                <span><?php echo $customer_name; ?></span>
            </div>
            <div class="result-item">
                <span class="result-label">Nama Barang:</span>
                <span><?php echo $item_name; ?></span>
            </div>
            <div class="result-item">
                <span class="result-label">Jumlah Barang:</span>
                <span><?php echo $quantity; ?></span>
            </div>
            <div class="result-item">
                <span class="result-label">Total Harga Barang:</span>
                <span>Rp <?php echo number_format($total_price, 2); ?></span>
            </div>
            <div class="result-item">
                <span class="result-label">Diskon yang Didapatkan:</span>
                <span>Rp <?php echo number_format($discount, 2); ?></span>
            </div>
            <div class="result-item">
                <span class="result-label">Jumlah yang Harus Dibayar:</span>
                <span>Rp <?php echo number_format($total_payment, 2); ?></span>
            </div>
            <a href="index.php">Kembali ke Halaman Utama</a>
        </div>

    </div>
</body>
</html>

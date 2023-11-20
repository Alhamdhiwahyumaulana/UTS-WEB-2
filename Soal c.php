<?php

// Array multidimensi
$barang = [
    ["Nama Produk" => "Minyak Telon", "Stok" => 20, "Harga" => 30000],
    ["Nama Produk" => "Diapers", "Stok" => 25, "Harga" => 51000],
    ["Nama Produk" => "Baby Oil", "Stok" => 15, "Harga" => 16000],
    ["Nama Produk" => "Shampo Baby", "Stok" => 20, "Harga" => 20000],
    ["Nama Produk" => "Bedak", "Stok" => 15, "Harga" => 15000],
    ["Nama Produk" => "Baju Bayi", "Stok" => 20, "Harga" => 35500],
    ["Nama Produk" => "Jumper", "Stok" => 25, "Harga" => 50000],
];

// Tanggal Transaksi: 20 November 2023
$transaksi = [
    ["Nama Produk" => "Baju Bayi", "Jumlah" => 3],
    ["Nama Produk" => "Diapers", "Jumlah" => 5],
    ["Nama Produk" => "Bedak", "Jumlah" => 1],
    ["Nama Produk" => "Minyak Telon", "Jumlah" => 2],
    ["Nama Produk" => "Baby Oil", "Jumlah" => 3],
];

// Menampilkan isi array secara terurut menggunakan tabel
echo "| Nama Produk   | Stok | Harga  |\n";
echo "|----------------|------|--------|\n";

foreach ($barang as $item) {
    echo "| {$item['Nama Produk']} | {$item['Stok']}   | {$item['Harga']}   |\n";
}

echo "\nTanggal Transaksi: 20 November 2023\n";
echo "| Nama Produk   | Jumlah |\n";
echo "|----------------|--------|\n";

foreach ($transaksi as $item) {
    echo "| {$item['Nama Produk']} | {$item['Jumlah']}     |\n";
}

// Hitung total pembelian
$totalPembelian = 0;

foreach ($transaksi as $item) {
    $totalPembelian += $item['Jumlah'] * $barang[array_search($item['Nama Produk'], array_column($barang, 'Nama Produk'))]['Harga'];
}

// Output total pembelian dan diskon
echo "\nTotal Pembelian: $totalPembelian\n";

// Diskon
$diskon = 0;

if ($totalPembelian >= 300000) {
    $diskon = 0.2;
} elseif ($totalPembelian >= 200000) {
    $diskon = 0.1;
}

// Hitung total pembayaran setelah diskon
$totalPembayaran = $totalPembelian - ($totalPembelian * $diskon);

echo "Diskon: " . ($diskon * 100) . "%\n";
echo "Total Pembayaran setelah Diskon: $totalPembayaran\n";

?>
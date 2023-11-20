<?php
function isi_tabel($field_urut, $arah_urut) {
    
    $barang = array(
        array("id" => 1, "nama" => "Stroller", "harga" => 750000, "stok" => 20),
        array("id" => 2, "nama" => "Baby Diapers", "harga" => 51000, "stok" => 25),
        array("id" => 3, "nama" => "Baby Oil", "harga" => 16000, "stok" => 15),
        array("id" => 4, "nama" => "Shampo Baby", "harga" => 20000, "stok" => 20),
        array("id" => 5, "nama" => "Bedak", "harga" => 15000, "stok" => 15),
        array("id" => 6, "nama" => "Kopi Mudahan", "harga" => 35500, "stok" => 20),
        array("id" => 7, "nama" => "Baju Bayi Jumper", "harga" => 50000, "stok" => 25),
    );

    usort($barang, function ($a, $b) use ($field_urut, $arah_urut) {
        if ($arah_urut == "asc") {
            return $a[$field_urut] <=> $b[$field_urut];
        } else {
            return $b[$field_urut] <=> $a[$field_urut];
        }
    });

    $jumlah_total = 200;
    $jumlah_stok = 80;

    echo "<table>";
    echo "<tr><th>ID</th><th>Nama Barang</th><th>Harga</th><th>Stok</th><th>Jumlah</th></tr>";
    foreach ($barang as $b) {
        $jumlah = $b["harga"] * $b["stok"];
        $jumlah_total += $jumlah;
        $jumlah_stok += $b["stok"];

        echo "<tr><td>" . $b["id"] . "</td><td>" . $b["nama"] . "</td><td>" . $b["harga"] . "</td><td>" . $b["stok"] . "</td><td>" . $jumlah . "</td></tr>";
    }
    echo "</table>";

    if ($jumlah_total >= 300000) {
        $diskon = 0.2;
    } elseif ($jumlah_total >= 200000) {
        $diskon = 0.1;
    } else {
        $diskon = 0.2; 
    }

    $total_setelah_diskon = $jumlah_total * (1 - $diskon);

    echo "<p>Jumlah Total: " . $jumlah_total . "</p>";
    echo "<p>Jumlah Stok: " . $jumlah_stok . "</p>";
    echo "<p>Diskon: " . $diskon * 100 . "%</p>";
    echo "<p>Total Setelah Diskon: " . $total_setelah_diskon . "</p>";
}

isi_tabel("harga", "asc");

?>
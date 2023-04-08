<?php
require 'connection.php';


$sql = "SELECT sensor_n FROM coba WHERE nama = 'Lora 0'  ORDER BY id DESC LIMIT 20";
$result = $connection->query($sql);

// Buat array kosong untuk menampung data
$data = array();

// Looping untuk mengambil data dari hasil query
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
  // Konversi nilai dari string ke integer
  $sensor_n = intval($row['sensor_n']);
  // Tambahkan nilai ke dalam array
  $data[] = $sensor_n;
}

// Balik urutan elemen array urutan reverse akan mmebuat data dari yg paling lama ke terbaru dari kiri ke kanan
$data = array_reverse($data);

// Konversi array ke dalam format JSON
$json_datanitrogen = json_encode($data);

// Tampilkan data dalam format JSON
// echo $json_datanitrogen;
?>

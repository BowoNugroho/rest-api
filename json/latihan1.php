<?php
// $mahasiswa = [
//     [
//         "nama" => " bwnhyk",
//         "umur" => 23,
//         "nip" => 191110085,
//     ],
//     [
//         "nama" => " bwnhyk",
//         "umur" => 23,
//         "nip" => 191110085,
//     ]

// ];
$conn = new PDO("mysql:host=localhost;dbname=sistem_ekas", 'root', '');
$db = $conn->prepare('SELECT * FROM mst_anggota');
$db->execute();
$anggota = $db->fetchAll(PDO::FETCH_ASSOC);

// var_dump($mahasiswa);
$data = json_encode($anggota, true);
echo '<pre>';
var_dump($data);

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$database_name = "pindahmudah";

//buat koneksi
$conn = new mysqli($servername, $username, $password, $database_name);

//cek koneksi
if ($conn->connect_error) {
    echo "ERROR TIDAK DAPAT TERKONEKSI KE DATABASE";
    die("Connection failed: ". $conn->connect_error);
}

//cek apakah form telah di submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST["nama"]);
    $alamat_awal = trim($_POST["alamat_awal"]);
    $alamat_kirim = trim($_POST["alamat_kirim"]);
    $telepon = trim($_POST["telepon"]);
    $email = trim($_POST["email"]);
    $jenis_kendaraan = trim($_POST["jenis_kendaraan"]);
    $tanggal_kirim = trim($_POST["tanggal_kirim"]);
    $note = trim($_POST["note"]);

    //debugging
    echo "$nama";
    echo "$alamat_awal";
    echo "$alamat_kirim";    
    echo "$telepon";
    echo "$email";
    echo "$jenis_kendaraan";
    echo "$tanggal_kirim";
    echo "$note";

    $stmt = $conn->prepare("INSERT INTO customer (nama, alamat_awal, alamat_kirim, telepon, email, jenis_kendaraan, tanggal_kirim, note) VALUES (?,?,?,?,?,?,?,?)");
    if ($stmt === false){
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("ssssssss", $nama, $alamat_awal, $alamat_kirim, $telepon, $email, $jenis_kendaraan, $tanggal_kirim, $note);

    if ($stmt->execute()){
        echo "Data berhasil disimpan";
    } else {
        echo "Error: ". $stmt->error;
        echo "<br>";
        echo "Error number: " . $conn->errno;
        echo "<br>";
        echo "Error message: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!--<div id="backbtn-submit">
	<a href="form2.php">Kembali</a>-->
</div>
</body>
</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pindahmudah";

//buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

//cek koneksi
if ($conn->connect_error) {
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

    $stmt = $conn->prepare("INSERT INTO pindahmudah (nama, alamat_awal, alamat_kirim, telepon, email, jenis_kendaraan, tanggal_kirim, note) VALUES (?,?,?,?,?,?,?,?)");
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
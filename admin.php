<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$database_name = "pindahmudah";

// Create connection
$conn = new mysqli($servername, $username, $password, $database_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body class="admin">
    <header id="admin_header">
        <nav>
            <ul>
                <li><a href="#btnRequest">Request</a></li>
                <li><a href="">Edit</a></li>
            </ul>
        </nav>
    </header>
    <h1>Admin Panel</h1>
    <form action="" method="post">
        <input id="btnRequest" type="submit" name="request" value="Cek Request">
    </form>

    <?php
    if (isset($_POST['request'])) {
        $sql = "SELECT * FROM customer";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Nama</th><th>Alamat Awal</th><th>Alamat Kirim</th><th>Telepon</th><th>Email</th><th>Jenis Kendaraan</th><th>Tanggal Kirim</th><th>Note</th><th>Status</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><a href='admin.php?id=". $row['id']. "'>". $row['id']. "</a></td>";
                echo "<td>". $row['nama']. "</td>";
                echo "<td>". $row['alamat_awal']. "</td>";
                echo "<td>". $row['alamat_kirim']. "</td>";
                echo "<td>". $row['telepon']. "</td>";
                echo "<td>". $row['email']. "</td>";
                echo "<td>". $row['jenis_kendaraan']. "</td>";
                echo "<td>". $row['tanggal_kirim']. "</td>";
                echo "<td>". $row['note']. "</td>";
                echo "<td>". $row['status']. "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No requests found";
        }
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM customer WHERE id = '$id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<h2>Request Details</h2>";
            echo "<p>Nama: ". $row['nama']. "</p>";
            echo "<p>Alamat Awal: ". $row['alamat_awal']. "</p>";
            echo "<p>Alamat Kirim: ". $row['alamat_kirim']. "</p>";
            echo "<p>Telepon: ". $row['telepon']. "</p>";
            echo "<p>Email: ". $row['email']. "</p>";
            echo "<p>Jenis Kendaraan: ". $row['jenis_kendaraan']. "</p>";
            echo "<p>Tanggal Kirim: ". $row['tanggal_kirim']. "</p>";
            echo "<p>Note: ". $row['note']. "</p>";
            echo "<form action='' method='post'>";
            echo "<input type='hidden' name='id' value='". $id. "'>";
            echo "<input type='submit' name='confirm' value='Confirm'>";
            echo "</form>";
        }
    }

    if (isset($_POST['confirm'])) {
        $id = $_POST['id'];
        $sql = "UPDATE customer SET status = 'confirmed' WHERE id = '$id'";
        $conn->query($sql);
        echo "<script>alert('Request confirmed!');</script>";
        //echo "<script>window.location.href='index.html';</script>";
    }

    $conn->close();
    ?>

</body>
</html>
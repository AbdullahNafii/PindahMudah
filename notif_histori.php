<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification History</title>
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
<body class="notif_histori">
    <h1>Notification History</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Status</th>
        </tr>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database_name = "pindahmudah";

        $conn = new mysqli($servername, $username, $password, $database_name);

        if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
        }

        $sql = "SELECT id, status FROM customer WHERE status = 'confirmed'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><a href='notif_histori.php?id=".$row['id']. "'>". $row['id']. "</a></td>";
                echo "<td>". $row['status']. "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No confirmed requests found</td></tr>";
        }

        /*$conn->close();*/
        ?>
    </table>

    <?php
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
            echo "<p>Status: ". $row['status']. "</p>";
        }
    }
        
    ?>
    <div id="backbtn_hist">
        <a href="index.html">Kembali</a>
    </div>
</body>
</html>
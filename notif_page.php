<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification Page</title>
    <style>
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        li {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <h1>Notification Page</h1>
    <ul id="notifications">
        <!-- notifications will be displayed here -->
    </ul>

    <script>
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'notification.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                const notifications = JSON.parse(xhr.responseText);
                const notificationList = document.getElementById('notifications');
                notifications.forEach((notification) => {
                    const li = document.createElement('li');
                    li.textContent = `Request ${notification.id} has been ${notification.status}`;
                    notificationList.appendChild(li);
                });
            }
        };
        xhr.send();
    </script>
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
        }
    ?>
</body>
</html>
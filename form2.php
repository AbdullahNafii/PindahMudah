<?php 
	include "submit2.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>PindahMudah - Form Pengisian</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container-form">
		<h1>Form Pengisian PindahMudah</h1><br>
		<h4>Mohon Isi dengan teliti, kami tidak bertanggung jawab bila terjadi kesalahan input</h4>
		<form action="submit2.php" method="POST">
			<div class="form-form">
			<label for="nama">Nama:</label>
			<input type="text" id="nama" name="nama" autocomplete="off"><br><br>
			<label for="alamat_awal">Alamat titik pengambilan:</label>
			<input type="text" id="alamat_awal" name="alamat_awal" autocomplete="off"><br><br>
			<label for="alamat_kirim">Alamat titik pengiriman:</label>
			<input type="text" id="alamat_kirim" name="alamat_kirim" autocomplete="off"><br><br>
			<label for="telepon">No. Telepon:</label>
			<input type="text" id="telepon" name="telepon" autocomplete="off"><br><br>
			<label for="email">Email:</label>
			<input type="text" id="email" name="email" autocomplete="off"><br><br>
			<label for="jenis_kendaraan">Jenis Kendaraan:</label>
			<select id="jenis_kendaraan" name="jenis_kendaraan" autocomplete="off">
				<option value="mobil_box">Mobil Box</option>
				<option value="mobil_pickup">Mobil Pick up</option>
			</select><br><br>
			<label for="tanggal_kirim">Tanggal Kirim:</label>
			<input type="date" id="tanggal_kirim" name="tanggal_kirim"><br><br>
            <label for="note">Pesan untuk Driver</label>
            <input type="text" id="note" name="note" autocomplete="off"><br><br>
			<button type="submit" name ="submit" value="Submit">Kirim</button>
			</div>
			<div id="backbtn-form">
				<a href="index.html">Kembali</a>
			</div>
		</form>
	</div>
</body>
</html>
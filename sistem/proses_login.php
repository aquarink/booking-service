<?php

session_start();

if(isset($_POST['btnLogin'])) {

	if(empty($_POST['Username']) || empty($_POST['Password'])) {
		header("Location: ../adminlogin.php?msg=Form Tidak Boleh Kosong.");
	} else {

		$username = $_POST['Username'];
		$password = $_POST['Password'];

		include_once 'koneksi_db.php';

		$query_mekanik = mysql_query("SELECT * FROM mekanik_tb WHERE username = '$username' AND password = '$password'");
		$fetch_mekanik_query = mysql_fetch_assoc($query_mekanik);
		$cek_data_mekanik = mysql_num_rows($query_mekanik);

		if($cek_data_mekanik > 0) {

			$_SESSION['mekanik'] = $fetch_mekanik_query['id_mekanik'];
			header("Location: ../admin.php");
		}
	}
} 

?>
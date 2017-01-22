<?php 

	error_reporting(0);

	$server = mysql_connect('localhost','root',''); // url_server , username , password

	if($server) { // jika server diatas terkoneksi
		$database = mysql_select_db('fathur_booking_db');
		$pesan_server = 'Server ada dan ';
		if($database) {
			// Database ada
			$pesan_database = 'Database ada';
		} else {
			// Database tidak ada
			$pesan_database = 'Database tidak ada';
		}
	} else {
		$pesan_server = 'Server tidak ada';
	}


	//echo $pesan_server.$pesan_database;
?>
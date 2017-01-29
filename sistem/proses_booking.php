<?php 

//Koneksi DB
include_once 'koneksi_db.php';

if(isset($_POST['tombol_submit'])) { 



	//echo 'nama='.$_POST['nama'].' nohp='.$_POST['nohp'].' tglbook='.$_POST['tglbook'].' tipe='.$_POST['tipe'].' masalah='.$_POST['masalah'].' nopol='.$_POST['nopol'].' norangka='.$_POST['norangka'].' alamat='.$_POST['alamat'].' mekanik='.$_POST['mekanik'];

	if(empty($_POST['nama']) || empty($_POST['nohp']) || empty($_POST['tglbook']) || empty($_POST['tipe']) || empty($_POST['masalah']) || empty($_POST['nopol']) || empty($_POST['norangka']) || empty($_POST['alamat']) || empty($_POST['mekanik'])) {

		echo("Location: ../booking.php?msg=Kolom Tidak Boleh Kosong");

	} else {
		// tidak kosong
		$nama = $_POST['nama'];
		$nohp = $_POST['nohp'];
		$tglbook = $_POST['tglbook'];
		$tipe = $_POST['tipe'];
		$masalah = $_POST['masalah'];
		$nopol = $_POST['nopol'];
		$norangka = $_POST['norangka'];
		$alamat = $_POST['alamat'];


		$mekanik = $_POST['mekanik'];
		$exMekanik = explode('&', $mekanik);
		//
		$idMekanik = $exMekanik[0];
		$jamBookMekanik = $exMekanik[1];

		$create_at = date('Y-m-d h:i:s');

		$cek_booking_query = mysql_query("SELECT * FROM booking_tb WHERE no_polisi = '$nopol' AND tgl_booking = '$tglbook'");
		$fetch_cek_booking_query = mysql_fetch_assoc($cek_booking_query);
		$cek_data_booking = mysql_num_rows($cek_booking_query);

		if($cek_data_booking > 0) {
			header("Location: ../tracking.php?no_polisi=".$nopol."&msg=Kendaraan Ini Sudah Melakukan Booking.");
		} else {

			$insert_booking_query = "INSERT INTO booking_tb (nama,no_hp,tgl_booking,id_jenis,masalah,no_polisi,no_rangka,alamat,id_mekanik,jam_booking,status_booking,create_at) VALUES('$nama','$nohp','$tglbook','$tipe','$masalah','$nopol','$norangka','$alamat','$idMekanik','$jamBookMekanik','1','$create_at')";
			$run_insert_booking_query = mysql_query($insert_booking_query);

			if($run_insert_booking_query) {
				header("Location: ../tracking.php?no_polisi=".$nopol."&msg=Anda Berhasi Booking");
			} else {
				header("Location: ../booking.php?msg=Anda Gagal Booking");
			}
		}
	}
}

?>
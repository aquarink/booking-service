<?php

if(isset($_POST['data'])) {

	if(!empty($_POST['data'])) {

		//Koneksi DB
		include_once 'koneksi_db.php';

		$data = mysql_escape_string($_POST['data']);
		$exData = explode('/', $data);

		$idMekanik = $exData[0];
		$tanggal = $exData[2];
		$bulan = $exData[1];
		$tahun = $exData[3];

		$tglBooking = $bulan.'/'.$tanggal.'/'.$tahun;

		$jamKerja = array(8,9,10,11,12,13,14,15,16);

		$jamBooking = mysql_query("SELECT * FROM booking_tb WHERE id_mekanik = '$idMekanik' AND tgl_booking = '$tglBooking'");
		$cekJamBooking = mysql_num_rows($jamBooking);

		if($cekJamBooking > 0) {
			//ada
			while ($fetchDataJamBooking = mysql_fetch_array($jamBooking)) {
				if($fetchDataJamBooking['jam_booking'] == 9) {
					$jamKerja = array(9,10,11,12,13,14,15,16);
				}

				$dataJamBook[] = $fetchDataJamBooking['jam_booking'];
			}

			for ($i=0; $i < count($dataJamBook); $i++) { 
				$test[] =  $dataJamBook[$i]+2;

				for ($j=$dataJamBook[$i]; $j < $dataJamBook[$i]+2; $j++) { 
					$test2[] = $j;   
				}
			}

			$removeJamKerja = array_diff($jamKerja, $test2);

			echo json_encode($removeJamKerja);
			
		} else {
			//tidak ada
			echo json_encode($jamKerja, JSON_FORCE_OBJECT);
		}

	} else {
		// data kosong
		echo "string2";
	}
} else {
	echo 'Bukan';
}

?>
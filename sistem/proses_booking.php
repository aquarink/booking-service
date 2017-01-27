<?php 

//Koneksi DB
include_once 'koneksi_db.php';

if(isset($_POST['tombol_submit'])) { // kalau tombol di klik



	//echo 'nama='.$_POST['nama'].' nohp='.$_POST['nohp'].' tglbook='.$_POST['tglbook'].' tipe='.$_POST['tipe'].' masalah='.$_POST['masalah'].' nopol='.$_POST['nopol'].' norangka='.$_POST['norangka'].' alamat='.$_POST['alamat'].' mekanik='.$_POST['mekanik'];

	//cek form kosong
	if(empty($_POST['nama']) || empty($_POST['nohp']) || empty($_POST['tglbook']) || empty($_POST['tipe']) || empty($_POST['masalah']) || empty($_POST['nopol']) || empty($_POST['norangka']) || empty($_POST['alamat']) || empty($_POST['mekanik'])) {

		header("Location: ../booking.php?msg=Kolom Tidak Boleh Kosong");

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

		// Cek user dengan parameter no.HP
		$cek_HPuser_query = 'SELECT * FROM user_tb WHERE no_hp = '.$nohp;
		$run_cek_HPuser_query = mysql_query($cek_HPuser_query);
		$fetch_run_cek_HPuser_query = mysql_fetch_assoc($run_cek_HPuser_query);
		$cek_data_user = mysql_num_rows($run_cek_HPuser_query);

		// Cek Kendaraan parameter idUser
		$idUsernya = $fetch_run_cek_HPuser_query['id_user'];
		$cek_kendaraan_query = 'SELECT * FROM kendaraan_tb WHERE id_user = '.$idUsernya;
		$run_cek_kendaraan_query = mysql_query($cek_kendaraan_query);
		$fetch_run_cek_kendaraan_query = mysql_fetch_assoc($run_cek_kendaraan_query);
		$cek_data_kendaraan = mysql_num_rows($run_cek_kendaraan_query);

		// Cek bookingan parameter idUser, TanggalBooking, IdKendaraan
		$idKendaraannya = $fetch_run_cek_kendaraan_query['id_kendaraan'];
		$cek_booking_query = 'SELECT * FROM booking_tb WHERE id_user = '.$nohp.' AND id_kendaraan = '.$idKendaraannya.' AND tgl_booking = '.$tglbook;
		$run_cek_booking_query = mysql_query($cek_booking_query);
		$fetch_run_cek_booking_query = mysql_fetch_assoc($run_cek_booking_query);
		$cek_data_booking = mysql_num_rows($run_cek_booking_query);

		if($cek_data_booking > 0) {

			header("Location: ../booking.php?msg=Anda Sudah Booking Pada hari tersebut");

		} else {

			if($cek_data_user > 0) {
			// ada data

			// Panggil data lama berdasarkan no.hp
				$data_user_by_hp = mysql_fetch_assoc($run_cek_HPuser_query);

				$cek_kendaraan_query = 'SELECT * FROM kendaraan_tb WHERE id_user = '.$data_user_by_hp['id_user'];
				$run_cek_kendaraan_query = mysql_query($cek_kendaraan_query);
				$fetch_run_cek_kendaraan_query = mysql_fetch_assoc($run_cek_kendaraan_query);
				$data_kendaraan = mysql_num_rows($run_cek_kendaraan_query);

				$id_user = $data_user_by_hp['id_user'];

				if($data_kendaraan > 0) {
				// Data
					$id_kendaraan = $fetch_run_cek_kendaraan_query['id_kendaraan'];

					$create_at = date('Y-m-d h:i:s');

				// Insert Data ke USer tabel
					$insert_booking_query = "INSERT INTO booking_tb (id_user,id_mekanik,id_kendaraan,tgl_booking,jam_booking,masalah,status_booking,create_at) VALUES('$id_user','$mekanik','$id_kendaraan','$tglbook','$jamBookMekanik','$masalah','1','$create_at')";
					$run_insert_booking_query = mysql_query($insert_booking_query); // data masuk ke booking_tb

					if($run_insert_booking_query) {
						header("Location: ../booking.php?msg=Anda Berhasi Booking");
					} else {
						header("Location: ../booking.php?msg=Anda Gagal Booking");
					}

				} else {
					// Insert Data kendaraan tabel
					$insert_kendaraan_query4 = "INSERT INTO kendaraan_tb (id_user,id_jenis,no_polisi,no_rangka,status_kendaraan) VALUES('$id_user','$tipe','$nopol','$norangka','1')";
					$run_insert_kendaraan_query4 = mysql_query($insert_kendaraan_query4); // data masuk ke booking_tb

					if($run_insert_kendaraan_query4) {

						$cek_kendaraan_query2 = 'SELECT * FROM kendaraan_tb WHERE id_user = '.$data_user_by_hp['id_user'];
						$run_cek_kendaraan_query2 = mysql_query($cek_kendaraan_query2);
						$fetch_run_cek_kendaraan_query2 = mysql_fetch_assoc($run_cek_kendaraan_query2);

						$id_kendaraan2 = $fetch_run_cek_kendaraan_query2['id_kendaraan'];

					// Insert Data ke USer tabel
						$insert_booking_query2 = "INSERT INTO booking_tb (id_user,id_mekanik,id_kendaraan,tgl_booking,jam_booking,masalah,status_booking,create_at) VALUES('$id_user','$mekanik','$id_kendaraan2','$tglbook','$jamBookMekanik','$masalah','1','$create_at')";
						$run_insert_booking_query2 = mysql_query($insert_booking_query2); // data masuk ke booking_tb

						if($run_insert_booking_query2) {
							header("Location: ../booking.php?msg=Anda Berhasi Booking exception1");
						} else {
							header("Location: ../booking.php?msg=Anda Gagal Booking exception1");
						}
					} else {
						header("Location: ../booking.php?msg=Anda Gagal Save Kendaraan exception3");
					}
				}

			} else {
			// tidak ada data
			// Insert Data ke USer tabel
				$insert_user_query = "INSERT INTO user_tb (nama_user,no_hp,alamat,status) VALUES('$nama', '$nohp', '$alamat', '1')";
				$run_insert_user_query = mysql_query($insert_user_query); // data masuk ke user_tb

				if($run_insert_user_query) {

					// Cek dengan parameter no.HP
					$cek_HPuser_query = 'SELECT * FROM user_tb WHERE no_hp = '.$nohp;
					$run_cek_HPuser_query = mysql_query($cek_HPuser_query);
					$cek_data = mysql_num_rows($run_cek_HPuser_query);

					if($cek_data > 0) {
					// ada data

					// Panggil data lama berdasarkan no.hp
						$data_user_by_hp = mysql_fetch_assoc($run_cek_HPuser_query);

						$cek_kendaraan_query = 'SELECT * FROM kendaraan_tb WHERE id_user = '.$data_user_by_hp['id_user'];
						$run_cek_kendaraan_query = mysql_query($cek_kendaraan_query);
						$fetch_run_cek_kendaraan_query = mysql_fetch_assoc($run_cek_kendaraan_query);
						$data_kendaraan = mysql_num_rows($run_cek_kendaraan_query);

						$id_user = $data_user_by_hp['id_user'];

						if($data_kendaraan > 0) {
						// Data
							
							$id_kendaraan = $fetch_run_cek_kendaraan_query['id_kendaraan'];

							$create_at = date('Y-m-d h:i:s');

						// Insert Data ke USer tabel
							$insert_booking_query = "INSERT INTO booking_tb (id_user,id_mekanik,id_kendaraan,tgl_booking,jam_booking,masalah,status_booking,create_at) VALUES('$id_user','$mekanik','$id_kendaraan','$tglbook','$jamBookMekanik','$masalah','1','$create_at')";
							$run_insert_booking_query = mysql_query($insert_booking_query); // data masuk ke booking_tb

							if($run_insert_booking_query) {
								header("Location: ../booking.php?msg=Anda Berhasi Booking exception");
							} else {
								header("Location: ../booking.php?msg=Anda Gagal Booking exception");
							}
						} else {

							// Insert Data kendaraan tabel
							$insert_kendaraan_query3 = "INSERT INTO kendaraan_tb (id_user,id_jenis,no_polisi,no_rangka,status_kendaraan) VALUES('$id_user','$tipe','$nopol','$norangka','1')";
							$run_insert_kendaraan_query3 = mysql_query($insert_kendaraan_query3); // data masuk ke booking_tb

							if($run_insert_kendaraan_query3) {

								$cek_kendaraan_query2 = 'SELECT * FROM kendaraan_tb WHERE id_user = '.$data_user_by_hp['id_user'];
								$run_cek_kendaraan_query2 = mysql_query($cek_kendaraan_query2);
								$fetch_run_cek_kendaraan_query2 = mysql_fetch_assoc($run_cek_kendaraan_query2);

								$id_kendaraan2 = $fetch_run_cek_kendaraan_query2['id_kendaraan'];

							// Insert Data ke USer tabel
								$insert_booking_query2 = "INSERT INTO booking_tb (id_user,id_mekanik,id_kendaraan,tgl_booking,jam_booking,masalah,status_booking,create_at) VALUES('$id_user','$mekanik','$id_kendaraan2','$tglbook','$jamBookMekanik','$masalah','1','$create_at')";
								$run_insert_booking_query2 = mysql_query($insert_booking_query2); // data masuk ke booking_tb

								if($run_insert_booking_query2) {
									header("Location: ../booking.php?msg=Anda Berhasi Booking exception2");
								} else {
									header("Location: ../booking.php?msg=Anda Gagal Booking exception2");
								}
							} else {
								header("Location: ../booking.php?msg=Anda Gagal Save Kendaraan exception1");
							}
						}
					} else {
						header("Location: ../booking.php?msg=User tidak ada exception");
					}
				} else {
					header("Location: ../booking.php?msg=User Gagal Ditambahkan exception");
				}
			}
		}
	}
}

?>
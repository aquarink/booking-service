<?php 

//Koneksi DB
include_once 'sistem/koneksi_db.php';

// Untuk panggil data jenis kendaraan
$jenis_kendaraan_query = 'SELECT * FROM jenis_kendaraan_tb';
$ambil_data_jenis_kendaraan = mysql_query($jenis_kendaraan_query); // array

if(isset($_POST['tombol_submit'])) { // kalau tombol di klik

	//cek form kosong
	if(empty($_POST['nama']) || empty($_POST['nohp'])  || 
		empty($_POST['tipe']) || empty($_POST['nopol']) || 
		empty($_POST['norangka']) || empty($_POST['alamat']) || 
		empty($_POST['tglbook']) || empty($_POST['jambook'])) {

		$warning = 'Kolom Tidak Boleh Kosong';
	} else {
		// tidak kosong
		$nama = $_POST['nama'];
		$nohp = $_POST['nohp'];
		$tipe = $_POST['tipe'];
		$nopol = $_POST['nopol'];
		$norangka = $_POST['norangka'];
		$alamat = $_POST['alamat'];
		$tglbook = $_POST['tglbook'];
		$jambook = $_POST['jambook']; 


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
			$data_kendaraan = mysql_num_rows($run_cek_kendaraan_query);

			// Setelah dapat data

			// Data
			$id_user = $data_user_by_hp['id_user'];
			$id_kendaraan = $data_kendaraan['id_kendaraan'];

			$create_at = date('Y-m-d h:i:s');

			// Insert Data ke USer tabel
			$insert_booking_query = 'INSERT INTO booking_tb (id_user,id_kendaraan,tgl_booking,jam_booking,status_booking,create_at) VALUES($id_user,$id_kendaraan,$tglbook,$jambook,1,$create_at)';
			$run_insert_booking_query = mysql_query($insert_booking_query); // data masuk ke booking_tb

			if($run_insert_booking_query) {
				$warning = 'Anda Berhasi Booking';
			}
		} else {
			// tidak ada data

		}


		// Insert Data ke USer tabel
		$insert_user_query = 'INSERT INTO user_tb (nama_user,no_hp,alamat,status) VALUES($nama, $nohp, $alamat, 1)';
		$run_insert_user_query = mysql_query($insert_user_query); // data masuk ke user_tb




	}
}

?>



<html>
<head>
	<title>Booking Service</title>
	
	<link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
	<link type="text/css" rel="stylesheet" href="bootstrap/css/jquery-ui.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"='width: 60%' style>
					<img src="bootstrap/images/toyota.jpg" class='img img-responsive' style='height:30px; margin-top:0px'>
				</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="index.php"><i class='glyphicon glyphicon-home'></i> Tentang Kami</a></li>
					<li><a href="layanan.php"><i class='glyphicon glyphicon-wrench'></i> Layanan</a></li>
					<li class="active"><a href="booking.php"><i class='glyphicon glyphicon-list alt'></i> Booking Layanan Kerumah</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="adminlogin.php"><i class='glyphicon glyphicon-user'></i> Login Admin</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>


	<div class="container" style="margin-top:70px">
		<h3 align="center">BOOKING TOYOTA HOME SERVICE</h3>
		<h3 align="center">AUTO2000 BINTARO</h3>
		<form action="" method="POST">
			<div class="form-group">
				<label for="nama">Nama</label>
				<input required name="nama" autofocus type="text" class="form-control" id="nama" placeholder="Nama">
			</div>
			<div class="form-group">
				<label for="nohp">No.Handphone</label>
				<input required nama="nohp" type="tel" class="form-control" id="nohp" placeholder="Hp">
			</div>
			<div class="form-group">
				<label for="tipe">Type Kendaraan</label>
				<select name="tipe" required class="form-control">
					<?php while($data_jns = mysql_fetch_array($ambil_data_jenis_kendaraan)) {
						echo '<option value='.$data_jns['id_jenis'].'>'.$data_jns['nama_jenis'].'</option>';
					} ?>
				</select>
			</div>
			<div class="form-group">
				<label for="nopol">No.Polisi Kendaraan</label>
				<input required name="nopol" type="text" class="form-control" id="nopol" placeholder="Nomor Polisi Contoh : B123ABC">
			</div>
			<div class="form-group">
				<label for="norangka">No.Rangka</label>
				<input required name="norangka" type="text" class="form-control" id="norangka" placeholder="Nomor Rangka Contoh : MHKM1BA">
			</div>
			<div class="form-group">
				<label for="exampleInalamatutEmail1">Alamat</label>
				<textarea required name="alamat" class="form-control" id="alamat" placeholder="Alamat"></textarea>
			</div>
			<div class="form-group">
				<label for="tglbook">Tanggal Booking</label>
				<input name="tglbook" type="date" class="form-control" id="tglbook111" placeholder="Tanggal Booking">
			</div>
			<div class="form-group">
				<label for="jambook">Jam Booking</label>
				<input required name="jambook" type="time" class="form-control" id="jambook" placeholder="Jam Booking">
			</div>
			<br>
			<button type="submit" name="tompol_submit" class="btn btn-success">Submit</button>
		</form>
	</div>

	<script type="text/javascript" src="bootstrap/js/jquery-1.12.4.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/jquery-ui.js"></script>

	<script type="text/javascript">
		$( function() {
		    $( "#tglbook111" ).datepicker();
		  } );

</body>
</html>
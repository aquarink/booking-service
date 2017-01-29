<?php 
include_once 'sistem/koneksi_db.php'; 

if(isset($_POST['noPolisi'])) {
	if(empty($_POST['noPolisi'])) {
		$pesan = 'Tidak boleh Kosong';
	} else {
		$noPolis = $_POST['noPolisi'];
		$tglBooking = date('m/d/Y');

		$booking = mysql_query("SELECT * FROM booking_tb WHERE no_polisi = '$noPolis' AND tgl_booking = '$tglBooking'");
		$cekBooking = mysql_num_rows($booking);
		$fetch_booking = mysql_fetch_assoc($booking);

		$idMekanik = $fetch_booking['id_mekanik'];

		$mekanik_query = mysql_query("SELECT * FROM mekanik_tb WHERE id_mekanik = '$idMekanik'");
		$fetch_mekanik_query = mysql_fetch_assoc($mekanik_query);

		if($cekBooking > 0) {

			if($fetch_booking['status_booking'] == 1) {
				$pesan = '<div class="alert alert-info"><strong>Pemesanan service home anda sudah masuk antrian dan sedang menunggu respon mekanik</strong></div>';
			} elseif($fetch_booking['status_booking'] == 2) {
				$pesan = '<div class="alert alert-info"><strong>Pemesanan service home anda sudah diterima mekanik '.$fetch_mekanik_query['nama_mekanik'].' dan akan segera datang</strong></div>';
			} elseif($fetch_booking['status_booking'] == 3) {
				$pesan = '<div class="alert alert-info"><strong>Pemesanan service home anda sudah seesai dikerjakan mekanik '.$fetch_mekanik_query['nama_mekanik'].'</strong></div>';
			} else {
				$pesan = '<div class="alert alert-info"><strong>Tidak ada pemesanan dengan nomor polisi '.$noPolis.'</strong></div>'; 
			}
		}

	}
}
?>
<html>
<head>
	<title>Booking Service</title>
	
	<link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
	<link type="text/css" rel="stylesheet" href="bootstrap/css/jquery-ui.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<style type="text/css">
	#custom-search-input{
		padding: 3px;
		border: solid 1px #E4E4E4;
		border-radius: 6px;
		background-color: #fff;
	}

	#custom-search-input input{
		border: 0;
		box-shadow: none;
	}

	#custom-search-input button{
		margin: 2px 0 0 0;
		background: none;
		box-shadow: none;
		border: 0;
		color: #666666;
		padding: 0 8px 0 10px;
		border-left: solid 1px #ccc;
	}

	#custom-search-input button:hover{
		border: 0;
		box-shadow: none;
		border-left: solid 1px #ccc;
	}

	#custom-search-input .glyphicon-search{
		font-size: 23px;
	}
	</style>
</head>
<body style="background-color:#bfb0b0">
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
					<li><a href="booking.php"><i class='glyphicon glyphicon-list alt'></i> Booking Layanan Kerumah</a></li>
					<li class="active"><a href="tracking.php"><i class='glyphicon glyphicon-search alt'></i> Tracking Bookingan</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="adminlogin.php"><i class='glyphicon glyphicon-user'></i> Login Admin</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>


	<div class="container" style="margin-top:70px">

		<div class="col-md-3"></div>

		<div class="col-md-6">
			<h3 align="center">TRACKING BOOKING TOYOTA HOME SERVICE</h3>
			<h3 align="center">AUTO2000 BINTARO</h3>
			<?php if(isset($pesan)) {echo $pesan; } ?>

			<form action="" method="POST">
				<h4 align="center">Nomor Polisi Kendaraan</h4>
				<div id="custom-search-input">
					<div class="input-group col-md-12">
						<input required type="text" class="form-control input-lg" name="noPolisi" placeholder="Nomor Polisi Kendaraan" />
						<span class="input-group-btn">
							<button class="btn btn-info btn-lg" type="submit"><i class="glyphicon glyphicon-search"></i></button>
						</span>
					</div>
				</div>
			</form>

			

		</div>

		<div class="col-md-3"></div>
	</div>

	<script type="text/javascript" src="bootstrap/js/jquery-1.12.4.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/jquery-ui.js"></script>

</body>
</html>
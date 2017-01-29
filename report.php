<?php session_start(); if(isset($_SESSION['mekanik'])) { ?>
<html>
<head>
	<title>Histori | Admin Booking Service</title>
	
	<link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<style type="text/css">
	.widget .panel-body { padding:0px; }
	.widget .list-group { margin-bottom: 0; }
	.widget .panel-title { display:inline }
	.widget .label-info { float: right; }
	.widget li.list-group-item {border-radius: 0;border: 0;border-top: 1px solid #ddd;}
	.widget li.list-group-item:hover { background-color: rgba(86,61,124,.1); }
	.widget .mic-info { color: #666666;font-size: 11px; }
	.widget .action { margin-top:5px; }
	.widget .comment-text { font-size: 12px; }
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
				<a class="navbar-brand" href="#"='width: 60%'>
					<img src="bootstrap/images/toyota.jpg" class='img img-responsive' style='height:30px; margin-top:0px'>
				</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="admin.php"><i class='glyphicon glyphicon-th-list'></i> Booking Hari ini</a></li>
					<li class="active"><a href="report.php"><i class='glyphicon glyphicon-list-alt'></i> History</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="sistem/logout.php"><i class='glyphicon glyphicon-off'></i> Logout</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>

	<div class="container" style="margin-top:70px">
		<div class="row">
			<div class="panel panel-default widget">
				<div class="panel-heading">
					<span class="glyphicon glyphicon-comment"></span>
					<h3 class="panel-title">Data Booking Service Hari Ini</h3>
				</div>

				<?php
				include_once 'sistem/koneksi_db.php';

				session_start();
				include_once 'sistem/koneksi_db.php';

				$tglbook = $create_at = date('m/d/Y');

				$idMekanik = $_SESSION['mekanik'];

				$booking_query3 = mysql_query("SELECT * FROM booking_tb WHERE status_booking = '3' AND tgl_booking = '$tglbook' AND id_mekanik = '$idMekanik'");
				$cek_data_booking3 = mysql_num_rows($booking_query3);

				if($cek_data_booking3 > 0) {

				while ($fetch_booking_query3 = mysql_fetch_array($booking_query3)) {

				$idMekanik2 = $fetch_booking_query3['id_mekanik'];

				$mekanik_query = mysql_query("SELECT * FROM mekanik_tb WHERE id_mekanik = '$idMekanik2'");
				$fetch_mekanik_query = mysql_fetch_assoc($mekanik_query);
				?>

				<div class="panel-body">
					<ul class="list-group">
						<li class="list-group-item">
							<div class="row">
								<div class="col-xs-2 col-md-1">
									<img src="http://placehold.it/80" class="img img-responsive" alt="" />
								</div>
								<div class="col-xs-9 col-md-10">
									<div>
										<a>Bpk/Ibu. <?php echo ucfirst($fetch_booking_query3['nama']); ?></a>
										<div class="mic-info">

											Ditangani oleh : <a><?php echo ucfirst($fetch_mekanik_query['nama_mekanik']); ?></a> Pada : <?php echo ucfirst($fetch_booking_query3['tgl_booking']); ?> No.Telpon : <a><?php echo $fetch_booking_query3['no_hp']; ?></a>
										</div>
									</div>
									<div class="comment-text">
										<b>Alamat :</b> <?php echo ucfirst($fetch_booking_query3['alamat']); ?> <br>
										<b>Keluhan :</b> <?php echo ucfirst($fetch_booking_query3['masalah']); ?>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>			
				<?php } } else { ?>
				<div class="panel-body">
					<ul class="list-group">
						<li class="list-group-item">
							<div class="row" style="text-align:center">
								<h3>Belum ada bookingan terselesaikan</h3>
							</div>
						</li>
					</ul>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
<?php } ?>
<?php 
session_start(); 
include_once 'sistem/koneksi_db.php';
if(isset($_SESSION['mekanik'])) { 
	if(isset($_GET['konfirm'])) {

		if($_GET['konfirm'] == 'true') {
			if(isset($_GET['action'])) {

				if(isset($_GET['booking'])) {

					$idBooking = $_GET['booking'];

					if($_GET['action'] == 1) {

						$updateStatus = mysql_query("UPDATE booking_tb SET status_booking = '2' WHERE id_booking = '$idBooking'");
						if($updateStatus) {
							header("location: admin.php");
						}

					} elseif ($_GET['action'] == 2) {

						$updateStatus = mysql_query("UPDATE booking_tb SET status_booking = '3' WHERE id_booking = '$idBooking'");
						if($updateStatus) {
							header("location: admin.php");
						}

					} else {
						header("location: admin.php");
					}
				} else {
					header("location: admin.php");
				} 
			} else {
				header("location: admin.php");
			} 
		} else {
			?>
			<html>
			<head>
				<title>Konfirm Permintaan Service | Admin Booking Service</title>

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
				.Adisabled {
					pointer-events: none;
					cursor: default;
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
								<li class="active"><a href="admin.php"><i class='glyphicon glyphicon-th-list'></i> Booking Hari ini</a></li>
								<li><a href="report.php"><i class='glyphicon glyphicon-list-alt'></i> History</a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="sistem/logout.php"><i class='glyphicon glyphicon-off'></i> Logout</a></li>
							</ul>
						</div><!--/.nav-collapse -->
					</div>
				</nav>

				<div class="container" style="margin-top:70px">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="panel panel-default widget">
								
								<?php
								$idBooking = $_GET['booking'];

								$booking_query2 = mysql_query("SELECT * FROM booking_tb WHERE id_booking = '$idBooking'");
								$fetch_booking_query2 = mysql_fetch_assoc($booking_query2);
								$cek_data_booking2 = mysql_num_rows($booking_query2);



								if($cek_data_booking2 > 0) {
									$idMekanik = $fetch_booking_query2['id_mekanik'];

									$mekanik_query = mysql_query("SELECT * FROM mekanik_tb WHERE id_mekanik = '$idMekanik'");
									$fetch_mekanik_query = mysql_fetch_assoc($mekanik_query);
									?>
									<a href="konfirm.php?konfirm=true&action=<?php echo $_GET['action'] ?>&booking=<?php echo $fetch_booking_query2['id_booking']; ?>">
										<button class="btn-success">

											Apakah anda yakin booking Bpk/Ibu. <?php echo ucfirst($fetch_booking_query2['nama']); ?> 
											dialamat <?php echo ucfirst($fetch_booking_query2['alamat']); ?>
											dan mengerjakan keluhan <?php echo ucfirst($fetch_booking_query2['masalah']); ?>, anda bisa konfirmasi ke nomor <?php echo $fetch_booking_query2['no_hp']; ?>
											?
										</button>
									</a>
									<?php } ?>
								</div>
							</div>
							<div class="col-md-2"></div>
						</div>
					</div>

					<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
					<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

				</body>
				</html>
				<?php
			}
		} else {
			header("location: admin.php");
		}
	} else {
		header("location: adminlogin.php");
	}
	?>
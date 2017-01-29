<?php include_once 'sistem/koneksi_db.php'; ?>
<html>
<head>
	<title>Booking Service</title>
	
	<link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
	<link type="text/css" rel="stylesheet" href="bootstrap/css/jquery-ui.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
			<?php if(isset($_GET['msg'])) { echo '<div class="alert alert-info"><strong>Info!</strong>'.$_GET['msg'].'</div>'; } ?>


			<form action="sistem/proses_tracking.php" method="POST">
				<div class="form-group">
					<label for="nama">NO. POLISI</label>
					<input required name="nama" autofocus type="text" class="form-control" value="<?php if(isset($_GET['no_polisi'])) { echo $_GET['no_polisi']; } ?>" placeholder="Nama">
				</div>
				<br>
				<input type="submit" name="tombol_track" class="btn btn-success" value="Track Booking"></input>
			</form>
		</div>

		<div class="col-md-3"></div>
	</div>

	<script type="text/javascript" src="bootstrap/js/jquery-1.12.4.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/jquery-ui.js"></script>

</body>
</html>
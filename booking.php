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
					<li class="active"><a href="booking.php"><i class='glyphicon glyphicon-list alt'></i> Booking Layanan Kerumah</a></li>
					<li><a href="tracking.php"><i class='glyphicon glyphicon-search alt'></i> Tracking Bookingan</a></li>
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
			<h3 align="center">BOOKING TOYOTA HOME SERVICE</h3>
			<h3 align="center">AUTO2000 BINTARO</h3>
			<?php if(isset($_GET['msg'])) { echo '<div class="alert alert-info"><strong>Info!</strong>'.$_GET['msg'].'</div>'; } ?>


			<form action="sistem/proses_booking.php" method="POST">
				<div class="form-group">
					<label for="nama">Nama</label>
					<input required name="nama" autofocus type="text" class="form-control" id="nama" placeholder="Nama">
				</div>
				<div class="form-group">
					<label for="nohp">No.Handphone</label>
					<input required name="nohp" type="text" class="form-control" id="nohp" placeholder="Hp">
				</div>
				<div class="form-group">
					<label for="tglbook">Tanggal Booking</label>
					<input name="tglbook" type="text" class="form-control" id="tglbook" placeholder="Tanggal Booking">
				</div>
				<div class="form-group">
					<label for="tipe">Type Kendaraan</label>
					<select name="tipe" required class="form-control">
						<?php 
						$jenis_kendaraan_query = 'SELECT * FROM jenis_kendaraan_tb';
						$ambil_data_jenis_kendaraan = mysql_query($jenis_kendaraan_query);
						while($data_jns = mysql_fetch_array($ambil_data_jenis_kendaraan)) {
							echo '<option value='.$data_jns['id_jenis'].'>'.$data_jns['nama_jenis'].'</option>';
						} ?>
					</select>
				</div>
				<div class="form-group">
					<label for="nopol">Kerusakan/Kendala/Keluhan</label>
					<input required name="masalah" type="text" class="form-control" id="nopol" placeholder="Kerusakan Contoh : Bunyi pada mesin">
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
					<button type="button" id="pilMekanikBtn" data-toggle="modal" data-target="#myModal">Pilih Mekanik</button>
					<span id="labelSelect" class="label label-danger"></span>
					<input type="hidden" name="mekanik" id="pilMekanik">
				</div>
				<br>
				<input type="submit" id="subOrder" name="tombol_submit" class="btn btn-success" value="Submit"></input>
			</form>
		</div>

		<div class="col-md-3"></div>
	</div>

	<!-- Modals -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
					<h4 class="modal-title" id="myModalLabel">Nama Mekanik</h4>
					<select class="form-control" id="chooseMekanik">
						<option val='0'>--Pilih Mekanik--</option>
						<?php 
						$qMekanik = mysql_query("SELECT * FROM mekanik_tb WHERE status_mekanik = '1'");
						while ($fetchMekanik = mysql_fetch_array($qMekanik)) {
							echo '<option value='.$fetchMekanik['id_mekanik'].'>'.$fetchMekanik['nama_mekanik'].'</option>';
						}
						?>
					</select>
				</div>
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
					<h4 class="modal-title" id="myModalLabel">Pilih Jam</h4>
					<select class="form-control" name="jamMekanik" id="jamMekanik">
						<option>--Pilih Jam--</option>
					</select>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-warning" id="pilihMekanik" data-dismiss="modal">Pilih</button>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="bootstrap/js/jquery-1.12.4.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/jquery-ui.js"></script>

	<script>
	$(function() {
		$( "#tglbook" ).datepicker({
			onSelect: function() {
				$('#subOrder').attr('disabled',false);
				$('#pilMekanikBtn').attr('disabled',false);
			}
		});

		$('#subOrder').attr('disabled',true);
		$('#pilMekanikBtn').attr('disabled',true);
	});

	$("#pilihMekanik").on('click',function() {
		var chooseMekanikVal = $('#chooseMekanik').val();
		var chooseMekanikText = $('#chooseMekanik option:selected').text();
		var jamMekanik = $('#jamMekanik').val();

		var textLabel = 'Mekanik '+chooseMekanikText+' dipilih untuk kunjungan pada jam '+jamMekanik;
		var valPost = chooseMekanikVal+'&'+jamMekanik;

		$('#labelSelect').html(textLabel);
		$('#pilMekanik').val(valPost);

		//console.log(chooseMekanikText);
	});

	$("#chooseMekanik").bind('change',function() {
		var mekanikId = $(this).val();
		var tanggal = $('#tglbook').val(); 

		//  1/01/03/2017 id/bulan/tanggal/tahun

		if(mekanikId !== '--Pilih Mekanik--') {
			$.ajax({
				type: "POST",
				url: "sistem/mekanik_logic.php",
				data:{data: mekanikId+'/'+tanggal},
				dataType: 'json',
				success: function(result){
					var items = '';
					$.each(result,function(key,value) {
						items += "<option value='"+value+"'>"+value+"</option>";
				      //console.log(value);
				  });

					$("#jamMekanik").html(items);
				},
				error:function(exception) {
					alert('Exeption:'+exception);
				}
			});
		}
	});
	</script>

</body>
</html>
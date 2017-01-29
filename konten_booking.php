<?php session_start(); if(isset($_SESSION['mekanik'])) { ?>
<div id="reloadDiv">

	<?php
	include_once 'sistem/koneksi_db.php';

	$tglbook = $create_at = date('m/d/Y');

	$idMekanik = $_SESSION['mekanik'];

	$booking_query2 = mysql_query("SELECT * FROM booking_tb WHERE status_booking = '2' AND tgl_booking = '$tglbook' AND id_mekanik = '$idMekanik'");
	$fetch_booking_query2 = mysql_fetch_assoc($booking_query2);
	$cek_data_booking2 = mysql_num_rows($booking_query2);



	if($cek_data_booking2 > 0) {
		$idMekanik = $fetch_booking_query2['id_mekanik'];

		$mekanik_query = mysql_query("SELECT * FROM mekanik_tb WHERE id_mekanik = '$idMekanik'");
		$fetch_mekanik_query = mysql_fetch_assoc($mekanik_query);
		?>
		<div class="panel panel-default widget">
			<div class="panel-heading">
				<span class="glyphicon glyphicon-comment"></span>
				<h3 class="panel-title">Sedang Dikerjakan</h3>
				<!-- <span class="label label-info">78</span> -->
			</div>
			<div class="panel-body">
				<ul class="list-group">
					<li class="list-group-item">
						<div class="row">
							<div class="col-xs-3 col-md-2">
								<a href="konfirm.php?konfirm=false&action=2&booking=<?php echo($fetch_booking_query2['id_booking']); ?>"><button class="btn-success">Selesai Dikerjakan</button></a>
							</div>
							<div class="col-xs-9 col-md-10">
								<div>
									<a>Bpk/Ibu. <?php echo ucfirst($fetch_booking_query2['nama']); ?></a>
									<div class="mic-info">

										Ditangani oleh : <a><?php echo ucfirst($fetch_mekanik_query['nama_mekanik']); ?></a> Pada : <?php echo ucfirst($fetch_booking_query2['tgl_booking']); ?> No.Telpon : <a><?php echo $fetch_booking_query2['no_hp']; ?></a>
									</div>
								</div>
								<div class="comment-text">
									<b>Alamat :</b> <?php echo ucfirst($fetch_booking_query2['alamat']); ?> <br>
									<b>Keluhan :</b> <?php echo ucfirst($fetch_booking_query2['masalah']); ?>
								</div>
							</div>
						</div>
					</li>
				</ul>
				<!-- <a href="#" class="btn btn-primary btn-sm btn-block" role="button"><span class="glyphicon glyphicon-refresh"></span> More</a> -->
			</div>
		</div>
		<br>
		<?php } ?>

		<div class="panel panel-default widget">
			<div class="panel-heading">
				<span class="glyphicon glyphicon-comment"></span>
				<h3 class="panel-title">Booking Service Hari Ini</h3>
				<!-- <span class="label label-info">78</span> -->
			</div>
			<?php

			$tglbook = $create_at = date('m/d/Y');

			$booking_query1 = mysql_query("SELECT * FROM booking_tb WHERE status_booking = '1' AND tgl_booking = '$tglbook'");
			$cek_data_booking1 = mysql_num_rows($booking_query1);

			if($cek_data_booking1 > 0) {
			while ($fetch_booking_query1 = mysql_fetch_array($booking_query1)) {

			$idMekanik = $fetch_booking_query1['id_mekanik'];

			$mekanik_query = mysql_query("SELECT * FROM mekanik_tb WHERE id_mekanik = '$idMekanik'");
			$fetch_mekanik_query = mysql_fetch_assoc($mekanik_query);
			?>
			<div class="panel-body">
				<ul class="list-group">
					<li class="list-group-item">
						<div class="row">
							<div class="col-xs-3 col-md-2">
								<?php
								$idMekanik = $_SESSION['mekanik'];
								$tglbook = $create_at = date('m/d/Y');

								$booking_queryA = mysql_query("SELECT * FROM booking_tb WHERE status_booking = '2' AND tgl_booking = '$tglbook' AND id_mekanik = '$idMekanik'");
								$cek_data_bookingA = mysql_num_rows($booking_queryA);

								if($cek_data_bookingA > 0) {
								?>
								<a class="Adisabled" href="pengerjaan.php?action=1"><button class="btn-info">Kerjakan Booking</button></a>
								<?php } else { ?>
								<a href="konfirm.php?konfirm=false&action=1&booking=<?php echo($fetch_booking_query1['id_booking']); ?>"><button class="btn-info">Kerjakan Booking</button></a>
								<?php } ?>
							</div>
							<div class="col-xs-9 col-md-10">
								<div>
									<a href="http://bootsnipp.com/BhaumikPatel/snippets/Obgj">Bpk/Ibu. <?php echo ucfirst($fetch_booking_query1['nama']); ?></a>
									<div class="mic-info">

										Ditangani oleh : <a><?php echo ucfirst($fetch_mekanik_query['nama_mekanik']); ?></a> Pada : <?php echo ucfirst($fetch_booking_query1['tgl_booking']); ?> No.Telpon : <a><?php echo $fetch_booking_query1['no_hp']; ?></a>
									</div>
								</div>
								<div class="comment-text">
									<b>Alamat :</b> <?php echo ucfirst($fetch_booking_query1['alamat']); ?> <br>
									<b>Keluhan :</b> <?php echo ucfirst($fetch_booking_query1['masalah']); ?>
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
							<h3>Belum ada bookingan</h3>
						</div>
					</li>
				</ul>
				<!-- <a href="#" class="btn btn-primary btn-sm btn-block" role="button"><span class="glyphicon glyphicon-refresh"></span> More</a> -->
			</div>
			<?php } ?>
		</div>
	</div>

	<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	  <div class="modal-dialog modal-sm" role="document">
	    <div class="modal-content">
	      ...
	    </div>
	  </div>
	</div>
<?php } else {
	echo "Konten Tidak Ada";
}
?>
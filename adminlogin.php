<html>
<head>
	<title>Admin Login</title>
	
	<link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
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
					<li><a href="index.php"><i class='glyphicon glyphicon-share-alt'></i> Halaman Pelanggan</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="adminlogin.php"><i class='glyphicon glyphicon-user'></i> Login Admin</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>

	<div class="container" style="margin-top:70px">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="panel panel-default">
						<div class="panel-heading">                                
                                <div class="container" style="margin-center">
                                    <img src="bootstrap/images/001.png" class="img img-circle">
                                </div>
                            </div>
						<div class="panel-body">
							<form accept-charset="UTF-8" role="form" class="form-signin">
								<fieldset>
									<label class="panel-login">
										<div class="login_result"></div>
									</label>
									<input class="form-control" placeholder="Username" id="ftr" type="text">
									<input class="form-control" placeholder="Password" id="1234" type="password">
									<br></br>
									<input href="admin.php" class="btn btn-lg btn-success btn-block" type="submit" id="login" value="Login »">	
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
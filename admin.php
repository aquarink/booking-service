<html>
<head>
	<title>Admin Booking Service</title>
	
	<link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<style type="text/css">
	.trash { color:rgb(209, 91, 71); }
	.flag { color:rgb(248, 148, 6); }
	.panel-body { padding:0px; }
	.panel-footer .pagination { margin: 0; }
	.panel .glyphicon,.list-group-item .glyphicon { margin-right:5px; }
	.panel-body .radio, .checkbox { display:inline-block;margin:0px; }
	.panel-body input[type=checkbox]:checked + label { text-decoration: line-through;color: rgb(128, 144, 160); }
	.list-group-item:hover, a.list-group-item:focus {text-decoration: none;background-color: rgb(245, 245, 245);}
	.list-group { margin-bottom:0px; }
	</style>
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
					<li class="active"><a href="admin.php"><i class='glyphicon glyphicon-th-list'></i> Booking Hari ini</a></li>
					<li><a href="report.php"><i class='glyphicon glyphicon-list-alt'></i> History</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="adminlogin.php"><i class='glyphicon glyphicon-off'></i> Logout</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>


	<div class="container" style="margin-top:70px">
		<div class="">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<span class="glyphicon glyphicon-list"></span>List Order Today
					<div class="pull-right action-buttons">
						<div class="btn-group pull-right">
						</button>
						<ul class="dropdown-menu slidedown">
							<li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-pencil"></span>Edit</a></li>
							<li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-pencil"></span>Edit</a></li>
							<li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-trash"></span>Delete</a></li>
							<li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-flag"></span>Flag</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<ul class="list-group">
					<li class="list-group-item">
						<div class="checkbox">
							<label for="checkbox">
								List group item heading
							</label>
						</div>
						<div class="pull-right action-buttons">
							<a href="http://www.jquery2dotnet.com" class="play"><span class="glyphicon glyphicon-play"></span></a>
							<a href="http://www.jquery2dotnet.com" class="stop"><span class="glyphicon glyphicon-stop"></span></a>
							<a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-pencil"></span></a>
							<a href="http://www.jquery2dotnet.com" class="trash"><span class="glyphicon glyphicon-trash"></span></a>
						</div>
					</li>
				</ul>
			</div>
			<div class="panel-footer">
				<div class="row">
					<div class="col-md-6">
						<h6>
							Total Count <span class="label label-info">25</span></h6>
						</div>
					</div>
				</div>
			</div>
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
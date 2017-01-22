<html>
<head>
	<title>Histori | Admin Booking Service</title>
	
	<link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<style type="text/css">.bs-calltoaction{
    position: relative;
    width:auto;
    padding: 15px 25px;
    border: 1px solid black;
    margin-top: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
}

    .bs-calltoaction > .row{
        display:table;
        width: calc(100% + 30px);
    }
     
        .bs-calltoaction > .row > [class^="col-"],
        .bs-calltoaction > .row > [class*=" col-"]{
            float:none;
            display:table-cell;
            vertical-align:middle;
        }

            .cta-contents{
                padding-top: 10px;
                padding-bottom: 10px;
            }

                .cta-title{
                    margin: 0 auto 15px;
                    padding: 0;
                }

                .cta-desc{
                    padding: 0;
                }

                .cta-desc p:last-child{
                    margin-bottom: 0;
                }

            .cta-button{
                padding-top: 10px;
                padding-bottom: 10px;
            }

@media (max-width: 991px){
    .bs-calltoaction > .row{
        display:block;
        width: auto;
    }

        .bs-calltoaction > .row > [class^="col-"],
        .bs-calltoaction > .row > [class*=" col-"]{
            float:none;
            display:block;
            vertical-align:middle;
            position: relative;
        }

        .cta-contents{
            text-align: center;
        }
}



.bs-calltoaction.bs-calltoaction-default{
    color: #333;
    background-color: #fff;
    border-color: #ccc;
}

.bs-calltoaction.bs-calltoaction-primary{
    color: #fff;
    background-color: #337ab7;
    border-color: #2e6da4;
}

.bs-calltoaction.bs-calltoaction-info{
    color: #fff;
    background-color: #5bc0de;
    border-color: #46b8da;
}

.bs-calltoaction.bs-calltoaction-success{
    color: #fff;
    background-color: #5cb85c;
    border-color: #4cae4c;
}

.bs-calltoaction.bs-calltoaction-warning{
    color: #fff;
    background-color: #f0ad4e;
    border-color: #eea236;
}

.bs-calltoaction.bs-calltoaction-danger{
    color: #fff;
    background-color: #d9534f;
    border-color: #d43f3a;
}

.bs-calltoaction.bs-calltoaction-primary .cta-button .btn,
.bs-calltoaction.bs-calltoaction-info .cta-button .btn,
.bs-calltoaction.bs-calltoaction-success .cta-button .btn,
.bs-calltoaction.bs-calltoaction-warning .cta-button .btn,
.bs-calltoaction.bs-calltoaction-danger .cta-button .btn{
    border-color:#fff;
}
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
					<li><a href="admin.php"><i class='glyphicon glyphicon-th-list'></i> Booking Hari ini</a></li>
					<li class="active"><a href="report.php"><i class='glyphicon glyphicon-list-alt'></i> History</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="adminlogin.php"><i class='glyphicon glyphicon-off'></i> Logout</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>

	<div class="container" style="margin-top:70px">
		<div class="col-sm-12">

			<div class="bs-calltoaction bs-calltoaction-default">
				<div class="row">
					<div class="col-md-9 cta-contents">
						<h1 class="cta-title">Its a Call To Action</h1>
						<div class="cta-desc">
							<p>Describe the action here.</p>
							<p>Describe the action here.</p>
							<p>Describe the action here.</p>
						</div>
					</div>
					<div class="col-md-3 cta-button">
						<a href="#" class="btn btn-lg btn-block btn-default">Go for It!</a>
					</div>
				</div>
			</div>

			<div class="bs-calltoaction bs-calltoaction-primary">
				<div class="row">
					<div class="col-md-9 cta-contents">
						<h1 class="cta-title">Its a Call To Action</h1>
						<div class="cta-desc">
							<p>Describe the action here.</p>
							<p>Describe the action here.</p>
							<p>Describe the action here.</p>
						</div>
					</div>
					<div class="col-md-3 cta-button">
						<a href="#" class="btn btn-lg btn-block btn-primary">Go for It!</a>
					</div>
				</div>
			</div>

			<div class="bs-calltoaction bs-calltoaction-info">
				<div class="row">
					<div class="col-md-9 cta-contents">
						<h1 class="cta-title">Its a Call To Action</h1>
						<div class="cta-desc">
							<p>Describe the action here.</p>
							<p>Describe the action here.</p>
							<p>Describe the action here.</p>
						</div>
					</div>
					<div class="col-md-3 cta-button">
						<a href="#" class="btn btn-lg btn-block btn-info">Go for It!</a>
					</div>
				</div>
			</div>

			<div class="bs-calltoaction bs-calltoaction-success">
				<div class="row">
					<div class="col-md-9 cta-contents">
						<h1 class="cta-title">Its a Call To Action</h1>
						<div class="cta-desc">
							<p>Describe the action here.</p>
							<p>Describe the action here.</p>
							<p>Describe the action here.</p>
						</div>
					</div>
					<div class="col-md-3 cta-button">
						<a href="#" class="btn btn-lg btn-block btn-success">Go for It!</a>
					</div>
				</div>
			</div>

			<div class="bs-calltoaction bs-calltoaction-warning">
				<div class="row">
					<div class="col-md-9 cta-contents">
						<h1 class="cta-title">Its a Call To Action</h1>
						<div class="cta-desc">
							<p>Describe the action here.</p>
							<p>Describe the action here.</p>
							<p>Describe the action here.</p>
						</div>
					</div>
					<div class="col-md-3 cta-button">
						<a href="#" class="btn btn-lg btn-block btn-warning">Go for It!</a>
					</div>
				</div>
			</div>

			<div class="bs-calltoaction bs-calltoaction-danger">
				<div class="row">
					<div class="col-md-9 cta-contents">
						<h1 class="cta-title">Its a Call To Action</h1>
						<div class="cta-desc">
							<p>Describe the action here.</p>
							<p>Describe the action here.</p>
							<p>Describe the action here.</p>
						</div>
					</div>
					<div class="col-md-3 cta-button">
						<a href="#" class="btn btn-lg btn-block btn-danger">Go for It!</a>
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
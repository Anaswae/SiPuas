<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="SiPuas | Sistem Kuisioner Kepuasaan Masyrakat">
<meta name="author" content="Saptanto Sindu K U">
<!-- <link rel="icon" href="../../favicon.ico">  -->

<title><?php if (isset($pageTitle)) echo $pageTitle; else echo "Untitled"; ?></title>

<!-- Bootstrap core CSS -->
<link href="<?php echo base_url("/assets/css/bootstrap.css");?>" rel="stylesheet">

<!-- Bootstrap core CSS -->
<link href="<?php echo base_url("/assets/css/style.css");?>" rel="stylesheet">

<!-- Style for DataTables -->
<link href="<?php echo base_url("/assets/css/dataTables.bootstrap.css");?>" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<script type='text/javascript'
	src="<?php echo base_url('/assets/js/jquery.min.js'); ?>"></script>
	
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed"
				data-toggle="collapse" data-target="#navbar" aria-expanded="false"
				aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo site_url();?>">SIMIKM</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo site_url("autentikasi/logout")?>">Keluar</a></li>
			</ul>
		</div>
	</div>
</nav>
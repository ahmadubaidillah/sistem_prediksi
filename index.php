<?php
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="icon" href="favicon.ico" />

	<title>Source Code Forecasting DES</title>
	<link href="assets/css/lumen-bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/general.css" rel="stylesheet" />
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<script src="assets/js/highcharts.js"></script>
	<script src="assets/js/modules/exporting.js"></script>
	<script src="assets/js/modules/export-data.js"></script>
	<script src="assets/js/modules/accessibility.js"></script>
</head>

<body>
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="?">DES Holt</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="?m=home"><span class="glyphicon glyphicon-th-large"></span> Home</a></li>
					<li><a href="?m=data"><span class="glyphicon glyphicon-calendar"></span> Data</a></li>
					<li><a href="?m=des"><span class="glyphicon glyphicon-stats"></span> DES</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		<?php
		if (file_exists($mod . '.php'))
			include $mod . '.php';
		else
			include 'home.php';
		?>
	</div>
	<footer class="footer bg-primary">
		<div class="container">
			<p>Copyright &copy; <?= date('Y') ?> RumahSourceCode.Com <em class="pull-right">Updated 04 Agustus 2022</em></p>
		</div>
	</footer>
	<script type="text/javascript">
		$('.form-control').attr('autocomplete', 'off');
	</script>
</body>

</html>
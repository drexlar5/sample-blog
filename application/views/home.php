<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<title><?php echo $title ?></title>
</head>
<body>
	<div>
	<h2><?php echo $page_header ?></h2>
		<?php 
		foreach ($ver as $key) {
			# code...
			echo $key->name . " " . $key->age . "<br/>";
		} ?>

	</div>
	<p class="footer">Page rendered in <strong> {elapsed_time}</strong> seconds</p>
</body>
</html>
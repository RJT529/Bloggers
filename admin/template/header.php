<?php   
#######
#ADMIN#
#######
?>

<?php
#Start the session:
session_start();
if(!isset($_SESSION['username'])) {
	header('Location: login.php');
}
?>

<?php include('config/setup.php');?>

<!DOCTYPE html>
<html>

<head>
	<meta charset = "utf-8">
	<meta http-equiv="refresh" content="1000">
	<title><?php echo $site_title; ?></title> 

	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<?php include('config/css.php');?>
	<?php include('config/js.php');?>
</head>

<body>

	<?php include(D_TEMPLATE.'/navigation.php');?>
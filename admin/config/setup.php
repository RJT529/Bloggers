<?php
//Setup FIle:

#Database connection:
include('../config/connection.php');

#Constants:
DEFINE('D_TEMPLATE','template');

#Functions:
include('functions/data.php');
include('functions/template.php');
include('functions/sandbox.php');


#Site Setup:
$debug = data_setting_value($dbc,'debug-status');

$site_title = 'Dynamic Website!';

if(isset($_GET['page'])) {
	$page = $_GET['page'];	//Set $pageid to equal the value given in the URL
} else {
	$page = 'dashboard';	//Set $pageid equal to 1 or the Home Page
}

#Page Setup
include('config/queries.php');



#User Setup
$users = data_user($dbc,$_SESSION['username']);


?>
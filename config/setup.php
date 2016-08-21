<?php
//Setup FIle:

#Database connection:
include('config/connection.php');
 
#Constants:
DEFINE('D_TEMPLATE','template');

#Functions:
include('functions/data.php');
include('functions/template.php');
include('functions/sandbox.php');


#Site Setup:
$debug = data_setting_value($dbc,'debug-status');

$path = get_path();

$site_title = 'Dynamic Website!';

if(isset($_GET['page'])) {
	$pageid= $_GET['page'];
} else {
	$pageid = 'home';
}

 

#Page Setup
$page = data_page($dbc, $pageid);



?>
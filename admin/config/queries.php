<?php

	switch($page) {

		case 'dashboard':

		break;

		case 'pages':

			if($_POST['submitted'] == 1) {

				$title = mysqli_real_escape_string($dbc,$_POST['title']);
				$label = mysqli_real_escape_string($dbc,$_POST['label']);
				$header = mysqli_real_escape_string($dbc,$_POST['header']);
				$body= mysqli_real_escape_string($dbc,$_POST['body']);

				if(isset($_POST['id']) && $_POST['id'] != 0) {
					$action = 'updated';
					$q = "UPDATE pages SET user = $_POST[user], slug = '$_POST[slug]' , title = '$title', label = '$label', header = '$header', body = '$body' WHERE id = '$_POST[id]'"; 
				} else {
					$action = 'added';
					$q = "INSERT INTO pages (user, slug, title, label, header, body) VALUES ('".$_POST[user]."','".$_POST[slug] ."', '".$title."','".$label."','".$header."','".$body."')";
				}

				$r = mysqli_query($dbc,$q);	

				if($r) {
					$message = '<p>Page was '.$action.'!</p>';
				} else {
					$message = '<p>Page could not be '.$action.'!</p>';
				}

			}

			if (isset($_GET['id']) && $_GET['id'] != 0) {
				$opened = data_page($dbc, $_GET['id']);
			} else {
				$opened = 0;
			}


		break;

		case 'users':

			if(isset($_POST['submitted'])) {
				if($_POST['submitted'] == 1) {

					$first = mysqli_real_escape_string($dbc,$_POST['first']);
					$last = mysqli_real_escape_string($dbc,$_POST['last']);

					if($_POST['password'] != '') {
						$password = "password = sha1('$_POST[password]')";
					}

					if(isset($_POST['id']) && $_POST['id'] != 0) {
						$action = 'updated';
						$q = "UPDATE users SET first = '$first', last = '$last', ".$password." status = ".$_POST['status']." WHERE id = ".$_GET['id'].""; 
						//
					} else {
						$action = 'added';
						$q = "INSERT INTO users (first, last, password, status) VALUES ('".$first."','".$last."', '".sha1('$_POST[password]')."','".$_POST['status']."')";
					}

					$r = mysqli_query($dbc,$q);	

					if($r) {
						$message = '<p>User was '.$action.'!</p>';
					} else {
						$message = '<p>User could not be '.$action.'!<br>'.mysqli_error($dbc).'</p>';
					}

				}
			}
			

			if (isset($_GET['id']) && $_GET['id'] != 0) {
				$opened = data_user($dbc, $_GET['id']);
			} else {
				$opened = 0;
			}


		break;

		case 'settings':

		break;

		default:

		break;
	}




	
?>
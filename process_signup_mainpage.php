<?php
	include_once('includes/db_connect.inc.php');
	include_once('includes/functions.inc.php');

	sec_session_start();
 	// Check if at least one field is empty then redirect
 		

         if(empty($_POST['name']) || empty($_POST['uid']) || empty($_POST['pwd']) || empty($_POST['confirmpwd']))
          {
          	header("Location: signup_page.php/?error=enter%all%fields");
          }
          else if(($_POST['pwd'] != $_POST['confirmpwd']) || !filter_var($_POST['uid'], FILTER_VALIDATE_EMAIL)){

          	header("Location: signup_page.php/?error=input%invalid");
          }
          else if(($_POST['name'] != strip_tags($_POST['name'])) || ($_POST['confirmpwd'] != strip_tags($_POST['confirmpwd'])) || ($_POST['uid'] != strip_tags($_POST['uid']))) {

			header("Location: signup_page.php/?error=input%with%invalid%chars");
          }
          else{

          	if(isset($_POST['uid'], $_POST['name'], $_POST['confirmpwd'])){
          		$uid = $_POST['uid'];
		        $pwd = $_POST['confirmpwd'];
		        $name = $_POST['name'];
          		if(signup($uid, $pwd, $name, $mysqli) == true){

			        if (login($uid, $pwd, $mysqli) == true) {

			            $_SESSION['loggedIn'] = true;
			            header('Location: setupUser.php');
			        }
          		}
          		else{
          			header('Location: signup_page.php?error=registered%user');
          		}
          	}

          }
?>
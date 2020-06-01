<?php 
include_once('db_connect.inc.php');
include_once('functions.inc.php');

sec_session_start();

if (isset($_POST['uid'], $_POST['pwd'])) {
    $email = $_POST['uid'];
    $password = $_POST['pwd']; 
    
    if (login($email, $password, $mysqli) == true) {
            // Login success 
        $_SESSION['loggedIn'] = true;
        header('Location: ../guccipanel.php');
    } else {
            // Login failed 
        $_SESSION['loggedIn'] = false;
        header('Location: ../reloginpage.php?error');
    }
} else {
    	    // The correct POST variables were not sent to this page. 
   echo 'Invalid Request';
}
?>
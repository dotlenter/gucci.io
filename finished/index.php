<!DOCTYPE HTML>

<?php

    session_start();

    $username = "user";
    $password = "password";

    $error = "";

    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
        $error = "success";
        header('Location: success.php');
    } 
        
    if (isset($_POST['username']) && isset($_POST['password'])) {
        if ($_POST['username'] == $username && $_POST['password'] == $password) {
            $_SESSION['loggedIn'] = true;
            header('Location: success.php');
        } else {
            $_SESSION['loggedIn'] = false;
            $error = "Invalid username and password!";
        }
    }
?>

<html>
    <head>
        <title>Login Page</title>
    </head>
    
    <body>
        <?php echo $error; ?>
        
        <form method="post" action="index.php">
            <label for="username">Username:</label><br/>
            <input type="text" name="username" id="username"><br/>
            <label for="password">Password:</label><br/>
            <input type="password" name="password" id="password"><br/>
            <input type="submit" value="Log In!">
        </form>
    </body>
</html>
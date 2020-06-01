<?php
    ob_start();
    session_start();

    if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
        header("Location: index.php");
    }
?>

<h1>Logged In!</h1>
<form method="post" action="logout.php">
    <input type="submit" value="Logout">
</form>
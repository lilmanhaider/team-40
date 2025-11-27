<?php
    session_start();
    unset($_SESSION["username"]);
    session_destroy();


?>

<h2> Logged out now! </h2>
    <p> Would you like to log in again? <a href="login.php"> Log in </a> </p>
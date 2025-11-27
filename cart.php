<?php
session_start();

if (!isset($_SESSION["uid"])) {
    header("Location: login.php?error=please_login_to_access_cart");
    exit();
}
?>

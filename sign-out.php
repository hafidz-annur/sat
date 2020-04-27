<?php
session_start();
unset($_SESSION['mail']);
unset($_SESSION['password']);
session_destroy();
header("Location:index.php");
?>
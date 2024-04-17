<?php
session_start();
unset($_SESSION['Unames']);
session_destroy();
header('Location:index.php');
?>
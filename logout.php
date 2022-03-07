<?php
require_once('config.php');
unset($_SESSION['key']);
session_destroy();
session_unset();
header('Location:index.php');
?>
<?php
include ('config.php');
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
    }else{
        header('location: dashboard.php');
    }
?>
<?php 
include('../../config.php');

	// defined below to escape form values

date_default_timezone_set('Asia/Manila');
$curtmtmp   = date('Y-m-d H:i:s');

$user_id     =  $_GET['id'];
$status      =  'Approved';


$query = "UPDATE users SET `status` = '$status',
                            `updated_at` = '$curtmtmp'
                      WHERE id = '$user_id'";

if(mysqli_multi_query($db, $query)) {
    $_SESSION['success']  = "Record Updated!";
    echo '<script>alert("User Approved!");</script>';
    header('location: ../../pending.php');    
}

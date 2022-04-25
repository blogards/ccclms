<?php 
if ( ! defined( 'ROOT_PATH' ) ) {
    define( 'ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . '/CCCLMS/' );
}
include_once(ROOT_PATH . 'config.php');

$category = 'Government Publications';
$status = 'For Pickup';
date_default_timezone_set('Asia/Manila');
$curtmtmp   = date('Y-m-d H:i:s');

if (isset($_POST['proceed_borrow'])) {
    borrow();
}
function borrow() {
    global $db, $errors, $username, $email, $curdate, $curtmtmp, $category, $status;

    $borrower       =   $_POST['borrower'];
    $resources      =   $_POST['resources'];

    $sql = "INSERT INTO `transaction`(`borrower_id`, `resources_id`, `reservation_date`, `status`) 
            VALUES ('$borrower', '$resources', '$curtmtmp', '$status')";

    $results = mysqli_query($db, $sql);
    if ($results) {
        $query = "UPDATE `library-resources` SET `status`='$status', updated_at='$curtmtmp' WHERE barcode = '$resources' ";
        $result = mysqli_query($db, $query);
        if ($result) {
        echo "<script type=\"text/javascript\">
            alert(\"CSV File has been successfully Imported.\");
            window.location = \"../../available-books.php\"
            </script>";
        }
    
    }
}
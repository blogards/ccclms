<?php
if ( ! defined( 'ROOT_PATH' ) ) {
    define( 'ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . '/CCCLMS/' );
}
include_once(ROOT_PATH . 'config.php');

if(isset($_POST['btn_release'])) {
    release();
}
function release() {
    global $db,$curtmtmp;
    $expect_date = date("Y-m-d H:i:s", strtotime('+3 days'));
    $status = "Borrowed";
    $id     = $_POST['barcode'];

    $sql = "UPDATE `transaction` set `status`='$status', `pickup_date`='$curtmtmp', `due_date`='$expect_date'
            WHERE `resources_id`='$id'";
    $result = mysqli_query($db, $sql);
    if ($result) {
        echo "<script type=\"text/javascript\">
                alert(\"CSV File has been successfully Imported.\");
                window.location = \"../../books.php\"
                </script>";
    }

    
}
<?php 
if ( ! defined( 'ROOT_PATH' ) ) {
    define( 'ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . '/CCCLMS/' );
}
include_once(ROOT_PATH . 'config.php');

date_default_timezone_set('Asia/Manila');
$curtmtmp   = date('Y-m-d H:i:s');

if (isset($_POST['editPublicationBtn'])) {
	editPublication();
}

function editPublication() {
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email, $curdate, $curtmtmp, $category, $status;
    $id              =  $_POST['id'];
	$title           =  $_POST['title'];
    $volume          =  $_POST['volume'];
	$copy            =  $_POST['copy'];
	$date            =  $_POST['date_received'];
	$issn            =  $_POST['issn'];
	$subject         =  $_POST['subject'];

    


    $query = "UPDATE `library-resources` SET updated_at='$curtmtmp' WHERE id = '$id'";
    $result = mysqli_query($db, $query);

    if($result) {
        $sql = "SELECT barcode FROM `library-resources` where id = '$id'";
        $results = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($results);
        $bar_code = $row['barcode'];
        if($results) {
            $sqlquery = "UPDATE `publications` SET 
                    title           =   '$title',
                    volume          =   '$volume',
                    copy            =   '$copy',
                    date            =   '$date',
                    issn            =   '$issn',
                    subject         =   '$subject',
                    updated_at      =   '$curtmtmp' 
                    WHERE barcode   =   '$bar_code'";

            $sqlresult = mysqli_query($db, $sqlquery);
            $_SESSION['success']  = "New book updated successfully!!";
            header('location: ../../gov-publication.php');
        } else {
            echo "error";
            echo mysqli_error($db); 
        }
    } else {
        echo "error";
        echo mysqli_error($db); 
    }     
}
?>
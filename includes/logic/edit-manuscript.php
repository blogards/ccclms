<?php 
if ( ! defined( 'ROOT_PATH' ) ) {
    define( 'ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . '/CCCLMS/' );
}
include_once(ROOT_PATH . 'config.php');

date_default_timezone_set('Asia/Manila');
$curtmtmp   = date('Y-m-d H:i:s');

if (isset($_POST['editManuscriptBtn'])) {
	editManuscript();
}

function editManuscript() {
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email, $curdate, $curtmtmp, $category, $status;
    $id             =  $_POST['id'];
	$title          =  $_POST['title'];
	$author         =  $_POST['author'];
	$course         =  $_POST['course'];
	$year           =  $_POST['year'];



    $query = "UPDATE `library-resources` SET updated_at='$curtmtmp' WHERE id = '$id'";
    $result = mysqli_query($db, $query);

        if($result){
            $sqlquery = "SELECT barcode FROM `library-resources` WHERE id = '$id'";
            $results = mysqli_query($db, $sqlquery);
            $row = mysqli_fetch_array($results);
            $bar_code = $row['barcode'];
            if($results) {
                $sql = "UPDATE `manuscript` SET 
                    title           =   '$title',
                    author          =   '$author',
                    course          =   '$course',
                    `year`          =   '$year',
                    updated_at      =   '$curtmtmp' 
                    WHERE barcode   =   '$bar_code'";

            $sqlresult = mysqli_query($db, $sql);
            $_SESSION['success']  = "New record updated successfully!!";
            header('location: ../../manuscript.php');
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
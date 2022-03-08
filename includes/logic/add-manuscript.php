<?php 
if ( ! defined( 'ROOT_PATH' ) ) {
    define( 'ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . '/CCCLMS/' );
}
include_once(ROOT_PATH . 'config.php');

$category = 'Manuscript/Narrative';
$status = 'Available';
date_default_timezone_set('Asia/Manila');
$curtmtmp   = date('Y-m-d H:i:s');

if (isset($_POST['addManuscriptBtn'])) {
	addManuscript();
}

function addManuscript() {
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email, $curdate, $curtmtmp, $category, $status;

	$title          =  $_POST['title'];
	$author         =  $_POST['author'];
	$course         =  $_POST['course'];
	$year           =  $_POST['year'];

        $sqlquery = "SELECT * FROM `manuscript`";
        $results = mysqli_query($db, $sqlquery);
        $row = mysqli_num_rows($results);
        $total = $row + 1;
        $barcode = "MNS-" . $total;
        if($results){
                $query = "INSERT INTO `library-resources` (barcode, title, category, status) 
                        VALUES('$barcode', '$title', '$category', '$status');";
                $query .= "INSERT INTO `manuscript` (`barcode`, `author`, `course`, `year`) 
                        VALUES ('$barcode', '$author', '$course', '$year')";
                $result = mysqli_multi_query($db, $query);
                
                if($result){
                        $_SESSION['success']  = "New data successfully created!!";
                        header('location: ../../manuscript.php');
                } else {
                        $barcode++;
                        $query = "INSERT INTO `library-resources` (barcode, title, category, status) 
                                VALUES('$barcode', '$title', '$category', '$status');";
                        $query .= "INSERT INTO `manuscript` (`barcode`, `author`, `course`, `year`) 
                                VALUES ('$barcode', '$author', '$course', '$year')";
                        $result = mysqli_multi_query($db, $query);
                        $_SESSION['success']  = "New data successfully created!!";
                        header('location: ../../manuscript.php');
                }
        } else {
                echo mysqli_error($db);
        }
}
?>
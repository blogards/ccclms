<?php 
if ( ! defined( 'ROOT_PATH' ) ) {
    define( 'ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . '/CCCLMS/' );
}
include_once(ROOT_PATH . 'config.php');

$category = 'Thesis/Dissertation';
$status = 'Available';
date_default_timezone_set('Asia/Manila');
$curtmtmp   = date('Y-m-d H:i:s');

if (isset($_POST['addThesisBtn'])) {
	addThesis();
}

function addThesis() {
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email, $curdate, $curtmtmp, $category, $status;

	$title          =  $_POST['title'];
	$author         =  $_POST['author'];
	$year           =  $_POST['year'];


    

        $sqlquery = "SELECT * FROM `thesis`";
        $results = mysqli_query($db, $sqlquery);
        $row = mysqli_num_rows($results);
        $total = $row + 1;
        $barcode = "THS-" . $total;
        if($results){
                $query = "INSERT INTO `library-resources` (barcode, title, category, status) 
                        VALUES('$barcode', '$title', '$category', '$status')";
                $result = mysqli_query($db, $query);

                        if($result){
                                $sql = "INSERT INTO `thesis` (`barcode`, `author`, `year`) 
                                        VALUES ('$barcode', '$author', '$year')";
                                $allresult = mysqli_query($db, $sql);
                                $_SESSION['success']  = "New data successfully created!!";
                                header('location: ../../thesis.php');
                        } else {
                
                }
        } else {
                echo "error";
                echo mysqli_error($db);
        }
}
?>
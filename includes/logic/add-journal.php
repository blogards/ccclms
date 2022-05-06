<?php 
if ( ! defined( 'ROOT_PATH' ) ) {
    define( 'ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . '/CCCLMS/' );
}
include_once(ROOT_PATH . 'config.php');

$category = 'Journals';
$status = 'Available';
date_default_timezone_set('Asia/Manila');
$curtmtmp   = date('Y-m-d H:i:s');

if (isset($_POST['addJournalBtn'])) {
	addJournal();
}

function addJournal() {
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email, $curdate, $curtmtmp, $category, $status;
    
	$title          =  $_POST['title'];
	$volume         =  $_POST['volume'];
	$copy           =  $_POST['copy'];
    $date_received  =  $_POST['date_received'];
	$issn           =  $_POST['issn'];
    $subject        =  $_POST['subject'];

    

        $sqlquery = "SELECT * FROM `journals`";
        $results = mysqli_query($db, $sqlquery);
        $row = mysqli_num_rows($results);
        $total = $row + 1;
        $barcode = "JRNL-" . $total;
        if($results){
                $query = "INSERT INTO `library-resources` (barcode, title, category, status) 
                VALUES('$barcode', '$title', '$category', '$status');";
                $query .= "INSERT INTO `journals` (`barcode`, title, `volume`, `copy`, `date`, `issn`, `subject`) 
                VALUES ('$barcode', $title, '$volume', '$copy', '$date_received', '$issn', '$subject')";
                $allresult = mysqli_multi_query($db, $query);
                if($allresult) {
                    $_SESSION['success']  = "New data successfully created!!";
                    header('location: ../../journals.php');
                }else{
                    $barcode++;
                    $query = "INSERT INTO `library-resources` (barcode, title, category, status) 
                    VALUES('$barcode', '$title', '$category', '$status');";
                    $query .= "INSERT INTO `journals` (`barcode`, title, `volume`, `copy`, `date`, `issn`, `subject`) 
                    VALUES ('$barcode', $title, '$volume', '$copy', '$date_received', '$issn', '$subject')";
                    $allresult = mysqli_multi_query($db, $query);
                    $_SESSION['success']  = "New data successfully created!!";
                    header('location: ../../journals.php');
                    }
                
        } else {
            echo mysqli_error($db);
        }

}
?>
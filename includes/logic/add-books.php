<?php 
if ( ! defined( 'ROOT_PATH' ) ) {
    define( 'ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . '/CCCLMS/' );
}
include_once(ROOT_PATH . 'config.php');

$category = 'Books';
$status = 'Available';
date_default_timezone_set('Asia/Manila');
$curtmtmp   = date('Y-m-d H:i:s');

if (isset($_POST['add_books_btn'])) {
	add_books();
}

function add_books() {
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email, $curdate, $curtmtmp, $category, $status;
    
	$title          =  $_POST['title'];
	$edition        =  $_POST['edition'];
	$volume         =  $_POST['volume'];
	$author         =  $_POST['author'];
	$publisher      =  $_POST['publisher'];
	$class          =  $_POST['class'];
	$pages          =  $_POST['pages'];
	$date_received  =  $_POST['date_received'];
    $year           =  $_POST['year'];
    $cash_price     =  $_POST['cash_price'];
    $sof            =  $_POST['sof'];
    $remarks        =  $_POST['remarks'];
    

    $sqlquery = "SELECT * FROM `books`";
        $results = mysqli_query($db, $sqlquery);
        $row = mysqli_num_rows($results);
        $total = $row + 1;
        $barcode = "BKS-" . $total;
        if($results){
            $query = "INSERT INTO `library-resources` (barcode, title, category, status) 
                    VALUES('$barcode', '$title', '$category', '$status');";
            $query .= "INSERT INTO books (barcode, title, edition, volume, author, publisher, class, pages, remarks, date_received, `year`, cash_price, sof) 
                    VALUES ('$barcode', '$title', '$edition', '$volume', '$author', '$publisher', '$class', '$pages', '$remarks', '$date_received', '$year', '$cash_price', '$sof')";
            $result = mysqli_multi_query($db, $query);

            if($result){
                $_SESSION['success']  = "New data successfully created!!";
                header('location: ../../books.php');
            } else {
                $barcode++;
                $query = "INSERT INTO `library-resources` (barcode, title, category, status) 
                        VALUES('$barcode', '$title', '$category', '$status');";
                $query .= "INSERT INTO books (barcode, title, edition, volume, author, publisher, class, pages, remarks, date_received, `year`, cash_price, sof, created_at, updated_at) 
                        VALUES ('$barcode', '$title', '$edition', '$volume', '$author', '$publisher', '$class', '$pages', '$remarks', '$date_received', '$year', '$cash_price', '$sof', '$curtmtmp', '$curtmtmp')";
                $result = mysqli_multi_query($db, $query);
                $_SESSION['success']  = "New data successfully created!!";
                header('location: ../../books.php');
            }

        } else {
            echo mysqli_error($db);
        }
    
}
?>
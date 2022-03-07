<?php 
if ( ! defined( 'ROOT_PATH' ) ) {
    define( 'ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . '/CCCLMS/' );
}
include_once(ROOT_PATH . 'config.php');

$category = 'Books';
$status = 'Available';
date_default_timezone_set('Asia/Manila');
$curtmtmp   = date('Y-m-d H:i:s');

if (isset($_POST['edit_books_btn'])) {
	edit_books();
}

function edit_books() {
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email, $curdate, $curtmtmp, $category, $status;
    $id             =  $_POST['id'];
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
    


    $query = "UPDATE `library-resources` SET updated_at='$curtmtmp' WHERE id = '$id'";
    $results = mysqli_query($db, $query);

    if($results) {
        $sql = "SELECT barcode FROM `library-resources` where id = '$id'";
        $results = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($results);
        $bar_code = $row['barcode'];
        if($results) {
            $sql = "UPDATE `books` SET 
                    title           =   '$title',
                    edition         =   '$edition',
                    volume          =   '$volume',
                    author          =   '$author',
                    publisher       =   '$publisher',
                    class           =   '$class',
                    pages           =   '$pages',
                    remarks         =   '$remarks',
                    date_received   =   '$date_received',
                    `year`          =   '$year',
                    cash_price      =   '$cash_price',
                    sof             =   '$sof',
                    updated_at      =   '$curtmtmp' 
                    WHERE barcode   =   '$bar_code'";

            $sqlresult = mysqli_query($db, $sql);
            $_SESSION['success']  = "New book updated successfully!!";
            header('location: ../../books.php');
        }else{
            echo "error";
            echo mysqli_error($db);
        }

    } else {
        echo "error";
        echo mysqli_error($db);
    }
}
?>
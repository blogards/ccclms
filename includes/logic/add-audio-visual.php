<?php 
if ( ! defined( 'ROOT_PATH' ) ) {
    define( 'ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . '/CCCLMS/' );
}
include_once(ROOT_PATH . 'config.php');

$category = 'Audio Visual Material';
$status = 'Available';
date_default_timezone_set('Asia/Manila');
$curtmtmp   = date('Y-m-d H:i:s');

if (isset($_POST['add_audio-visual_btn'])) {
	add_audio_visual();
}

function add_audio_visual() {
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email, $curdate, $curtmtmp, $category, $status;
    
	$title          =  $_POST['title'];
	$grade_level    =  $_POST['grade_level'];
	$subject        =  $_POST['subject'];
	$duration       =  $_POST['duration'];
	$copyright      =  $_POST['copyright'];
	$date_received  =  $_POST['date_received'];

    

        $sqlquery = "SELECT * FROM `audio-visual`";
        $results = mysqli_query($db, $sqlquery);
        $row = mysqli_num_rows($results);
        $total = $row + 1;
        $barcode = "AVM-" . $total;
        if($results){
                $query = "INSERT INTO `library-resources` (barcode, category, status) 
                VALUES('$barcode', '$category', '$status');";
                $query .= "INSERT INTO `audio-visual` (`barcode`, `title`, `grade_level`, `subject`, `duration`, `copyright`, `date_received`) 
                VALUES ('$barcode', '$title', '$grade_level', '$subject', '$duration', '$copyright', '$date_received')";
                $result = mysqli_multi_query($db, $query);

                if($result){
                        $_SESSION['success']  = "New data successfully created!!";
                        header('location: ../../audio-visual.php');
                } else {
                        $barcode++;
                        $query = "INSERT INTO `library-resources` (barcode, category, status) 
                        VALUES('$barcode', '$category', '$status');";
                        $query .= "INSERT INTO `audio-visual` (`barcode`, `title`, `grade_level`, `subject`, `duration`, `copyright`, `date_received`) 
                        VALUES ('$barcode', '$title', '$grade_level', '$subject', '$duration', '$copyright', '$date_received')";
                        $result = mysqli_multi_query($db, $query);
                        $_SESSION['success']  = "New data successfully created!!";
                        header('location: ../../audio-visual.php');
                }
        } else {
                echo "error";
                    echo mysqli_error($db);
        }

}
?>
<?php 
if ( ! defined( 'ROOT_PATH' ) ) {
    define( 'ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . '/CCCLMS/' );
}
include_once(ROOT_PATH . 'config.php');

date_default_timezone_set('Asia/Manila');
$curtmtmp   = date('Y-m-d H:i:s');

if (isset($_POST['editAudioVisualBtn'])) {
	editAudioVisual();
}

function editAudioVisual() {
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email, $curdate, $curtmtmp, $category, $status;
    $id              =  $_POST['id'];
	$title           =  $_POST['title'];
	$grade_level     =  $_POST['grade_level'];
	$subject         =  $_POST['subject'];
	$duration        =  $_POST['duration'];
	$copyright       =  $_POST['copyright'];
	$date_received   =  $_POST['date_received'];
    


    $query = "UPDATE `library-resources` SET 
            title      = '$title',
            updated_at = '$curtmtmp'
            WHERE id   = '$id'";
    $result = mysqli_query($db, $query);

    if($result) {
        $sql = "SELECT barcode FROM `library-resources` where id = '$id'";
        $results = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($results);
        $bar_code = $row['barcode'];
        if($results) {
            $sqlquery = "UPDATE `audio-visual` SET 
                    grade_level     =   '$grade_level',
                    subject         =   '$subject',
                    duration        =   '$duration',
                    copyright       =   '$copyright',
                    date_received   =   '$date_received',
                    updated_at      =   '$curtmtmp' 
                    WHERE barcode   =   '$bar_code'";

            $sqlresult = mysqli_query($db, $sqlquery);
            $_SESSION['success']  = "New book updated successfully!!";
            header('location: ../../audio-visual.php');
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
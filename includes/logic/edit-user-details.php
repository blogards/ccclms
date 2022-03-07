<?php
    /** Absolute path to the WordPress directory. */
    if ( ! defined( 'ROOT_PATH' ) ) {
        define( 'ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . '/CCCLMS/' );
    }
    include_once(ROOT_PATH . 'config.php');

    $user_id = $_GET['id'];
    $sql = "SELECT DISTINCT USERS.id, first_name, 
                            middle_name, last_name, 
                            email, contact, 
                            user_type, street, 
                            barangay, city,
                            province, postal_code, 
                            status, year_level, 
                            course, profile_img 
            FROM USERS, BORROWERS 
            WHERE borrowers.id = users.id and borrowers.id = '".$_GET['id']."'";
    $result = mysqli_query($db, $sql);

    if (mysqli_affected_rows($db) == 1) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    
            $firstname    = $row['first_name'];
            $middlename   = $row['middle_name'];
            $lastname     = $row['last_name'];
            $email        = $row['email'];
            $contact      = $row['contact'];
            $user_type    = $row['user_type'];
            $street       = $row['street'];
            $barangay     = $row['barangay'];
            $city         = $row['city'];
            $province     = $row['province'];
            $postal_code  = $row['postal_code'];
            $year_level   = $row['year_level'];
            $course       = $row['course'];
            $profile_pic  = $row['profile_img'];
        }
    }
    else{
         echo "<html><head><script>alert('Change Unsuccessful');</script></head></html>";
         echo mysqli_error($db);
    }

    
    
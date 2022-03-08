<?php 
include('../../config.php');

	// defined below to escape form values
	$user_id     =  $_POST['id'];
	$email       =  $_POST['email'];
	$firstname   =  $_POST['firstname'];
	$middlename  =  $_POST['middlename'];
	$lastname    =  $_POST['lastname'];
	$contact     =  $_POST['contact'];
	$street      =  $_POST['street'];
	$barangay    =  $_POST['barangay'];
	$city		 =  $_POST['city'];
	$province    =  $_POST['province'];
	$postal_code =  $_POST['postal_code'];
	$user_type   =  $_POST['user_type'];
	$course      =  $_POST['course'];
	$year_level  =  $_POST['year_level'];
	$file_name   =  $_FILES['profileimg']['name'];
	$file_size   =  $_FILES['profileimg']['size'];
	$file_tmp    =  $_FILES['profileimg']['tmp_name'];
	$file_type	 =  $_FILES['profileimg']['type'];
	$arrayvar	 =  explode('.',$_FILES['profileimg']['name']);
    $file_ext=strtolower(end($arrayvar));

	 
	 if($file_size > 2097152){
		$errors[]='File size must be excately 2 MB';
	 }

	if (empty($firstname)) { 
		array_push($errors, "First Name is missing"); 
	}
	if (empty($middlename)) { 
		array_push($errors, "Middle Name is missing"); 
	}
	if (empty($lastname)) { 
		array_push($errors, "Last Name is missing"); 
	}
	if (empty($contact)) { 
		array_push($errors, "Contact is missing"); 
	}
	if (empty($user_type)) { 
		array_push($errors, "User Type is missing"); 
	}

	if (count($errors) == 0) {

		if (empty($file_name)) {
			$query = "UPDATE users SET user_type = '".$user_type."' 
								WHERE id = '$user_id';";

			$query .= "UPDATE borrowers SET first_name	=	'".$firstname."',
											middle_name =	'".$middlename."', 
											last_name	=	'".$lastname."', 
											contact	 	=	'".$contact."', 
											street		=	'".$street."',
											barangay	=	'".$barangay."',
											city		=	'".$city."',
											province	=	'".$province."',
											postal_code =	'".$postal_code."',
											year_level	=	'".$year_level."', 
											course		=	'".$course."' 
											WHERE id	=	'".$user_id."'";

			if(mysqli_multi_query($db, $query)) {
				move_uploaded_file($file_tmp, ABSPATH . "/img/profile/".$file_name);
				$_SESSION['success']  = "Record Updated!";
				header('location: ../../users.php');
			}else{
				echo "error".mysqli_error($db);
			}
			
		}else{
			$query = "UPDATE users SET 
								user_type = '".$user_type."', 
								profile_img =	'".$file_name."'
								WHERE id = '$user_id';";

			$query .= "UPDATE borrowers SET first_name	=	'".$firstname."',
											middle_name =	'".$middlename."', 
											last_name	=	'".$lastname."', 
											contact 	=	'".$contact."', 
											street		=	'".$street."',
											barangay	=	'".$barangay."',
											city		=	'".$city."',
											province	=	'".$province."',
											postal_code =	'".$postal_code."', 
											year_level	=	'".$year_level."', 
											course		=	'".$course."'  
											WHERE id='".$user_id."'";

			if(mysqli_multi_query($db, $query)) {
				move_uploaded_file($file_tmp, ABSPATH . "/img/profile/".$file_name);
				$_SESSION['success']  = "Record Updated!";
				header('location: ../../users.php');
			}else{
				echo "error".mysqli_error($db);
				
			}
					
		}
	}

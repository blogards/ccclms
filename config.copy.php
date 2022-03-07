<?php
session_start();
if ( ! defined( 'ROOT_PATH' ) ) {
	define( 'ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . '/CCCLMS/' );
}
// connect to database
$db = mysqli_connect('localhost', 'root', '', 'ccc_lms');

// variable declaration
$firstname  = "";
$middlename = "";
$lastname   = "";
$username   = "";
$contact    = "";
$street     = "";
$status     = "";
$email      = "";
$errors     = array(); 
date_default_timezone_set('Asia/Manila');
$curtmtmp   = date('Y-m-d H:i:s');

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}



// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	
function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
}
// LOGIN USER
function login(){
	global $db, $email, $errors;

	// grap form values
	$email = e($_POST['email']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($email)) {
		array_push($errors, "Email is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT users.id, email, user_type, first_name, middle_name, last_name, profile_pic FROM users, borrowers WHERE email='$email' AND password='$password' AND users.id = borrowers.id LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: admin/index.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: index.php');
			}
		}else {
			array_push($errors, "Wrong email/password combination");
		}
	}
}
function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}

//Delete Books Section
if (isset($_POST['deleteBooksBtn'])) {
	deleteBook();
}
function deleteBook() {
	global $db;
	$barcode = $_POST['db_barcode'];

	$sql = "DELETE FROM `library-resources` WHERE barcode = '$barcode';";
	$sql .= "DELETE FROM books where barcode = '$barcode'";

	if (mysqli_multi_query($db, $sql)) {
		header('location: books.php');
	} 
	else {
		echo "Error: " . $sql . "<br>" . mysqli_error($db);
	}
}


//Delete Audio-Visual Materials Section
if (isset($_POST['deleteAudioVisualBtn'])) {
	deleteAudioVisual();
}
function deleteAudioVisual() {
	global $db;
	$barcode = $_POST['da_barcode'];

	$sql = "DELETE FROM `library-resources` WHERE barcode = '$barcode';";
	$sql .= "DELETE FROM 'audio-visual' where barcode = '$barcode'";

	if (mysqli_multi_query($db, $sql)) {
		header('location: audio-visual.php');
	} 
	else {
		echo "Error: " . $sql . "<br>" . mysqli_error($db);
	}
}


//Delete Manuscript/Narrative Section
if (isset($_POST['deleteManuscriptBtn'])) {
	deleteManuscript();
}
function deleteManuscript() {
	global $db;
	$barcode = $_POST['dm_barcode'];

	$sql = "DELETE FROM `library-resources` WHERE barcode = '$barcode';";
	$sql .= "DELETE FROM `manuscript` where barcode = '$barcode'";

	if (mysqli_multi_query($db, $sql)) {
		header('location: manuscript.php');
	} 
	else {
		echo "Error: " . $sql . "<br>" . mysqli_error($db);
	}
}

//Delete Publication Function
if (isset($_POST['deletePublicationBtn'])) {
	deletePublication();
}
function deletePublication() {
	global $db;
	$barcode = $_POST['dp_barcode'];

	$sql = "DELETE FROM `library-resources` WHERE barcode = '$barcode';";
	$sql .= "DELETE FROM `publications` where barcode = '$barcode'";

	if (mysqli_multi_query($db, $sql)) {
		header('location: gov-publication.php');
	} 
	else {
		echo "Error: " . $sql . "<br>" . mysqli_error($db);
	}
}

//Delete Manuscript/Narrative Section
if (isset($_POST['deleteThesisBtn'])) {
	deleteThesis();
}
function deleteThesis() {
	global $db;
	$barcode = $_POST['dm_barcode'];

	$sql = "DELETE FROM `library-resources` WHERE barcode = '$barcode';";
	$sql .= "DELETE FROM `thesis` where barcode = '$barcode'";

	if (mysqli_multi_query($db, $sql)) {
		header('location: thesis.php');
	} 
	else {
		echo "Error: " . $sql . "<br>" . mysqli_error($db);
	}
}
//Delete Journal Function
if (isset($_POST['deleteJournalBtn'])) {
	deleteJournal();
}
function deleteJournal() {
	global $db;
	$barcode = $_POST['jl_barcode'];

	$sql = "DELETE FROM `library-resources` WHERE barcode = '$barcode';";
	$sql .= "DELETE FROM `journals` where barcode = '$barcode'";

	if (mysqli_multi_query($db, $sql)) {
		header('location: journals.php');
	} 
	else {
		echo "Error: " . $sql . "<br>" . mysqli_error($db);
	}
}


// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}
// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email, $curtmtmp;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$email       =  $_POST['email'];
	$password_1  =  $_POST['password_1'];
	$password_2  =  $_POST['password_2'];
	$firstname   =  $_POST['firstname'];
	$middlename  =  $_POST['middlename'];
	$lastname    =  $_POST['lastname'];
	$contact     =  $_POST['contact'];
	$status      = "inactive";
	$profilepic  = "default.jpg";
	
	// form validation: ensure that the form is correctly filled

	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	// Check if the email is already exist
	$sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
	$result = mysqli_query($db, $sql);
	if (mysqli_num_rows($result) == 1) {
		array_push($errors, "Email is already exists");
		//echo "<script>Lobibox.notify('info', { position: 'top left', msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'});</script>";
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}
	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO users (email, password, user_type, status, created_at, updated_at) 
					  VALUES('$email', '$password', '$user_type', '$status', '$curtmtmp', '$curtmtmp')";

			$query .= "INSERT INTO borrowers (first_name, middle_name, last_name, contact, profile_pic, created_at, updated_at) 
					  VALUES('$firstname', '$middlename', '$lastname', '$contact', '$profilepic', '$curtmtmp', '$curtmtmp')";

			mysqli_multi_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: users.php');
		}else{

			$query = "INSERT INTO users (email, password, user_type, status, created_at, updated_at) 
					  VALUES('$email', '$password', 'user', '$status', '$curtmtmp', '$curtmtmp');";

			$query .= "INSERT INTO borrowers (first_name, middle_name, last_name, contact, profile_pic, created_at, updated_at) 
					  VALUES('$firstname', '$middlename', '$lastname', '$contact', '$profilepic', '$curtmtmp', '$curtmtmp')";

			mysqli_multi_query($db, $query);
				// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: index.php');
		
		}
	}
}





?>

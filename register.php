<?php  

include 'db/db.php';


// Declaring Variables for Register Form

$firstname = '';
$lastname = '';
$em = '';
$em2 = '';
$password = '';
$password2 = '';
$errors_array = '';

if (isset($_POST['regBtn'])) {

	// Cleaning Variables

	// First Name
	$firstname = $_POST['reg_fname'];
	$firstname = strip_tags($firstname);
	$firstname = str_replace(" ", "", $firstname);
	$firstname = ucfirst($firstname);

	// Check for errors in first name

	if (strlen($firstname) < 2 || strlen($firstname) > 30 || empty($firstname)) {
		echo 'First name cannot be less than 6 letters or greater than 30 letters <br>';
	}


	// Last Name
	$lastname = $_POST['reg_lname'];
	$lastname = strip_tags($lastname);
	$lastname = str_replace(" ", "", $lastname);
	$lastname = ucfirst($lastname);

	// Check for errors in first name

	if (strlen($lastname) < 2 || strlen($lastname) > 30 || empty($lastname)) {
		echo 'Last name cannot be less than 6 letters or greater than 30 letters <br>';
	}



	// Email Address
	$em = $_POST['reg_email'];
	$em = strip_tags($em);
	$em = str_replace(" ", "", $em);
	$em = ucfirst($em);

	$em2 = $_POST['reg_email2'];
	$em2 = strip_tags($em2);
	$em2 = str_replace(" ", "", $em2);
	$em2 = ucfirst($em2);

	// Ensure Email 1 & Email 2 are the same

		if (empty($em)) { // Ensure email field is not empty
			echo 'Email field cannot be blank <br>';
		}	elseif ($em === $em2) {
			if (filter_var($em, FILTER_VALIDATE_EMAIL)) {
				$em = filter_var($em, FILTER_VALIDATE_EMAIL); // Ensure Email is in a valid email format

				 // Ensure Email does not exist in database
				$sql = "SELECT * FROM users WHERE email = '$em'";
				$result = mysqli_query($conn, $sql);

				$result_row = mysqli_num_rows($result);

				if ($result_row > 0) {
					echo 'The email address is already registered <br>';
				}
			} else {
				echo 'Please provide a valid email address <br>';
			}
	} else {
			echo 'The two email fields do not match <br>';
		}

	// Password

	$password = $_POST['reg_password'];
	$password = strip_tags($password);
	$password = str_replace(" ", "", $password);
	$password = ucfirst($password);

	// Password 2

	$password2 = $_POST['reg_password2'];
	$password2 = strip_tags($password2);
	$password2 = str_replace(" ", "", $password2);
	$password2 = ucfirst($password2);
	
	// Check for errors in first name

	if (strlen($password) < 6 || empty($password)) {
		echo 'Password cannot be less than 6 letters <br>';
	} elseif (!preg_match('/[^A-Za-z0-9]/', $password)) {
			echo 'Password must contain at least 1 Capital letter, a number and a special character e.g "!, $, # e.t.c"';
		} elseif ($password !== $password2) {
		echo 'Passwords do not match. <br>';
	}
}


?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Page Title</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<row>
				<div class="col-6 mx-auto">
					<form method="post" id="regForm">
						<div id="regMsg"></div>
						<fieldset class="form-group">
							<input type="text" class="form-control" id="reg_fname" name="reg_fname" placeholder="First Name" value="<?php echo isset($_POST['reg_fname']) ? $_POST['reg_fname'] : ''; ?>">
						</fieldset>
						<fieldset class="form-group">
							<input type="text" class="form-control" id="reg_lname" name="reg_lname" placeholder="Last Name" value="<?php echo isset($_POST['reg_lname']) ? $_POST['reg_lname'] : ''; ?>">
						</fieldset>
						<fieldset class="form-group">
							<input type="email" class="form-control" id="reg_email" name="reg_email" placeholder="Enter Email" value="<?php echo isset($_POST['reg_email']) ? $_POST['reg_email'] : ''; ?>">
						</fieldset>
						<fieldset class="form-group">
							<input type="email" class="form-control" id="reg_email2" name="reg_email2" placeholder="Confirm Email Address" value="<?php echo isset($_POST['reg_email2']) ? $_POST['reg_email2'] : ''; ?>">
						</fieldset>
						<fieldset class="form-group">
							<input type="password" class="form-control" id="reg_password" name="reg_password" placeholder="Password">
						</fieldset>
						<fieldset class="form-group">
							<input type="password" class="form-control" id="reg_password2" name="reg_password2" placeholder="Confirm Password">
						</fieldset>
						<div class="text-center">
							<input type="submit" value="Register" name="regBtn" class="btn btn-primary">
						</div>
					</form>
				</div>
			</row>
		</div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
		<script type="text/javascript" src="js/app.js"></script>
	</body>
</html>
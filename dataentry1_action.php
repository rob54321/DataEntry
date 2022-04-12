<?php
	ini_set("display_errors",1);
	error_reporting(E_ALL);
	
	if(!session_id()) session_start();

	include 'db_connect.php';

	// function to trim inputs
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	// function to retain value for input fields after submit or refresh
	function retain_value($vname) {
		echo isset($_POST[$vname]) ? htmlspecialchars($_POST[$vname]) : ''; 	
	}

	// function to retain value for a select tag
	// the word selected must be echo 'ed to the option tag
	// like <option value="Dr" selected >Dr</option>
	// this option will remain on the form
	function retain_select($defvalue) {
		if (isset($_POST['title']) && $_POST['title'] == $defvalue) {
			echo 'selected';
		} else {
			echo "";
		}
	}

	// function to output heading for result box
	function output_heading($result_status) {
		// result_status can be Inserted record successfully
		//						Deleted record successfully
		//						Found record
		//						Error: some text
		// determine which message it is
		if (strpos($result_status, "Inserted") === 0) {
			echo "Inserted record:";
		} else if (strpos($result_status, "Deleted") === 0) {
			echo "Deleted record:";
		} else if (strpos($result_status, "Error:") === 0) {
			echo "Error occured";
		} else {
			echo "Status";
		}
	}

	// function to set the status colour for sql query
	// green for no sql errors
	// red for sql errors
	function set_status_colour($result_status) {
		// determine colour of status message
		// depending on wether it is an error or not
		$pos = strpos($result_status, "Error");
		if ($pos === 0) {
			// there was an error
			$colour = "#ff0000";
		} else {
			// there is no error
			$colour = "#20C040";
		}
		echo $colour;
	}

	// process the loginform
	// set empty values for strings
	$result_status = "result status";
	$login_status = "login status";
	$username = $password = "";
	$title = $first_name = $surname = "";

	if ((isset($_POST['loginform'])) and (isset($_POST['go']))) {
	// define variables and set to empty values
		if ($_SERVER["REQUEST_METHOD"] === "POST") {
			$username = test_input($_POST["username"]);
			$password = test_input($_POST["password"]);
		}

		// login to the database
		$conn = OpenCon( "localhost", $username, $password, "TestIndex");
		// check for error
		if (isset($conn->connect_error)) {
			$login_status = "error: " . $conn->connect_error;
			return $login_status;
		} else {
			$login_status = "no error";
			// no error
			// store username, password
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$conn->close();
			//redirect to dataentry1.php
			header("Location: dataentry1.php");
			exit();
		}
		// error loging in
		// the value must be displayed in a textarea on the login form
		//
	}

	// processing for data entry form
	if (isset($_POST['dataentry'])) {
		// login in for new session
		if (! isset($_SESSION['username']) or ! isset($_SESSION['password'])) {
			$result_status = "Error: User not logged in";
		} else {
			$username = $_SESSION['username'];
			$password = $_SESSION['password'];
			$conn = OpenCon("localhost", $username, $password, "TestIndex");
			if (isset($conn->error_connect)) {
				$result_status = "Error login in: $conn->error_connect";
				die ("could not login <br>");
			}
			$title = $first_name = $surname = "";
			if ($_SERVER["REQUEST_METHOD"] === "POST") {
				$title = test_input($_POST["title"]);
				$first_name = test_input($_POST["first_name"]);
				$surname = test_input($_POST["surname"]);
			}
			// check which button was clicked
			if (isset($_POST['insert'])) {
				// Insert record
				$result_status = InsertRec ($conn, "main", $title, $first_name, $surname);

			} else if (isset($_POST['delete'])) {
				//Delete record
				$result_status = DeleteRec ($conn, "main", $first_name, $surname);

			} else if (isset($_POST['search'])) {
				// call the searchrec function
				$result_status = SearchRec($conn, "main", $title, $first_name, $surname);
			} else if (isset($_POST['logout'])) {
				$conn->close();
				session_unset();
				session_destroy();
				$result_status = "Logged out";
			}
		}

		// reset button does not require user to be logged in
		if (isset($_POST['clear'])) {
			// clear all fields
			$_POST['first_name'] = '';
			$_POST['surname'] = '';
			$_POST['title'] = 'Mr';
		}
	}
?>

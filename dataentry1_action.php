<?php
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
	
	// define variables and set to empty values
	$first_name = $surname = "";
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
		$title = test_input($_POST["title"]);
		$first_name = test_input($_POST["first_name"]);
		$surname = test_input($_POST["surname"]);
	}


	// login to the database
	$conn = OpenCon("localhost", "robert", "coahtr", "TestIndex");

	// check which button was clicked
	if (isset($_POST['insert'])) {
		// Insert record
       	$result_status = InsertRec ($conn, "main", $title, $first_name, $surname);
    } else if (isset($_POST['delete'])) {
		//Delete record
        $result_status = DeleteRec ($conn, "main", $first_name, $surname);
    } else if (isset($_POST['clear'])) {
		// clear all fields
		$_POST['first_name'] = '';
		$_POST['surname'] = '';
		$_POST['title'] = '';
    } else if (isset($_POST['search'])) {
		// find a record
		// being developed
    }		

	// Close connection to database
	$conn->close();

	// function to set the status colour for sql query
	// green for no sql errors
	// red for sql errors
	function set_status_colour($result_status) {
		// determine colour of status message
		// depending on wether it is an error or not
		$pos = strpos($result_status, "Error:");
		if ($pos === 0) {
			// there was an error
			$colour = "#ff0000";
		} else {
			// there is no error
			$colour = "#20C040";
        }
		echo $colour;
    }
?>

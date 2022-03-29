<?php
	include 'db_connect.php';
	
	// define variables and set to empty values
	$first_name = $surname = "";
	if ($_SERVER["REQUEST_METHOD"] === "POST") {
		$title = test_input($_POST["title"]);
		echo "title: " . $title;
		$first_name = test_input($_POST["first_name"]);
		$surname = test_input($_POST["surname"]);
	}


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

	function retain_select($defvalue) {
		if (isset($_POST['title']) && $_POST['title'] == $defvalue) {
			echo 'selected';
		} else {
			echo "";
		}
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
	}

	// Close connection to database
	$conn->close();

?>

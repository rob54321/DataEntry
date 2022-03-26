<?php
	include 'db_connect.php';
	
	// define variables and set to empty values
	$title = $first_name = $surname = "";
	if ($_SERVER["REQUEST_METHOD"] === "POST") {
		$title = test_input($_POST["title"]);
		$first_name = test_input($_POST["first_name"]);
		$surname = test_input($_POST["surname"]);
	}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
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
        }

	// Close connection to database
	$conn->close();

?>

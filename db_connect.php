<?php
	ini_set("display_errors",1);
	error_reporting(E_ALL);

	// open database connection
	// function invokind must check for errors

	function OpenCon($dbhost, $dbuser,$dbpass, $db) {
		//mysqli_report(MYSQLI_REPORT_OFF);
		$conn = new mysqli($dbhost, $dbuser, $dbpass,$db, 3306);
		return $conn;
	}

	// close the connection
	function CloseCon($conn) {
		$conn -> close();
	}

	// function to insert record
	function InsertRec($conn, $table, $title, $first_name, $surname) {
		// check if user logged in
		if (! mysqli_ping($conn)) {
			// no connection
			$result_status = "Error: user not logged in";
			return $result_status;
		}

		// connection is ok
		$insertsql = "INSERT INTO $table (Title, First_name, Surname)
			VALUES (\"$title\", \"$first_name\", \"$surname\")\n";
		$conn->query($insertsql);

		if (!empty($conn->error)) {
			$result_status = "Error: " . $conn->error;
		} else {
			$result_status = "Inserted record successfully";
		}
		$rows_affected = $conn->affected_rows . " rows affected";
		$result_status = $result_status . "<br>" . $rows_affected . "<br>";
		return $result_status;
	}

	// function to delete record
	function DeleteRec($conn, $table, $first_name, $surname) {
		// check if user logged in
		if (! mysqli_ping($conn)) {
			// no connection
			$result_status = "Error: user not logged in";
			return $result_status;
		}

		//connection ok
		$delrec = "DELETE FROM $table WHERE (First_name = \"$first_name\")
			AND (Surname = \"$surname\")";
		$conn->query($delrec);

		if (!empty($conn->error)) {
			$result_status = "Error: " . $conn->error;
		} else {
			if ($conn->affected_rows == 0) {
				$result_status = "Deleted no records";
			} else if ($conn->affected_rows > 0) {
				$result_status = "Deleted record successfully";
			}
				$rows_affected = $conn->affected_rows . " rows affected";
		}
		return $result_status . "<br>" . $rows_affected . "<br>";
	}

	// function to search for a record
	// this function sets all fields and will find
	// only one record since there is a unique primary key
	function SearchRec($conn, $table, $title, $first_name, $surname) {
		// check if user logged in
		if (! mysqli_ping($conn)) {
			// no connection
			$result_status = "Error: user not logged in";
			return $result_status;
		}

		//connection ok
		// check for empty names
		$first_name = empty($first_name) ? "%" : $first_name;
		$surname = empty($surname) ? "%" : $surname;
		$title = empty($title) ? "%" : $title;

		$searchrec = "SELECT * from $table WHERE (first_name LIKE \"$first_name\")
											AND (title LIKE \"$title\")
											AND (surname LIKE \"$surname\")";
		// do the query
		$result = $conn->query($searchrec);

		// check for errors
		if (!empty($conn->error)) {
			$result_status =  "Error: $conn->error\n";
		} else {
			// no error
			$result_status = "field count: $result->field_count  no rows: $result->num_rows";
		}
	return $result_status;
	}
?>

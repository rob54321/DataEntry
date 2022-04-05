<?php
	// open database connection
	function OpenCon($dbhost, $dbuser,$dbpass, $db) {
		$conn = new mysqli($dbhost, $dbuser, $dbpass,$db, 3306);
		// check for an error
		if ($conn->connect_error) {
			printf("Error description: %s<br>", $conn->connect_error);
		}
		return $conn;
	}

	// close the connection
	function CloseCon($conn) {
		$conn -> close();
	}

	// function to insert record
	function InsertRec($conn, $table, $title, $first_name, $surname) {
		$insertsql = "INSERT INTO $table (Title, First_name, Surname)
			VALUES (\"$title\", \"$first_name\", \"$surname\")\n";
		$conn->query($insertsql);

		if ($conn->error) {
			$result_status = "Error: " . $conn->error;
		} else {
			$result_status = "Inserted record successfully";
		}
		$rows_affected = $conn->affected_rows . " rows affected";
		return $result_status . "<br>" . $rows_affected . "<br>";
	}

	// function to delete record
	function DeleteRec($conn, $table, $first_name, $surname) {
		$delrec = "DELETE FROM $table WHERE (First_name = \"$first_name\")
			AND (Surname = \"$surname\")";
		$conn->query($delrec);

		if ($conn->error) {
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
		$searchrec = "SELECT * from $table WHERE (first_name = \"$first_name\")
											AND (title = \"$title\")
											AND (surname = \"$surname\")";
		// do the query
		$sresult = $conn->query($searchrec);

		// check for errors
		if ($conn->error) {
			echo "error: $conn->error\n";
		}
		echo "rows: $conn->affected_rows\n";
		echo "info: $conn->info\n";
		echo "host info: $conn->host_info\n";
	}
?>

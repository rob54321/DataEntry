<?php
    // open database connection
    function OpenCon($dbhost, $dbuser,$dbpass, $db)
     {
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
     	$insertsql = "INSERT INTO $table (Title, First_name, Surname) VALUES (\"$title\", \"$first_name\", \"$surname\")\n";
        $conn->query($insertsql);
        
     	if ($conn->error) {
     	        $result_status = "Error: " . $conn->error;
     	} else {
                $result_status = "Record insterted successfully";
     	}
        $rows_affected = $conn->affected_rows . " rows affected";
        return $result_status . "<br>" . $rows_affected . "<br>";
     }

     // function to delete record
     function DeleteRec($conn, $table, $first_name, $surname)
     {
        $delrec = "DELETE FROM $table WHERE (First_name = \"$first_name\") AND (Surname = \"$surname\")";
        $conn->query($delrec);
        
        if ($conn->error) {
                $result_status = "Error: " . $conn->error;
        } else {
                if ($conn->affected_rows == 0) {
                        $result_status = "Nothing deleted";
                } else if ($conn->affected_rows > 0) {
                        $result_status = "Record deleted successfully";
                }
                $rows_affected = $conn->affected_rows . " rows affected";
        }
        return $result_status . "<br>" . $rows_affected . "<br>";
     }
?>

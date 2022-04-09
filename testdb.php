<?php
	include 'db_connect.php';
	
	// php programme to test db_connect.php
	// connect to db
	$conn = OpenCon("localhost", "robert", "coahtr", "TestIndex");
	echo "conn->info: $conn->info\n";
	
	if (empty($conn->connect_error)) {
	    echo "connected to TestIndex\n";
	    CloseCon($conn);
	} else {
        echo "Error: " . $conn->connect_error . "\n";
    }
    	
	// test search function
	// SearchRec($conn, "main", "Mr", "Robert", "Keys");
?>

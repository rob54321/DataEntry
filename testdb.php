<?php
	include 'db_connect.php';
	
	// php programme to test db_connect.php
	// connect to db
	$conn = OpenCon("localhost", "robert", "coahtr", "TestIndex");
	
	// test search function
	SearchRec($conn, "main", "Mr", "Robert", "Keys");
?>

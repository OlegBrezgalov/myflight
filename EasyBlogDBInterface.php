<?php
	$dbHost 	= 'localhost';
	$dbName 	= 'EasyBlog';
	$dbAdminLog = 'root';
	$dbAdminPas = 'root';
	
	function GetFiveForPage($startpage_number)
	{
		$startpage_number = $startpage_number - 1; 
		$lastpage_number= $startpage_number + 4;

		global $dbHost, $dbName, $dbAdminLog, $dbAdminPas;
		$resultarray = [];

		$mysqli = @new mysqli('localhost','root','root','EasyBlog');
		if (mysqli_connect_errno())
		{
			echo "!!!".mysqli_connect_error();
			return ; 
		}

		$resultset = $mysqli->query
			('SELECT * FROM Post ORDER BY postdate DESC 
				LIMIT '.$startpage_number.', '.$lastpage_number);	

		while ($row = $resultset->fetch_assoc()) 
    	{
    		array_push($resultarray, $row);
    	}

		$resultset->close();
		$mysqli->close();
		return $resultarray;
	}

	function GetTopFive()
	{
		global $dbHost, $dbName, $dbAdminLog, $dbAdminPas;
		$resultarray = [];

		$mysqli = @new mysqli('localhost','root','root','EasyBlog');
		if (mysqli_connect_errno())
		{
			echo "!!!".mysqli_connect_error();
			return ; 
		}

		$resultset = $mysqli->query('SELECT * FROM Post ORDER BY postdate DESC LIMIT 5');

		while ($row = $resultset->fetch_assoc()) 
    	{
    		array_push($resultarray, $row);
    	}

		$resultset->close();
		$mysqli->close();
		return $resultarray;
	}

?>
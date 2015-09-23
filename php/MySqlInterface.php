<?php
	$dbHost 	= 'localhost';
	$dbName 	= 'myblogpf';
	$dbAdminLog = 'admin';
	$dbAdminPas = 'pfblogadmin';
	$dbGuestLog	= 'guest';
	$dbGuestPas = '';

	function UserTypeInit()
	{
		global $dbHost, $dbName, $dbAdminLog, $dbAdminPas;

		$mysqli = @new mysqli($dbHost,'root','root',$dbName);
		if (mysqli_connect_errno())
		{
			echo "!!!".mysqli_connect_error();
			return ; 
		}
		else
		{
			echo "Все хорошо";
		}
		$mysqli->query('INSERT INTO UserType VALUES (0,\'Admin\');');
		$mysqli->query('INSERT INTO UserType VALUES (1,\'User\');');
		$mysqli->close();
	}

	function GetTopFive()
	{
		global $dbHost, $dbName, $dbAdminLog, $dbAdminPas;
		$resultarray = array('','','','','');

		$mysqli = @new mysqli($dbHost,'root','root',$dbName);
		if (mysqli_connect_errno())
		{
			echo "!!!".mysqli_connect_error();
			return ; 
		}

		$resultset = $mysqli->query('SELECT * FROM Post ORDER BY postdate LIMIT 5');
		
		//test
		//var_dump($resultset);
		//

		$counter = 0;
		while ($row = $resultset->fetch_assoc()) 
    	{
    		//test
    		//var_dump($row);
    		//echo '</br>';
    		//
    		$resultarray[$counter] = $row;
    		$counter = $counter + 1;
    	}

		$resultset->close();
		$mysqli->close();
		return $resultarray;	
	}

	function ParsePost($Post, &$PostTitle, &$PostText, &$PostDate)
	{
		$PostTitle = $Post['title'];
		$PostText = $Post['posttext'];
		$PostDate = $Post['postdate'];
	}
?>
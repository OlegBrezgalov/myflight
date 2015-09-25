<?php

	class MyDBInterface
	{
		private static $_dbHost 	= 'localhost';
		private static $_dbName 	= 'EasyBlog';
		private static $_dbAdminLog = 'root';
		private static $_dbAdminPas = 'root';

		private static $_mysqli = null;

		public static function Connect()
		{
			self::$_mysqli = new mysqli('localhost','root','root','EasyBlog');
			if (mysqli_connect_errno())
			{	
				throw new Exception("!!!".mysqli_connect_error());
			}
		}

		public static function CountPosts()
		{
			$resultset = self::$_mysqli->query('SELECT COUNT(*) FROM Post;');
			$resultint = $resultset->fetch_assoc();
			return (integer)$resultint['COUNT(*)'];
		}

		public static function GetPosts($pageindex, $postsperpage)
		{
			$resultarray = [];
			$resultset = self::$_mysqli->query
			('SELECT * FROM Post ORDER BY postdate DESC 
				LIMIT '.$pageindex.', '.$postsperpage);	

			while ($row = $resultset->fetch_assoc()) 
    		{
    			array_push($resultarray, $row);
    		}

			$resultset->close();
			return $resultarray;
		}

		public static function Disconnect()
		{
			self::$_mysqli->close();
		}
	}
?>
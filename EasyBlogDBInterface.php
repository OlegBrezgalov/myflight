<?php

	class MyDBInterface
	{
		private static $_dbHost 	= 'localhost';
		private static $_dbName 	= 'EasyBlog';
		private static $_dbAdminLog = 'root';
		private static $_dbAdminPas = 'root';

		private static $_mysqli = null;

		public function __construct($dbhost, $dbname, $dbuser, $dbpass)
		{
			$this->_dbHost = $dbhost;
			$this->_dbName = $dbname;
			$this->_dbAdminLog = $dbuser;
			$this->_dbAdminPas = $dbpass;
			self::Connect();
		}
		
		private static function ConExTest()
		{
			if (mysqli_connect_errno())
			{	
				throw new Exception("!!!".mysqli_connect_error());
			}
		}

		public static function Connect()
		{
			self::$_mysqli = new mysqli
				(self::$_dbHost,self::$_dbAdminLog,
					self::$_dbAdminPas,self::$_dbName);
			self::ConExTest();
			
		}

		public static function Authorise($login, $password)
		{
			self::ConExTest();
			$req = 'SELECT COUNT(*) FROM User WHERE User.login="'.$login.'" AND User.password="'.$password.'"';
			$resultset = self::$_mysqli->query($req);
			$res = $resultset->fetch_assoc();
			if ($res['COUNT(*)'] == 0) 	
				return false;
			else 
				return true;
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

		public function __destruct()
		{
			self::Disconnect();
		}
	}
?>
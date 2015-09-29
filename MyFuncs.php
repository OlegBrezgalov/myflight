<?php 
	function SetLogin()
	{
		$str = 'guest';
		if (isset($_SESSION['login'])) $str = $_SESSION['login'];
		return $str;
	}
?>
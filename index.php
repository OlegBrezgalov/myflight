<?php
	require 'vendor/autoload.php';
	//главная страница
	Flight::route('/(\?page=@page)', function($page){
		$c_page = 1;
		if (!is_null($page))$c_page = $page;
		echo $c_page;
	});

	Flight::start();
?>
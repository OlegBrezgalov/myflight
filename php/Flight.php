<?php
	Flight::route('/', function(){
    	echo 'hello world!';
	});

	Flight::route('/@name', function($name){
    	echo 'hello '.$name;
	});

	Flight::start();
?>
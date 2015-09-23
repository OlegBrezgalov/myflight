<?php
	require 'vendor/autoload.php';
	
	Flight::set('flight.views.path','/home/doctor_lapt/Sites/MyFlight/views');

	//главная страница
	Flight::route('/(\?p=@p)', function($p)
	{
		//gettin page index
		$page = 1;
		if (!is_null($p))$page = $p;

		include 'EasyBlogDBInterface.php';
		$posts = GetTopFive();

		Flight::render('home.php',
						array(
							'headertext' => 'Мой летучий блог',
							'authorname' => 'Doctor',
							'footertext' => '@ProgForce forever'
							),
						'home_page_content');
		Flight::render('post.php',
						array ('posts' => $posts),
						'posts_block');
		Flight::render('home_layout.php', NULL);
	});

	Flight::start();
?>
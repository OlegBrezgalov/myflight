<?php
	require 'vendor/autoload.php';

	//главная страница
	Flight::route('/(\?p=@p)', function($p)
	{
		//gettin page index
		$page = 1;
		if ($p > 1)
			$page = $p;

		include 'EasyBlogDBInterface.php';
		$postselector = ($page-1)*5;
		$posts = GetFiveForPage($postselector);

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
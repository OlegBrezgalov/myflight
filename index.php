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

		$postscount = CountPosts();
		$page_count = (integer)round($postscount / 5);

		Flight::render('home.php',
						array(
							'headertext' => 'Мой летучий блог',
							'authorname' => 'Doctor',
							'footertext' => '@ProgForce forever'
							),
						'home_page_content');
		Flight::render('post.php',
						array('posts' => $posts),
						'posts_block');
		Flight::render('page_hyperlinks.php',
						array('page_count' => $page_count),
						'pages_n_links');
		Flight::render('home_layout.php', NULL);
	});

	Flight::start();
?>
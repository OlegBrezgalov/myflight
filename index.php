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
		Flight::register('db','MyDBInterface',array('localhost','EasyBlog','root','root'));
		$mydb = Flight::db();

		$postselector = ($page-1)*5;
		$posts = $mydb::GetPosts($postselector,5);

		$postscount = $mydb::CountPosts();
		$pages_count = ceil($postscount / 5);

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
						array(
							'pages_count' => $pages_count,
							'current_page' => $page
							),
						'pages_n_links');
		Flight::render('home_layout.php', NULL);
	});

	Flight::start();
?>
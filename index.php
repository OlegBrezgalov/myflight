<?php
	require 'vendor/autoload.php';
	require 'EasyBlogDBInterface.php';
	include 'MyFuncs.php';
	Flight::register('db','MyDBInterface',array('localhost','EasyBlog','root','root'));

	session_start();

	//главная страница
	Flight::route('/(\?p=@p)', function($p)
	{
		$s_login = SetLogin();
		//gettin page index
		$page = 1;
		if ($p > 1)
			$page = $p;

		$postselector = ($page-1)*5;
		$posts = Flight::db()->GetPosts($postselector,5);

		$postscount = Flight::db()->CountPosts();
		$pages_count = ceil($postscount / 5);

		Flight::render('home.php',
						array(
							'headertext' => 'Мой летучий блог',
							'authorname' => $s_login,
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
		Flight::render('auth_view.php', null, 'auth_view');
		Flight::render('home_layout.php', null);
	});

	Flight::route('/exit',function()
	{
		session_destroy();
		Flight::redirect('/');
	});

	Flight::route('/auth/',function()
	{
		Flight::render('auth.php', null);
	});

	/*Flight::route('POST /authconfirm/', function()
		{ 
			Flight::render('authconfirm.php',array('post_args' => $_POST));
		});*/

	Flight::start();
?>
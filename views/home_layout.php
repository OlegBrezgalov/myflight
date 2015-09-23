<html>
	<head>
		<title>Главная: Мой полет</title>
		<meta charset = "utf-8"/>
		<link rel="stylesheet" href="/views/styles/home_layout_style.css"/>
	</head>
	<body>
		<?php 
		ini_set('error_reporting', E_ALL);
		ini_set('display_errors', 1);

		echo $home_page_content;
		echo $posts_block;
		?>
	</body>
</html>
<html>
	<head>
		<meta charset = "utf-8"/>
		<title>Авторизация</title>
	</head>
	<body>
		<form method = "POST" action = "/auth" id = 'Vasya'>
			<p><input name = "input_email" type = "text" size = 20/></p>
			<p><input name = "input_passw" type = "text" size = 20/></p>
			<p><button onclick = "document.getElementById('Vasya').submit()">
				Submit
			</button></p>
		</form>
		<?php 
			if (!empty($_POST))
			{
				$r = Flight::db()->Authorise($_POST['input_email'],$_POST['input_passw']);
				if ($r) 
				{
					var_dump($_SESSION);
					$_SESSION['login'] = $_POST['input_email'];
					var_dump($_SESSION);
					Flight::redirect('/');
				}
			}
		?>
	</body>
</html>
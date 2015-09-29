<div class = "signin">
	<?php if (!isset($_SESSION['login'])): ?>
		<p><a href = "/auth/">Авторизация</a></p>
	<?php endif ?>
</div>

<div class = "logout">
	<?php if (isset($_SESSION['login'])): ?>
		<p><a href = "/exit">Выход</a><p>
	<?php endif ?>
</div>
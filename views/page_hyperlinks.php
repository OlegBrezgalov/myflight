
<?php
	include 'php/page_logic.php';
	nonflexible_pagination($pages_count,$current_page);
	echo '</br>';
	$pag = generate_pagination(40,3,$current_page);
	//$pag1 = generate_pagination_line(1,10,3);
	var_dump($pag);
?>
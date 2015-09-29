
<?php
	include 'php/page_logic.php';
	$pag = generate_pagination($pages_count,3,$current_page);
	echo $pag;
?>
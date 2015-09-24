
<?php
	function print_page_ref($leftchar, $index, $rightchar)
	{
		echo '<a href = "/?p=',$index,'/"">',$leftchar,$index,$rightchar,'</a> ';	
	}

	$maxinline = 3;

	if ($pages_count<=4) 
		for ($i = 0; $i < $pages_count; $i++)	
		{
			if ($i == $current_page-1)
				print_page_ref('[',$i+1,']');
			else
				print_page_ref('',$i+1,''); 
		}
	else
		switch ($current_page) 
		{
			case 1:
				print_page_ref('[',1,']');
				for ($i = 1; $i < $maxinline; $i++)	
					print_page_ref('',$i+2,'');
				echo '... '; print_page_ref('',$pages_count,'');
				break;
			
			case $pages_count:
				print_page_ref('',1,''); echo ' ... ';
				for ($i = $pages_count-1; $i > $pages_count-$maxinline; $i--)	
					print_page_ref('',$i,'');
				print_page_ref('[',$pages_count,']');
				break;

			default:
				if ($current_page <= 0)
				{
					echo 'error: negative page index';
					break;
				}

				print_page_ref('',1,''); echo ' ... ';
				print_page_ref('',$current_page-1,'');
				print_page_ref('[',$current_page,']');
				print_page_ref('',$current_page+1,'');
				echo ' ... '; print_page_ref('',$pages_count,'');
				break;
		}

?>
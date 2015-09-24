
<?php
	function print_page_ref($leftchar, $index, $rightchar)
	{
		echo '<a href = "/?p=',$index,'/"">',$leftchar,$index,$rightchar,'</a> ';	
	}

	function print_page_line($leftind, $rightind, $current)
	{
		for ($i=$leftind; $i <= $rightind; $i++)
		{
			if ($i == $current)
				print_page_ref('[',$i,']'); 
			else 
				print_page_ref('',$i,'');
			echo ' ';
		}
	}

	if ($pages_count<=4) 
	{
		for ($i = 0; $i < $pages_count; $i++)	
		{
			if ($i == $current_page-1)
				print_page_ref('[',$i+1,']');
			else
				print_page_ref('',$i+1,''); 
		}
	}
	else
	{
		if ($current_page > 0 && $current_page <= $pages_count)
		{
			if ($current_page <=2)
			{
				print_page_line(1,3,$current_page);
				echo '... ';
				print_page_ref('',$pages_count,'');
			}

			else if ($current_page >= $pages_count-1)
			{
				print_page_ref('',1,'');	
				echo ' ... ';
				print_page_line($pages_count-2,$pages_count,$current_page);
			}

			else
			{
				print_page_ref('',1,'');
				echo ' ... ';
				print_page_line($current_page-1, $current_page+1, $current_page);
				echo '... ';
				print_page_ref('',$pages_count,'');
			}
		}
	}

?>
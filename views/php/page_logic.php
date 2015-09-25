<?php
	function generate_href($leftsep,$name,$rightsep)
	{
		$str = '<a href = "/?p='.$name.'/">'.$leftsep.$name.$rightsep.'</a>';
		return $str;
	}

	function generate_pagination_line($left,$right,$cur)
	{
		$result = '';

		if ($left > $right)
		{
			$tmp = $left;
			$left = $right;
			$right = $tmp;
		}

		for ($i=$left; $i <= $right; $i++)
		{
			$tmpstr='';

			if ($i == $cur)
				$tmpstr = generate_href('[',$i,'] ');
			else 
				$tmpstr = generate_href('',$i,' ');

			$result = $result.$tmpstr;
		}

		return $result;
	}

	function generate_pagination($length,$width,$current)
	{
		if ($current <= 0 || $current > $length) throw new Exception('wrong current, epta');

		$resultstr = '';
		// 1 2 3 4 
		if ($length <= $width+1)
		{
			$resultstr = generate_pagination_line(1,$length,$current).'0000';
		}
		//1 [2] 3 ... 40
		else if ($current <= 1 + ($width-1)/2)
		{
			$resultstr = generate_pagination_line(1,$width,$current);
			$resultstr = $resultstr.'... '.generate_href('',$length,'');	
		}
		//1 ... 38 [39] 40
		else if ($current > $length - ($width-1)/2)
		{
			$resultstr = generate_href('',1,'');
			$resultstr = $resultstr.' ... '.generate_pagination_line($length-$width+1,$length,$current);
		}
		// 1 ... 4 [5] 6 ... 40
		else 
		{
			$step = ($width - 1)/2;
			$resultstr = generate_href('',1,'').' ... ';
			$resultstr = $resultstr.generate_pagination_line($current - $step,$current + $step, $current);
			$resultstr = $resultstr.'... '.generate_href('',$length,'');
		}
		return $resultstr;
	}











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

	function nonflexible_pagination($pages_count,$current_page)
	{
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
	}

?>
<?php
	if( is_home() )
		$title = __('From the Blog', 'ci_theme');
	elseif( is_category() )
		$title = sprintf(__('Category Archive: %s', 'ci_theme'), single_cat_title( '', false ));
	elseif( is_tag() )
		$title = sprintf(__('Tag Archive: %s', 'ci_theme'), single_tag_title( '', false ));
	elseif( is_author() )
		$title = sprintf(__('Author Archive: %s', 'ci_theme'), get_the_author());
	elseif( is_day() )
		$title = sprintf(__('Daily Archive: %s', 'ci_theme'), get_the_date());
	elseif( is_month() )
		$title = sprintf(__('Monthly Archive: %s', 'ci_theme'), get_the_date('F Y'));
	elseif( is_year() )
		$title = sprintf(__('Yearly Archive: %s', 'ci_theme'), get_the_date('Y'));
	elseif( is_archive() )
		$title = __('Archive', 'ci_theme');
	else
		$title = get_the_title();
?>

<?php echo $title; ?>
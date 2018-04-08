<?php

function portfolio_sidebar(){

	$category_query_args = array(
		'post_type'			=> 'portfolios',
		'posts_per_page'	=>	-1,
		'orderby' 			=> 'date',
		'order' 			=> 'desc', 
	);

	$category_query = new WP_Query( $category_query_args ); 

	$img_projects = array();

	if ( $category_query->have_posts() ) :

		while ($category_query->have_posts()) : $category_query->the_post(); 
			// $categories = get_the_category(); 
			// $term_id = $categories[0]->term_id;
			// if($term_id == 4){ 
				$img_projects[] = array(
					'title' => 	get_the_title(),
					'image'	=>	get_the_post_thumbnail_url(get_the_ID(),'full')
				);
			//}  
		endwhile; 

	endif;

	return $img_projects;
}

function portfolio_page(){

	$category_query_args = array(
		'posts_per_page'	=>-1,
		'orderby' 			=> 'date',
		'order' 			=> 'asc', 
	);

	$category_query = new WP_Query( $category_query_args ); 
	$img_projects = array();
	if ( $category_query->have_posts() ) :
		while ($category_query->have_posts()) : $category_query->the_post(); 
			$categories = get_the_category(); 
			$term_id = $categories[0]->term_id;
			if($term_id == 6){ 
				$img_projects[] = array(
					'title' => 	get_the_title(),
					'image'	=>	get_the_post_thumbnail_url(get_the_ID(),'full')
				);
			}  
		endwhile; 
	endif;
	return $img_projects;
}
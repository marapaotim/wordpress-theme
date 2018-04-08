<?php

function work_experience(){

	$category_query_args = array(
		'post_type' 		=> 'experiences',
		'posts_per_page'	=>	-1,
		'orderby' 			=> 'date',
		'order' 			=> 'desc', 
	);

	$category_query = new WP_Query( $category_query_args ); 

	$work_experience = array();

	if ( $category_query->have_posts() ) :

		while ($category_query->have_posts()) : $category_query->the_post(); 
			// $categories = get_the_category(); 
			// $term_id = $categories[0]->term_id;
			// if($term_id == 5){ 
				$work_experience[] = array(
					'title' 	=> 	get_the_title(),
					'content'	=>	apply_filters( 'the_content', get_post_field('post_content') )
				);
			//}  
		endwhile; 

	endif;

	return $work_experience;

}
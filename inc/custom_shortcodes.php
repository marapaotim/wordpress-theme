<?php

function projects_shortcodes_query(){
 	$category_query_args = array(
		'posts_per_page'=>-1,
		'orderby' => 'date',
		'order' => 'desc', 
	);

	$category_query = new WP_Query( $category_query_args ); 
	$img_projects = array();
	if ( $category_query->have_posts() ) :

		while ($category_query->have_posts()) : $category_query->the_post(); 
			$categories = get_the_category(); 
			$cat_name = $categories[0]->cat_name;
			//echo $cat_name; 
			if(strtolower($cat_name == 'projects')){ 
				$img_projects[] = array(
					'title' => 	get_the_title(),
					'image'	=>	get_the_post_thumbnail_url(get_the_ID(),'full')
				);
			}  

		endwhile; 
	endif;
  ob_start(); 
  ?>
	<div class="sidebar-module sidebar-module-inset">
		<h1>Portfolio</h1>
		<div class="border-title"></div>
		<?php foreach ($img_projects as $key => $value): ?> 
			<div class="img-portfolio-parent">
            	<div class="img-portfolio-child" style="background-image:url(<?php echo $value['image']; ?>);">
            		<span>View Image</span>
            	</div> 
          	</div> 
		<?php endforeach ?> 
	</div> 
<?php 
	$page = ob_get_contents();
    ob_end_clean(); 
    return $page;
}
add_shortcode('projects_shortcodes', 'projects_shortcodes_query');
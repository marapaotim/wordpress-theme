<!-- <?php

	if ( have_posts() ):

		$page_content = array();

		while ( have_posts() ) : the_post(); 

		    $page_content = array( 
		    	'title' 	=> get_the_title(),
		    	'content'	=> 'asd'  
		    );

		endwhile; wp_reset_query();

	endif

?>

 -->	 
<div id="container"> 

    <div id="content" class="pageContent">   
    	<h1 class="entry-title"><?php echo get_post_field('post_title', $postid) ?></h1>
    	<div class="border-title"></div> 

        <div class="entry-content-page"> 

            <?php echo apply_filters( 'the_content', get_post_field('post_content', $postid) ); ?> 

        </div>  
  

    </div> 

</div>
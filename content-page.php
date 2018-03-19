<?php

	if ( have_posts() ):

		$page_content = array();

		while ( have_posts() ) : the_post(); 

		    $page_content = array( 
		    	'title' 	=> get_the_title(),
		    	'content'	=> get_the_content()  
		    );

		endwhile; wp_reset_query();

	endif

?>

	 
<div id="container"> 

    <div id="content" class="pageContent">  

    <h1 class="entry-title"><?php echo $page_content['title']; ?></h1>  

        <div class="entry-content-page"> 

            <?php echo $page_content['content']; ?> 

        </div>  
  

    </div> 

</div>
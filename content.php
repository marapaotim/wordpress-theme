<!--<div class="blog-post">
	<h2 class="blog-post-title">Sample blog post</h2>
	<p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p>

	<p>This blog post shows a few different types of content that's supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p>
	<hr>

<!-- the rest of the content -->

<!--</div> /.blog-post --> 
    <?php 

    $args = array(

      'posts_per_page'=>-1,

      'orderby' => 'date',

      'order' => 'desc',

    );   

    $the_query = new WP_Query( $args ); 

    $posts_blog = array();

    while ($the_query->have_posts()) : $the_query->the_post();

        $posts_blog[] = array(

            'title'       => get_the_title(),
            'content'     => get_the_excerpt(),
            'date'        => get_the_date() . ' ' . get_the_time(),
            'author_name' =>  get_the_author(),
            'thumbnail'   =>  get_the_post_thumbnail_url( get_the_ID(),'full' )

        ); 

    endwhile; wp_reset_query(); ?>

<div class="blog-post">  

  <?php foreach ( $posts_blog as $key => $value ): ?>
    <h2 class="blog-post-title"> <?php echo $value['title']; ?> </h2>

    <p class="blog-post-meta">

      <?php echo $value[ 'date' ]; ?> by <a href="#"><?php echo strtoupper( $value[ 'author_name' ] ); ?></a>

    </p> 

    <img src="<?php echo $value[ 'thumbnail' ]; ?>">

    <p> <?php echo $value[ 'content ']; ?> </p>

    <hr>

  <?php endforeach ?> 
     
</div> 
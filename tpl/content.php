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
        $categories = get_the_category(); 
        $cat_name = $categories[0]->cat_name;
        if(strtolower($cat_name == 'whatido')){ 
          $posts_blog[] = array(

              'title'       => get_the_title(),
              'content'     => get_the_excerpt(),
              'date'        => get_the_date() . ' ' . get_the_time(),
              'author_name' =>  get_the_author(),
              'thumbnail'   =>  get_the_post_thumbnail_url( get_the_ID(),'full' )

          );
        } 

    endwhile; wp_reset_query(); ?>

<?php if ( have_posts() ): ?>

  <div class="blog-post"> 
      <h1> What I do </h1> 

      <?php foreach ( $posts_blog as $key => $value ): ?>

        <ul class="list-inline home-whatido-border">
          <li><h3 class="blog-post-title"> <?php echo $value['title']; ?> </h3></li>
          <li></li>
        </ul>
          

          <!-- <p class="blog-post-meta">

            <?php echo $value[ 'date' ]; ?> by <a href="#"><?php echo strtoupper( $value[ 'author_name' ] ); ?></a>

          </p> --> 

          <div class="img-whatido-parent">
            <div class="img-whatido-child" style="background-image:url(<?php echo $value[ 'thumbnail' ]; ?>);"></div> 
          </div>
         <!--  <img src="<?php echo $value[ 'thumbnail' ]; ?>"> -->

          <p> <?php echo $value[ 'content' ]; ?> </p> 

      <?php endforeach ?> 
       
  </div>  

<?php endif ?>
<?php get_header(); ?>

  <div class="row"> 

    <div class="col-sm-8 blog-main">

        <?php

        $args = array(

          'posts_per_page'=>-1,

          'orderby' => 'date',

          'order' => 'desc',

        );   

        $the_query = new WP_Query( $args ); 

        $posts_blog = array();

        foreach ($the_query->posts as $key => $value) { 

            $posts_blog[] = array(

              'title'   => $value->post_title,
              'content' => $value->post_content,
              'date'    => $value->post_date,
              'author_id'  => $value->post_author

            ); 

        } ?>

    <div class="blog-post">  

      <?php foreach ($posts_blog as $key => $value):  

          $post_author_name = get_the_author_meta( 'display_name', $value['author_id'] );

          $date = new DateTime( $value['date'] , new DateTimeZone('UTC') ); 

          $date->setTimezone(new DateTimeZone('America/Denver'));

        ?>
        <h2 class="blog-post-title"> <?php echo $value['title']; ?> </h2>

        <p class="blog-post-meta">

          <?php echo $date->format('Y-M-d h:i:s A'); ?> by <a href="#"><?php echo strtoupper($post_author_name); ?></a>

        </p> 

        <p> <?php echo $value['content']; ?> </p>

        <hr>

      <?php endforeach ?> 
     
    </div> 

    <?php  //print_r('<pre>');print_r($the_query);print_r('</pre>'); //get_template_part( 'content', get_post_format() ); ?>

    </div> <!-- /.blog-main -->

    <?php get_sidebar(); ?>

  </div> <!-- /.row -->

<?php get_footer(); ?>
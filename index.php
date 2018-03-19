<?php get_header(); ?> 

  <div class="row"> 

    <div class="col-sm-8 blog-main"> 
      
      <?php if ( is_front_page() ) { ?> 

      <div class="blog-header">
        <h1 class="blog-title"><a href="<?php echo get_bloginfo( 'wpurl' );?>"><?php echo get_bloginfo( 'name' ); ?></a></h1>
        <p class="lead blog-description"><?php echo get_bloginfo( 'description' ); ?></p>
      </div>

      <?php       
            get_template_part( 'content-page', get_post_format() ); 

            get_template_part( 'content', get_post_format() ); 

          }
          else{

            get_template_part( 'content-page', get_post_format() ); 

          }

      ?>

    </div> <!-- /.blog-main -->

    <?php get_sidebar(); ?>

  </div> <!-- /.row -->  

<?php get_footer(); ?>
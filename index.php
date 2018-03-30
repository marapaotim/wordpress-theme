<?php get_header(); ?> 

  <div class="row"  style="padding-top: 10px"> 

    <div class="col-sm-8 blog-main"> 

      <?php if ( is_front_page() ) { ?> 

    <!--   <div class="blog-header">
        <h1 class="blog-title"></h1>
        <p class="lead blog-description"><?php echo get_bloginfo( 'description' ); ?></p>
      </div> -->

      <?php       
            get_template_part( 'tpl/content-page', get_post_format() ); 

            get_template_part( 'tpl/content', get_post_format() ); 

          }
          else{

            get_template_part( 'tpl/content-page', get_post_format() ); 

          }

      ?>

    </div> <!-- /.blog-main -->

    <?php get_sidebar(); ?>

  </div> <!-- /.row -->  

<?php get_footer(); ?>
<?php get_header(); ?> 

  <div class="row"> 

    <div class="col-sm-8 blog-main"> 
      
      <?php 

          if ( is_front_page() ): 

            get_template_part( 'content', get_post_format() ); 

          endif 

      ?>

    </div> <!-- /.blog-main -->

    <?php get_sidebar(); ?>

  </div> <!-- /.row -->  

<?php get_footer(); ?>
<?php get_header(); ?> 

  <div class="row"  style="padding-top: 10px"> 

    <div class="col-sm-8 blog-main"> 

      <?php if ( is_front_page() ) { ?>  

      <?php       
            get_template_part( 'tpl/content-page', get_post_format() ); 

            get_template_part( 'tpl/content', get_post_format() ); 

          }
          else{

            get_template_part( 'tpl/content-page', get_post_format() ); 

            switch (strtolower(end(str_replace('-', '', current_page())))) {  
              case 'workexperience': 
                echo do_shortcode('[work_experience_shortcodes]');
              break;
              case 'projects':
                echo do_shortcode('[portfolio_shortcodes]'); 
              break;
            }

          }

      ?>

    </div> <!-- /.blog-main -->

    <?php get_sidebar(); ?>

  </div> <!-- /.row -->  

<?php get_footer(); ?>
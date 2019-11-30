</div> <!-- /.container -->
<?php
  $header_menu = array();
  $menu = wp_nav_menu(
    array(
      'echo' => FALSE,
      'fallback_cb' => '__return_false',
    )
  );

  if ( ! empty ( $menu ) ) {
    foreach (wp_get_nav_menu_items(2) as $key => $value) {
      $header_menu[] = array(
        'title' => $value->title,
        'url'   => $value->url
      );
    }
  }
?>
<footer class="blog-footer">
  <div class="wrap text-center hidden-xs">
    <ul class="nav navbar-nav footer-menu">
      <?php if ( ! empty( $header_menu ) ): ?> 
        <?php foreach ($header_menu as $key => $value):  
          $active = '';
          if (strtolower(end(str_replace('-', ' ', current_page()))) == strtolower($value['title'])){
            $active = 'active';
          }
          if ('portfolio-tim' == strtolower(end(current_page())) && 'home' == strtolower($value['title'])) {
            $active = 'active';
          } 
        ?>  
        <li class="<?php echo $active; ?>"><a href="<?php echo $value['url']; ?>"><?php echo $value['title']; ?></a></li> 
        <?php endforeach ?>  
      <?php endif ?>                     
    </ul>
  </div>
  <div class="container">
    <div class="row">
      <p>Webiste Developed by <a href="#">Tim Marapao</a></p> 
      <ul class="list-inline social-sites">
        <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true" style="font-size:50px;"></i></a></li>
        <li><a href="#"><i class="fa fa-github" aria-hidden="true" style="font-size:50px;"></i></a></li>
        <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true" style="font-size:50px;"></i></a></li>
      </ul>
    </div>
  </div>
</footer>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="<?php echo get_site_url() ?>/wp-content/themes/wordpress-theme/js/global.js"></script>
  <script src="<?php echo get_site_url() ?>/wp-content/themes/wordpress-theme/fancybox/jquery.fancybox.pack.js?v=2.1.5""></script>
  <?php wp_footer(); ?> 
  </body>
</html>

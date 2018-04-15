    </div> <!-- /.container -->

  <?php  
    $menu = wp_nav_menu(
        array (
            'echo' => FALSE,
            'fallback_cb' => '__return_false'
        )
    ); 

    $header_menu = array(); 
    
    if ( ! empty ( $menu ) )
    { 
      foreach (wp_get_nav_menu_items(2) as $key => $value) {  
        $header_menu[] = array(
          'title' => $value->title,
          'url' => $value->url
        ); 
      } 
    } 

        // global $wp; 
        // $current_page = explode('/',home_url( $wp->request )); 

  ?> 

		<footer class="blog-footer">
<!--       <div class="footer-menu">
          <div class="container">
            <nav class="navbar durvet-footer-menu">
              <div class="footer-wrapper">
                <ul class="nav navbar-nav">
                  <li class="menu-item hidden-md hidden-sm hidden-xs"><a href="https://www.durvet.com/history/">About Us</a></li>
                  <li class="menu-item hidden-md hidden-sm hidden-xs"><a href="/product-category/new-products/">New Products</a></li>
                  <li class="menu-item"><a href="https://www.durvet.com/distributor-members/">Distributor Members</a></li>
                  <li class="menu-item hidden-md hidden-sm hidden-xs"><a href="https://www.durvet.com/find-a-store/">Find A Store</a></li>
                  <li class="menu-item"><a href="https://www.durvet.com/coupons/">Coupons</a></li>
                  <li class="menu-item"><a href="https://www.durvet.com/contact-us/">Contact Us</a></li>
                  <li class="menu-item"><a href="https://www.durvet.com/careers/">Careers</a></li>
                  <li class="menu-item"><a href="/blog/">Blog</a></li>
                  <li class="menu-item"><a href="https://www.durvet.com/legal-notice/">Legal</a></li>
                                    
                </ul>   
                </div>
            </nav>
          </div>
        </div> --> 
            <div class="wrap text-center hidden-xs">
              <ul class="nav navbar-nav footer-menu">
                <?php if ( ! empty( $header_menu ) ): ?> 
                  <?php foreach ($header_menu as $key => $value):  
                    $active = '';
                    if (strtolower(end(str_replace('-', ' ', current_page()))) == strtolower($value['title'])){
                      $active = 'active';
                    }
                    if ('portfolio' == strtolower(end(current_page())) && 'home' == strtolower($value['title'])) {
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="<?php echo get_site_url() ?>/wp-content/themes/wordpress-theme/js/global.js"></script>
    <script src="<?php echo get_site_url() ?>/wp-content/themes/wordpress-theme/fancybox/jquery.fancybox.pack.js?v=2.1.5""></script>
<?php wp_footer(); ?> 
  </body>
</html>
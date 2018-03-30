<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?php echo get_bloginfo( 'name' ); ?></title> 
	<link href="<?php echo get_bloginfo( 'template_directory' );?>/css/blog.css" rel="stylesheet">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php wp_head();?>
</head>

<body> 
	<?php  
		$menu = wp_nav_menu(
		    array (
		        'echo' => FALSE,
		        'fallback_cb' => '__return_false'
		    )
		); 
		if ( ! empty ( $menu ) )
		{ 
			$header_menu = array(); 
			foreach (wp_get_nav_menu_items(2) as $key => $value) {  
				$header_menu[] = array(
					'title'	=> $value->title,
					'url'	=> $value->url
				); 
			} 
		} 

        global $wp; 
        $current_page = explode('/',home_url( $wp->request )); 

	?> 

	<nav class="navbar navbar-default navbar-fixed-top" style="border-bottom: 2px solid #8d9095">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo get_bloginfo( 'wpurl' );?>"><?php echo get_bloginfo( 'name' ); ?></a> 
        </div> 
        <div id="navbar" class="navbar-collapse collapse"> 
          <ul class="nav navbar-nav navbar-right">
          		<?php if ( ! empty( $header_menu ) ): ?> 
					<?php foreach ($header_menu as $key => $value):  
						$active = '';
						if (strtolower(end(str_replace('-', ' ', $current_page))) == strtolower($value['title'])){
							$active = 'active';
						}
						if (strtolower(end($current_page)) == 'portfolio' && strtolower($value['title']) == 'home') {
						 	$active = 'active';
						} 
					?>  
					<li class="<?php echo $active; ?>"><a href="<?php echo $value['url']; ?>"><?php echo $value['title']; ?></a></li> 
					<?php endforeach ?>  
				<?php endif ?> 
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 
    <?php
    	$img_url = '';
    	switch (strtolower(end(str_replace('-', '', $current_page)))) {
    		case 'portfolio':
    			$img_url = '/wp-content/uploads/2018/03/1_hrFhKc1lS4vj63nGdxgezg.png';
    		break;
    		case 'aboutme':
    			$img_url = '/wp-content/uploads/2018/03/2016-brainfood-informationispower-883x432.jpg';
    		break;
    		case 'contactme':
    			$img_url = '/wp-content/uploads/2018/03/images-1.jpg';
    		break; 
    	}
	    if (strtolower(end($current_page)) == 'portfolio') {
			
		} 
    ?>
    <div class="row">
		<div class="container-fluid header-img">
			<img src="<?php echo get_site_url().$img_url; ?>">
		</div> 
    </div>
	<div class="container"> 
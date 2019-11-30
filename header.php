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
	<link href="<?php echo get_bloginfo( 'template_directory' );?>/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php wp_head(); ?>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>

<body>
	<?php
		$header_menu = array();
		$img_url = array();
		$menu = wp_nav_menu(
		    array (
		        'echo' => FALSE,
		        'fallback_cb' => '__return_false',
		    )
		);
		if ( ! empty ( $menu ) ) {
			foreach (wp_get_nav_menu_items(2) as $key => $value) { 
				$header_menu[] = array(
					'title'	=> $value->title,
					'url'	=> $value->url,
          			'images' => wp_get_attachment_image_src( get_post_thumbnail_id( $value->object_id ), 'single-post-thumbnail' ),
				);
			}
		}
	?>
	<nav class="navbar navbar-default navbar-fixed-top" style="border-bottom: 2px solid #8d9095"> 
	<div class="first-header" style="">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="row"> 
						<h4><i class="fa fa-desktop" aria-hidden="true"></i> Software Developer</h4>
					</div>
				</div> 
			</div>
		</div> 
	</div>
      <div class="container header-second">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo get_bloginfo( 'wpurl' );?>" style="padding:0px"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.jpg" title="logo" style="max-height:50px;"></a> 
        </div>
        <div id="navbar" class="navbar-collapse collapse"> 
          <ul class="nav navbar-nav navbar-right">
          		<?php if ( ! empty( $header_menu ) ): ?> 
					<?php foreach ($header_menu as $key => $value):  
						$active = '';
						if (strtolower(end(str_replace('-', ' ', current_page()))) == strtolower($value['title'])){
							$active = 'active';
						}
						if (4 >= count(current_page()) && 'home' == strtolower($value['title'])) {
						 	$active = 'active';
						}
						$img_url[end(current_page())][] = $value["images"];
					?>  
					<li class="<?php echo $active; ?>"><a href="<?php echo $value['url']; ?>"><?php echo $value['title']; ?></a></li>
					<?php endforeach ?>
				<?php endif ?> 
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

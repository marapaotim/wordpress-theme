<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?php echo get_bloginfo( 'name' ); ?></title> 
	<link href="<?php echo get_bloginfo( 'template_directory' );?>/blog.css" rel="stylesheet">
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
					<?php foreach ($header_menu as $key => $value): ?> 
						<li><a href="<?php echo $value['url']; ?>"><?php echo $value['title']; ?></a></li> 
					<?php endforeach ?>  
				<?php endif ?> 
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
	<div class="container" style="padding-top:70px;"> 
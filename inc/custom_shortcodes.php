<?php
require_once('portfolio.functions.php');
require_once('work_experience.functions.php');


function projects_shortcodes_query(){
  ob_start(); 
  ?>
	<div class="sidebar-module sidebar-module-inset">
		<h3>Portfolio</h3>
		<div class="border-title-sidebar"></div>
		<?php foreach (portfolio_sidebar() as $key => $value): ?> 
			<a class="fancybox" data-fancybox-group="gallery" title="<?php echo $value['title']; ?>" href="<?php echo $value['image']; ?>">
				<div class="img-portfolio-parent">
	            	<div class="img-portfolio-child" style="background-image:url(<?php echo $value['image']; ?>);">
	            		<span>View Image</span>
	            	</div> 
          		</div> 
          	</a>
		<?php endforeach ?> 
	</div> 
<?php 
	$page = ob_get_contents();
    ob_end_clean(); 
    return $page;
} 
add_shortcode('projects_shortcodes', 'projects_shortcodes_query');


function portfolio_shortcodes_query(){
  ob_start(); 
  ?> 
	<?php foreach (portfolio_page() as $key => $value): ?> 
		<a class="portfolio-fancybox" data-fancybox-group="gallery" title="<?php echo $value['title']; ?>" href="<?php echo $value['image']; ?>">
			<div class="col-sm-4">
				<div class="img-portfolio-parent portfolio-override">
		            <div class="img-portfolio-child" style="background-image:url(<?php echo $value['image']; ?>);">
		            	<span>View Image</span>
		            </div> 
	          	</div> 
          	</div>
          </a>
	<?php endforeach ?>  
<?php 
	$page = ob_get_contents();
    ob_end_clean(); 
    return $page;
}
add_shortcode('portfolio_shortcodes', 'portfolio_shortcodes_query');


function work_experience_shortcodes_query(){
	ob_start();  
	foreach (work_experience() as $key => $value) { ?>
		<div class="work-list">
			<h3><?php echo $value['title']; ?></h3>
			<p><?php echo $value['content']; ?></p>
		</div>
	<?php }
	$page = ob_get_contents();
    ob_end_clean(); 
    return $page;
} 
add_shortcode('work_experience_shortcodes', 'work_experience_shortcodes_query');
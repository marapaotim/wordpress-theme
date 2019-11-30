<?php
require_once('portfolio.functions.php');
require_once('work_experience.functions.php');

function projects_shortcodes_query(){
  ob_start(); 
  ?>
	<div class="sidebar-module sidebar-module-inset" style="padding: 0px !important;">
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
		<!-- <h3>Programming FB Feeds</h3>
		<div class="border-title-sidebar"></div>
		<div style="height:300px;overflow-y:scroll;background:#f3f3f1;padding-top:15px">
			<?php foreach (_facebook_feeds() as $key => $value): ?>  
			<div class="col-sm-12" style="padding-bottom:30px;margin-bottom:30px;border-bottom:1px solid rgba(184,184,184,.3)">
				<div class="row">
				<img src="<?php echo get_site_url().'/wp-content/uploads/2018/04/20638198_1643259229078307_9197155913117190629_n.jpg'; ?>" class="img-responsive" style="height:50px;border-radius:50%;float:left;margin-right:10px"> 
					<h4 style="font-weight:bold;line-height:0.1"><a href="https://www.facebook.com/darktechph/" target="_blank">Programming</a></h4> <span><?php echo $value['created_time'] ?></span> <br><br>
				<p style="color:#747474"><?php echo $value['message']; ?></p>
				<a href="<?php echo $value['link']; ?>" target="_blank"><img src="<?php echo $value['image'];  ?>" style="width:100%"></a>
					<i class="fa fa-thumbs-o-up" aria-hidden="true"> <?php echo isset($value['likes']) ? $value['likes'] : 0; ?></i> <i class="fa fa-comment" aria-hidden="true"> <?php echo isset($value['comments']) ? $value['comments'] : 0; ?></i> <i class="fa fa-share-square" aria-hidden="true"> <?php echo isset($value['shares']) ? $value['shares'] : 0; ?></i>
				</div>
			</div> 
			<?php endforeach ?> 
		</div> -->
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
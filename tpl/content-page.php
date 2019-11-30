<div id="content" class="pageContent">
	<?php if (! is_front_page() ) { ?>  
	<h1 class="entry-title"><?php echo get_post_field('post_title') ?></h1>
	<div class="border-title"></div> 
	<?php } ?>
    <div class="entry-content-page">
        <?php echo apply_filters( 'the_content', get_post_field('post_content') ); ?>
    </div>
</div>

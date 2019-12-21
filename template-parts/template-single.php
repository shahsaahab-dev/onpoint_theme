<?php
global $onpoint_opt;
$sidebar_active_layout = 'col-lg-8';
$sidebar_inactive_layout = 'col-lg-12';
$layout = '';


if ($onpoint_opt['opt-blog-layout'] == '2') {
	$layout = $sidebar_inactive_layout;
}
else{
    $layout = $sidebar_active_layout;
}
?>
<div class="single-blog-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="<?php echo $layout;?>">
                    <h3 class="single-item-blog-title"><?php the_title(); ?></h3>
                    <div class="meta-info-single"><?php echo get_the_date(); ?> <span class="separator">|</span>By <?php echo get_the_author(); ?></div>
                    <div class="blog-single-img" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>)"></div>
                    <p>
					<?php 
					the_content();
					?>
                    </p>
                </div>
				<?php
				get_sidebar();
				?>
            </div>

        </div>
</div>
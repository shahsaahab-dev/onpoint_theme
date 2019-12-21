<?php

// Contact Blocks Shortcode 
add_shortcode('onpoint_blog_listings','onpoint_blog_listings_function');
function onpoint_blog_listings_function($atts , $content = null){
   extract(shortcode_atts(array(
    'post_type' => '',

   ), $atts));

   ob_start(); ?>

<style>
    

    .listing-wrapper {
        background: #fff;
        box-shadow: 5px 5px 10px #d9d9d9;
    }

    .listing-wrapper h3 {
        padding: 20px;
        text-transform: uppercase;
        font-family: PlayFair Display;
        text-align: center;
        position: relative;
        margin-top: 25px;
        font-size: 2em;
    }

    .listing-wrapper h3::before {
        content: "";
        background: #000;
        position: absolute;
        height: 4px;
        width: 125px;
        top: 0;
        left:33%;
    }

    .listing-wrapper p {
        padding: 0px 30px;
        font-size: 0.9em;
        color: #888888;
        font-weight: 300;
        line-height: 1.9em;
    }

    button.btn.onpoint-blog-listing-underlined {
        margin-left: 30px;
        margin-top: 20px;
        text-transform: uppercase;
        margin-bottom: 20px;
        border-bottom: 2px solid #000;
        border-radius: 0px;
        padding-right: 55px;
        padding-left: 0px;
    }

    button.btn.onpoint-blog-listing-underlined a {
        color: #000;
        text-decoration: none;
    }

    ul.social-listing-blog {
        padding: 0px;
        margin: 0px;
        list-style: none;
        position: absolute;
        left: 0;
        margin-left: -35px;
        bottom: 0;
    }

    .listing-wrapper {
        position: relative;
    }

    ul.social-listing-blog li {
        padding: 20px 0px;
    }

    ul.social-listing-blog li a {
        color: #000;
    }
</style>

<?php 
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'orderby' => 'date',
);
$query = new WP_Query($args);?>
<div class="row half-way">
<?php
if($query->have_posts()): while($query->have_posts()):$query->the_post();?>

<div class="col-lg-4">
    <div class="listing-wrapper">
        <div class="listing-img" style="background-color: #dadada;background-image:url(<?php echo get_the_post_thumbnail_url(); ?>);height: 270px;background-position: center;background-size: cover;"></div>
        <h3><?php echo get_the_title(); ?></h3>
        <p><?php echo get_the_excerpt(); ?></p>
        <button class="btn onpoint-blog-listing-underlined"><a href="<?php echo get_the_permalink(); ?>">Read More</a></button>
        <!-- <ul class="social-icons">
        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
        </ul> -->
    </div>
</div>

<?php 
endwhile; wp_reset_query(); endif;
?>
</div>
<?php
   return ob_get_clean();
}


// Register Wpbakery Element Now
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__('Blog Item','onpoint'),
        'base' => 'onpoint_blog_listings',
        'class' => '',
        'category' => 'OnPoint Elements',
        'params' => array(
            
        ),
    ));
}
?>
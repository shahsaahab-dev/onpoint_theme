<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package OnPoint
 */

?>

</div>
<footer class="footer-wrapper">
        <div class="footer-head">
            <div class="container">
                <div class="row">
                    <div class="col mx-auto">
                    <?php
                        $args = array(
                            'theme_location' => 'primary',
                        );
                        wp_nav_menu($args);
					
				    ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <h3><?php   echo get_bloginfo('name'); ?></h3>
                        <h5><?php   echo get_bloginfo('description'); ?></h5>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                       <p>© Everything Cheetah 2019 | Made With Love By Three Cheetahs</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    

<?php wp_footer(); ?>

</body>
</html>

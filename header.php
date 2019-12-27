<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package OnPoint
 */
global $onpoint_opt;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="main-wrapper">
    <div class="topbar-wrapper" style="background-color:<?php echo $onpoint_opt['topbar-bg-color']; ?>">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <div class="widget">
                        <h4><?php 
                        
                        if($onpoint_opt['header-widget-1']){echo $onpoint_opt['header-widget-1'];} 
                        
                        ?></h4>
                    </div>
                </div>
                <div class="col-4">
                    <div class="widget">
                        <h4><?php 
                        
                        if($onpoint_opt['header-wiget-2']){echo $onpoint_opt['header-wiget-2'];}
                        else{echo 'Widget 2';}
                        
                        ?></h4>
                    </div>
                </div>
                <div class="col-4">
                    <div class="widget">
                        <h4><?php 
                        
                        if($onpoint_opt['header-wiget-3']){echo $onpoint_opt['header-wiget-3'];} 
                        else{echo 'Widget 3';}
                        ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-navigation">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
				<?php
					$args = array(
						'theme_location' => 'primary',
					);
					wp_nav_menu($args);
					
				?>
                </div>
                <div class="col-lg-4">
                <?php 
                    if($onpoint_opt['opt-cart'] == '1'){
                        echo onpoint_mini_cart_display();
                    }
                    else{
                        echo '';
                    }
                     ?>
                    <form action="<?php echo home_url() . '/' ?>" method="get" autocomplete="off">
                          <div class="form-group">
                            <input type="text" name="s" onkeyup="fetchResults()" value="<?php the_search_query(); ?>" class="form-control search-custom" id="searchInput" placeholder="Search...">
                            <div id="datafetch"></div>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="main-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col mx-auto">
                    <h3><a href="<?php   echo get_bloginfo('url'); ?>"><?php   echo get_bloginfo('name'); ?></a></h3>
                    <h5><?php   echo get_bloginfo('description'); ?></h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Only -->
    <div class="mobile-menu">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <ul>
                        <li><button class="btn mobile-menu-btn"><i class="fa fa-list"></i></button></li>
                        <li><button class="btn close-menu-btn">&times;</button></li>
                        <li><h3>ON POINT</h3></li>
                    </ul>
                    <?php 
                    if($onpoint_opt['opt-cart'] == '1'){
                        echo onpoint_mini_cart_display();
                    }
                    else{
                        echo '';
                    }
                     ?>
                   
                </div>
            </div>
        </div>
    </div>
    <div class="menu-mobile">
		<?php
		$args = array(
			'theme_location' => 'primary',
		);
		wp_nav_menu($args);
		
		?>
    </div>
    
    <!-- End Mobile Only -->
<?php
// Dequeue Default WooCommerce Stylesheet
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
add_filter( 'woocommerce_before_variations_form', '__return_empty_array' );


// Remove Hooks

// Shop Page
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);

remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

remove_action('woocommerce_before_shop_loop','woocommerce_result_count',20);

remove_action('woocommerce_before_shop_loop','woocommerce_catalog_ordering',30);

remove_action('woocommerce_sidebar','woocommerce_get_sidebar',10);

// Product Loop
remove_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open',10);

remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10);

remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash',10);

remove_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail',10);

remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10);

remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10);

remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5);

// Single Product Display 
remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_images',20);

remove_action('woocommerce_single_product_summary','woocommerce_template_single_title',5);

remove_action('woocommerce_single_product_summary','woocommerce_template_single_rating',10);

remove_action('woocommerce_single_product_summary','woocommerce_template_single_price',10);

remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',20);

remove_action('woocommerce_single_product_summary','woocommerce_template_single_add_to_cart',30);

remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta',40);

remove_action('woocommerce_single_product_summary','woocommerce_template_single_sharing',50);

remove_action('woocommerce_after_single_product_summary','woocommerce_output_product_data_tabs',10);


// Cart Page




// Custom Hooks Added 
add_action('woocommerce_before_main_content','onpoint_before_content');

add_action('woocommerce_after_main_content','onpoint_after_content');

add_action('woocommerce_before_shop_loop','onpoint_before_loop');

add_action('woocommerce_shop_loop_item_title','onpoint_product_view');

add_action('woocommerce_single_product_summary','onpoint_single_product');

add_action('woocommerce_after_single_product_summary','onpoint_data_tabs');



// Cart page 
add_action('woocommerce_before_cart','onpoint_custom_cart_before');

add_action('woocommerce_after_cart','onpoint_custom_cart_after');

add_action('woocommerce_before_shipping_calculator','onpoint_cart_shipping_calc');


// Single Product page 


// Checkout Page 

add_filter('onpoint_change_heading','onpoint_heading_change_function');




// Custom Filters 
function onpoint_heading_change_function($data){
 echo '<h3 class="checkout-title" style="text-transform:uppercase">'. $data .'</h3>';
}

// Function For Custom Hooks
function onpoint_mini_cart_display(){?>
<button class="btn btn-cart">
    <i class="fa fa-shopping-cart"></i>
    <span class="qty"><?php  global $woocommerce; echo $woocommerce->cart->cart_contents_count; ?></span>
</button>
<?php
}


add_filter('woocommerce_add_to_cart_fragments','onpoint_update_qty',10,1);
function onpoint_update_qty(){
  $fragments['span.qty'] = '<span class="qty">' . WC()->cart->get_cart_contents_count() . '</span>';
  return $fragments;
}

// Shop Page
function onpoint_before_content(){
    echo '   
    <div class="wrapper product-listing-wrapper">
    <div class="container">
    ';
}
function onpoint_after_content(){
    echo '
    </div>
    </div>
    ';
}

function onpoint_before_loop(){?>
<div class="row">
    <div class="col text-left">
        <?php woocommerce_result_count(); ?>
    </div>
    <div class="col text-right">
        <p class="catalog">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="grid-tab" data-toggle="tab" href="#grid" role="tab"
                        aria-controls="grid" aria-selected="true"><i class="fa fa-th"></i></a>
                </li>
            </ul>
            <?php woocommerce_catalog_ordering(); ?>
        </p>
    </div>
</div>
<?php
}

function onpoint_product_view(){?>
<div class="product-item">
    <div class="product-img" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>)">
        <?php woocommerce_show_product_loop_sale_flash(); ?>
        <ul class="user-action">
            <li><i class="fa fa-search"></i></li>
            <li><?php echo do_shortcode('[ti_wishlists_addtowishlist]'); ?></li>
            <li><i class="fa fa-shopping-cart"></i></li>
        </ul>
    </div>
    <div class="product-content">
        <a href="<?php the_permalink(); ?>">
            <h5><?php the_title();  ?></h5>
        </a>
    </div>
    <div class="atc-price-button">
        <span class="atc"><?php woocommerce_template_loop_add_to_cart(); ?></span>
        <span class="separator">|</span>
        <span class="price"><?php woocommerce_template_loop_price(); ?></span>
    </div>
</div>

<?php
}


/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = 12;
  return $cols;

}


function onpoint_single_product(){?>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><?php echo get_the_title(); ?> <span class="separator">|</span><?php woocommerce_template_loop_price(); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="product-img"
                            style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>)"></div>
                    </div>
                    <div class="col-lg-7">
                    <p class="desc"><?php  echo get_the_content(); ?></p>
                    <div class="rating">
                        <?php echo wc_get_rating_html( $average, $rating_count ); // WPCS: XSS ok. ?>
                    </div>
                    <div class="review-count">
                        <?php 
                    $comments_count = wp_count_comments( get_the_id() ); 
                    $reviews_count = $comments_count->total_comments; 
                    echo $reviews_count . ' ' . 'Reviews';
                     ?>
                    </div>
                    <div class="stock-avbly">
                        <?php 
                        global $product; 
                        $numleft  = $product->get_stock_quantity(); 
                        if($numleft > 0){echo 'available in stock';}else{echo 'out of stock';}
                        ?>
                    </div>
                    <h5>Description</h5>
                    <p>
                        <?php 
                        $description = woocommerce_template_single_excerpt();
                        if(!empty($description)){
                            echo $description;
                        }
                        else{
                            echo 'This is a variable Product';
                        }
                        ?>
                    </p>
                    <div class="variation">
                        <h5>Variations</h5>
                        <?php 
                        $product = wc_get_product();
                        if ( $product->is_type( 'variable' ) ) {
                        $variations = $product->get_available_variations();
                        foreach ($variations as $key => $value){
                        $scs_wc_size = $value['attributes']['attribute_pa_size'];

                        echo  $scs_wc_size. ' ' . $value['price_html'].'<br/>';
                        }
                        }
                        ?>
                        <button class="variation-clickables">XS</button>
                        <button class="variation-clickables">S</button>
                        <button class="variation-clickables">M</button>
                        <button class="variation-clickables">L</button>
                        <button class="variation-clickables">XL</button>
                    </div>
                    <div class="quantity">
                        <h5>Quantity</h5>
                        <?php woocommerce_template_single_add_to_cart(); ?>
                    </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="product-details-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="slider slider-single">
                    <?php
                    global $product;
                    if ( $product->is_type( 'variable' ) ){
                        $attachment_ids = $product->get_gallery_attachment_ids();

                        foreach( $attachment_ids as $attachment_id ) {
                            $image_link = wp_get_attachment_url( $attachment_id );
                            echo '
                            <div class="product-img" style="background-image:url('.$image_link.');">
                            <ul class="user-action">
                                <li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                <i class="fa fa-search"></i>
                              </button></li>
                                <li>'. do_shortcode('[ti_wishlists_addtowishlist]') .'</i></li>
                            </ul>
                        </div>
                            ';
                        }
                    }

                    else{
                        
                        $image_url = get_the_post_thumbnail_url();
                        echo '
                        
                            <div class="product-img" style="background-image:url('.$image_url.');">
                            <ul class="user-action">
                            <li><button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter">
                                <i class="fa fa-search"></i>
                              </button></li>
                                <li>'. do_shortcode('[ti_wishlists_addtowishlist]') .'</i></li>
                            </ul>
                        </div>
                            ';
                    }
                ?>

                </div>
                <div class="slider slider-nav">
                    <?php
                    global $product;

                    $attachment_ids = $product->get_gallery_attachment_ids();

                    foreach( $attachment_ids as $attachment_id ) {
                        $image_link = wp_get_attachment_url( $attachment_id );
                        echo '<div class="product-img-details" style="background-image:url('.$image_link.'); height:99px;"></div>';
                    }
                ?>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="product-details-content">
                    <h4><?php the_title(); ?></h4>
                    <span class="price"><?php woocommerce_template_single_price(); ?></span>
                    <div class="rating">
                        <?php echo wc_get_rating_html( $average, $rating_count ); // WPCS: XSS ok. ?>
                    </div>
                    <div class="review-count">
                        <?php 
                    $comments_count = wp_count_comments( get_the_id() ); 
                    $reviews_count = $comments_count->total_comments; 
                    echo $reviews_count . ' ' . 'Reviews';
                     ?>
                    </div>
                    <div class="stock-avbly">
                        <?php 
                        global $product; 
                        $numleft  = $product->get_stock_quantity(); 
                        if($numleft > 0){echo 'available in stock';}else{echo 'out of stock';}
                        ?>
                    </div>
                    <h5>Description</h5>
                    <p>
                        <?php 
                        $description = woocommerce_template_single_excerpt();
                        if(!empty($description)){
                            echo $description;
                        }
                        else{
                            echo 'This is a variable Product';
                        }
                        ?>
                    </p>
                    <div class="variation">
                        <h5>Variations</h5>
                        <?php 
                        $product = wc_get_product();
                        if ( $product->is_type( 'variable' ) ) {
                        $variations = $product->get_available_variations();
                        foreach ($variations as $key => $value){
                        $scs_wc_size = $value['attributes']['attribute_pa_size'];

                        echo  $scs_wc_size. ' ' . $value['price_html'].'<br/>';
                        }
                        }
                        ?>
                        <button class="variation-clickables">XS</button>
                        <button class="variation-clickables">S</button>
                        <button class="variation-clickables">M</button>
                        <button class="variation-clickables">L</button>
                        <button class="variation-clickables">XL</button>
                    </div>
                    <div class="quantity">
                        <h5>Quantity</h5>
                        <?php woocommerce_template_single_add_to_cart(); ?>
                    </div>
                    <div class="extra-info">
                        <strong>Product Number:</strong><?php global $product; echo 'SKU: ' . $product->get_sku(); ?>
                        <br>
                        <strong>Category:</strong>
                        <?php
                        // Priting the Category Text Here
                        global $product;
                        $product_cats_ids = wc_get_product_term_ids( $product->get_id(), 'product_cat' );
                        foreach( $product_cats_ids as $cat_id ) {
                            $term = get_term_by( 'id', $cat_id, 'product_cat' );
                        
                            echo $term->name;
                        }
                        ?>

                        <br>
                        <?php ?>
                        <strong>Tags</strong>
                        <?php
                        $terms = get_terms( 'product_tag' );
                        $term_array = array();
                        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                            foreach ( $terms as $term ) {
                                $term_array[] = $term->name;
                                implode($term_array,'-');
                            }
                        }
                        ?>
                        <br>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php

}

function onpoint_data_tabs(){?>
<div class="product-tabs-wrapper">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#description" role="tab"
                    aria-controls="home" aria-selected="true">Product Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#comments" role="tab"
                    aria-controls="profile" aria-selected="false">Customer Reviews</a>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="home-tab">
                <?php the_content(); ?>
            </div>
            <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="profile-tab">
                <?php 
              comments_template();
            ?>
            </div>
        </div>
    </div>
</div>
<?php
}

// Checkout Page
function onpoint_custom_cart_before(){
echo ' <div class="cart-wrapper wrapper">
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mx-auto">';
}

function onpoint_custom_cart_after(){
    echo '
    </div>
    </div>
    </div>
    </div>';
}

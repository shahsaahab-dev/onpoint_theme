<?php

// Call to Action Shortcode 
add_shortcode('subscription_element','subscription_element_function');
function subscription_element_function($atts , $content = null){
   extract(shortcode_atts(array(
    'background_color' => '',
    'heading_text' => '',
    'subheading_text' => '',
   ), $atts));

   ob_start(); ?>
    <style>

.subscription-wrapper {
    background: <?php echo esc_attr($background_color); ?>;
}

.subscription-form-side {
    width: 50%;
    background: #e9e3d8;
    height: 400px;
}

.sub-table {
    display: table;
    width: 100%;
    height: 100%;
}

.sub-table-cell {
    display: table-cell;
    vertical-align: middle;
    width: 100%;
    text-align: center;
}

.subscription-form-side h4 {
    font-family: Playfair Display;
    text-transform: uppercase;
    font-size: 2.7em;
    color: #000!important;
}

.subscription-form-side h5 {
    color: #84663a;
}

.subscription-form-side h5 {
    font-weight: 300;
    text-transform: uppercase;
    letter-spacing: 0.5em;
    font-size: 1em;
    color: #84663a!important;
}

.subscription-wrapper .mc4wp-form-fields {display: inline-flex;}

.subscription-wrapper input {
    height: 40px;
    width: 250px;
    margin-top: 20px;
}

.subscription-wrapper input[type="submit"]{
    width:100px;
    border-radius: 0px;
    background: #000;
    color: #fff;
    text-transform: uppercase;
    font-size: 1em;
}

@media (max-width:992px){
    .subscription-form-side{
        width:100%;
    }
}
    </style>

<div class="subscription-wrapper">
    <div class="subscription-form-side">
        <div class="sub-table">
            <div class="sub-table-cell">
                <h4><?php echo esc_attr($heading_text); ?></h4>
                <h5><?php echo esc_attr($subheading_text); ?></h5>
                <?php echo do_shortcode('[mc4wp_form id="22"]'); ?>
            </div>
        </div>
    </div>
</div>
<?php
   return ob_get_clean();
}


// Register Wpbakery Element Now
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__('Subscription Form','onpoint'),
        'base' => 'subscription_element',
        'class' => '',
        'category' => 'OnPoint Elements',
        'params' => array(
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Subscription Form Background Color','onpoint'),
                'class' => '',
                'param_name' => 'background_color',
                'value' => '',
                'description' => esc_html__('Select Background Color of Your Subscriptio Form','onpoint'),

            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Heading Text','onpoint'),
                'class' => '',
                'param_name' => 'heading_text',
                'value' => '',
                'description' => esc_html__('Type Heading of Subscriptin Form ','onpoint'),

            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Subheading Text Subscription Form','onpoint'),
                'class' => '',
                'param_name' => 'subheading_text',
                'value' => '',
                'description' => esc_html__('Subheading text For Subscription Form','onpoint'),

            ),
        ),
    ));
}
?>
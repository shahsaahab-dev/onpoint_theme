<?php

// Contact Blocks Shortcode 
add_shortcode('contact_blocks','contact_blocks_function');
function contact_blocks_function($atts , $content = null){
   extract(shortcode_atts(array(
    'phone_icon' => '',
    'phone_text' => '',
    'phone_number' => '',

    'email_icon' => '',
    'email_text' => '',
    'email_address' => '',

    'location_icon' => '',
    'location_text' => '',
    'addresses' => '',

   ), $atts));

   ob_start(); ?>
<style>
.block-contact {
    border: 1px solid #d9d9d9;
    padding: 15px 40px;
    cursor:pointer;
}

.icon {
    display: inline-block;
}

.block-contact .content {
    display: inline-block;
    text-align: left;
    margin-left: 20px;
}

.block-contact .icon {
    font-size: 2em;
}

.block-contact .content p {
    margin: 0px;
    padding: 0px;
}

.block-contact .content h5 {
    font-family: Playfair Display;
    font-weight: 400;
    font-size: 1.5em;
}

.block-contact .icon i.fa {
    position: relative;
    top: -10px;
}

.block-contact:hover {
    background: #ddd2b8 !important;
    transition: all .4s ease-in;
}

.block-contact:hover i.fa {
    color: #fff;
    transition: all .3s ease-in;
}

</style>
<div class="row">
    <div class="col-lg-4">
        <div class="block-contact">
            <div class="icon">
            <i class="fa fa-phone"></i>
            </div>
            <div class="content">
            <h5><?php echo esc_attr($phone_text); ?></h5>
            <p><?php echo esc_attr($phone_number); ?></p>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="block-contact">
            <div class="icon">
            <i class="fa fa-envelope"></i>
            </div>
            <div class="content">
            <h5><?php echo esc_attr($email_text); ?></h5>
            <p><?php echo esc_attr($email_address); ?></p>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="block-contact">
            <div class="icon">
            <i class="fa fa-map-marker"></i>
            </div>
            <div class="content">
            <h5><?php echo esc_attr($location_text); ?></h5>
            <p><?php echo esc_attr($addresses); ?></p>
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
        'name' => esc_html__('Contact Blocks','onpoint'),
        'base' => 'contact_blocks',
        'class' => '',
        'category' => 'OnPoint Elements',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Enter Phone Text','onpoint'),
                'class' => '',
                'param_name' => 'phone_text',
                'value' => '',
                'description' => esc_html__('Enter Phone Text','onpoint'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Enter Phone Number','onpoint'),
                'class' => '',
                'param_name' => 'phone_number',
                'value' => '',
                'description' => esc_html__('Enter Phone Number','onpoint'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Enter Email Text','onpoint'),
                'class' => '',
                'param_name' => 'email_text',
                'value' => '',
                'description' => esc_html__('Enter Email Text','onpoint'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Enter Email Address','onpoint'),
                'class' => '',
                'param_name' => 'email_address',
                'value' => '',
                'description' => esc_html__('Enter Email Address','onpoint'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Enter Location Text','onpoint'),
                'class' => '',
                'param_name' => 'location_text',
                'value' => '',
                'description' => esc_html__('Enter Location Text','onpoint'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Enter Location Address','onpoint'),
                'class' => '',
                'param_name' => 'addresses',
                'value' => '',
                'description' => esc_html__('Enter Location Address','onpoint'),
            ),
        ),
    ));
}
?>
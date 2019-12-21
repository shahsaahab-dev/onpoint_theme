<?php

// Call to Action Shortcode 
add_shortcode('call_to_action','call_to_action_function');
function call_to_action_function($atts , $content = null){
   extract(shortcode_atts(array(
    'background_image' => '',
    'background_color' => '#eaeaea',
    'heading' => '',
    'sub_heading' => '',
    'text' => '',
    'button_text' => '',
    'button_link' => '',
   ), $atts));
   $background_image_url = wp_get_attachment_url($background_image,'full');
   $button_url = vc_build_link($button_link);

   ob_start(); ?>
   <style>


.call-to-action-bg {
    
    background: <?php echo esc_attr($background_color); ?>;
    background-image:url(<?php echo esc_attr($background_image_url); ?>);
    background-position:center;
    background-size:cover;
    height: 400px;
}.cta-table {
    display: table;
    width: 100%;
    height: 100%;
}.cta-tablecell {
    display: table-cell;
    vertical-align: middle;
    height: 100%;
}.call-to-action-wrapper button{
    margin-top:25px;
}.call-to-action-wrapper button a{
color:#000;
text-decoration:none;
transition:all .3s ease-in;
}.call-to-action-wrapper button:hover a{
    color:#fff;
    transition:all .3s ease-in;
}.call-to-action-wrapper h3 {
    font-size: 2.5em;
    font-family: Playfair Display;
}.call-to-action-wrapper h5 {
    text-transform: uppercase;
    font-weight: 400;
    letter-spacing: 6px;
    font-size: 1em;
    color: #84663a;
}.call-to-action-wrapper p {
    line-height: 2em;
    margin-top: 20px;
    color: #4d4d4d;
}
</style>
<div class="call-to-action-wrapper">
    <div class="call-to-action-bg">
        <div class="cta-table">
            <div class="cta-tablecell">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mx-auto text-center">
                            <h3><?php echo esc_attr($heading); ?></h3>
                            <h5><?php echo esc_attr($sub_heading); ?></h5>
                            <p><?php echo esc_attr($text); ?></p>
                            <button class="onpoint-btn-1"><a href="<?php echo esc_attr($button_url['url']); ?>"><?php echo esc_attr($button_text); ?></a></button>
                        </div>
                    </div>
                </div>
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
        'name' => esc_html__('Call To Action','onpoint'),
        'base' => 'call_to_action',
        'class' => '',
        'category' => 'OnPoint Elements',
        'params' => array(
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Call to Action Background Color','onpoint'),
                'class' => '',
                'param_name' => 'background_color',
                'value' => '',
                'description' => esc_html__('Select Background Color of Your Call to Action','onpoint'),

            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Call to Action Background Image','onpoint'),
                'class' => '',
                'param_name' => 'background_image',
                'value' => '',
                'description' => esc_html__('Select Background Image of Your Call to Action','onpoint'),

            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Call to Action Heading','onpoint'),
                'class' => '',
                'param_name' => 'heading',
                'value' => '',
                'description' => esc_html__('Enter Heading of Your Call to Action','onpoint'),

            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Call to Action Sub-Heading','onpoint'),
                'class' => '',
                'param_name' => 'sub_heading',
                'value' => '',
                'description' => esc_html__('Enter SubHeading of Your Call to Action','onpoint'),

            ),
            array(
                'type' => 'textarea',
                'heading' => esc_html__('Call to Action Text','onpoint'),
                'class' => '',
                'param_name' => 'text',
                'value' => '',
                'description' => esc_html__('Enter Text of Your Call to Action','onpoint'),

            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Call to Action Button Text','onpoint'),
                'class' => '',
                'param_name' => 'button_text',
                'value' => '',
                'description' => esc_html__('Enter Text of Your Call to Action Button','onpoint'),

            ),
            array(
                'type' => 'vc_link',
                'heading' => esc_html__('Call to Action Button Link','onpoint'),
                'class' => '',
                'param_name' => 'button_link',
                'value' => '',
                'description' => esc_html__('Enter Text of Your Call to Action Link','onpoint'),

            ),
        ),
    ));
}
?>
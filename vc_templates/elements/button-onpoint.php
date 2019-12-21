<?php

// Contact Blocks Shortcode 
add_shortcode('onpoint_btn','onpoint_btn_function');
function onpoint_btn_function($atts , $content = null){
   extract(shortcode_atts(array(
    'button_bg_color' => '',
    'button_text_color' => '',
    'button_text' => '',
    'button_link' => '',
    'button_hover_bg_color' => '',
    'button_hover_text_color' => '',
    'button_extra_class' => '',
   ), $atts));
   $button_url = vc_build_link($button_link);

   ?>
   <style>
   button.vc_create_button_onpoint{
       background-color:<?php echo esc_attr($button_bg_color); ?>;
       
   }

   button.vc_create_button_onpoint a{
    color:<?php echo esc_attr($button_text_color); ?>;
   }

   button.vc_create_button_onpoint:hover{
       background-color:<?php echo esc_attr($button_hover_bg_color); ?>;
       color:<?php echo esc_attr($button_hover_text_color); ?>;
   }

   button.vc_create_button_onpoint:hover a{
       color:<?php echo esc_attr($button_hover_text_color); ?>;
   }
   </style>
   <?php
   ob_start(); ?>
   <button class="vc_create_button_onpoint <?php echo esc_attr($button_extra_class); ?>">
       <a href="<?php esc_attr($button_url['url']); ?>"><?php echo esc_attr($button_text); ?></a>
   </button>

<?php
   return ob_get_clean();
}


// Register Wpbakery Element Now
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__('OnPoint Button','onpoint'),
        'base' => 'onpoint_btn',
        'class' => '',
        'category' => 'OnPoint Elements',
        'params' => array(
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Button Background Color','onpoint'),
                'class' => '',
                'param_name' => 'button_bg_color',
                'value' => '',
                'description' => esc_html__('Select Background Color of Your Button','onpoint'),

            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Button Text Color','onpoint'),
                'class' => '',
                'param_name' => 'button_text_color',
                'value' => '',
                'description' => esc_html__('Select Text Color of Your Button','onpoint'),

            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Button Background Hover Color','onpoint'),
                'class' => '',
                'param_name' => 'button_hover_bg_color',
                'value' => '',
                'description' => esc_html__('Select Hover Background Color of Your Button','onpoint'),

            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Button Text Hover Color','onpoint'),
                'class' => '',
                'param_name' => 'button_hover_text_color',
                'value' => '',
                'description' => esc_html__('Select Hover Text Color of Your Button','onpoint'),

            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Button Text','onpoint'),
                'class' => '',
                'param_name' => 'button_text',
                'value' => '',
                'description' => esc_html__('Enter Text of Your Button','onpoint'),

            ),
            array(
                'type' => 'vc_link',
                'heading' => esc_html__('Button Link','onpoint'),
                'class' => '',
                'param_name' => 'button_link',
                'value' => '',
                'description' => esc_html__('Enter Link of Your Button','onpoint'),

            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Extra Class','onpoint'),
                'class' => '',
                'param_name' => 'button_extra_class',
                'value' => '',
                'description' => esc_html__('Enter Extra Class of Your Button','onpoint'),

            ),
        ),
    ));
}
?>
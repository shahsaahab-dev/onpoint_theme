<?php 

function onpoint_demo_import(){
    $img_demo =  get_template_directory() . 'screenshot.png';
    return array(
        array(
            'import_file_name' => 'Demo Import 1',
            'categories' => array('New Category','Old Category'),
            'local_import_file' => trailingslashit(get_template_directory()) . '/demo-import/onpoint.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . '/demo-import/onpoint-widgets.wie',
            'local_import_customizer_file' => trailingslashit(get_template_directory()) . '/demo-import/onpoint-customizer.dat',
            'import_preview_image_url' => trailingslashit(get_template_directory()) . 'screenshot.png',
            'import_notice' => __(' This is the Demo 1 of Onpoint, More Coming Soon...', 'onpoint_theme'),
        ),
    );
}
add_filter('pt-ocdi/import_files','onpoint_demo_import');


function further_import_settings(){
    $front_page = get_page_by_title('Home');
    $blog_page_id = get_page_by_title('Blog');

    update_option('show_on_front','page');
    update_option('page_on_front', $front_page->ID);
    update_option('page_for_posts', $blog_page_id->ID);
}

add_action('pt-ocdi/after_import','further_import_settings');

?>
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


?>
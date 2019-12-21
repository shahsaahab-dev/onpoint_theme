<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package OnPoint
 */

if(is_single()){
    get_template_part('template-parts/template','single');
}
else{
    get_template_part('template-parts/template','archive');
}


?>


    
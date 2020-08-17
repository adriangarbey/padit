<?php
/*
Plugin Name: Contenido Redes sociales
Plugin URI: https://www.enoc.cu
Description: Muestra shortcode con el contenido.
Version: 1.0.0
Author: @fihav
Author URI: https://twitter.com/enoc
Text Domain: redes-sociales
*/


function construir_shortcode_redes_sociales($atts)
{
    $output = '';

	$query = new WP_Query(array(
		'post_type' => 'red_social',
		'posts_per_page' => 50,
		'post_status' => 'publish',
	));
    $posts = $query->posts;
    $cantidad = $query->post_count;
    if ($cantidad != 0):
        foreach ($posts as $element) {
            $id = $element->ID;
	        $output .= '<div class="header-social-item"><a href="'.get_field( 'red_social_enlace', $id )['url'].'" rel="external" target="_blank" title="'.get_the_title($id).'">'.wp_get_attachment_image( get_field( 'red_social_icono', $id ) ).'</a></div>';
        }
    endif;
    return $output;
}

add_shortcode('redes_sociales', 'construir_shortcode_redes_sociales');

<?php

function padit_theme_support() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Custom background color.
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'f5efe0',
		)
	);

	// Set content-width.
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 580;
	}

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	set_post_thumbnail_size( 1200, 9999 );

	// Add custom image size used in Cover Template.
	add_image_size( 'blog-principal-article', 455, 550, true );
	add_image_size( 'noticias-home', 360, 285, true );
	add_image_size( 'slide-home', 940, 630, true );
	add_image_size( 'slide-territorio', 810, 500, true );
	add_image_size( 'imagen-territorio-municipal', 820, 780, true );
	add_image_size( 'agenda-slide', 730, 530, true );
	add_image_size( 'ods-icon', 140, 140, true );
	add_image_size( 'ods-image', 380, 500, true );
	// Custom logo.
	$logo_width  = 147;
	$logo_height = 36;

	// If the retina setting is active, double the recommended width and height.
	if ( get_theme_mod( 'retina_logo', false ) ) {
		$logo_width  = floor( $logo_width * 2 );
		$logo_height = floor( $logo_height * 2 );
	}

	add_theme_support(
		'custom-logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		)
	);

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'favicon' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Twenty Twenty, use a find and replace
	 * to change 'twentytwenty' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'padit' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

}

add_action( 'after_setup_theme', 'padit_theme_support' );


/**
 * Register and Enqueue Styles.
 */
function padit_register_styles() {

	wp_enqueue_style( 'tooltipster-style', get_template_directory_uri() . '/vendors/tooltipster/tooltipster.bundle.min.css' );
	wp_enqueue_style( 'tooltipster-sidetip-style', get_template_directory_uri() . '/vendors/tooltipster/tooltipster-sideTip-punk.min.css' );
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/vendors/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'padit-style', get_stylesheet_uri(), array() );
	wp_enqueue_style( 'animate-style', get_stylesheet_directory_uri() . '/vendors/animate/animate.css' );
	wp_enqueue_style( 'owl-carousel-default-style', get_stylesheet_directory_uri() . '/vendors/jcarousel/owl.theme.default.min.uic.css' );
	wp_enqueue_style( 'owl-carousel-style', get_stylesheet_directory_uri() . '/vendors/jcarousel/owl.carousel.min.uic.css' );

}

add_action( 'wp_enqueue_scripts', 'padit_register_styles' );

function padit_login_stylesheet() {
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-1.12.2.min.js' );
	wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/assets/css/style-login.css', array() );
	wp_enqueue_script( 'login-js', get_template_directory_uri() . '/assets/js/login-scripts.js' );
	wp_localize_script( 'login-js', 'home_url', esc_url( home_url( '/' ) ) );
}

add_action( 'login_enqueue_scripts', 'padit_login_stylesheet' );

/**
 * Register and Enqueue Scripts.
 */
function padit_register_scripts() {

	wp_enqueue_script( 'svg-pan-js', get_template_directory_uri() . '/vendors/svg-pan-zoom/jquery.svg.pan.zoom.js' );
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-1.12.2.min.js' );
	wp_enqueue_script( 'tooltipster-js', get_template_directory_uri() . '/vendors/tooltipster/tooltipster.bundle.min.js' );
	wp_enqueue_style( 'select2-style', get_template_directory_uri() . '/vendors/select2/select2.min.css' );
	wp_enqueue_script( 'select2-js', get_template_directory_uri() . '/vendors/select2/select2.min.js' );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/vendors/bootstrap/js/bootstrap.min.js' );
	wp_enqueue_script( 'owl-js', get_template_directory_uri() . '/vendors/jcarousel/owl.carousel.min.js' );
	wp_enqueue_script( 'prettyembed-js', get_template_directory_uri() . '/vendors/prettyembed/jquery.prettyembed.min.js' );
	wp_enqueue_script( 'nicescroll-js', get_template_directory_uri() . '/vendors/jquery.nicescroll/jquery.nicescroll.min.js' );
	wp_enqueue_script( 'padit-js', get_template_directory_uri() . '/assets/js/scripts.js' );
	wp_script_add_data( 'padit-js', 'async', true );
	wp_localize_script('padit-js', 'admin_url', admin_url() );
	wp_localize_script('padit-js', 'data_map', data_map() );
	wp_localize_script('padit-js', 'security_search', wp_create_nonce('enoc_search_wfc7'));
	wp_localize_script('padit-js', 'security_search_herramientas', wp_create_nonce('enoc_search_wfc7her'));

	if ( is_front_page() ): $front = 'true';
	else: $front = 'false'; endif;
	wp_localize_script( 'padit-js', 'is_home', $front );
	wp_localize_script( 'padit-js', 'home_url', esc_url( home_url( '/' ) ) );
	wp_localize_script('padit-js', 'security', wp_create_nonce('contact_form_18fh4maj'));
	wp_localize_script( 'padit-js', 'admin_url', admin_url());
}

add_action( 'wp_enqueue_scripts', 'padit_register_scripts' );

function admin_style() {
	$user = wp_get_current_user();
	if ( !in_array( 'administrator', (array) $user->roles ) ) {
		wp_enqueue_style('admin-styles', get_template_directory_uri() . '/assets/css/admin-styles.css');
	}
}
add_action('admin_enqueue_scripts', 'admin_style');

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function padit_menus() {

	$locations = array(
		'main_menu' => __( 'Menú principal', 'padit' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'padit_menus' );

/**
 * Get the information about the logo.
 *
 * @param string $html The HTML output from get_custom_logo (core function).
 *
 * @return string $html
 */
function padit_get_custom_logo( $html ) {

	$logo_id = get_theme_mod( 'custom_logo' );

	if ( ! $logo_id ) {
		return $html;
	}

	$logo = wp_get_attachment_image_src( $logo_id, 'full' );

	if ( $logo ) {
		// For clarity.
		$logo_width  = esc_attr( $logo[1] );
		$logo_height = esc_attr( $logo[2] );

		// If the retina logo setting is active, reduce the width/height by half.
		if ( get_theme_mod( 'retina_logo', false ) ) {
			$logo_width  = floor( $logo_width / 2 );
			$logo_height = floor( $logo_height / 2 );

			$search = array(
				'/width=\"\d+\"/iU',
				'/height=\"\d+\"/iU',
			);

			$replace = array(
				"width=\"{$logo_width}\"",
				"height=\"{$logo_height}\"",
			);

			// Add a style attribute with the height, or append the height to the style attribute if the style attribute already exists.
			if ( strpos( $html, ' style=' ) === false ) {
				$search[]  = '/(src=)/';
				$replace[] = "style=\"height: {$logo_height}px;\" src=";
			} else {
				$search[]  = '/(style="[^"]*)/';
				$replace[] = "$1 height: {$logo_height}px;";
			}

			$html = preg_replace( $search, $replace, $html );

		}
	}

	return $html;

}

add_filter( 'get_custom_logo', 'padit_get_custom_logo' );

if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Shim for wp_body_open, ensuring backwards compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

/**
 * Add ACF options pages.
 *
 * @link
 */

function change_territorio_id_del_mapa_acf_load_field( $field ) {
	$field['instructions'] = 'Usted puede ver la <a target="blank" href="' . esc_url( home_url( '/' ) ) . '/guia-de-identificadores">Guía de identificadores</a> para saber cual id debe otorgar a este territorio.';
	return $field;
}
add_filter( 'acf/load_field/name=territorio_id_del_mapa', 'change_territorio_id_del_mapa_acf_load_field' );

function change_iniciativas_acf_load_field( $field ) {
	$field['instructions'] = 'Usted puede <a target="blank" href="' . esc_url( home_url( '/' ) ) . 'wp-admin/edit.php?post_type=iniciativa">crear</a> nuevas iniciativas en otra página y buscarlas aquí.';
	return $field;
}
add_filter( 'acf/load_field/name=territorio_iniciativas', 'change_iniciativas_acf_load_field' );

function change_historias_acf_load_field( $field ) {
	$field['instructions'] = 'Usted puede <a target="blank" href="' . esc_url( home_url( '/' ) ) . 'wp-admin/edit.php?post_type=historia_de_vida">crear</a> nuevas historias de vida en otra página y buscarlas aquí.';
	return $field;
}
add_filter( 'acf/load_field/name=territorio_historias_de_vida', 'change_historias_acf_load_field' );


function metas_seo() {
	global $wp;
	$output = '';
	$output .= '<meta name="keywords" content="' . get_post_field( 'meta_keywords', get_the_ID() ) . '"/>';
	echo $output;
}

add_action( 'wp_head', 'metas_seo' );

add_filter( 'get_avatar', 'padit_custom_profiles_avatar', 10, 5 );
function padit_custom_profiles_avatar( $avatar, $id_or_email, $size, $default, $alt ) {

	$avatar = "<img alt='' src='" . get_stylesheet_directory_uri() . "/assets/images/default_user.png" . "' class='avatar avatar-photo' height='70px' width='70px' />";

	return $avatar;
}

function data_map(){
	$array = array();
	$query    = new WP_Query( array(
		'post_type'      => 'territorio',
		'posts_per_page' => 999,
		'post_status'    => 'publish',
	) );
	$posts    = $query->posts;
	$cantidad = $query->post_count;
	foreach ( $posts as $element ):
		$id = $element->ID;
		$title = get_the_title($id);
		$map_id = get_field('territorio_id_del_mapa',$id);
		$fase = get_field('territorio_fase_de_la_provincia',$id);
		$color_mapa = get_field('territorio_color_en_mapa',$id);
		$mostrar_pin = get_field('mostrar_pin_de_padit',$id);
		if(!empty($map_id)){
			$array[$map_id] = array('title'=>$title, 'fase'=>$fase, 'color'=>$color_mapa,'url'=>get_permalink($id),'pin'=>$mostrar_pin);
		}
	 endforeach;
	$json =	json_encode($array);
	return $json;
}

add_action('wp_ajax_contact_form', 'contact_form');
add_action('wp_ajax_nopriv_contact_form', 'contact_form');
function contact_form()
{
	check_ajax_referer('contact_form_18fh4maj', 'security');
	if (isset($_POST['data'])) {
		parse_str($_POST['data'], $form_data);

		$land = true;
		$message = '';

		$telefono = sanitize_text_field($form_data['telefono']);
		if (empty($telefono)) {
			//$land = false;
		}

		$email = sanitize_text_field($form_data['email']);
		if (empty($email)) {
			//$land = false;
		} else {
			if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
				$land = false;
				$message .= ' Correo electrónico inválido. ';
			}
		}

		$mensaje = sanitize_text_field($form_data['mensaje']);
		if (empty($mensaje)) {
			$land = false;
		}

		$contactar = sanitize_text_field($form_data['contact-a']);
		if (empty($contactar)) {
			$land = false;
		} else {
			$contactar = explode('-',$contactar);
			if(filter_var($contactar[0], FILTER_VALIDATE_INT) == false){
				$land = false;
				$message .= ' Opción inválida detectada. ';
			}
			elseif(get_post_type($contactar[0])!=$contactar[1]){
				$land = false;
				$message .= ' Opción inválida detectada. ';
			}else{

			}
		}

		if ($land) {
			//Correo al coordinador
			$to = get_field('correo_de_contacto' , $contactar[0]);
			$subject = 'Contacto desde '.get_bloginfo('sitename') ;
			$email_message = 'Estimado Coordinador:<br/>Se le ha enviado un correo de contacto con los siguientes datos:<br/>';
			$email_message .= '<strong>Teléfono: </strong>'.$telefono.'<br/>';
			$email_message .= '<strong>Correo: </strong>'.$email.'<br/>';
			$email_message .= '<strong>Mensaje: </strong>'.$mensaje.'<br/><br/>';
			$email_message .= '<strong>'.get_bloginfo('sitename').'</strong>';
			$headers = array('Content-Type: text/html; charset=UTF-8');
			if(wp_mail($to, $subject, $email_message, $headers)){

			}else{
				$land = false;
				$message = ' No se pudo enviar el correo. Contacte con el administrador del sitio. ';
			}

			// Correo de respuesta automatica
			$to = $email;
			$subject = 'Contacto desde '.get_bloginfo('sitename');
			$email_message = get_field('respuesta_personalizada', $contactar[0], TRUE);
			$email_message = str_replace('@telefono', $telefono, $email_message);
			$email_message = str_replace('@email', $email, $email_message);
			$email_message = str_replace('@mensaje', $mensaje, $email_message);
			$email_message = str_replace('@site_name', get_bloginfo('sitename'), $email_message);
			$headers = array('Content-Type: text/html; charset=UTF-8');
			if(wp_mail($to, $subject, $email_message, $headers)){

			}else{
				$land = false;
				$message = ' No se pudo enviar el correo. Contacte con el administrador del sitio. ';
			}
		}
		if ($land) {
			echo json_encode(["answer" => 'true','message' => 'Su solicitud de contacto ha sido enviada.']);
		}
		if (!$land) {
			if(empty($message)): $message = 'El mensaje y el contacto son obligatorios.'; endif;
			echo json_encode(["answer" => 'false', 'message' => $message]);
		}
	} else {
		echo json_encode(["answer" => 'false', 'message' => 'Opción inválida detectada.']);
	}
	wp_die();
}

//add_filter( 'wp_get_nav_menu_items', 'custom_nav_menu_items', 20, 2 );
function custom_nav_menu_items( $items, $menu ){

	$query = new WP_Query(array(
		'post_type' => 'territorio',
		'posts_per_page' => 999,
		'post_status' => 'publish',
	));
	$pages = $query->posts;
	$count = 1;
	foreach ($pages as $page):
		$page_slug = get_permalink($page->ID);
		$title = get_the_title($page->ID);
		if(!empty($title)  && !empty($page_slug)){
			if ( $menu->slug == 'menu-principal' ){
				$order = 100000000 + $count;
				$items[] = _custom_nav_menu_item( $title, $page_slug, $order,50 );
			}
		}
		$count++;
	endforeach;
	return $items;
}

function _custom_nav_menu_item( $title, $url, $order, $parent=0 ){
	$item = new stdClass();
	$item->ID =  $order;
	$item->db_id = $item->ID;
	$item->title = $title;
	$item->url = $url;
	$item->menu_order = $order;
	$item->menu_item_parent = 50;
	$item->type = '';
	$item->object = '';
	$item->object_id = '';
	$item->classes = array();
	$item->target = '';
	$item->attr_title = '';
	$item->description = '';
	$item->xfn = '';
	$item->status = '';
	return $item;
}

function html_territorios_map(){
	$output = '';
	$output .= '';
		return $output;
}

function wpdocs_remove_menus(){
	$user = wp_get_current_user();
	if ( !in_array( 'administrator', (array) $user->roles ) ) {
		remove_menu_page( 'about.php' );
		remove_menu_page( 'edit-comments.php' );
		remove_menu_page( 'tools.php' );
		remove_menu_page( 'edit.php' );
		remove_menu_page( 'admin.php?page=file-renaming-on-upload' );
		remove_menu_page( 'options-general.php?page=file-renaming-on-upload' );
	}
}
add_action( 'admin_init', 'wpdocs_remove_menus' );


function padit_before_admin_bar_render(){
	$user = wp_get_current_user();
	if ( !in_array( 'administrator', (array) $user->roles ) ) {
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu( 'wp-admin-bar-wp-logo' );
		$wp_admin_bar->remove_menu('updates');
		$wp_admin_bar->remove_menu('wp-admin-bar-comments');
	}
}
add_action( 'wp_before_admin_bar_render', 'padit_before_admin_bar_render' );


function wp_get_duracion($duracion){
    if($duracion>=60){
	    $hours = floor($duracion/60);
	    $minutes = ($duracion%60);
	    $hours = $hours.'h';
	    if($minutes!=0): $minutes = ' '.$minutes.' min'; else: $minutes = ''; endif;
	    $duracion =  $hours.$minutes;
    }elseif($duracion>=1){
	    $minutes = ($duracion%60).' min';
	    $duracion =  $minutes;
    }else{
	    $duracion = '';
    }
    return $duracion;
}


add_action( 'edit_form_advanced', 'force_post_title' );
function force_post_title( $post )  {

	// List of post types that we want to require post titles for.
	$post_types = array(

	);

	// If the current post is not one of the chosen post types, exit this function.
	if (  in_array( $post->post_type, $post_types ) ) {
		return;
	}

	?>
	<script type='text/javascript'>
        ( function ( $ ) {
            $( document ).ready( function () {
                //Require post title when adding/editing Project Summaries
                $( 'body' ).on( 'submit.edit-post', '#post', function () {
                    // If the title isn't set
                    if ( $( "#title" ).val().replace( / /g, '' ).length === 0 ) {
                        // Show the alert
                        if ( !$( "#title-required-msj" ).length ) {
                            $( "#titlewrap" )
                                .append( '<div id="title-required-msj"><em>EL Título es obligatorio.</em></div>' )
                                .css({
                                    "padding": "5px",
                                    "margin": "5px 0",
                                    "background": "#ffebe8",
                                    "border": "1px solid #c00"
                                });
                        }
                        // Hide the spinner
                        $( '#major-publishing-actions .spinner' ).hide();
                        // The buttons get "disabled" added to them on submit. Remove that class.
                        $( '#major-publishing-actions' ).find( ':button, :submit, a.submitdelete, #post-preview' ).removeClass( 'disabled' );
                        // Focus on the title field.
                        $( "#title" ).focus();
                        return false;
                    }
                });
            });
        }( jQuery ) );
	</script>
	<?php
}

function initial_herramientas_load()
{
	$output = '';
	$array = array();
	$args = [
		'post_type' => [
			'herramienta',
		],
		'post_status' => [
			'publish',
		],
		'posts_per_page' => 6,
	];
	$news_query = new WP_Query($args);
	$total_pages = $news_query->max_num_pages;
	if ($total_pages > 1): $more = 1;
	else: $more = 0; endif;
	if ($news_query->post_count != 0) {
		foreach ($news_query->posts as $new):
			$post_ID = $new->ID;
			$title = get_the_title($post_ID);
			$document_url = wp_get_attachment_url(get_field('documento_herramenta', $post_ID));
			$coordinador = get_field('coordinador_herramienta', $post_ID);
			$descripcion = get_field('resumen_herramenta', $post_ID);
			$seccion = get_field('seccion_herramienta', $post_ID);
			$output .= '<div class="col-md-6 item-wrap"><div class="item">
                                    <div class="item-herramienta">
                                        <div class="item-herramienta-inner">
                                                <a download="" title="Descargar" class="item-herramienta-graphic-link herramienta-'.$seccion.'" href="'.$document_url.'">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100pt" height="100pt" viewBox="0 0 100 100" version="1.1"><g><path d="M 14 4 L 14 96 L 86 96 L 86 29.1875 L 85.4375 28.5625 L 61.4375 4.5625 L 60.8125 4 Z M 18 8 L 58 8 L 58 32 L 82 32 L 82 92 L 18 92 Z M 62 10.875 L 79.125 28 L 62 28 Z M 30 44 L 30 48 L 70 48 L 70 44 Z M 30 56 L 30 60 L 62 60 L 62 56 Z M 30 68 L 30 72 L 70 72 L 70 68 Z "/></g></svg>
                                                </a>
                                                <div class="item-herramienta-data">
                                                    <div class="item-herramienta-data-title">'.$title.'</div>';
                                                     if(!empty($coordinador)):
	                                                     $output .= '<div class="item-herramienta-data-corrdinador"><span>Coordinador: </span>'.$coordinador.'</div>';
                                                    endif;
	                                                 if(!empty($descripcion)):
                                                        $output .= '<div class="item-herramienta-data-descripcion">'.$descripcion.'</div>';
	                                                 endif;
                                                    $output .= '</div>';
                                                $output .= '<div class="item-herramienta-opciones d-flex align-items-center justify-content-between">
                                                    <a download="" title="Descargar" href="'.$document_url.'">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50pt" height="50pt" viewBox="0 0 50 50" version="1.1"><g><path d="M 21.875 6.25 L 21.875 29.039063 L 13.597656 20.777344 L 11.402344 22.972656 L 23.4375 35.023438 L 35.484375 22.972656 L 33.265625 20.777344 L 25 29.039063 L 25 6.25 Z M 9.375 40.625 L 9.375 43.75 L 37.5 43.75 L 37.5 40.625 Z "/></g></svg>
                                                    </a>
                                                    <a class="share-document" title="Compartir documento" href="#">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50pt" height="50pt" viewBox="0 0 50 50" version="1.1"><g><path d="M 39.0625 3.125 C 34.765625 3.125 31.25 6.640625 31.25 10.9375 C 31.25 11.472656 31.3125 11.988281 31.410156 12.5 L 17.25 18.871094 C 15.820313 16.917969 13.523438 15.625 10.9375 15.625 C 6.640625 15.625 3.125 19.140625 3.125 23.4375 C 3.125 27.734375 6.640625 31.25 10.9375 31.25 C 13.539063 31.25 15.855469 29.945313 17.273438 27.964844 L 31.445313 34.265625 C 31.324219 34.800781 31.25 35.363281 31.25 35.9375 C 31.25 40.234375 34.765625 43.75 39.0625 43.75 C 43.359375 43.75 46.875 40.234375 46.875 35.9375 C 46.875 31.640625 43.359375 28.125 39.0625 28.125 C 36.460938 28.125 34.144531 29.429688 32.726563 31.410156 L 18.554688 25.121094 C 18.675781 24.574219 18.75 24.011719 18.75 23.4375 C 18.75 22.851563 18.675781 22.277344 18.554688 21.726563 L 32.640625 15.355469 C 34.058594 17.40625 36.414063 18.75 39.0625 18.75 C 43.359375 18.75 46.875 15.234375 46.875 10.9375 C 46.875 6.640625 43.359375 3.125 39.0625 3.125 Z M 39.0625 6.25 C 41.675781 6.25 43.75 8.324219 43.75 10.9375 C 43.75 13.550781 41.675781 15.625 39.0625 15.625 C 36.449219 15.625 34.375 13.550781 34.375 10.9375 C 34.375 8.324219 36.449219 6.25 39.0625 6.25 Z M 10.9375 18.75 C 13.550781 18.75 15.625 20.824219 15.625 23.4375 C 15.625 26.050781 13.550781 28.125 10.9375 28.125 C 8.324219 28.125 6.25 26.050781 6.25 23.4375 C 6.25 20.824219 8.324219 18.75 10.9375 18.75 Z M 39.0625 31.25 C 41.675781 31.25 43.75 33.324219 43.75 35.9375 C 43.75 38.550781 41.675781 40.625 39.0625 40.625 C 36.449219 40.625 34.375 38.550781 34.375 35.9375 C 34.375 33.324219 36.449219 31.25 39.0625 31.25 Z "/></g></svg>
                                                    </a>
                                                </div>
                                                <div class="item-herramienta-opciones-open">
                                                    <div class="item-herramienta-opciones-open-inner d-flex align-items-center flex-wrap justify-content-center">
                                                        <div class="close"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.001 512.001" width="12px" height="12px" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve"><g><g><path d="M284.286,256.002L506.143,34.144c7.811-7.811,7.811-20.475,0-28.285c-7.811-7.81-20.475-7.811-28.285,0L256,227.717 L34.143,5.859c-7.811-7.811-20.475-7.811-28.285,0c-7.81,7.811-7.811,20.475,0,28.285l221.857,221.857L5.858,477.859 c-7.811,7.811-7.811,20.475,0,28.285c3.905,3.905,9.024,5.857,14.143,5.857c5.119,0,10.237-1.952,14.143-5.857L256,284.287 l221.857,221.857c3.905,3.905,9.024,5.857,14.143,5.857s10.237-1.952,14.143-5.857c7.811-7.811,7.811-20.475,0-28.285 L284.286,256.002z"/></g></g></svg></div>
                                                        <a class="share-mail" href="mailto:?Subject='.$title.'&Body='.$document_url.'">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g>	<g>		<polygon points="339.392,258.624 512,367.744 512,144.896   "/>	</g></g><g>	<g>		<polygon points="0,144.896 0,367.744 172.608,258.624   "/>	</g></g><g>	<g>		<path d="M480,80H32C16.032,80,3.36,91.904,0.96,107.232L256,275.264l255.04-168.032C508.64,91.904,495.968,80,480,80z"/>	</g></g><g>	<g>		<path d="M310.08,277.952l-45.28,29.824c-2.688,1.76-5.728,2.624-8.8,2.624c-3.072,0-6.112-0.864-8.8-2.624l-45.28-29.856    L1.024,404.992C3.488,420.192,16.096,432,32,432h448c15.904,0,28.512-11.808,30.976-27.008L310.08,277.952z"/>	</g></g></svg>
                                                        </a>
                                                        <a class="share-facebook" target="blank" href="http://www.facebook.com/sharer.php?u='.$document_url.'">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="m437 0h-362c-41.351562 0-75 33.648438-75 75v362c0 41.351562 33.648438 75 75 75h151v-181h-60v-90h60v-61c0-49.628906 40.371094-90 90-90h91v90h-91v61h91l-15 90h-76v181h121c41.351562 0 75-33.648438 75-75v-362c0-41.351562-33.648438-75-75-75zm0 0"/></svg>
                                                        </a>
                                                        <a class="share-twitter" target="blank" href="https://twitter.com/share?url='.$document_url.'&text='.$title.'">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -47 512.00203 512"><path d="m191.011719 419.042969c-22.140625 0-44.929688-1.792969-67.855469-5.386719-40.378906-6.335938-81.253906-27.457031-92.820312-33.78125l-30.335938-16.585938 32.84375-10.800781c35.902344-11.804687 57.742188-19.128906 84.777344-30.597656-27.070313-13.109375-47.933594-36.691406-57.976563-67.175781l-7.640625-23.195313 6.265625.957031c-5.941406-5.988281-10.632812-12.066406-14.269531-17.59375-12.933594-19.644531-19.78125-43.648437-18.324219-64.21875l1.4375-20.246093 12.121094 4.695312c-5.113281-9.65625-8.808594-19.96875-10.980469-30.777343-5.292968-26.359376-.863281-54.363282 12.476563-78.851563l10.558593-19.382813 14.121094 16.960938c44.660156 53.648438 101.226563 85.472656 168.363282 94.789062-2.742188-18.902343-.6875-37.144531 6.113281-53.496093 7.917969-19.039063 22.003906-35.183594 40.722656-46.691407 20.789063-12.777343 46-18.96875 70.988281-17.433593 26.511719 1.628906 50.582032 11.5625 69.699219 28.746093 9.335937-2.425781 16.214844-5.015624 25.511719-8.515624 5.59375-2.105469 11.9375-4.496094 19.875-7.230469l29.25-10.078125-19.074219 54.476562c1.257813-.105468 2.554687-.195312 3.910156-.253906l31.234375-1.414062-18.460937 25.230468c-1.058594 1.445313-1.328125 1.855469-1.703125 2.421875-1.488282 2.242188-3.339844 5.03125-28.679688 38.867188-6.34375 8.472656-9.511718 19.507812-8.921875 31.078125 2.246094 43.96875-3.148437 83.75-16.042969 118.234375-12.195312 32.625-31.09375 60.617187-56.164062 83.199219-31.023438 27.9375-70.582031 47.066406-117.582031 56.847656-23.054688 4.796875-47.8125 7.203125-73.4375 7.203125zm0 0"/></svg>
                                                        </a>
                                                        <a class="share-whatsapp" target="blank" href="https://api.whatsapp.com/send?text='.$document_url.'">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="m256 0c-140.609375 0-256 115.390625-256 256 0 46.40625 12.511719 91.582031 36.238281 131.105469l-36.238281 124.894531 124.894531-36.238281c39.523438 23.726562 84.699219 36.238281 131.105469 36.238281 140.609375 0 256-115.390625 256-256s-115.390625-256-256-256zm160.054688 364.167969-11.910157 11.910156c-16.851562 16.851563-55.605469 15.515625-80.507812 10.707031-82.800781-15.992187-179.335938-109.5625-197.953125-190.59375-9.21875-40.140625-4.128906-75.039062 9.183594-88.355468l11.910156-11.910157c6.574218-6.570312 17.253906-6.5625 23.820312 0l47.648438 47.652344c3.179687 3.179687 4.921875 7.394531 4.921875 11.90625s-1.742188 8.730469-4.921875 11.898437l-11.90625 11.921876c-13.125 13.15625-13.125 34.527343 0 47.652343l78.683594 77.648438c13.164062 13.164062 34.46875 13.179687 47.652343 0l11.910157-11.90625c6.148437-6.183594 17.632812-6.203125 23.832031 0l47.636719 47.636719c6.46875 6.441406 6.714843 17.113281 0 23.832031zm0 0"/></svg>
                                                        </a>
                                                        <a class="share-telegram" target="blank" href="https://telegram.me/share/url?url='.$document_url.'&text='.$title.'">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -31 512 512"><path d="m123.195312 260.738281 63.679688 159.1875 82.902344-82.902343 142.140625 112.976562 100.082031-450-512 213.265625zm242.5-131.628906-156.714843 142.941406-19.519531 73.566407-36.058594-90.164063zm0 0"/></svg>
                                                        </a>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div></div>';
		endforeach;
		$array['html'] = $output;
		$array['more'] = $more;
		return $array;
	} else {
		$array['html'] = '';
		$array['more'] = 0;
		return $array;
	}
}

add_action('wp_ajax_load_herramientas', 'load_herramientas');
add_action('wp_ajax_nopriv_load_herramientas', 'load_herramientas');
function load_herramientas()
{
	check_ajax_referer( 'enoc_search_wfc7her', 'security' );
	if (isset($_POST['data'])) {
		parse_str($_POST['data'], $form_data);
		$pager = $form_data['pager'];
		$name = $form_data['search_name'];
		$category = $form_data['categoria_select'];
		$output = '';


		if(!empty($category)){

			$cat_text = '';
		    foreach ($category as $cat){
		        if(!empty($cat)){
			        $cat_text .= $cat.",";
                }
            }

			$args = [
				'post_type' => [
					'herramienta',
				],
				'post_status' => [
					'publish',
				],
				'posts_per_page' => 6,
				'paged' => $pager,
				'tax_query' => array(
					array(
						'taxonomy' => 'tipo_herramienta',
						'field' => 'term_id',
						'terms' => [$cat_text],
					)
				)
			];
        }else{
			$args = [
				'post_type' => [
					'herramienta',
				],
				'post_status' => [
					'publish',
				],
				'posts_per_page' => 6,
				'paged' => $pager,
			];
        }

		if( ! empty( $name ) ){

			$parts = explode( ' ', $name );

			if( ! empty( $parts ) ){

				foreach( $parts as $part ){

					$args['meta_query'][] = [
						'relation' => 'OR',
						[
							'key' => 'coordinador_herramienta',
							'value' => $part,
							'compare' => 'LIKE',
						],
						[
							'key' => 'resumen_herramenta',
							'value' => $part,
							'compare' => 'LIKE',
						],
						[
							'key' => 'herramienta_title',
							'value' => $part,
							'compare' => 'LIKE',
						],
					];
				}
			}
		}

		$news_query = new WP_Query($args);
		$total_pages = $news_query->max_num_pages;
		if ($total_pages > $pager): $more = 1;
		else: $more = 0; endif;

		if ($news_query->post_count != 0) {
			foreach ($news_query->posts as $new):
				$post_ID = $new->ID;
				$title = get_the_title($post_ID);
				$document_url = wp_get_attachment_url(get_field('documento_herramenta', $post_ID));
				$coordinador = get_field('coordinador_herramienta', $post_ID);
				$descripcion = get_field('resumen_herramenta', $post_ID);
				$seccion = get_field('seccion_herramienta', $post_ID);
				$output .= '<div class="col-md-6 item-wrap"><div class="item">
                                    <div class="item-herramienta">
                                        <div class="item-herramienta-inner">
                                                <a download="" title="Descargar" class="item-herramienta-graphic-link herramienta-'.$seccion.'" href="'.$document_url.'">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100pt" height="100pt" viewBox="0 0 100 100" version="1.1"><g><path d="M 14 4 L 14 96 L 86 96 L 86 29.1875 L 85.4375 28.5625 L 61.4375 4.5625 L 60.8125 4 Z M 18 8 L 58 8 L 58 32 L 82 32 L 82 92 L 18 92 Z M 62 10.875 L 79.125 28 L 62 28 Z M 30 44 L 30 48 L 70 48 L 70 44 Z M 30 56 L 30 60 L 62 60 L 62 56 Z M 30 68 L 30 72 L 70 72 L 70 68 Z "/></g></svg>
                                                </a>
                                                <div class="item-herramienta-data">
                                                    <div class="item-herramienta-data-title">'.$title.'</div>';
				if(!empty($coordinador)):
					$output .= '<div class="item-herramienta-data-corrdinador"><span>Coordinador: </span>'.$coordinador.'</div>';
				endif;
				if(!empty($descripcion)):
					$output .= '<div class="item-herramienta-data-descripcion">'.$descripcion.'</div>';
				endif;
				$output .= '</div>';
				$output .= '<div class="item-herramienta-opciones d-flex align-items-center justify-content-between">
                                                    <a download="" title="Descargar" href="'.$document_url.'">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50pt" height="50pt" viewBox="0 0 50 50" version="1.1"><g><path d="M 21.875 6.25 L 21.875 29.039063 L 13.597656 20.777344 L 11.402344 22.972656 L 23.4375 35.023438 L 35.484375 22.972656 L 33.265625 20.777344 L 25 29.039063 L 25 6.25 Z M 9.375 40.625 L 9.375 43.75 L 37.5 43.75 L 37.5 40.625 Z "/></g></svg>
                                                    </a>
                                                    <a class="share-document" title="Compartir documento" href="#">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50pt" height="50pt" viewBox="0 0 50 50" version="1.1"><g><path d="M 39.0625 3.125 C 34.765625 3.125 31.25 6.640625 31.25 10.9375 C 31.25 11.472656 31.3125 11.988281 31.410156 12.5 L 17.25 18.871094 C 15.820313 16.917969 13.523438 15.625 10.9375 15.625 C 6.640625 15.625 3.125 19.140625 3.125 23.4375 C 3.125 27.734375 6.640625 31.25 10.9375 31.25 C 13.539063 31.25 15.855469 29.945313 17.273438 27.964844 L 31.445313 34.265625 C 31.324219 34.800781 31.25 35.363281 31.25 35.9375 C 31.25 40.234375 34.765625 43.75 39.0625 43.75 C 43.359375 43.75 46.875 40.234375 46.875 35.9375 C 46.875 31.640625 43.359375 28.125 39.0625 28.125 C 36.460938 28.125 34.144531 29.429688 32.726563 31.410156 L 18.554688 25.121094 C 18.675781 24.574219 18.75 24.011719 18.75 23.4375 C 18.75 22.851563 18.675781 22.277344 18.554688 21.726563 L 32.640625 15.355469 C 34.058594 17.40625 36.414063 18.75 39.0625 18.75 C 43.359375 18.75 46.875 15.234375 46.875 10.9375 C 46.875 6.640625 43.359375 3.125 39.0625 3.125 Z M 39.0625 6.25 C 41.675781 6.25 43.75 8.324219 43.75 10.9375 C 43.75 13.550781 41.675781 15.625 39.0625 15.625 C 36.449219 15.625 34.375 13.550781 34.375 10.9375 C 34.375 8.324219 36.449219 6.25 39.0625 6.25 Z M 10.9375 18.75 C 13.550781 18.75 15.625 20.824219 15.625 23.4375 C 15.625 26.050781 13.550781 28.125 10.9375 28.125 C 8.324219 28.125 6.25 26.050781 6.25 23.4375 C 6.25 20.824219 8.324219 18.75 10.9375 18.75 Z M 39.0625 31.25 C 41.675781 31.25 43.75 33.324219 43.75 35.9375 C 43.75 38.550781 41.675781 40.625 39.0625 40.625 C 36.449219 40.625 34.375 38.550781 34.375 35.9375 C 34.375 33.324219 36.449219 31.25 39.0625 31.25 Z "/></g></svg>
                                                    </a>
                                                </div>
                                                <div class="item-herramienta-opciones-open">
                                                    <div class="item-herramienta-opciones-open-inner d-flex align-items-center flex-wrap justify-content-center">
                                                        <div class="close"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.001 512.001" width="12px" height="12px" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve"><g><g><path d="M284.286,256.002L506.143,34.144c7.811-7.811,7.811-20.475,0-28.285c-7.811-7.81-20.475-7.811-28.285,0L256,227.717 L34.143,5.859c-7.811-7.811-20.475-7.811-28.285,0c-7.81,7.811-7.811,20.475,0,28.285l221.857,221.857L5.858,477.859 c-7.811,7.811-7.811,20.475,0,28.285c3.905,3.905,9.024,5.857,14.143,5.857c5.119,0,10.237-1.952,14.143-5.857L256,284.287 l221.857,221.857c3.905,3.905,9.024,5.857,14.143,5.857s10.237-1.952,14.143-5.857c7.811-7.811,7.811-20.475,0-28.285 L284.286,256.002z"/></g></g></svg></div>
                                                        <a class="share-mail" href="mailto:?Subject='.$title.'&Body='.$document_url.'">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g>	<g>		<polygon points="339.392,258.624 512,367.744 512,144.896   "/>	</g></g><g>	<g>		<polygon points="0,144.896 0,367.744 172.608,258.624   "/>	</g></g><g>	<g>		<path d="M480,80H32C16.032,80,3.36,91.904,0.96,107.232L256,275.264l255.04-168.032C508.64,91.904,495.968,80,480,80z"/>	</g></g><g>	<g>		<path d="M310.08,277.952l-45.28,29.824c-2.688,1.76-5.728,2.624-8.8,2.624c-3.072,0-6.112-0.864-8.8-2.624l-45.28-29.856    L1.024,404.992C3.488,420.192,16.096,432,32,432h448c15.904,0,28.512-11.808,30.976-27.008L310.08,277.952z"/>	</g></g></svg>
                                                        </a>
                                                        <a class="share-facebook" target="blank" href="http://www.facebook.com/sharer.php?u='.$document_url.'">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="m437 0h-362c-41.351562 0-75 33.648438-75 75v362c0 41.351562 33.648438 75 75 75h151v-181h-60v-90h60v-61c0-49.628906 40.371094-90 90-90h91v90h-91v61h91l-15 90h-76v181h121c41.351562 0 75-33.648438 75-75v-362c0-41.351562-33.648438-75-75-75zm0 0"/></svg>
                                                        </a>
                                                        <a class="share-twitter" target="blank" href="https://twitter.com/share?url='.$document_url.'&text='.$title.'">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -47 512.00203 512"><path d="m191.011719 419.042969c-22.140625 0-44.929688-1.792969-67.855469-5.386719-40.378906-6.335938-81.253906-27.457031-92.820312-33.78125l-30.335938-16.585938 32.84375-10.800781c35.902344-11.804687 57.742188-19.128906 84.777344-30.597656-27.070313-13.109375-47.933594-36.691406-57.976563-67.175781l-7.640625-23.195313 6.265625.957031c-5.941406-5.988281-10.632812-12.066406-14.269531-17.59375-12.933594-19.644531-19.78125-43.648437-18.324219-64.21875l1.4375-20.246093 12.121094 4.695312c-5.113281-9.65625-8.808594-19.96875-10.980469-30.777343-5.292968-26.359376-.863281-54.363282 12.476563-78.851563l10.558593-19.382813 14.121094 16.960938c44.660156 53.648438 101.226563 85.472656 168.363282 94.789062-2.742188-18.902343-.6875-37.144531 6.113281-53.496093 7.917969-19.039063 22.003906-35.183594 40.722656-46.691407 20.789063-12.777343 46-18.96875 70.988281-17.433593 26.511719 1.628906 50.582032 11.5625 69.699219 28.746093 9.335937-2.425781 16.214844-5.015624 25.511719-8.515624 5.59375-2.105469 11.9375-4.496094 19.875-7.230469l29.25-10.078125-19.074219 54.476562c1.257813-.105468 2.554687-.195312 3.910156-.253906l31.234375-1.414062-18.460937 25.230468c-1.058594 1.445313-1.328125 1.855469-1.703125 2.421875-1.488282 2.242188-3.339844 5.03125-28.679688 38.867188-6.34375 8.472656-9.511718 19.507812-8.921875 31.078125 2.246094 43.96875-3.148437 83.75-16.042969 118.234375-12.195312 32.625-31.09375 60.617187-56.164062 83.199219-31.023438 27.9375-70.582031 47.066406-117.582031 56.847656-23.054688 4.796875-47.8125 7.203125-73.4375 7.203125zm0 0"/></svg>
                                                        </a>
                                                        <a class="share-whatsapp" target="blank" href="https://api.whatsapp.com/send?text='.$document_url.'">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="m256 0c-140.609375 0-256 115.390625-256 256 0 46.40625 12.511719 91.582031 36.238281 131.105469l-36.238281 124.894531 124.894531-36.238281c39.523438 23.726562 84.699219 36.238281 131.105469 36.238281 140.609375 0 256-115.390625 256-256s-115.390625-256-256-256zm160.054688 364.167969-11.910157 11.910156c-16.851562 16.851563-55.605469 15.515625-80.507812 10.707031-82.800781-15.992187-179.335938-109.5625-197.953125-190.59375-9.21875-40.140625-4.128906-75.039062 9.183594-88.355468l11.910156-11.910157c6.574218-6.570312 17.253906-6.5625 23.820312 0l47.648438 47.652344c3.179687 3.179687 4.921875 7.394531 4.921875 11.90625s-1.742188 8.730469-4.921875 11.898437l-11.90625 11.921876c-13.125 13.15625-13.125 34.527343 0 47.652343l78.683594 77.648438c13.164062 13.164062 34.46875 13.179687 47.652343 0l11.910157-11.90625c6.148437-6.183594 17.632812-6.203125 23.832031 0l47.636719 47.636719c6.46875 6.441406 6.714843 17.113281 0 23.832031zm0 0"/></svg>
                                                        </a>
                                                        <a class="share-telegram" target="blank" href="https://telegram.me/share/url?url='.$document_url.'&text='.$title.'">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -31 512 512"><path d="m123.195312 260.738281 63.679688 159.1875 82.902344-82.902343 142.140625 112.976562 100.082031-450-512 213.265625zm242.5-131.628906-156.714843 142.941406-19.519531 73.566407-36.058594-90.164063zm0 0"/></svg>
                                                        </a>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div></div>';
			endforeach;
			echo json_encode(["more" => $more, "count" => $news_query->post_count, "html" => $output]);
		} else {
			echo json_encode(["more" => 0, "count" => 0, "html" => '']);
		}
	}
	exit();
}

add_action( 'save_post', 'event_save_post_function', 10, 3 );
function event_save_post_function( $post_ID, $post, $update ) {
	if(get_post_type($post_ID)=='herramienta'){
		$title = get_the_title($post_ID);
		update_post_meta($post_ID,'herramienta_title',$title);
	}
}

add_action( 'wp_ajax_padit_search', 'padit_search' );
add_action( 'wp_ajax_nopriv_padit_search', 'padit_search' );
function padit_search() {
	check_ajax_referer( 'enoc_search_wfc7', 'security' );
	if ( isset( $_POST['data'] )) {
		parse_str( $_POST['data'], $form_data );
		$text = sanitize_text_field($form_data['s']);
		$text = urlencode($text);
		echo json_encode( [ "url" => home_url(esc_html('/')).'?s='.$text, "answer" => 'true', ] );
	} else {
		echo json_encode( [ "answer" => 'false' ] );
	}
	exit;
}

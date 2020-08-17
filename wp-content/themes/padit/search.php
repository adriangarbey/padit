<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<?php if ( ! empty( get_field( 'pagina_imagen_encabezado', get_the_ID() ) ) ): ?>
    <section id="page-generic-header-image">
		<?php echo wp_get_attachment_image( get_field( 'pagina_imagen_encabezado', get_the_ID() ), 'full' ); ?>
    </section>
<?php endif; ?>

<section id="page-generic-header-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-head page-head-single">
                    <div class="page-head-title">
                        <h1><?php printf(__('Resultados para: %s', 'uic'), '<span>' . esc_html(get_search_query()) . '</span>'); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<main class="page-generic-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-content">
	                <?php if (have_posts()) : ?>
                        <div class="page-description"><p>A continuación los resultados de la búsqueda.</p></div>
	                <?php else :  ?>
                        <div class="page-description"><p>No se han encontrado resultados.</p></div>
	                <?php endif; ?>
	                <?php if (have_posts()) : ?>
		                <?php
		                // Start the loop.
		                while (have_posts()) : the_post();

			                /**
			                 * Run the loop for the search to output the results.
			                 * If you want to overload this in a child theme then include a file
			                 * called content-search.php and that will be used instead.
			                 */
			                if(get_post_type()!='correo_contacto' && get_post_type()!='red_social' && get_post_type()!='enlace_institucion'):
			                    get_template_part('templates/content', 'search');
			                endif;

			                // End the loop.
		                endwhile;

		                // Previous/next page navigation.
		                the_posts_pagination(array(
			                'prev_text' => __('Anterior', 'uic'),
			                'next_text' => __('Siguiente', 'uic'),
			                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'uic') . ' </span>',
		                ));

		                // If no content, include the "No posts found" template.
	                endif;
	                ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>

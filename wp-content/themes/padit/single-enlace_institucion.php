<?php
/**
 * The template for displaying pages
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) :
		the_post(); ?>

		<?php if ( ! empty( get_field( 'pagina_imagen_encabezado', get_the_ID() ) ) ): ?>
        <section id="page-generic-header-image">
			<?php echo wp_get_attachment_image( get_field( 'pagina_imagen_encabezado', get_the_ID() ), 'full' ); ?>
        </section>
	<?php endif; ?>

		<?php if(has_post_thumbnail()): ?>
            <section class="page-generic-image">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-content-image">
                                <?php
                                the_post_thumbnail();
                                $caption = get_the_post_thumbnail_caption();
                                if ( $caption ) {  ?>
                                    <figcaption class="wp-caption-text"><?php echo esc_html( $caption ); ?></figcaption>
	                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
		<?php if ( empty(get_field( 'mostrar_titulo_en_pagina', get_the_ID())) ): ?>
        <section id="page-generic-header-title">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-head page-head-single">
                            <div class="page-head-title">
                                <h1><?php echo get_the_title(); ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
	<?php endif; ?>

        <main class="page-generic-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-content">
                            <?php the_content() ?>
                            <?php if (! empty(get_field( 'enlace_institucion', get_the_ID())) ): ?>
                                <div class="sitioweb"><a href="<?php echo get_field('enlace_institucion',get_the_ID()); ?>" target="_blank">Sitio web</a></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>

	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>

<?php
/*
Template Name: Agenda Page
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
            <section id="agenda-2030">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="title-block"><?php echo get_the_title(); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="agenda-2030-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                                    <div class="item">
                                        <div class="slide-item d-flex">
                                            <div class="slide-item-image"
                                                 style="background-image: url(<?php echo get_the_post_thumbnail_url( get_the_ID() ); ?>)">
												<?php echo get_the_post_thumbnail( get_the_ID(), 'agenda-slide' ); ?>
                                            </div>
                                            <div class="territorio-item-content d-flex align-items-end">
                                                <div class="territorio-item-content-inner">
                                                    <div class="territorio-item-content-inner-content">
														<?php echo get_post_field( 'post_content' ); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
                </div>
            </section>

		<?php
		$query = new WP_Query( array(
			'post_type'      => 'ods',
			'posts_per_page' => 999,
			'post_status'    => 'publish',
		) );
		$posts = $query->posts;
		$count = $query->post_count;
		if ( $count != 0 ):
			?>
            <section id="objetivos-desarrollo">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="title-block">Contribución de PADIT</h2>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
						<?php $count = 1;
						foreach ( $posts as $historia ) : $id = $historia->ID; ?>
                            <div class="col-xs-12 col-md-6 col-lg-4 wow fadeIn">
                                <div class="ods-item">
									<?php echo wp_get_attachment_image( get_field( 'image_ods', $id ), 'ods-image', '', array( 'class' => 'ods-item-image' ) ); ?>
                                    <div class="ods-item-percent  wow slideInUp" data-wow-delay="1s" data-wow-duration=".5s"
                                         style="height: <?php echo get_field( 'porciento_de_cumplimiento_ods', $id ); ?>%; background: <?php echo get_field( 'color_ods', $id ) ?>"></div>
                                    <div class="ods-item-inner-content">
                                        <div class="ods-item-icon">
											<?php echo wp_get_attachment_image( get_field( 'icono_ods', $id ), 'ods-icon' ); ?>
                                        </div>
                                        <div class="ods-item-data-text">
                                            <div class="ods-item-data-number" style="color: <?php echo get_field( 'color_ods', $id ) ?>">
                                                <?php echo get_field( 'numero_ods', $id ); ?>
                                            </div>
                                            <?php echo str_replace( '/', '<br/>', get_the_title( $id ) ); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<?php $count ++; endforeach; ?>
                    </div>
                </div>
            </section>
		<?php endif; ?>

	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>

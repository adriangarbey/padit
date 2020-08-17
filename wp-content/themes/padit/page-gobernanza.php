<?php
/*
Template Name: Gobernanza Page
*/

get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) :
		the_post(); ?>


		<?php if ( get_field( 'pagina_mostrar_titulo', get_the_ID() ) != '2' ): ?>
        <section id="page-generic-header-title">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-head">
                            <div class="page-head-title">
                                <h1><?php echo get_the_title(); ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
	<?php endif; ?>
		<?php if(has_post_thumbnail()): ?>
        <section class="page-goberzanza-image">
            <div class="page-content-image">
				<?php the_post_thumbnail(); ?>
            </div>
        </section>
	<?php endif; ?>
        <main class="page-generic-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-content">
							<?php the_content() ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>

	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
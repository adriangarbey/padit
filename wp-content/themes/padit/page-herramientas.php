<?php
/*
Template Name: Herramientas Page
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
<div class="herramientas-container">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <form class="search-herramientas-form">
	                    <?php wp_nonce_field('herramientas_search'); ?>
                        <input type="hidden" name="pager" id="pager" value="1" />
                        <div class="d-flex">
                            <input type="text" name="search_name" class="search_name" placeholder="">
                            <button type="submit">Buscar</button>
                        </div>
                        <select name="categoria_select" class="categoria_herramienta_select">
                            <option value="0">Seleccione una categoría</option>
		                    <?php $tags = get_terms([
			                    'taxonomy' => 'tipo_herramienta',
			                    'hide_empty' => false,
		                    ]);
		                    if ( $tags ) {
			                    foreach ( $tags as $tag ) {
				                    echo '<option value="' . $tag->term_id . '">' . $tag->name . '</option> ';
			                    }
		                    } ?>
                        </select>
                    </form>
                </div>

                <div class="col-md-12 search-results">
                    <div class="row">
		                <?php echo initial_herramientas_load()['html']; ?>
                    </div>
                    <div class="text-center">
                        <?php if(initial_herramientas_load()['more']==1): ?>
                            <a href="#" class="pagination__button load__more button"><span>Mostrar más herramientas</span></a>
                        <?php else: ?>
                            <a href="#" class="pagination__button all-loaded button"><span>Todas las herramientas mostradas</span></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
</div>
	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>

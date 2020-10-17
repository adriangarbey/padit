<?php
/*
Template Name: Formación Page
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
        <section id="search-formacion">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form class="search-formacion-form">
                            <?php wp_nonce_field('herramientas_search'); ?>
                            <input type="hidden" name="pager" id="pager" value="1" />
                            <div class="d-flex">
                                <input type="text" name="search_name" class="search_name" placeholder="">
                                <button type="submit">Buscar</button>
                            </div>
                            <select name="categoria_select" class="categoria_herramienta_select">
                                <option value="0">Seleccione una categoría</option>
                                <?php $tags = get_terms([
                                    'taxonomy' => 'cat_formacion',
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
                </div>
            </div>
        </section>
    <div class="formacion-wrapper-content">
		<?php
            $query    = new WP_Query( array(
                'post_type'      => 'formacion',
                'posts_per_page' => 999,
                'post_status'    => 'publish',
                'meta_query' => array(
                    array(
                        'key'     => 'tipo_de_formacion',
                        'value'   => 'documento',
                        'compare' => '='
                    )
                )
            ) );
            $posts    = $query->posts;
            $count = $query->post_count;
            if($count!=0):
        ?>
        <section id="publicaciones" class="publicaciones">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title-block">Documentos</h2>
                        <div class="slide-herramientas-desarrollo owl-carousel owl-theme">
					        <?php foreach ( $posts as $element ) : $id = $element->ID; ?>
                                <div class="item">
                                    <div class="item-herramienta">
                                        <div class="item-herramienta-inner">
                                                <a download="" title="Descargar" class="item-herramienta-graphic-link" href="<?php echo wp_get_attachment_url(get_field('documento_formacion', $id)); ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100pt" height="100pt" viewBox="0 0 100 100" version="1.1"><g><path d="M 14 4 L 14 96 L 86 96 L 86 29.1875 L 85.4375 28.5625 L 61.4375 4.5625 L 60.8125 4 Z M 18 8 L 58 8 L 58 32 L 82 32 L 82 92 L 18 92 Z M 62 10.875 L 79.125 28 L 62 28 Z M 30 44 L 30 48 L 70 48 L 70 44 Z M 30 56 L 30 60 L 62 60 L 62 56 Z M 30 68 L 30 72 L 70 72 L 70 68 Z "/></g></svg>
                                                </a>
                                                <div class="item-herramienta-data">
                                                    <div class="item-herramienta-data-title"><?php echo get_the_title($id); ?></div>
                                                    <?php if(!empty($coordinador = get_field('coordinador_formacion', $id))): ?>
                                                        <div class="item-herramienta-data-corrdinador"><span>Coordinador: </span><?php echo $coordinador; ?></div>
                                                    <?php endif; ?>
	                                                <?php if(!empty($descripcion = get_field('resumen_formacion', $id))): ?>
                                                        <div class="item-herramienta-data-descripcion"><?php echo $descripcion; ?></div>
	                                                <?php endif; ?>
                                                </div>
                                                <div class="item-herramienta-opciones d-flex align-items-center justify-content-between">
                                                    <a download="" title="Descargar" href="<?php echo wp_get_attachment_url(get_field('documento_formacion', $id)); ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50pt" height="50pt" viewBox="0 0 50 50" version="1.1"><g><path d="M 21.875 6.25 L 21.875 29.039063 L 13.597656 20.777344 L 11.402344 22.972656 L 23.4375 35.023438 L 35.484375 22.972656 L 33.265625 20.777344 L 25 29.039063 L 25 6.25 Z M 9.375 40.625 L 9.375 43.75 L 37.5 43.75 L 37.5 40.625 Z "/></g></svg>
                                                    </a>
                                                    <a class="share-document" title="Compartir documento" href="#">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50pt" height="50pt" viewBox="0 0 50 50" version="1.1"><g><path d="M 39.0625 3.125 C 34.765625 3.125 31.25 6.640625 31.25 10.9375 C 31.25 11.472656 31.3125 11.988281 31.410156 12.5 L 17.25 18.871094 C 15.820313 16.917969 13.523438 15.625 10.9375 15.625 C 6.640625 15.625 3.125 19.140625 3.125 23.4375 C 3.125 27.734375 6.640625 31.25 10.9375 31.25 C 13.539063 31.25 15.855469 29.945313 17.273438 27.964844 L 31.445313 34.265625 C 31.324219 34.800781 31.25 35.363281 31.25 35.9375 C 31.25 40.234375 34.765625 43.75 39.0625 43.75 C 43.359375 43.75 46.875 40.234375 46.875 35.9375 C 46.875 31.640625 43.359375 28.125 39.0625 28.125 C 36.460938 28.125 34.144531 29.429688 32.726563 31.410156 L 18.554688 25.121094 C 18.675781 24.574219 18.75 24.011719 18.75 23.4375 C 18.75 22.851563 18.675781 22.277344 18.554688 21.726563 L 32.640625 15.355469 C 34.058594 17.40625 36.414063 18.75 39.0625 18.75 C 43.359375 18.75 46.875 15.234375 46.875 10.9375 C 46.875 6.640625 43.359375 3.125 39.0625 3.125 Z M 39.0625 6.25 C 41.675781 6.25 43.75 8.324219 43.75 10.9375 C 43.75 13.550781 41.675781 15.625 39.0625 15.625 C 36.449219 15.625 34.375 13.550781 34.375 10.9375 C 34.375 8.324219 36.449219 6.25 39.0625 6.25 Z M 10.9375 18.75 C 13.550781 18.75 15.625 20.824219 15.625 23.4375 C 15.625 26.050781 13.550781 28.125 10.9375 28.125 C 8.324219 28.125 6.25 26.050781 6.25 23.4375 C 6.25 20.824219 8.324219 18.75 10.9375 18.75 Z M 39.0625 31.25 C 41.675781 31.25 43.75 33.324219 43.75 35.9375 C 43.75 38.550781 41.675781 40.625 39.0625 40.625 C 36.449219 40.625 34.375 38.550781 34.375 35.9375 C 34.375 33.324219 36.449219 31.25 39.0625 31.25 Z "/></g></svg>
                                                    </a>
                                                </div>
                                                <div class="item-herramienta-opciones-open">
                                                    <div class="item-herramienta-opciones-open-inner d-flex align-items-center flex-wrap justify-content-center">
                                                        <div class="close"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.001 512.001" width="12px" height="12px" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve"><g><g><path d="M284.286,256.002L506.143,34.144c7.811-7.811,7.811-20.475,0-28.285c-7.811-7.81-20.475-7.811-28.285,0L256,227.717 L34.143,5.859c-7.811-7.811-20.475-7.811-28.285,0c-7.81,7.811-7.811,20.475,0,28.285l221.857,221.857L5.858,477.859 c-7.811,7.811-7.811,20.475,0,28.285c3.905,3.905,9.024,5.857,14.143,5.857c5.119,0,10.237-1.952,14.143-5.857L256,284.287 l221.857,221.857c3.905,3.905,9.024,5.857,14.143,5.857s10.237-1.952,14.143-5.857c7.811-7.811,7.811-20.475,0-28.285 L284.286,256.002z"/></g></g></svg></div>
                                                        <a class="share-mail" href="mailto:?Subject=<?php echo get_the_title($id); ?>&Body=<?php echo wp_get_attachment_url(get_field('documento_formacion', $id)); ?>">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g>	<g>		<polygon points="339.392,258.624 512,367.744 512,144.896   "/>	</g></g><g>	<g>		<polygon points="0,144.896 0,367.744 172.608,258.624   "/>	</g></g><g>	<g>		<path d="M480,80H32C16.032,80,3.36,91.904,0.96,107.232L256,275.264l255.04-168.032C508.64,91.904,495.968,80,480,80z"/>	</g></g><g>	<g>		<path d="M310.08,277.952l-45.28,29.824c-2.688,1.76-5.728,2.624-8.8,2.624c-3.072,0-6.112-0.864-8.8-2.624l-45.28-29.856    L1.024,404.992C3.488,420.192,16.096,432,32,432h448c15.904,0,28.512-11.808,30.976-27.008L310.08,277.952z"/>	</g></g></svg>
                                                        </a>
                                                        <a class="share-facebook" target="blank" href="http://www.facebook.com/sharer.php?u=<?php echo wp_get_attachment_url(get_field('documento_formacion', $id)); ?>">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="m437 0h-362c-41.351562 0-75 33.648438-75 75v362c0 41.351562 33.648438 75 75 75h151v-181h-60v-90h60v-61c0-49.628906 40.371094-90 90-90h91v90h-91v61h91l-15 90h-76v181h121c41.351562 0 75-33.648438 75-75v-362c0-41.351562-33.648438-75-75-75zm0 0"/></svg>
                                                        </a>
                                                        <a class="share-twitter" target="blank" href="https://twitter.com/share?url=<?php echo wp_get_attachment_url(get_field('documento_formacion', $id)); ?>&text=<?php echo get_the_title($id); ?>">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -47 512.00203 512"><path d="m191.011719 419.042969c-22.140625 0-44.929688-1.792969-67.855469-5.386719-40.378906-6.335938-81.253906-27.457031-92.820312-33.78125l-30.335938-16.585938 32.84375-10.800781c35.902344-11.804687 57.742188-19.128906 84.777344-30.597656-27.070313-13.109375-47.933594-36.691406-57.976563-67.175781l-7.640625-23.195313 6.265625.957031c-5.941406-5.988281-10.632812-12.066406-14.269531-17.59375-12.933594-19.644531-19.78125-43.648437-18.324219-64.21875l1.4375-20.246093 12.121094 4.695312c-5.113281-9.65625-8.808594-19.96875-10.980469-30.777343-5.292968-26.359376-.863281-54.363282 12.476563-78.851563l10.558593-19.382813 14.121094 16.960938c44.660156 53.648438 101.226563 85.472656 168.363282 94.789062-2.742188-18.902343-.6875-37.144531 6.113281-53.496093 7.917969-19.039063 22.003906-35.183594 40.722656-46.691407 20.789063-12.777343 46-18.96875 70.988281-17.433593 26.511719 1.628906 50.582032 11.5625 69.699219 28.746093 9.335937-2.425781 16.214844-5.015624 25.511719-8.515624 5.59375-2.105469 11.9375-4.496094 19.875-7.230469l29.25-10.078125-19.074219 54.476562c1.257813-.105468 2.554687-.195312 3.910156-.253906l31.234375-1.414062-18.460937 25.230468c-1.058594 1.445313-1.328125 1.855469-1.703125 2.421875-1.488282 2.242188-3.339844 5.03125-28.679688 38.867188-6.34375 8.472656-9.511718 19.507812-8.921875 31.078125 2.246094 43.96875-3.148437 83.75-16.042969 118.234375-12.195312 32.625-31.09375 60.617187-56.164062 83.199219-31.023438 27.9375-70.582031 47.066406-117.582031 56.847656-23.054688 4.796875-47.8125 7.203125-73.4375 7.203125zm0 0"/></svg>
                                                        </a>
                                                        <a class="share-whatsapp" target="blank" href="https://api.whatsapp.com/send?text=<?php echo urlencode(wp_get_attachment_url(get_field('documento_formacion', $id))); ?>">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="m256 0c-140.609375 0-256 115.390625-256 256 0 46.40625 12.511719 91.582031 36.238281 131.105469l-36.238281 124.894531 124.894531-36.238281c39.523438 23.726562 84.699219 36.238281 131.105469 36.238281 140.609375 0 256-115.390625 256-256s-115.390625-256-256-256zm160.054688 364.167969-11.910157 11.910156c-16.851562 16.851563-55.605469 15.515625-80.507812 10.707031-82.800781-15.992187-179.335938-109.5625-197.953125-190.59375-9.21875-40.140625-4.128906-75.039062 9.183594-88.355468l11.910156-11.910157c6.574218-6.570312 17.253906-6.5625 23.820312 0l47.648438 47.652344c3.179687 3.179687 4.921875 7.394531 4.921875 11.90625s-1.742188 8.730469-4.921875 11.898437l-11.90625 11.921876c-13.125 13.15625-13.125 34.527343 0 47.652343l78.683594 77.648438c13.164062 13.164062 34.46875 13.179687 47.652343 0l11.910157-11.90625c6.148437-6.183594 17.632812-6.203125 23.832031 0l47.636719 47.636719c6.46875 6.441406 6.714843 17.113281 0 23.832031zm0 0"/></svg>
                                                        </a>
                                                        <a class="share-telegram" target="blank" href="https://telegram.me/share/url?url=<?php echo wp_get_attachment_url(get_field('documento_formacion', $id)); ?>&text=<?php echo get_the_title($id); ?>">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -31 512 512"><path d="m123.195312 260.738281 63.679688 159.1875 82.902344-82.902343 142.140625 112.976562 100.082031-450-512 213.265625zm242.5-131.628906-156.714843 142.941406-19.519531 73.566407-36.058594-90.164063zm0 0"/></svg>
                                                        </a>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
					        <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

		<?php
		$query    = new WP_Query( array(
			'post_type'      => 'formacion',
			'posts_per_page' => 999,
			'post_status'    => 'publish',
			'meta_query' => array(
				array(
					'key'     => 'tipo_de_formacion',
					'value'   => 'video',
					'compare' => '='
				)
			)
		) );
		$posts    = $query->posts;
		$count = $query->post_count;
		if($count!=0):
			?>
            <section id="cursos-online">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="title-block">Cursos Online</h2>
                            <div class="slide-formacion-cursos owl-carousel owl-theme">
								<?php $i=0; foreach ( $posts as $element ) : $id = $element->ID; ?>
                                    <div class="item">
                                        <div class="item-curso">
                                            <div class="item-curso-inner">
                                                <div class="item-curso-video">
                                                    <div class="pretty-embed" data-pe-videoid="<?php echo get_field('youtube_video_formacion', $id); ?>" data-pe-fitvids="true"></div>
                                                </div>
                                                <div class="item-curso-data">
	                                                <?php if(!empty($duracion = get_field('duracion_formacion', $id))): ?>
                                                        <div class="item-curso-data-duracion"><?php echo wp_get_duracion($duracion); ?></div>
	                                                <?php endif; ?>
                                                    <div class="item-curso-data-title"><?php echo get_the_title($id); ?></div>
													<?php if(!empty($coordinador = get_field('instructor_formacion', $id))): ?>
                                                        <div class="item-herramienta-data-instructor"><span>Instructor: </span><?php echo $coordinador; ?></div>
													<?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                              <?php   endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
		<?php endif; ?>
    </div>

	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>

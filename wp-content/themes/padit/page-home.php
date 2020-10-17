<?php

/*
Template Name: Home Page
*/

get_header();

/*
 * Section Slide.
 */

$query    = new WP_Query( array(
	'post_type'      => 'imagen_slide',
	'posts_per_page' => 999,
	'post_status'    => 'publish',
) );
$posts    = $query->posts;
$cantidad = $query->post_count;
if ( $cantidad != 0 ): ?>
    <section id="slide">
        <div class="slide-container owl-carousel owl-theme">
				<?php foreach ( $posts as $element ) : $id = $element->ID; ?>
                    <div class="item">
                        <div class="slide-item d-flex">
                            <div class="slide-item-image">
	                            <?php echo get_the_post_thumbnail($id,'slide-home'); ?>
                            </div>
                            <div class="territorio-item-content d-flex align-items-center">
                                <div class="territorio-item-content-inner">
                                    <?php echo get_post_field('post_content',$id); ?>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php endforeach; ?>
        </div>
    </section>
<?php endif;

/*
 * Section Territorios.
 */

$query    = new WP_Query( array(
	'post_type'      => 'territorio',
	'posts_per_page' => 999,
	'post_status'    => 'publish',
    'meta_query' => array(
        array(
            'key'     => 'mostar_en_portada_ter',
            'value'   => 'si',
            'compare' => '='
        )
    )
) );
$posts    = $query->posts;
$cantidad = $query->post_count;
if ( $cantidad != 0 ): ?>
    <section id="territorios">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-home">
                        <h2>Territorios</h2>
                    </div>
                </div>
            </div>
            <div class="row">
				<?php foreach ( $posts as $element ) : $id = $element->ID; ?>
                    <div class="col col-territorio-item d-flex">
                        <div class="territorio-item">
                            <div class="territorio-item-inner">
                                <a class="territorio-item-link"
                                   href="<?php echo get_permalink( $id ); ?>"><?php echo get_the_title( $id ); ?></a>
                                <div class="territorio-item-content">
                                    <div class="territorio-item-image d-flex align-items-center justify-content-center">
                                        <a href="<?php echo get_permalink( $id ); ?>"
                                           title="<?php echo get_the_title( $id ); ?>"><?php echo wp_get_attachment_image( get_post_field( 'territorio_escudo', $id ) ); ?></a>
                                    </div>
                                    <div class="territorio-item-title"><a href="<?php echo get_permalink( $id ); ?>"
                                                                          title="<?php echo get_the_title( $id ); ?>"><?php echo get_the_title( $id ); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php endforeach; ?>
            </div>
    </section>
<?php endif; ?>


<?php

/*
 * Section Noicias.
 */

$query    = new WP_Query( array(
	'post_type'      => 'noticia',
	'posts_per_page' => 999,
	'post_status'    => 'publish',
) );
$posts    = $query->posts;
$cantidad = $query->post_count;
if ( $cantidad != 0 ): ?>
    <section id="noticias">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-home">
                        <h2>Noticias</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 row-noticias-home">
                        <div class="noticias-owl-carousel owl-carousel owl-theme">
				<?php foreach ( $posts as $element ) : $id = $element->ID; ?>
                        <div class="item">
                    <div class="col-noticia-item">
                        <div class="noticia-item">
                            <div class="noticia-item-inner">
                                <div class="noticia-item-content">
                                    <div class="noticia-item-image">
                                        <a href="<?php echo get_permalink( $id ); ?>"
                                           title="<?php echo get_the_title( $id ); ?>"><?php echo get_the_post_thumbnail($id,'noticias-home'); ?></a>
                                    </div>
                                    <div class="noticia-item-title"><a href="<?php echo get_permalink( $id ); ?>"
                                                                       title="<?php echo get_the_title( $id ); ?>"><?php echo get_the_title( $id ); ?></a>
                                    </div>
                                    <div class="noticia-item-summary"><?php echo get_post_field('post_excerpt', $id ); ?></div>
                                    <div class="noticia-item-link d-flex"><a href="<?php echo get_permalink( $id ); ?>"
                                                                       title="<?php echo get_the_title( $id ); ?>">Ver más</a>
                                    </div>
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

    <section id="redes-sociales">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-home">
                        <h2>Redes Sociales</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="red-social-item d-flex">
                            <div class="red-social-item-inner">
                                <div class="red-social-item-content">
                                    <div class="red-social-item-title d-flex align-items-center">
                                        <div class="">Post de Facebook</div>
                                        <div class="red-social-item-title-icon red-social-icon-facebook"><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" id="svg-replaced-0" class="attachment-full size-full style-svg replaced-svg svg-replaced-0"><path d="m437 0h-362c-41.351562 0-75 33.648438-75 75v362c0 41.351562 33.648438 75 75 75h151v-181h-60v-90h60v-61c0-49.628906 40.371094-90 90-90h91v90h-91v61h91l-15 90h-76v181h121c41.351562 0 75-33.648438 75-75v-362c0-41.351562-33.648438-75-75-75zm0 0"></path></svg></div>
                                    </div>
                                    <!--<div class="red-social-item-iframe">
                                        <div id="fb-root"></div>
                                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v7.0&appId=1658588814396044&autoLogAppEvents=1"></script>
                                        <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-width="500" data-height="" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="false"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="col-lg-6 col-md-12 d-flex">
                    <div class="red-social-item d-flex">
                        <div class="red-social-item-inner">
                            <div class="red-social-item-content">
                                <div class="red-social-item-title d-flex align-items-center">
                                    <div class="">Tweets Recientes</div>
                                    <div class="red-social-item-title-icon red-social-icon-twitter"><svg viewBox="0 -47 512.00203 512" xmlns="http://www.w3.org/2000/svg" id="svg-replaced-1" class="attachment-full size-full style-svg replaced-svg svg-replaced-1"><path d="m191.011719 419.042969c-22.140625 0-44.929688-1.792969-67.855469-5.386719-40.378906-6.335938-81.253906-27.457031-92.820312-33.78125l-30.335938-16.585938 32.84375-10.800781c35.902344-11.804687 57.742188-19.128906 84.777344-30.597656-27.070313-13.109375-47.933594-36.691406-57.976563-67.175781l-7.640625-23.195313 6.265625.957031c-5.941406-5.988281-10.632812-12.066406-14.269531-17.59375-12.933594-19.644531-19.78125-43.648437-18.324219-64.21875l1.4375-20.246093 12.121094 4.695312c-5.113281-9.65625-8.808594-19.96875-10.980469-30.777343-5.292968-26.359376-.863281-54.363282 12.476563-78.851563l10.558593-19.382813 14.121094 16.960938c44.660156 53.648438 101.226563 85.472656 168.363282 94.789062-2.742188-18.902343-.6875-37.144531 6.113281-53.496093 7.917969-19.039063 22.003906-35.183594 40.722656-46.691407 20.789063-12.777343 46-18.96875 70.988281-17.433593 26.511719 1.628906 50.582032 11.5625 69.699219 28.746093 9.335937-2.425781 16.214844-5.015624 25.511719-8.515624 5.59375-2.105469 11.9375-4.496094 19.875-7.230469l29.25-10.078125-19.074219 54.476562c1.257813-.105468 2.554687-.195312 3.910156-.253906l31.234375-1.414062-18.460937 25.230468c-1.058594 1.445313-1.328125 1.855469-1.703125 2.421875-1.488282 2.242188-3.339844 5.03125-28.679688 38.867188-6.34375 8.472656-9.511718 19.507812-8.921875 31.078125 2.246094 43.96875-3.148437 83.75-16.042969 118.234375-12.195312 32.625-31.09375 60.617187-56.164062 83.199219-31.023438 27.9375-70.582031 47.066406-117.582031 56.847656-23.054688 4.796875-47.8125 7.203125-73.4375 7.203125zm0 0"></path></svg></div>
                                </div>
                                <!--<div class="red-social-item-iframe">
                                    <a class="twitter-timeline" data-height="530" href="https://twitter.com/TwitterDev?ref_src=twsrc%5Etfw">Tweets by TwitterDev</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="enlaces-instituciones">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="block-title">Coordinan:</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="enlaces-instituciones-wrapper">
                        <ul class="nav nav-tabs d-flex">
                            <li class="active"><a class="active" data-toggle="tab" href="#coordinan-instituciones">Instituciones</a></li>
                            <li><a data-toggle="tab" href="#coordinan-territorios">Territorios</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="coordinan-instituciones" class="tab-pane fade active show">
                                <div class="d-flex flex-wrap align-items-center justify-content-center">
									<?php
									$query    = new WP_Query( array(
										'post_type'      => 'enlace_institucion',
										'posts_per_page' => 999,
										'post_status'    => 'publish',
										'meta_query' => array(
											array(
												'key'     => 'ubicacion_institucion',
												'value'   => 'coordinan_insticuiones',
												'compare' => '='
											)
										)
									) );
									$posts    = $query->posts;
									foreach ( $posts as $element ) : $id = $element->ID; ?>
                                        <a href="<?php echo get_permalink($id); ?>"><?php echo get_the_post_thumbnail($id, 'full'); ?></a>
									<?php endforeach; ?>
                                </div>
                                `                           </div>
                            <div id="coordinan-territorios" class="tab-pane fade">
                                <div class="slide-territorios-home owl-carousel owl-theme">
									<?php
									$query    = new WP_Query( array(
										'post_type'      => 'territorio',
										'posts_per_page' => 999,
										'post_status'    => 'publish',
										'meta_query' => array(
											array(
												'key'     => 'territorio_tipo_de_territorio',
												'value'   => 'provincial',
												'compare' => '='
											)
										)
									) );
									$posts    = $query->posts;
									foreach ( $posts as $element ) : $id = $element->ID;
										if(!empty(get_field('territorio_qs_imagen',$id))):
											?>
                                            <div class="item">
                                                <div class="item-inner d-flex justify-content-center align-items-center">
                                                    <a href="<?php echo get_permalink($id); ?>"><?php echo wp_get_attachment_image(get_field('territorio_qs_imagen',$id), 'full'); ?></a>
                                                </div>
                                            </div>
										<?php endif; endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="block-title">Con Apoyo de:</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="enlaces-instituciones-wrapper">
                        <ul class="nav nav-tabs">
                            <li class="active tab-instituciones-asociadas"><a class="active" data-toggle="tab" href="#apoyo-instituciones-asociadas">Instituciones Asociadas</a></li>
                            <li class="tab-apoyo-cooperacion-internacional"><a data-toggle="tab" href="#apoyo-cooperacion-internacional">Cooperación Internacional</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="apoyo-instituciones-asociadas" class="tab-pane fade in active show">
                                <div class="d-flex flex-wrap align-items-center justify-content-center">
									<?php
									$query    = new WP_Query( array(
										'post_type'      => 'enlace_institucion',
										'posts_per_page' => 999,
										'post_status'    => 'publish',
										'meta_query' => array(
											array(
												'key'     => 'ubicacion_institucion',
												'value'   => 'con_apoyo_instituciones',
												'compare' => '='
											)
										)
									) );
									$posts    = $query->posts;
									foreach ( $posts as $element ) : $id = $element->ID; ?>
                                        <a href="<?php echo get_permalink($id); ?>"><?php echo get_the_post_thumbnail($id, 'full'); ?></a>
									<?php endforeach; ?>
                                </div>
                            </div>
                            <div id="apoyo-cooperacion-internacional" class="tab-pane fade">
                                <div class="d-flex flex-wrap align-items-center justify-content-center">
									<?php
									$query    = new WP_Query( array(
										'post_type'      => 'enlace_institucion',
										'posts_per_page' => 999,
										'post_status'    => 'publish',
										'meta_query' => array(
											array(
												'key'     => 'ubicacion_institucion',
												'value'   => 'cooepracion_internacional',
												'compare' => '='
											)
										)
									) );
									$posts    = $query->posts;
									foreach ( $posts as $element ) : $id = $element->ID; ?>
                                        <a href="<?php echo get_permalink($id); ?>"><?php echo get_the_post_thumbnail($id, 'full'); ?></a>
									<?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php

get_footer();

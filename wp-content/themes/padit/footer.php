<?php

/**
 * The template for displaying the footer
 */

?>
<footer id="site-footer" class="site-footer">
    <div class="footer-contact">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                               <div class="footer-contact-form">
                                   <h2>Contáctenos</h2>
                                <form method="post" class="" id="footer-contact-form">
	                                <?php wp_nonce_field('footer_contact'); ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-contact-item form-contact-item-phone">
                                                <div class="form-contact-item-label d-flex align-items-center">
                                                    <span class="form-contact-item-icon"><img src="<?php echo get_template_directory_uri()?>/assets/images/contacto-telefono.png" /></span>
                                                    <span class="form-contact-item-text">Teléfono: </span>
                                                </div>
                                                <div class="form-contact-item-input">
                                                    <input type="text" name="telefono" value="" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-contact-item form-contact-item-mail">
                                                <div class="form-contact-item-label d-flex align-items-center">
                                                    <span class="form-contact-item-icon"><img src="<?php echo get_template_directory_uri()?>/assets/images/contacto-correo.png" /></span>
                                                    <span class="form-contact-item-text">E-mail: </span>
                                                </div>
                                                <div class="form-contact-item-input">
                                                    <input type="text" name="email" value="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-contact-item form-contact-item-textarea form-contact-item-message">
                                                <div class="form-contact-item-label d-flex align-items-center">
                                                    <span class="form-contact-item-icon"><img src="<?php echo get_template_directory_uri()?>/assets/images/contacto-mensaje.png" /></span>
                                                    <span class="form-contact-item-text">Mensaje: </span>
                                                </div>
                                                <div class="form-contact-item-input">
                                                    <textarea name="mensaje"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-contact-item form-contact-item-select">
                                                <div class="form-contact-item-label d-flex align-items-center">
                                                    <span class="form-contact-item-icon"><img src="<?php echo get_template_directory_uri()?>/assets/images/contacto-coordinador.png" /></span>
                                                </div>
                                                <div class="form-contact-item-input">
                                                    <select name="contact-a">
				                                        <?php
				                                        $query = new WP_Query(array(
					                                        'post_type' => 'correo_contacto',
					                                        'posts_per_page' => 999,
					                                        'post_status' => 'publish',
				                                        ));
				                                        $posts = $query->posts;
				                                        $cantidad = $query->post_count;
				                                        if ($cantidad != 0):
					                                        foreach ($posts as $element) {
						                                        $id = $element->ID;
						                                        echo '<option value="'.$id.'-correo_contacto">'.get_the_title($id).'</option>';
					                                        }
				                                        endif;
				                                        $query = new WP_Query(array(
					                                        'post_type' => 'territorio',
					                                        'posts_per_page' => 999,
					                                        'post_status' => 'publish',
				                                        ));
				                                        $posts = $query->posts;
				                                        $cantidad = $query->post_count;
				                                        if ($cantidad != 0):
					                                        foreach ($posts as $element) {
						                                        $id = $element->ID;
						                                        if(!empty(get_field('correo_de_contacto',$id))):
							                                        echo '<option value="'.$id.'-territorio">Contactar Coordinador '.get_the_title($id).'</option>';
						                                        endif;
					                                        }
				                                        endif;
				                                        ?>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <button>Enviar</button>
                                </form>
                                <div class="error-meessages"></div>
                                <div class="success-meessages"></div>
                            </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-image" style="background-image: url('<?php echo get_template_directory_uri()?>/assets/images/footer-contact.jpg')">
                        <img src="<?php echo get_template_directory_uri()?>/assets/images/footer-contact.jpg" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-options">
        <div class="container">
            <div class="row">
                <div class="col-md-12 footer-options-flex d-flex align-items-center">
                    <div class="footer-logo">
                        <a href="<?php echo esc_url(home_url('/')) ?>" title="Inicio"><img src="<?php echo get_template_directory_uri()?>/assets/images/logo-white.png" /></a>
                    </div>
                    <div class="footer-options flex-1 d-flex align-items-center justify-content-end">
                        <div class="footer-search">
                            <form role="search" method="post"
                                  class="footer-search-form search-form d-flex align-items-center">
	                            <?php wp_nonce_field('footer_search'); ?>
                                <input id="search" type="search"
                                       autocomplete="off"
                                       class="input-search-field"
                                       placeholder="<?php echo esc_attr_x('Buscar...', 'placeholder') ?>"
                                       value="<?php get_search_query() ?>"
                                       name="s"/>
                                <button type="submit" class="closed-search">Buscar</button>
                            </form>
                        </div>
                        <div class="footer-social-networks d-flex align-items-center justify-content-end">
	                        <?php echo do_shortcode('[redes_sociales]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-message">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-message-inner">
                        Actualizado <?php echo the_date('j F Y')?><br/>PADIT Todos los derechos reservados<br/>Diseñado por Pyxel Solutions
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
<script>
    new WOW().init();
</script>
</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: Nodelvis
 * Date: 16-Jan-20
 * Time: 7:30 PM
 */

$enlace = get_permalink(get_the_ID());
if(get_post_type()=='imagen_slide'):
	$enlace = home_url(esc_html('/'));
endif;
if(get_post_type()=='iniciativa'):
	$enlace = '';
	$query    = new WP_Query( array(
		'post_type'      => 'territorio',
		'posts_per_page' => 999,
		'post_status'    => 'publish',
		'meta_query' => array(
			array(
				'key'     => 'territorio_iniciativas',
				'value' => '"' . get_the_ID() . '"',
				'compare' => 'LIKE'
			)
		)
	) );
	$posts    = $query->posts;
	foreach ( $posts as $element ) : $enlace = get_permalink($element->ID) ; endforeach;
endif;
if(get_post_type()=='historia_de_vida'):
	$enlace = '';
	$query    = new WP_Query( array(
		'post_type'      => 'territorio',
		'posts_per_page' => 999,
		'post_status'    => 'publish',
		'meta_query' => array(
			array(
				'key'     => 'territorio_historias_de_vida',
				'value' => '"' . get_the_ID() . '"',
				'compare' => 'LIKE'
			)
		)
	) );
	$posts    = $query->posts;
	foreach ( $posts as $element ) : $enlace = get_permalink($element->ID) ; endforeach;
endif; ?>
<?php if(!empty($enlace)): ?>
<div class="item">
    <div class="event-item card-box-news-inner">
        <div class="event-item-inner card-box-border-corner">

            <div class="event-item-inner-title"><a href="<?php echo $enlace; ?>"><?php the_title(); ?></a></div>
            <div class="event-item-inner-more-link"><a class="more-link" title="<?php the_title(); ?>" href="<?php echo $enlace; ?>">ver detalles</a></div>
        </div>
    </div>
</div>
<?php endif; ?>

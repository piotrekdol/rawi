<?php
/*
Template Name: Aktualności
*/
get_header();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header lowheader">

		<div class="title-container">
			<div class="page-title"><?php the_title( '<h1 class="entry-title-page fontblue">', '</h1>' ); ?></div>
		</div>

	</header>

<div class="container space50t space50b">
	<div class="row">	
		<div class="news">

		<?php
		$args = array(
		    'posts_per_page' => -1,
		    'post_status'=>'publish', 
			'order' => 'DSC', 
			'cat'=>'4',
			'post_type'=>'post'
		); ?>
		<?php
		$custom_query = new WP_Query( $args );
		if ( $custom_query->have_posts() ) :
		    while ( $custom_query->have_posts() ) :
		        $custom_query->the_post();?>
       
	    <div class="news-list tile">	
			<div class="newsphoto">
			<?php if ( has_post_thumbnail() ) { 
	    	the_post_thumbnail( 'aktualnosc', array('class' => 'post-list-image')); 
				} else { ?>
				<a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory'); ?>/inc/post-list-feat-img.png" class="post-list-noimage" /></a>
				<?php } ?>
			</div>
			<h2 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<a href="<?php the_permalink(); ?>" class="readmore" href="<?php the_permalink(); ?>">Czytaj więcej
			</a>
		</div>

		<?php endwhile; ?>
		<?php endif; ?>

		<?php wp_reset_postdata(); ?>

		</div>
	</div>	
</div>

</article>


<?php
get_footer();?>
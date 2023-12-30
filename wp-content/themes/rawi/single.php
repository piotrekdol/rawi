<?php
get_header();
?>

	<main role="main">
		<section role="region">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'parts/content', get_post_type() );

			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</section>
	</main>	

<?php
get_sidebar();
get_footer();
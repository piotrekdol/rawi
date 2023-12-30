<?php
get_header();
?>

	<main id="primary" class="site-main">

		<section>
			<div class="kontener">
				<div class="wiersz" style="margin-top: 50px;">
					<div style="display: flex; flex-direction: column; align-content: center; width: 100%; flex-wrap: wrap;">
						
												<div style="text-align: center; margin-bottom: 60px; ">

							<h1 class="page-title-404"><?php esc_html_e( 'Strona której szukasz, nie&nbsp;istnieje' ); ?></h1>
							 <a class="goto" href="/">Przejdź do strony głównej</a>
						</div>
						
						<div><img src="<?php bloginfo('template_directory'); ?>/inc/404.jpg" alt="Strona której szukasz, nie istnieje" style="width: 100%; margin-bottom: -4px;" alt="Błąd 404 - szukana strona nie istnieje"></div>
					</div>
				</div>	
			</div>		
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();

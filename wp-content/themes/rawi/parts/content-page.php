<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header lowheader">

		<div class="title-container">
			<div class="page-title"><?php the_title( '<h1 class="entry-title-page fontblue">', '</h1>' ); ?></div>
		</div>

	</header>

<div class="container" id="tresc">
	<div class="row">

		<section class="postarea">
			<?php
			the_content();
			?>
		</section>

		<aside class="sidebar">
			<?php
			get_sidebar();
			?>
		</aside>

	</div>	
</div>


</article>
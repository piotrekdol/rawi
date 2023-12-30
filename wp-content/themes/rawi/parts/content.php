<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
<?php 
$author_name =  get_the_author_meta( 'user_firstname' ); 
$author_surname = get_the_author_meta( 'user_lastname' );
?>

	<header class="entry-header-post">

		<div class="title-container">
			<div class="page-post-title"><?php the_title( '<h1 class="entry-title-post fontblack">', '</h1>' ); ?></div>
			<div class="metadata">
				<span>opublikowane</span><span class="author"><?php echo $author_name, " ", $author_surname; ?></span>&nbsp;•&nbsp;<?php the_time('d/m/Y'); ?>
			</div>
		</div>

	</header>

<div class="container">
	<div class="photorow">
		
		<div class="fimage">
			<?php if ( has_post_thumbnail() ) { 
	    	the_post_thumbnail( 'full', array('class' => 'feat-img-innerpost')); 
				}; ?>
		</div>

	</div>
</div>

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


</article><!-- #post-<?php the_ID(); ?> -->
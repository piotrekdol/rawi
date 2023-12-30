<?php
/*
Template Name: Main Page
*/
get_header();
?>

<script>
document.addEventListener( 'DOMContentLoaded', function() {
var splide = new Splide( '#animedtile', {
  	drag: false,
  	snap: false,
  	perPage: 3,
  	gap: 36,
  	pagination: false,
  	arrows: false,
  	breakpoints: {
     992: {
	   	type: 'loop',
       	perPage: 2,
	   	pagination: false,
	   	arrows: false,
	   	drag: 'free',
          },
	 768: {
	   	type: 'loop',
       	perPage: 2,
	   	pagination: false,
		arrows: false,
	   	drag: 'free',  
	  	  },
	 576: {
	   	perPage: 1,
	   	pagination: true,
		arrows: false,
  	   	type: 'loop',
  	   	drag: 'free',
  	   	padding: { left: 36, right: 36 }
  	   	// autoplay: 'true',
	  }
    }  
} );
    splide.mount();	
  } );

</script>

<section role="region" class="container">
	<div class="mainbanner">
		<div class="mainbannertitle">
			<h1 class="mainpage"><span class="bigfont fontblue">Animed </span><br>Przychodnia lekarska</h1>
		</div>
		<div id="animedtile" class="splide mainbannerbox" aria-label="Animed Przychodnia lekarska">
			<div class="splide__track">
				<ul class="splide__list">
					<li class="splide__slide">
						<div class="mainbannertile bgdarkblue">
							<div><?php the_field('lewy_boks'); ?></div>
							<button class="mainbuttontile bggreen" data-hover="Sprawdź">
								<div>Sprawdź</div>
							</button>
						</div>
					</li>
					<li class="splide__slide">							
						<div class="mainbannertile bgblue">
							<div><?php the_field('srodkowy_boks'); ?></div>
							<button class="mainbuttontile bggreen" data-hover="Pobierz druk" onclick="window.location.href='/wp-content/uploads/2023/11/deklaracja.zip'">
								<div>Pobierz druk</div>
							</button>
						</div>
					</li>
					<li class="splide__slide">
						<div class="mainbannertile bggreen">
							<div><?php the_field('prawy_boks'); ?></div>				
							<button class="mainbuttontile bgblue" data-hover="Kontakt" id="contactform">
								<div>Kontakt</div>
							</button>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>	
</section>

<section role="region" class="container space150" id="zakresuslug">
	<div class="row">
		<div class="zakresuslugrow">
			<div class="zakresuslugleft">
				<?php the_field( 'zakres_uslug_medycznych' ); ?>
			</div>
			<div class="zakresuslugright">
				<div>
				<h2 class="mainpage">Zakres usług<br />medycznych</h2>
				<button class="mainbuttontile bggreen" data-hover="Umów wizytę" id="contactform">
					<div>Umów wizytę</div>
				</button>
				</div>
			</div>
		</div>	
	</div>
</section>

<section role="region" class="containerfull space100t" id="laboratorium">
	<div class="labresearch">
		<div class="labresearchleft">
			<img src="<?php bloginfo('template_directory'); ?>/inc/badania-lab.webp" />
		</div>
		<div class="labresearchright">
			<div>
			<h2 class="mainpagecentr fontwhite">Badania laboratoryjne</h2>
				<div class="labresearchdesc"><div class="labresearcharrow"></div>Pełny zakres usług w&nbsp;ramach NFZ</div>
				<div><?php the_field('badania_laboratoryjne'); ?></div>
			</div>
		</div>
	</div>	
</section>

<section role="region" id="aktualnosci">
	<div class="container">
		<div class="row">
			<div class="horizcenter space100t">
				<h2 class="mainpage fontblack">Aktualności</h2>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">	
			<div class="news">

				<?php
				$args = array(
				    'posts_per_page' => 3,
				    'post_status'=>'publish', 
					'order' => 'DSC', 
					'cat'=>'4',
					'post_type'=>'post'
				); ?>
				<?php
				$custom_query = new WP_Query( $args );
				if ( $custom_query->have_posts() ) :
				    while ( $custom_query->have_posts() ) :
				        $custom_query->the_post();
				?> 
	       
			    <div class="news-list tile">	
					<div class="newsphoto">
					<?php if ( has_post_thumbnail() ) { 
			    	the_post_thumbnail( 'aktualnosc', array('class' => 'post-list-image')); 
						} else { ?>
						<a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory'); ?>/inc/post-list-feat-img.png" class="post-list-noimage" /></a>
						<?php } ?>
					</div>
					<h3 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<a href="<?php the_permalink(); ?>" class="readmore" href="<?php the_permalink(); ?>">Czytaj więcej
					</a>
				</div>

				<?php endwhile; ?>
				<?php endif; ?>

				<?php wp_reset_postdata(); ?>
			</div>
		</div>	
	</div>

	<div class="container">
		<div class="row">
			<div class="horizcenter">
				<button class="mainbuttontile bgblue" data-hover="Kliknij tutaj" onclick="window.location.href='/aktualnosci/'">
					<div>Zobacz wszystkie</div>
				</button>
			</div>	
		</div>
	</div>
</section>


<section role="region" id="galeria">
	<div class="container space100t">
		<div class="row">
			<div class="horizcenter">
				<h2 class="mainpage fontblack">Nasza przychodnia</h2>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="galleryrow tile">
			<?php the_field('galeria'); ?>
		</div>
	</div>
</section>

<section role="region" id="nasilekarze">
	<div class="container space100t">
		<div class="row">
			<div class="horizcenter">
				<h2 class="mainpage fontblack">Nasi lekarze</h2>
			</div>
		</div>
	</div>

	<div class="container space100b">
	    <div class="row">
	        <div>
	            <?php   
	                $args = array(  
	                    'post_type' => 'nasilekarze',
	                    'post_status' => 'publish',
	                    'posts_per_page' => -1,
	                    'order' => 'ASC',
	                ); 
	            ?>

	            <?php $loop = new WP_Query( $args ); ?>
	            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
	            
	            <button class="accordion tile"><h3><?php the_title(); ?></h3></button>
	                <div class="panel">
	                	<?php the_content(); ?>
	                </div>

	            <?php endwhile;?>
	            <?php wp_reset_postdata(); ?>
	        </div>
	    </div>
	</div>
</section>

<section class="container bggreen" id="kontakt">
	<div class="row">
		<div class="flexrow contactbar">
			<div class="contactbartxt">Jeśli chcesz zarezerwować wizytę, zapraszamy do kontaktu</div>
			<button class="mainbuttontile bgblue" data-hover="Kontakt" id="contactform">
				<div>Kontakt</div>
			</button>
		</div>
	</div>	
</section>

<section role="region">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2468.4050463230565!2d19.428404500000003!3d51.780482899999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471bcab76166a193%3A0x8ade94838d6bfe71!2zU3RlZmFuYSBPa3J6ZWkgNDAsIDkxLTAwOSDFgcOzZMW6!5e0!3m2!1spl!2spl!4v1701075751488!5m2!1spl!2spl" width="100%" height="400" style="border:0; margin-bottom: -7px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

<?php
get_footer();
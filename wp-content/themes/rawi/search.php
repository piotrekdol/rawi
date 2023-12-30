<?php
get_header();
global $wp_query;
?>


  


	<header class="entry-header lowheader">
			<div class="title-container" style="justify-content: center;">
				<div class="page-post-title" style="width: 100%;">
					<h1 class="entry-title-page"><?php _e( 'Znalazłem szukaną frazę', 'locale' ); ?> "<span style="background-color: yellow; color: #333333;"><?php the_search_query(); ?></span>" w <?php echo $wp_query->found_posts; ?> wpisach</h1>
				</div>
			</div>
	</header>

<div class="container">
  <div class="row">   
    
        <section class="searchpage">

          <?php if ( have_posts() ) { ?>

                <?php while ( have_posts() ) { the_post(); ?>
                  <div class="searchresult">
                  
                    <h2><a href="<?php echo get_permalink(); ?>">
                      <?php $title = the_title(); $keys= explode(" ",$s); $title = preg_replace('/('.implode('|', $keys) .')/iu', '<strong class="search-excerpt">\0</strong>', $title); ?>
                      <?php echo $title; ?>
                        </a></h2>
                          <?php  the_post_thumbnail('medium') ?>
                          <p><?php $excerpt = get_the_excerpt(); $keys= explode(" ",$s); $excerpt = preg_replace('/('.implode('|', $keys) .')/iu', '<strong class="search-excerpt">\0</strong>', $excerpt); ?>
                          <?php echo $excerpt; ?></p>
                        <a href="<?php the_permalink(); ?>">Go to entry</a>
                 
                  </div>
                <?php } ?>

              
<div class="pagination">
            <?php 
    echo paginate_links( array(
        'prev_text'    => sprintf( '<i></i> %1$s', __( 'Newer Posts', 'text-domain' ) ),
        'next_text'    => sprintf( '%1$s <i></i>', __( 'Older Posts', 'text-domain' ) )
    ) );

            ?></div>

            <?php } ?>

        </section>

    
  </div>  
</div>

  <?php get_footer(); ?>



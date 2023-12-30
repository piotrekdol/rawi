<footer role="complementary">
	
	<div class="footermenu">
		<div class="footermenucontact">
			<h2 class="mainpagecentr fontwhite">Kontakt</h2>
			<p>Przychodnia Lekarska Animed realizuje usługi w ramach umowy z NFZ</p>
			<div class="headercontactsbox"><div class="headericon teltopf"></div><?php dynamic_sidebar( 'telefon' ); ?></div>
      		<div class="headercontactsbox"><div class="headericon timetopf"></div><?php dynamic_sidebar( 'godzinyotwarcia' ); ?></div>
      		<div class="headercontactsbox"><div class="headericon placetopf"></div><?php dynamic_sidebar( 'adres' ); ?></div>
		</div>
		<div class="footermenulinks">
			<?php
                wp_nav_menu( array(
                    'theme_location' => 'main-menu',
                    'container'      => 'ul',
                    'menu_class'     => 'footermenu',
                    'depth' 		 => '1',
                    'items_wrap'     => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
            ) );
            ?>
		</div>			
	</div>

	<div class="footeradd">
		<div class="footerlogo"><a href="/" class="animedlogotext fontwhite">RAWI</a></div>
		<div class="footertitle"><?php bloginfo('description'); ?>&#160;&#169;&#160;<?php echo date('Y'); ?></div>			
	</div>
</footer>

<?php wp_footer(); ?>

<script
			  src="https://code.jquery.com/jquery-3.7.1.min.js"
			  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
			  crossorigin="anonymous"></script>

			  <script type="text/javascript">
	$(document).ready(function(){
  $('#nav-icon').click(function(){
    $(this).toggleClass('open');
  });
});
</script>
<script src="<?php bloginfo('template_directory'); ?>/js/custom-mobile-menu.js"></script>
</body>
</html>
<?php

function pwp_start_page() {
	if ( !current_user_can( 'publish_posts' ) ) {
		wp_die( PWP_NO_PERMISSION_TEXT );
	}

	?>
	<div class="wrap">

		<img class="icon" alt="icon" src="<?php echo PWP_ICON; ?>" />
  	<h2>Prémium WordPress bővítmény</h2>
  
		<div class="clearline"></div>
		
	  	<div class="section-block">

			<h2>Prémium WordPress bővítmény bemutatása</h2>
			<p>A Prémium WordPress bővítmény célja, hogy a lehető leghasznosabb funkciókkal bővítse a WordPress alaprendszert magyarul. Nem csak a bővítmény szövege magyar, hanem kifejezetten magyar felhasználóknak készült a magyarországi igényeket figyelembevéve. A fejlesztő, azaz én is magyar vagyok, így a további kéréseket, fejlesztési igényeket is magyarul tudják a felhasználók kérni.</p>
			<p>A bővítmény funkcióit folyamatosan bővítem a saját tapasztalataim és a felhasználók visszajelzései alapján.</p>
			<p style="text-align:right;">Üdvözlettel, Ambrus Péter ~ Surbma</p>
	
	  	</div>

		<div class="clearline"></div>
		
	</div>
	<?php
}


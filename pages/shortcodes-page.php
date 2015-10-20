<?php

function surbma_premium_wp_shortcodes_page() {
	if ( !isset( $_GET['settings-updated'] ) )
		$_GET['settings-updated'] = false;
?>
	<div class="wrap premium-wp premium-wp-shortcodes uk-grid uk-margin-top">
		<div class="uk-width-9-10">
			<h1 class="dashicons-before dashicons-editor-code"><?php _e( 'Premium WP', 'surbma-premium-wp' ); ?>: <?php _e( 'Extra Shortcodes', 'surbma-premium-wp' ); ?></h1>
			<p>A rövidkódok egyszerűen beilleszthetők egy oldal vagy bejegyzés szöveg mezőjébe. Ezek előre meghatározott funkciókat látnak el. Vannak rövidkódok, amik paraméterezhetők, ezek is mind megtalálhatók az adott rövidkód leírásában.</p>
			<p>A paramétereket a következő formában kell a rövidkódhoz megadni: <code>[rovidkod parameter1="ertek1" parameter2="ertek2"]</code></p>

			<div class="uk-panel uk-panel-box uk-panel-box-secondary uk-panel-header">
				<h3 class="uk-panel-title"><?php _e( 'Shortcode', 'surbma-premium-wp' ); ?>: [mailto]</h3>
				<p>Ezzel a rövidkóddal úgy jeleníthető meg az oldalon az Email cím, hogy azt a robotok ne tudják elolvasni. A HTML kódban mindössze értelmetlen karaktereket jelenít meg. Az email cím automatikusan link is lesz, amire kattintva azonnal küldhető email üzenet.</p>
				<h4>Használata:</h4>
				<code>[mailto]email@email.hu[/mailto]</code>
			</div>
			<div class="uk-panel uk-panel-box uk-panel-box-secondary uk-panel-header">
				<h3 class="uk-panel-title"><?php _e( 'Shortcode', 'surbma-premium-wp' ); ?>: [vendeg] és [tag]</h3>
				<p>Ezekkel a rövidkódokkal meg tudjuk határozni egy adott oldalon/bejegyzésen belül, hogy milyen tartalmat láthatnak a normál látogatók és a regisztrált tagok. Ami tartalom a [vendeg] shortcode-on belül van, azt csak a nem bejelentkezett, ami a [tag] shortcode-on belül van, azt pedig csak a bejelentkezett látogatók látják.</p>
				<h4>Használata:</h4>
				<ul>
					<li><code>[vendeg]Tartalom...[/vendeg]</code> - ezt csak vendégek látják</li>
					<li><code>[tag]Tartalom...[/tag]</code> - ezt csak a bejelentkezett felhasználók látják</li>
				</ul>
			</div>
			<div class="uk-panel uk-panel-box uk-panel-box-secondary uk-panel-header">
				<h3 class="uk-panel-title"><?php _e( 'Shortcode', 'surbma-premium-wp' ); ?>: [nev], [ceg], [cim], [adoszam], [cegjegyzekszam], [bankszamlaszam], [mobiltelefon], [telefon], [fax], [email], [skype], [ceginfo]</h3>
				<p>Ezekkel a rövidkódokkal tudjuk megjeleníteni az alapadatoknál megadott értékeket.</p>
				<h4>Használata:</h4>
				<ul>
					<li><code>[nev]</code> - megjeleníti a nevet</li>
					<li><code>[ceg]</code> - megjeleníti a céget</li>
					<li><code>[cim]</code> - megjeleníti a címet</li>
					<li><code>[adoszam]</code> - megjeleníti az adószámot</li>
					<li><code>[cegjegyzekszam]</code> - megjeleníti a cégjegyzékszámot</li>
					<li><code>[bankszamlaszam]</code> - megjeleníti a bankszámlaszámot</li>
					<li><code>[mobiltelefon]</code> - megjeleníti a mobiltelefonszámot</li>
					<li><code>[telefon]</code> - megjeleníti a telefonszámot</li>
					<li><code>[fax]</code> - megjeleníti a faxszámot</li>
					<li><code>[email]</code> - megjeleníti az email címet (a robotok számára titkosítottan jelenink meg a html kódban)</li>
					<li><code>[skype]</code> - megjeleníti a skype címet</li>
					<li><code>[ceginfo]</code> - megjeleníti a cég rövid leírását</li>
				</ul>
			</div>
			<div class="uk-panel uk-panel-box uk-panel-box-secondary uk-panel-header">
				<h3 class="uk-panel-title"><?php _e( 'Shortcode', 'surbma-premium-wp' ); ?>: [div]</h3>
				<p>Ezzel a rövidkóddal egy div elemet illeszthetünk be. Ez hasznos lehet, amikor sor törésre van szükségünk, de egyéb megoldásokra is jó egy programozó számára.</p>
				<div class="uk-overflow-container">
					<table class="uk-table uk-table-hover uk-table-striped">
						<thead>
							<tr>
								<th>Paraméter</th>
								<th>Leírás</th>
								<th>Lehetséges értékek</th>
								<th>Alapértelmezett érték</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><code>id</code></td>
								<td>Egyedi azonosító megadása.</td>
								<th>a-z | A-Z | 0-9</th>
								<td>NINCS</td>
							</tr>
							<tr>
								<td><code>class</code></td>
								<td>Osztály megadása, így könnyen formázható lesz CSS fájlból.</td>
								<th>a-z | A-Z | 0-9</th>
								<td>NINCS</td>
							</tr>
							<tr>
								<td><code>style</code></td>
								<td>Stílus kódok megadása, ami felülír minden css formázást.</td>
								<th>CSS</th>
								<td>NINCS</td>
							</tr>
						</tbody>
					</table>
				</div>
				<h4>Használata:</h4>
				<code>[div class="black" style="height:0px;"]</code> vagy <code>[div class="black"]Tartalom...[/div]</code>
			</div>
			<div class="uk-panel uk-panel-box uk-panel-box-secondary uk-panel-header">
				<h3 class="uk-panel-title"><?php _e( 'Shortcode', 'surbma-premium-wp' ); ?>: [google-calendar]</h3>
				<p>Ezzel a rövidkóddal egy Google Naptárat illeszthetünk be. Először a Google Naptár iframe beágyazó kódját kell lekérni, amiből ki kell másolni a szükséges paramétereket.</p>
				<div class="uk-overflow-container">
					<table class="uk-table uk-table-hover uk-table-striped">
						<thead>
							<tr>
								<th>Paraméter</th>
								<th>Leírás</th>
								<th>Lehetséges értékek</th>
								<th>Alapértelmezett érték</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><code>src</code></td>
								<td>A Google Naptár iframe url-je. A lekért kódban ez az "src" paraméter. Minden url a <code>https://www.google.com/calendar/embed?</code> részlettel kezdődik, így ezt nem kell kimásolni, csak a kérdőjel utáni részt. Ezek határozzák meg a Google Naptár összes tulajdonságát.</td>
								<th>URL</th>
								<td>NINCS</td>
							</tr>
							<tr>
								<td><code>width</code></td>
								<td>A Google Naptár szélességét lehet ezzel a paraméterrel meghatározni pixelben.</td>
								<th>Szám</th>
								<td>400</td>
							</tr>
							<tr>
								<td><code>height</code></td>
								<td>A Google Naptár magasságát lehet ezzel a paraméterrel meghatározni pixelben.</td>
								<th>Szám</th>
								<td>300</td>
							</tr>
							<tr>
								<td><code>scrolling</code></td>
								<td>A beágyazott iframe keret görgetési lehetőségét lehet ezzel a paraméterrel meghatározni.</td>
								<th>auto | no | yes</th>
								<td>auto</td>
							</tr>
						</tbody>
					</table>
				</div>
				<h4>Használata:</h4>
				<code>[google-calendar src="ide jön a kérdőjel utáni url részlet"]</code> vagy <code>[google-calendar src="ide jön a kérdőjel utáni url részlet" width="640" height="480"]</code>
			</div>
			<div class="uk-panel uk-panel-box uk-panel-box-secondary uk-panel-header">
				<h3 class="uk-panel-title"><?php _e( 'Shortcode', 'surbma-premium-wp' ); ?>: [facebook-tetszik-gomb]</h3>
				<p>Facebook "tetszik" gomb beillesztése az oldalra. A kód paraméterezhető és a "küldés" gomb is engedélyezhető.</p>
				<div class="uk-overflow-container">
					<table class="uk-table uk-table-hover uk-table-striped">
						<thead>
							<tr>
								<th>Paraméter</th>
								<th>Leírás</th>
								<th>Lehetséges értékek</th>
								<th>Alapértelmezett érték</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><code>url</code></td>
								<td>A gomb linkje, amire "tetszik"-et nyom a látogató.</td>
								<th>URL</th>
								<td>Aktuális oldal url-je</td>
							</tr>
						</tbody>
					</table>
				</div>
				<h4>Használata:</h4>
				<ul>
					<li><code>[facebook-tetszik-gomb]</code> - Normál megjelenítés az alapértelmezett paraméterekkel</li>
					<li><code>[facebook-tetszik-gomb url="http://www.sajatdomain.hu"]</code> - Mindig a megadott domain url-jére nyomnak "tetszik"-et.</li>
				</ul>
			</div>
			<div class="uk-panel uk-panel-box uk-panel-box-secondary uk-panel-header">
				<h3 class="uk-panel-title"><?php _e( 'Shortcode', 'surbma-premium-wp' ); ?>: [facebook-oldal]</h3>
				<p>Facebook oldal doboz beillesztése az oldalra. A kód paraméterezhető.</p>
				<div class="uk-overflow-container">
					<table class="uk-table uk-table-hover uk-table-striped">
						<thead>
							<tr>
								<th>Paraméter</th>
								<th>Leírás</th>
								<th>Lehetséges értékek</th>
								<th>Alapértelmezett érték</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><code>url</code></td>
								<td>A Facebook oldal url-je. Ez az egyetlen kötelező paraméter.</td>
								<td>URL</td>
								<td>NINCS</td>
							</tr>
							<tr>
								<td><code>width</code></td>
								<td>A Facebook oldal doboz szélessége pixelben.</td>
								<td>Min. 180 | Max. 500</td>
								<td>340</td>
							</tr>
							<tr>
								<td><code>height</code></td>
								<td>A Facebook oldal doboz magassága pixelben.</td>
								<td>Min. 70</td>
								<td>500</td>
							</tr>
							<tr>
								<td><code>small_header</code></td>
								<td>Kisebb fejléc használata.</td>
								<td>true | false</td>
								<td>false</td>
							</tr>
							<tr>
								<td><code>adapt_container_width</code></td>
								<td>A konténer szélességéhez igazodik.</td>
								<td>true | false</td>
								<td>true</td>
							</tr>
							<tr>
								<td><code>hide_cover</code></td>
								<td>Borítókép elrejtése a fejlécben.</td>
								<td>true | false</td>
								<td>false</td>
							</tr>
							<tr>
								<td><code>show_facepile</code></td>
								<td>Profil fotók megjelenítése, amikor az ismerősöknek tetszik.</td>
								<td>true | false</td>
								<td>true</td>
							</tr>
							<tr>
								<td><code>show_posts</code></td>
								<td>A Facebook oldal bejegyzéseinek megjelenítése.</td>
								<td>true | false</td>
								<td>true</td>
							</tr>
							<tr>
								<td><code>hide_cta</code></td>
								<td>Egyedi felhívás gomb elrejtése.</td>
								<td>true | false</td>
								<td>false</td>
							</tr>
						</tbody>
					</table>
				</div>
				<h4>Használata:</h4>
				<ul>
					<li><code>[facebook-oldal url=""]</code> - Normál megjelenítés az alapértelmezett paraméterekkel</li>
					<li><code>[facebook-oldal url="http://www.sajatdomain.hu"]</code> - Mindig a megadott domain url-jére nyomnak "tetszik"-et.</li>
				</ul>
			</div>
			<div class="uk-panel uk-panel-box uk-panel-box-secondary uk-panel-header">
				<h3 class="uk-panel-title"><?php _e( 'Shortcode', 'surbma-premium-wp' ); ?>: [pwp-youtube]</h3>
				<p>YouTube videó beillesztése a Szöveg Widgetekbe. A shortcode beilleszthető bármilyen bejegyzés vagy oldal tartalmába is, de ott a WordPress saját beillesztési megoldása ajánlott, azaz a YouTube videó url-jét kell egy külön sorba tenni.</p>
				<div class="uk-overflow-container">
					<table class="uk-table uk-table-hover uk-table-striped">
						<thead>
							<tr>
								<th>Paraméter</th>
								<th>Leírás</th>
								<th>Lehetséges értékek</th>
								<th>Alapértelmezett érték</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><code>id</code></td>
								<td>A YouTube videó azonosítója, ami a normál url-ben megtalálható a v= paraméter után vagy a rövidített url-ben a legvégén.</td>
								<th>a-z | A-Z | 0-9</th>
								<td>NINCS</td>
							</tr>
							<tr>
								<td><code>width</code></td>
								<td>A YouTube videó szélessége pixelben.</td>
								<th>Szám</th>
								<td>NINCS</td>
							</tr>
							<tr>
								<td><code>height</code></td>
								<td>A YouTube videó magasságban pixelben.</td>
								<th>Szám</th>
								<td>NINCS</td>
							</tr>
						</tbody>
					</table>
				</div>
				<h4>Használata:</h4>
				<ul>
					<li><code>[pwp-youtube id="AAaa00ZzZz99" width="640" height="480"]</code> - A videó 640 x 480 px méretben jelenik meg.</li>
				</ul>
			</div>
			<div class="uk-panel uk-panel-box uk-panel-box-secondary uk-panel-header">
				<h3 class="uk-panel-title"><?php _e( 'Shortcode', 'surbma-premium-wp' ); ?>: [pwp-vimeo]</h3>
				<p>Vimeo videó beillesztése a Szöveg Widgetekbe. A shortcode beilleszthető bármilyen bejegyzés vagy oldal tartalmába is, de ott a WordPress saját beillesztési megoldása ajánlott, azaz a Vimeo videó url-jét kell egy külön sorba tenni.</p>
				<div class="uk-overflow-container">
					<table class="uk-table uk-table-hover uk-table-striped">
						<thead>
							<tr>
								<th>Paraméter</th>
								<th>Leírás</th>
								<th>Lehetséges értékek</th>
								<th>Alapértelmezett érték</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><code>id</code></td>
								<td>A Vimeo videó azonosítója, ami az url végén megtalálható.</td>
								<th>a-z | A-Z | 0-9</th>
								<td>NINCS</td>
							</tr>
							<tr>
								<td><code>width</code></td>
								<td>A Vimeo videó szélessége pixelben.</td>
								<th>Szám</th>
								<td>NINCS</td>
							</tr>
							<tr>
								<td><code>height</code></td>
								<td>A Vimeo videó magasságban pixelben.</td>
								<th>Szám</th>
								<td>NINCS</td>
							</tr>
						</tbody>
					</table>
				</div>
				<h4>Használata:</h4>
				<ul>
					<li><code>[pwp-vimeo id="1234567890" width="640" height="480"]</code> - A videó 640 x 480 px méretben jelenik meg.</li>
				</ul>
			</div>
		</div>
	</div>
<?php
}

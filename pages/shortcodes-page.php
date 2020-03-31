<?php

function surbma_premium_wp_shortcodes_page() {
	if ( !isset( $_GET['settings-updated'] ) )
		$_GET['settings-updated'] = false;
?>
<div class="premium-wp premium-wp-shortcodes uk-grid uk-margin-top">
	<div class="wrap uk-width-9-10">
		<h1 class="dashicons-before dashicons-editor-code"><?php _e( 'Premium WP', 'surbma-premium-wp' ); ?>: <?php _e( 'Extra Shortcodes', 'surbma-premium-wp' ); ?></h1>
		<p>A rövidkódok egyszerűen beilleszthetők egy oldal vagy bejegyzés szöveg mezőjébe. Ezek előre meghatározott funkciókat látnak el. Vannak rövidkódok, amik paraméterezhetők, ezek is mind megtalálhatók az adott rövidkód leírásában.</p>
		<p>A paramétereket a következő formában kell a rövidkódhoz megadni: <code>[rovidkod parameter1="ertek1" parameter2="ertek2"]</code></p>

		<div class="uk-panel uk-panel-box uk-panel-box-secondary uk-panel-header">
			<h3 class="uk-panel-title"><?php _e( 'Shortcode', 'surbma-premium-wp' ); ?>: [mailto]</h3>
			<p>Ezzel a rövidkóddal úgy jeleníthető meg az oldalon az Email cím, hogy azt a robotok ne tudják elolvasni. A HTML kódban mindössze értelmetlen karaktereket jelenít meg. Az email cím automatikusan link is lesz, amire kattintva azonnal küldhető email üzenet.</p>
			<h4>Használata:</h4>
			<ul>
				<li><code>[mailto]email@email.hu[/mailto]</code></li>
			</ul>
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
							<td>a-z | A-Z | 0-9</td>
							<td>NINCS</td>
						</tr>
						<tr>
							<td><code>class</code></td>
							<td>Osztály megadása, így könnyen formázható lesz CSS fájlból.</td>
							<td>a-z | A-Z | 0-9</td>
							<td>NINCS</td>
						</tr>
						<tr>
							<td><code>style</code></td>
							<td>Stílus kódok megadása, ami felülír minden css formázást.</td>
							<td>CSS</td>
							<td>NINCS</td>
						</tr>
					</tbody>
				</table>
			</div>
			<h4>Használata:</h4>
			<ul>
				<li><code>[div class="black" style="height:0px;"]</code></li>
				<li><code>[div class="black"]Tartalom...[/div]</code></li>
			</ul>
		</div>
		<div class="uk-panel uk-panel-box uk-panel-box-secondary uk-panel-header">
			<h3 class="uk-panel-title"><?php _e( 'Shortcode', 'surbma-premium-wp' ); ?>: [ga-link]</h3>
			<p>Ezzel a rövidkóddal olyan linket lehet elhelyezni a weboldalon, amit a Google Analytics-ben külön lehet mérni. Főleg letöltésekhez ajánlott, így az esetleges statikus fájlok, dokumentumok, média fájlok kattintásánál is lehet követni a látogatókat.</p>
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
							<td><code>universal</code></td>
							<td>Ezzel a paraméterrel aktiválható a régi Universal Analytics struktúra. Alapértelmezetten az új gtag.js struktúrát használja a kód, a legtöbb esetben ez kell.</td>
							<td>true | false</td>
							<td>false</td>
						</tr>
						<tr>
							<td><code>href</code></td>
							<td>Ez a hivatkozás célja, az URL, amit szeretnénk ezzel a lehetőséggel követni.</td>
							<td>URL</td>
							<td>NINCS</td>
						</tr>
						<tr>
							<td><code>class</code></td>
							<td>Egy vagy több class adható a linkhez egyedi formázáshoz.</td>
							<td>a-z | A-Z | 0-9</td>
							<td>NINCS</td>
						</tr>
						<tr>
							<td><code>id</code></td>
							<td>Egyedi azonosító adható meg a linkhez.</td>
							<td>a-z | A-Z | 0-9</td>
							<td>NINCS</td>
						</tr>
						<tr>
							<td><code>style</code></td>
							<td>Egyedi stílusok adhatók meg a linkhez.</td>
							<td>CSS</td>
							<td>NINCS</td>
						</tr>
						<tr>
							<td><code>title</code></td>
							<td>A title tulajdonság olyan szabad szavas szöveget ad a linkhez, ami akkor jelenik meg, ha az egeret a linkre visszük.</td>
							<td></td>
							<td>NINCS</td>
						</tr>
						<tr>
							<td><code>target</code></td>
							<td>A link cél tulajdonsága határozható meg ezzel a paraméterrel. Az alapértelmezett beállítással a linkre kattintva egy új fület nyit meg.</td>
							<td>_blank | _self | _parent | _top</td>
							<td>_blank</td>
						</tr>
						<tr>
							<td><code>eventCategory</code></td>
							<td>A kattintáshoz tartozó esemény kategóriája a Google Analytics-ben.</td>
							<td>a-z | A-Z | 0-9</td>
							<td>outbound</td>
						</tr>
						<tr>
							<td><code>eventAction</code></td>
							<td>A kattintáshoz tartozó esemény megnevezése a Google Analytics-ben.</td>
							<td>a-z | A-Z | 0-9</td>
							<td>link</td>
						</tr>
						<tr>
							<td><code>eventLabel</code></td>
							<td>A kattintáshoz tartozó esemény címkéje a Google Analytics-ben.</td>
							<td>a-z | A-Z | 0-9</td>
							<td>NINCS</td>
						</tr>
					</tbody>
				</table>
			</div>
			<h4>Használata:</h4>
			<ul>
				<li><code>[ga-link href="http://domain.hu/csali.pdf"]Töltsd le az ingyenes tanulmányunkat[/ga-link]</code></li>
			</ul>
		</div>
		<div class="uk-panel uk-panel-box uk-panel-box-secondary uk-panel-header">
			<h3 class="uk-panel-title"><?php _e( 'Shortcode', 'surbma-premium-wp' ); ?>: [google-maps]</h3>
			<p>Ezzel a rövidkóddal egy Google Térképet illeszthetünk be. Két féle térkép módot tudunk beállítani: az egyik móddal egy speciális helyet (pl.: étterem, hotel, kereskedelmi egység, nevezetes helyek, stb.) tudunk az azonosítója alapján megjeleníteni, a másik móddal pedig a szélességi és hosszúsági koordináták megadásával tudunk egy térképet megjeleníteni.</p>
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
							<td><code>key</code></td>
							<td>A Google Térképeket már csak érvényes API kulccsal lehet megjeleníttetni. Alapértelmezettként a Prémium WP ügyfeleknek rendelkezésre áll egy érvényes API kulcs, ezért ezt nem kell megadni. A kulcs domain limitált, így nem Prémium WP ügyfeleknek meg kell adni ezt a paramétert.</td>
							<td>API KEY</td>
							<td>Érvényes Prémium WP API kulcs</td>
						</tr>
						<tr>
							<td><code>mode</code></td>
							<td>A Google Térkép módját lehet kiválasztani. A place mód egy kifejezett helyet (pl.: étterem, hotel, kereskedelmi egység, nevezetes helyek, stb.) jelenít meg az azonosítója alapján. A view mód pedig a megadott szélességi és hosszúsági koordináták alapján jeleníti meg a térképet.</td>
							<td>place | view</td>
							<td>place</td>
						</tr>
						<tr>
							<td><code>place_id</code></td>
							<td><strong>FIGYELEM! Csak place módban kell megadni!</strong> A place_id paraméter egy azonosító, amit place módban kell megadni. Ez azonosítja a helyet. A következő linken lehet az azonosítóra rákeresni, amit itt meg kell adni:<br>
								<a href="https://developers.google.com/places/place-id" target="_blank">Place ID keresése</a>
							</td>
							<td>ID</td>
							<td>NINCS</td>
						</tr>
						<tr>
							<td><code>lat</code></td>
							<td><strong>FIGYELEM! Csak view módban kell megadni!</strong> Szélességi koordináta, ami az adott pozíciót meghatározza. A koordináta konvertálását a megadott címből a következő linken lehet megtenni:<br>
								<a href="https://www.latlong.net/" target="_blank">Szélességi és hosszúsági koordináták konvertálása</a>
							</td>
							<td>Szám</td>
							<td>NINCS</td>
						</tr>
						<tr>
							<td><code>long</code></td>
							<td><strong>FIGYELEM! Csak view módban kell megadni!</strong> Hosszúsági koordináta, ami az adott pozíciót meghatározza. A koordináta konvertálását a megadott címből a következő linken lehet megtenni:<br>
								<a href="https://www.latlong.net/" target="_blank">Szélességi és hosszúsági koordináták konvertálása</a>
							</td>
							<td>Szám</td>
							<td>NINCS</td>
						</tr>
						<tr>
							<td><code>zoom</code></td>
							<td>A térkép nagytási értéke. Minél nagyobb a szám, annál közelebb nagyít a térképen.</td>
							<td>Szám 0-21 között</td>
							<td>15</td>
						</tr>
						<tr>
							<td><code>maptype</code></td>
							<td>A térkép megjelenítése lehet "Térkép" és "Műhold", azaz roadmap és satellite.</td>
							<td>roadmap | satellite</td>
							<td>roadmap</td>
						</tr>
						<tr>
							<td><code>width</code></td>
							<td>A Google Térkép maximális szélességét lehet ezzel a paraméterrel meghatározni pixelben.</td>
							<td>Szám</td>
							<td>1000</td>
						</tr>
						<tr>
							<td><code>height</code></td>
							<td>A Google Térkép szélességéhez képest lehet megadni magasságát százalékban. Tehát hány százaléka legyen a magasság a szélességhez képest, azaz a képarányt.</td>
							<td>Szám</td>
							<td>55</td>
						</tr>
					</tbody>
				</table>
			</div>
			<h4>Használata:</h4>
			<ul>
				<li><code>[google-maps place_id="ChIJbf8C1yFxdDkR3n12P4DkKt0"]</code></li>
				<li><code>[google-maps mode="view" lat="27.174516" long="78.042171" maptype="satellite" zoom="20"]</code></li>
			</ul>
		</div>
		<div class="uk-panel uk-panel-box uk-panel-box-secondary uk-panel-header">
			<h3 class="uk-panel-title"><?php _e( 'Shortcode', 'surbma-premium-wp' ); ?>: [google-docs]</h3>
			<p>Ezzel a rövidkóddal egy Google Dokumentumot illeszthetünk be. Először a Google Dokumentum iframe beágyazó kódját kell lekérni, amiből ki kell másolni a szükséges azonosítót.</p>
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
							<td>A Google Dokumentum iframe url-je. A lekért kódban ez az "src" paraméter. Minden url a <code>https://docs.google.com/document/d/e/</code> részlettel kezdődik, így ezt nem kell kimásolni, csak az ezt követő részt.</td>
							<td>URL</td>
							<td>NINCS</td>
						</tr>
						<tr>
							<td><code>width</code></td>
							<td>A Google Dokumentum szélességét lehet ezzel a paraméterrel meghatározni pixelben vagy százalék.</td>
							<td>Szám</td>
							<td>100%</td>
						</tr>
						<tr>
							<td><code>height</code></td>
							<td>A Google Dokumentum magasságát lehet ezzel a paraméterrel meghatározni pixelben.</td>
							<td>Szám</td>
							<td>500</td>
						</tr>
						<tr>
							<td><code>scrolling</code></td>
							<td>A beágyazott iframe keret görgetési lehetőségét lehet ezzel a paraméterrel meghatározni.</td>
							<td>auto | no | yes</td>
							<td>auto</td>
						</tr>
					</tbody>
				</table>
			</div>
			<h4>Használata:</h4>
			<ul>
				<li><code>[google-docs src="ide jön a megfelelő url részlet"]</code></li>
				<li><code>[google-docs src="ide jön a megfelelő url részlet" width="640" height="480"]</code></li>
			</ul>
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
							<td>URL</td>
							<td>NINCS</td>
						</tr>
						<tr>
							<td><code>width</code></td>
							<td>A Google Naptár szélességét lehet ezzel a paraméterrel meghatározni pixelben.</td>
							<td>Szám</td>
							<td>400</td>
						</tr>
						<tr>
							<td><code>height</code></td>
							<td>A Google Naptár magasságát lehet ezzel a paraméterrel meghatározni pixelben.</td>
							<td>Szám</td>
							<td>300</td>
						</tr>
						<tr>
							<td><code>scrolling</code></td>
							<td>A beágyazott iframe keret görgetési lehetőségét lehet ezzel a paraméterrel meghatározni.</td>
							<td>auto | no | yes</td>
							<td>auto</td>
						</tr>
					</tbody>
				</table>
			</div>
			<h4>Használata:</h4>
			<ul>
				<li><code>[google-calendar src="ide jön a kérdőjel utáni url részlet"]</code></li>
				<li><code>[google-calendar src="ide jön a kérdőjel utáni url részlet" width="640" height="480"]</code></li>
			</ul>
		</div>
		<div class="uk-panel uk-panel-box uk-panel-box-secondary uk-panel-header">
			<h3 class="uk-panel-title"><?php _e( 'Shortcode', 'surbma-premium-wp' ); ?>: [google-presentation]</h3>
			<p>Ezzel a rövidkóddal Google Diákat illeszthetünk be. Először a Google Diák iframe beágyazó kódját kell lekérni, amiből ki kell másolni a szükséges paramétereket.</p>
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
							<td>A Google Diák azonosítója. A lekért kódban ez az "src" paraméterben található. Minden url a <code>https://docs.google.com/presentation/d/</code> részlettel kezdődik, így ezt nem kell kimásolni, csak a /d/ utáni és az /embed előtti részt.</td>
							<td>ID</td>
							<td>NINCS</td>
						</tr>
						<tr>
							<td><code>start</code></td>
							<td>Azt határozza meg ez a paraméter, hogy elinduljon-e automatikusan a dia vagy sem.</td>
							<td>true | false</td>
							<td>false</td>
						</tr>
						<tr>
							<td><code>loop</code></td>
							<td>Azt határozza meg ez a paraméter, hogy ismétlődjön-e a dia vagy sem.</td>
							<td>true | false</td>
							<td>false</td>
						</tr>
						<tr>
							<td><code>delayms</code></td>
							<td>Azt határozza meg ez a paraméter, hogy mennyi idő legyen két dia között ezredmásodpercben.</td>
							<td>Szám</td>
							<td>3000</td>
						</tr>
						<tr>
							<td><code>width</code></td>
							<td>A Google Diák szélességét lehet ezzel a paraméterrel meghatározni pixelben.</td>
							<td>Szám</td>
							<td>400</td>
						</tr>
						<tr>
							<td><code>height</code></td>
							<td>A Google Diák magasságát lehet ezzel a paraméterrel meghatározni pixelben.</td>
							<td>Szám</td>
							<td>300</td>
						</tr>
					</tbody>
				</table>
			</div>
			<h4>Használata:</h4>
			<ul>
				<li><code>[google-presentation id="ide jön a /d/ utáni és az /embed előtti részlet"]</code></li>
				<li><code>[google-presentation id="ide jön a /d/ utáni és az /embed előtti részlet" start="true" width="640" height="480"]</code></li>
			</ul>
		</div>
		<div class="uk-panel uk-panel-box uk-panel-box-secondary uk-panel-header">
			<h3 class="uk-panel-title"><?php _e( 'Shortcode', 'surbma-premium-wp' ); ?>: [google-form]</h3>
			<p>Ezzel a rövidkóddal egy Google Űrlapot illeszthetünk be. Először a Google Űrlap iframe beágyazó kódját kell lekérni, amiből ki kell másolni a szükséges paramétereket.</p>
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
							<td>A Google Űrlap azonosítója. A lekért kódban ez az "src" paraméterben található. Minden url a <code>https://docs.google.com/forms/d/</code> részlettel kezdődik, így ezt nem kell kimásolni, csak a /d/ utáni és a /viewform előtti részt.</td>
							<td>ID</td>
							<td>NINCS</td>
						</tr>
						<tr>
							<td><code>width</code></td>
							<td>A Google Űrlap szélességét lehet ezzel a paraméterrel meghatározni pixelben.</td>
							<td>Szám</td>
							<td>760</td>
						</tr>
						<tr>
							<td><code>height</code></td>
							<td>A Google Űrlap magasságát lehet ezzel a paraméterrel meghatározni pixelben.</td>
							<td>Szám</td>
							<td>500</td>
						</tr>
					</tbody>
				</table>
			</div>
			<h4>Használata:</h4>
			<ul>
				<li><code>[google-form id="ide jön a /d/ utáni és a /viewform előtti részlet"]</code></li>
				<li><code>[google-form id="ide jön a /d/ utáni és a /viewform előtti részlet" width="640" height="480"]</code></li>
			</ul>
		</div>
		<div class="uk-panel uk-panel-box uk-panel-box-secondary uk-panel-header">
			<h3 class="uk-panel-title"><?php _e( 'Shortcode', 'surbma-premium-wp' ); ?>: [facebook-tetszik-gomb]</h3>
			<p>Facebook "tetszik" gomb beillesztése az oldalra. A kód paraméterezhető és a "megosztás" gomb is engedélyezhető.</p>
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
							<td>URL</td>
							<td>Aktuális oldal url-je</td>
						</tr>
						<tr>
							<td><code>width</code></td>
							<td>A gomb szélessége pixelben.</td>
							<td>Szám</td>
							<td>NINCS</td>
						</tr>
						<tr>
							<td><code>layout</code></td>
							<td>A gomb kinézete.</td>
							<td>standard | box_count | button_count | button</td>
							<td>button</td>
						</tr>
						<tr>
							<td><code>action</code></td>
							<td>A gomb típusát határozhatjuk meg, hogy "Tetszik" vagy "Ajánlom" legyen a gombra írva.</td>
							<td>like | recommend</td>
							<td>like</td>
						</tr>
						<tr>
							<td><code>size</code></td>
							<td>A gomb méretét állíthatjuk be.</td>
							<td>small | large</td>
							<td>large</td>
						</tr>
						<tr>
							<td><code>show_faces</code></td>
							<td>Arcok mutatása a gomb mellett.</td>
							<td>true | false</td>
							<td>false</td>
						</tr>
						<tr>
							<td><code>share</code></td>
							<td>Megosztás gomb megjelenítése a Like gomb mellett.</td>
							<td>true | false</td>
							<td>fasle</td>
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
			<h3 class="uk-panel-title"><?php _e( 'Shortcode', 'surbma-premium-wp' ); ?>: [facebook-megosztas-gomb]</h3>
			<p>Facebook megosztás gomb beillesztése az oldalra. A kód paraméterezhető.</p>
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
							<td>A weboldal url-je, amit megoszt a Facebook-on a látogató.</td>
							<td>URL</td>
							<td>Aktuális oldal url-je</td>
						</tr>
						<tr>
							<td><code>layout</code></td>
							<td>A gomb kinézete.</td>
							<td>box_count | button_count | button</td>
							<td>button</td>
						</tr>
						<tr>
							<td><code>size</code></td>
							<td>A gomb méretét állíthatjuk be.</td>
							<td>small | large</td>
							<td>large</td>
						</tr>
					</tbody>
				</table>
			</div>
			<h4>Használata:</h4>
			<ul>
				<li><code>[facebook-megosztas-gomb]</code> - Normál megjelenítés az alapértelmezett paraméterekkel</li>
				<li><code>[facebook-megosztas-gomb url="http://www.sajatdomain.hu"]</code> - A megadott domain url-jét osztják meg a gombbal.</li>
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
							<td>A Facebook oldal doboz szélessége pixelben. Ha nincs megadva, akkor a beillesztés helyéhez igazodik a szélessége.</td>
							<td>Min. 180 | Max. 500</td>
							<td>NINCS</td>
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
							<td><code>tabs</code></td>
							<td>A Facebook oldal lapfüleinek megjelenítése: idővonal, üzenetek, események. Lehet egyet és többet is megadni.</td>
							<td>timeline, messages, events</td>
							<td>NINCS</td>
						</tr>
					</tbody>
				</table>
			</div>
			<h4>Használata:</h4>
			<ul>
				<li><code>[facebook-oldal url="https://www.facebook.com/facebookoldal/"]</code> - Normál megjelenítés az alapértelmezett paraméterekkel.</li>
				<li><code>[facebook-oldal url="https://www.facebook.com/facebookoldal/" tabs="timeline"]</code> - Facebook oldal az idővonal füllel.</li>
				<li><code>[facebook-oldal url="https://www.facebook.com/facebookoldal/" tabs="timeline, messages"]</code> - Facebook oldal az idővonal és az üzenetek füllel.</li>
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
							<td>a-z | A-Z | 0-9</td>
							<td>NINCS</td>
						</tr>
						<tr>
							<td><code>width</code></td>
							<td>A YouTube videó szélessége pixelben.</td>
							<td>Szám</td>
							<td>NINCS</td>
						</tr>
						<tr>
							<td><code>height</code></td>
							<td>A YouTube videó magasságban pixelben.</td>
							<td>Szám</td>
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
							<td>a-z | A-Z | 0-9</td>
							<td>NINCS</td>
						</tr>
						<tr>
							<td><code>width</code></td>
							<td>A Vimeo videó szélessége pixelben.</td>
							<td>Szám</td>
							<td>NINCS</td>
						</tr>
						<tr>
							<td><code>height</code></td>
							<td>A Vimeo videó magasságban pixelben.</td>
							<td>Szám</td>
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

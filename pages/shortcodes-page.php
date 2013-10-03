<?php

function pwp_shortcodes_page() { ?>
	<div class="pwp wrap">

		<img class="icon" alt="icon" src="<?php echo PWP_PLUGIN_URL . '/images/shortcodes32.png'; ?>" />
	  <h2>Prémium WordPress bővítmény: Extra rövidkódok</h2>

	  <h3>Rövidkódok használata</h3>
	  <p>A rövidkódok egyszerűen beilleszthetők egy oldal vagy bejegyzés szöveg mezőjébe. Ezek előre meghatározott funkciókat látnak el. Vannak rövidkódok, amik paraméterezhetők, ezek is mind megtalálhatók az adott rövidkód leírásában.</p>
	  <p>A paramétereket a következő formában kell a rövidkódhoz megadni: <code>[rovidkod parameter1="ertek1" parameter2="ertek2"]</code></p>

		<div class="clearline"></div>

	  	<div class="section-block">
	  		<h2>Rövidkód: [mailto]</h2>
	  		<p>Ezzel a rövidkóddal úgy jeleníthető meg az oldalon az Email cím, hogy azt a robotok ne tudják elolvasni. A HTML kódban mindössze értelmetlen karaktereket jelenít meg. Az email cím automatikusan link is lesz, amire kattintva azonnal küldhető email üzenet.</p>
	  		<h4>Használata:</h4>
	  		<code>[mailto]email@email.hu[/mailto]</code>
	  	</div>

		<div class="clearline"></div>

	  	<div class="section-block">
	  		<h2>Rövidkód: [link]</h2>
	  		<p>Ezzel a rövidkóddal tudunk megjeleníteni linket az oldalon úgy, hogy az egy adott oldal vagy bejegyzés állandó azonosítójára mutat. Így ha az adott oldal vagy bejegyzés címe megváltozik, a link továbbra is a helyes oldalra fog mutatni.</p>
	  		<h4>Paraméterek:</h4>
	  		<ul>
	  			<li><code>id</code> - A cél oldal vagy bejegyzés azonosítója. Ez a paraméter kötelező.</li>
	  			<li><code>class</code> - A linknek adott osztály neve az egyedi megjelenítéshez.</li>
	  			<li><code>title</code> - Az a szöveg, ami akkor jelenik meg, ha egy látogató a link fölé viszi az egér kurzorját.</li>
	  		</ul>
	  		<h4>Használata:</h4>
	  		<code>[link id="1" title="Egér kurzornál megjelenő szöveg"]A link szövege[/link]</code>
	  	</div>

		<div class="clearline"></div>

	  	<div class="section-block">
	  		<h2>Rövidkód: [vendeg] és [tag]</h2>
	  		<p>Ezekkel a rövidkódokkal meg tudjuk határozni egy adott oldalon/bejegyzésen belül, hogy milyen tartalmat láthatnak a normál látogatók és a regisztrált tagok. Ami tartalom a [vendeg] shortcode-on belül van, azt csak a nem bejelentkezett, ami a [tag] shortcode-on belül van, azt pedig csak a bejelentkezett látogatók látják.</p>
	  		<h4>Használata:</h4>
	  		<ul>
	  			<li><code>[vendeg]Tartalom...[/vendeg]</code> - ezt csak vendégek látják</li>
	  			<li><code>[tag]Tartalom...[/tag]</code> - ezt csak a bejelentkezett felhasználók látják</li>
	  		</ul>
	  	</div>

		<div class="clearline"></div>

	  	<div class="section-block">
	  		<h2>Rövidkód: [nev], [ceg], [cim], [adoszam], [cegjegyzekszam], [bankszamlaszam], [mobiltelefon], [telefon], [fax], [email], [skype], [ceginfo]</h2>
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

		<div class="clearline"></div>

	  	<div class="section-block">
	  		<h2>Rövidkód: [div]</h2>
	  		<p>Ezzel a rövidkóddal egy div elemet illeszthetünk be. Ez hasznos lehet, amikor sor törésre van szükségünk, de egyéb megoldásokra is jó egy programozó számára.</p>
	  		<h4>Paraméterek:</h4>
	  		<ul>
	  			<li><code>id</code> - Egyedi azonosító megadása.</li>
	  			<li><code>class</code> - Osztály megadása, így könnyen formázható lesz CSS fájlból.</li>
	  			<li><code>style</code> - Stílus kódok megadása, ami felülír minden css formázást.</li>
	  		</ul>
	  		<h4>Használata:</h4>
	  		<code>[div class="black" style="height:0px;"]</code> vagy <code>[div class="black"]Tartalom...[/div]</code>
	  	</div>

		<div class="clearline"></div>

	  	<div class="section-block">
	  		<h2>Rövidkód: [google-calendar]</h2>
	  		<p>Ezzel a rövidkóddal egy Google Naptárat illeszthetünk be. Először a Google Naptár iframe beágyazó kódját kell lekérni, amiből ki kell másolni a szükséges paramétereket.</p>
	  		<h4>Paraméterek:</h4>
	  		<ul>
	  			<li><code>src</code> - A Google Naptár iframe url-je. A lekért kódban ez az "src" paraméter. Minden url a <code>https://www.google.com/calendar/embed?</code> részlettel kezdődik, így ezt nem kell kimásolni, csak a kérdőjel utáni részt. Ezek határozzák meg a Google Naptár összes tulajdonságát. Ennek a praméternek nincs alapértelmezett értéke és mindenképpen meg kell adni!</li>
	  			<li><code>width</code> - A Google Naptár szélességét lehet ezzel a paraméterrel meghatározni pixelben. Az alapértelmezett érték: 400. Tehát csak akkor kell ezt a paramétert megadni, ha változtatni szeretnénk az alapértelmezett értéken.</li>
	  			<li><code>height</code> - A Google Naptár magasságát lehet ezzel a paraméterrel meghatározni pixelben. Az alapértelmezett érték: 300. Tehát csak akkor kell ezt a paramétert megadni, ha változtatni szeretnénk az alapértelmezett értéken.</li>
	  			<li><code>scrolling</code> - A beágyazott iframe keret görgetési lehetőségét lehet ezzel a paraméterrel meghatározni. A lehetséges értékek: auto|no|yes. Az alapértelmezett érték: auto. Tehát csak akkor kell ezt a paramétert megadni, ha változtatni szeretnénk az alapértelmezett értéken.</li>
	  		</ul>
	  		<h4>Használata:</h4>
	  		<code>[google-calendar src="ide jön a kérdőjel utáni url részlet"]</code> vagy <code>[google-calendar src="ide jön a kérdőjel utáni url részlet" width="640" height="480"]</code>
	  	</div>

		<div class="clearline"></div>

	</div>
<?php }


<?php

/**
 * @file
 * Custom theme implementation to display a single Drupal page.
 */

?>

<!-- Navbar -->
<div id="navbar" class="navbar navbar-medium navbar-inverse navbar-static-top">
	<div class="navbar-inner">
		<div class="container">
      <?php print $navbar_toggler ?>
			<?php print $navbar_brand ?>
      <?php print $navbar_search ?>
      <?php if ($navbar_menu): ?>
			<nav class="nav-collapse collapse" role="navigation">
        <?php print $navbar_menu ?>
      </nav>
			<?php endif ?>
		</div>
	</div>
</div>

<?php if ($page['featured']): ?>
<!-- Featured -->
<div id="featured" class="container-wrapper hidden-phone">
  <div class="container">
    <?php print render($page['featured']) ?>
  </div>
</div>
<?php endif ?>

<?php if ($preface): ?>
<!-- Header -->
<header id="header" class="container-wrapper">
  <div class="container">
    <?php print $preface ?>
  </div>
</header>
<?php endif ?>

<!-- Main -->
<div id="main">
  <div class="container">
    <?php print $messages ?>
    <div class="row row-toggle">
      <?php if ($has_sidebar_first): ?>
      <!-- Sidebar first -->
      <aside id="sidebar-first" class="sidebar span3 hidden-phone">
        <?php print render($page['sidebar_first']) ?>
        <?php print render($page['sidebar_first_affix']) ?>
      </aside>
      <?php endif ?>
      <!-- Content -->
      <section id="content" class="span<?php print $content_cols ?>">
        <?php print render($page['content']) ?>
      </section>
      <?php if ($has_sidebar_second): ?>
      <!-- Sidebar second -->
      <aside id="sidebar-second" class="sidebar span3 hidden-phone">
        <?php print render($page['sidebar_second']) ?>
        <?php print render($page['sidebar_second_affix']) ?>
      </aside>
      <?php endif ?>
    </div>
	</div>
</div>

<!-- Footer -->
<footer id="footer" class="container-wrapper">
	<div class="container">
    <div class="footer-links pull-right">

<!--
      <?php if ($feed_icons): ?><?php print $feed_icons ?><?php endif ?>
      <?php if ($secondary_menu): ?>
			<?php foreach ($secondary_menu as $item): ?>
			<?php print l($item['title'], $item['href']) ?>
			<?php endforeach ?>
      <a href="#"><?php print t('Back to top') ?> </a>
      <?php endif ?>
    </div>
-->
	</div>
    
    <a href="http://europa.eu"><img src="http://voa3r.eu/images/flag_eu.gif" border="0" style="border: 0; float: left;"></a>
    <a href="http://ec.europa.eu/research/fp7/"><img src="http://voa3r.eu/images/fp7.gif" border="0" style="border: 0; float: left;"></a>
    <?php print "&nbsp;&nbsp;" . $copyright ?>
     <a href="/about" title="About us">About us</a> | <a href="/project" class="">The Project</a> | <a href="/contact" class="">Contact</a> | <a href="/legal" class="">Legal Information</a>
      <p>
          The research within the project VOA3R leading to these results has received funding from the ICT Policy Support Programme (ICT PSP), Theme 4 - Open access to scientific information, grant agreement n 250525 - All rights reserved
      </p>


	</div>

</footer>

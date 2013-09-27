<?php
/**
 * @file
 * Custom theme implementation to display a single Drupal page.
 */
?>

<?php
/** used throught panels. the code below covers admin & user/* sections **/
/*
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
*/
?>
<?php if (strpos(drupal_get_path_alias($_GET["q"]), "admin") === 0): /** we are on admin section **/ ?>
<a id="jump-up" class="element-invisible"></a>    
<div id="navbar" class="navbar navbar-medium navbar-inverse navbar-static-top">
	<div class="navbar-inner">
		<div class="container">
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>			<a class="brand" href="/"><img src="/sites/all/themes/tweme/assets/images/logo.gif"> </a>      
			<nav class="nav-collapse collapse" role="navigation">

				<ul class="nav" role="menu" aria-labelledby="drop3">
					<li>
						<div class="input-append  not-visible">
							<form class="search-form navbar-search navbar-search-elastic  pull-right" action="/search/site" method="post" id="search-form2" accept-charset="UTF-8" target="_self"><input placeholder="Search for Resouces &amp; People" type="text" id="edit-keys" name="keys" class="form-text required" value="" required=""><button type="submit" class="btn btn-inverse"><i class="icon-search icon-white"></i></button></form></div>
						</li>
						<li><a href="/" class="active-trail active" role="menuitem">Home</a></li>
						<!--<li ><a href="/search/site" title="Advanced search" role="menuitem"> Advanced Search <i class="icon-chevron-down"></i></a></li>-->

					</ul>  
				</nav>
			</div>
		</div>
	</div>
<?php else: /** we are in user  section **/ ?>
<?php

global $user; 
if ($user->uid) {


   $userData = user_load($user->uid);
   $realname = $userData->realname;

?>

   <a id="jump-up" class="element-invisible"></a>    
   <div id="navbar" class="navbar navbar-medium navbar-inverse navbar-static-top">
	<div class="navbar-inner">
		<div class="container">
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>			<a class="brand" href="/"><img src="/sites/all/themes/tweme/assets/images/logo.gif"> </a>      
			<nav class="nav-collapse collapse" role="navigation">

				<ul class="nav" role="menu" aria-labelledby="drop3">
					<li>
						<div class="input-append">
							<form class="search-form navbar-search navbar-search-elastic  pull-right" action="/search/site" method="post" id="search-form2" accept-charset="UTF-8" target="_self"><input placeholder="Search for Resouces &amp; People" type="text" id="edit-keys" name="keys" class="form-text required" value="" required=""><button type="submit" class="btn btn-inverse"><i class="icon-search icon-white"></i></button></form></div>
						</li>
						<li ><a href="/" class="active-trail active" role="menuitem">Home</a></li>
						<li class="active"><a href="/user" class="active-trail active" role="menuitem">Profile</a></li>
						<li><a href="/search/site" title="Advanced search" role="menuitem"> Advanced Search <i class="icon-chevron-down"></i></a></li>
					</ul>  
					<ul class="nav pull-right">
						<li id="fat-menu" class="dropdown">
							<a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">
								<?php echo $realname; ?>
								<b class="caret"></b>
							</a>

							<ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
								<li role="presentation"><a role="menuitem" tabindex="-1" href="/user"><i class="icon-bookmark"></i>  Profile </a></li>						<li role="presentation"><a role="menuitem" tabindex="-1" href="/events"><i class="icon-calendar"></i> Events </a></li>
								<li role="presentation"><a role="menuitem" tabindex="-1" href="/people"><i class="icon-globe"></i> People directory </a></li>
								<li role="presentation" class="divider"></li>
								<li role="presentation"><a role="menuitem" tabindex="-1" href="/user/logout"><i class=" icon-off"></i> Log out </a></li>
							</ul>
						</li>
					</ul>	
				</nav>
			</div>
		</div>
	</div>    
<?php 
} else { 
?>
<div id="navbar" class="navbar navbar-medium navbar-inverse navbar-static-top">
	<div class="navbar-inner">
		<div class="container">
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>			<a class="brand" href="/"><img src="/sites/all/themes/tweme/assets/images/logo.gif"> </a>      
			<nav class="nav-collapse collapse" role="navigation">

				<ul class="nav" role="menu" aria-labelledby="drop3">
					<li>
						<div class="input-append  not-visible">
							<form class="search-form navbar-search navbar-search-elastic  pull-right" action="/search/site" method="post" id="search-form2" accept-charset="UTF-8" target="_self"><input placeholder="Search for Resouces &amp; People" type="text" id="edit-keys" name="keys" class="form-text required" value="" required=""><button type="submit" class="btn btn-inverse"><i class="icon-search icon-white"></i></button></form></div>
						</li>
						<li class="active"><a href="/" class="active-trail active" role="menuitem">Home</a></li>
						<li><a href="/search/site" title="Advanced search" role="menuitem"> Advanced Search <i class="icon-chevron-down"></i></a></li>

					</ul>  
					<ul class="nav pull-right">
						<li id="fat-menu" class="dropdown">
							<a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">
								Language
								<b class="caret"></b>
							</a>

							<ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
								<li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="icon-en"></i>  English </a></li>

							</ul>
						</li>
					</ul>	
				</nav>
			</div>
		</div>
	</div>
<?php
}
?>
<?php endif ?>

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
     <a href="/about" title="About us">About us</a><!-- | <a href="/project" class="">The Project</a>--> | <a href="/contact" class="">Contact</a> | <a href="/legal" class="">Legal Information</a>
      <p>
          &nbsp;&nbsp;The research within the project AgroNet leading to these results has received funding from the ICT Policy Support Programme (ICT PSP), Theme 4 - Open access to scientific information, grant agreement n 250525 - All rights reserved
      </p>
	</div>
</footer>

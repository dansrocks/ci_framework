<!doctype html>
<head>
	<meta charset="utf-8">
	<title><?= $page_title; ?></title>
	<meta name="description" content="<?= $page_description; ?>">
	<meta name="author" content="Dans Norvey">
	<link rel="stylesheet" href="css/style.css">
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->	
	
	<style type="text/css">
	<!--
	-->
	</style>
</head>
<body>
<div id="page">
<!--start header -->
<header id="header-container" class="grad1">
<div id="logo">	</div>
<form class="searchform" action="/buscar">
	<input type="text" placeholder="Buscar..." />
	<input class="searchbutton" type="submit" title="Buscar en la web" value="?" />
</form>
</header>
<!--end header -->
<!--start navigation -->
<nav>
<ul>
<li class="grad1"><a href="/actividades">&Uacute;ltima hora</a></li>
<li class="grad1"><a href="/calendario">Calendario</a></li>
<?php if (isset($userinfo_isLogged) && $userinfo_isLogged): ?>
<li class="grad1"><a href="/agenda">Mi Agenda</a></li>
<li class="grad1"><a href="/proponer">Mi propuesta</a></li>
<?php else: ?>
<li class="grad1"><a href="/proponer/externo">Proponer actividad</a></li>
<?php endif; ?>
</ul>
</nav>
<!--end navigation -->

<!--start main content -->
<div id="main" class="wrapper">
	
	<?php if (isset($userinfo_isLogged) && $userinfo_isLogged): ?>
	User id : <?= $userinfo_id; ?><br /> 
	Username : <?= $userinfo_username; ?><br /> 
	User email : <?= $userinfo_email; ?><br /><a
	<?php endif; ?>
	<p>
	<ul>
		
		<?php if (!isset($userinfo_isLogged) || $userinfo_isLogged==false): ?><li>Ya soy usuario. <a href="/acceder">Identifícame</a></li><?php endif; ?>
		<?php if (isset($userinfo_isLogged) && $userinfo_isLogged): ?><li><a href="/salir">Salir de mi cuenta</a></li><?php endif; ?>
		
		<li>No soy usuario. <a href="/registrarme">Quiero registrarme</a> y unirme a GenteDivertida.</li>
	</ul>
	</p>
</div>
<!--end main content -->
 <!--start footer -->
 <div id="footer-container">	
	<footer class="wrapper">
		<div id="copyright"><a href="http:///www.gentedivertida.es">GenteDivertida.es</a> &copy; 2013
			- Programador: <a href="http://www.gentedivertida.es/perfil/dans">Dans Norvey</a> </div>
	</footer>
</div>
<!--end footer -->
</div>
</body>
</html>
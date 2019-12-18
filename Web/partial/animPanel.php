<?php
require_once("partial/header.php");
?>


<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">

	<img src="images/campFire.jpg" width="100px" height="100px">
	<img src="images/TrouverUnCamp.png" width="300px" height="100px">
	<h5 class="my-0 mr-md-auto font-weight-normal"></h5>

	<nav class="my-2 my-md-0 mr-md-3">
		<a class="p-2 text-dark" href="search">Rechercher...</a>
		<a class="p-2 text-dark" href="animApply">Consulter ma liste de postulation</a>
	</nav>



	<div id="connectedOptions">
		<p class="p-2 text-muted" id="loginState">Connecté en tant qu'animateur</p>

		<a class="btn btn-outline-danger" href="logout">Se déconnecter</a>
	</div>
</div>
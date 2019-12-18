<?php
require_once("action/IndexAction.php");

$action = new IndexAction();
$action->execute();

require_once("partial/headerWithMenu.php");
?>

<?php
if ($action->isLoggedIn) {
	?>
	<div class="alert alert-info aPostule">
		Vous êtes connecté. <a href="logout">Se déconnecter</a>
	</div>
<?php
}
?>

<div class="index">
	<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
		<div class="col-md-5 p-lg-5 mx-auto my-5">
			<img src="images/campFireColor.png" width="100px" height="100px">
			<h1 class="display-3 font-weight-normal">C'est</h1>
			<p class="lead font-weight-normal">la meilleure façon de travailler dans un super camp rapidement!</p>
			<a class="btn btn-outline-primary" href="signIn">S'inscrire</a>
		</div>
		<div class="product-device shadow-sm d-none d-md-block"></div>
		<div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
	</div>


	<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3 ">
		<div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
			<div class="my-3 py-3">

				<p class="lead">Un service fiable qui rend accessible des expériences formidables</p>
			</div>
			<div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
		</div>
		<div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
			<div class="my-3 p-3">
				<h2 class="display-5">Témoignages</h2>
				<p class="lead">J'ai commencé à travailler dans un camp en ...</p>
			</div>
			<div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
		</div>
	</div>

	<footer class="my-5 pt-5 text-muted text-center text-small group">
		<p class="mb-1">© 2019 Félix Dumas-Lavoie</p>
	</footer>

	<script>
		$("body").css("height", "auto");
		$(".lobbyLink").css("display", "none");
	</script>

	<?php

	if ($action->visiblity == 1) {
		?>
		<script>
			$('.animTools').css("display", "inline");
		</script>
	<?php
	}

	?>

	<?php
	require_once("partial/footer.php");

<?php
	require_once("action/HomeAction.php");

	$action = new HomeAction();
	$action->execute();

	require_once("partial/header.php");
?>

	<h1>Ceci est la page des animateurs</h1>

	<p>Bienvenue !</p>
	<p>Il y a eu exactement <?php echo rand(5,5000) ?> visites depuis votre dernière connexion.</p>

<?php
	require_once("partial/footer.php");

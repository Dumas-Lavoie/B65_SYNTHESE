<?php

require_once("action/LoginAction.php");
$action = new LoginAction();
$action->execute();

require_once("partial/headerWithMenu.php");
?>


<div id="login">
	<form class="form-signin" action="login.php" method="POST">
		<?php
		if ($action->wrongLogin) {
			?>
			<div class="alert alert-danger">
				<strong>Erreur de connexion</strong>
			</div>
		<?php
		}
		?>
		<h1 class="h3 mb-3 font-weight-normal">Connexion</h1>
		<label for="inputUsername" class="sr-only">Nom d'utilisateur</label>
		<input type="t" id="inputUsername" class="form-control" placeholder="Nom d'utilisateur" name="username" required="true" autofocus="true" value="<?php echo isset($_COOKIE["remember-me"]) ? $_COOKIE["remember-me"] : "" ?>">
		<label for="inputPassword" class="sr-only">Mot de passe</label>
		<input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" name="password" required="true">
		<div class="checkbox mb-3">
			<label id="remember-me">
				<input type="checkbox" value="remember-me" name="remember-me">Se souvenir</input>
			</label>
		</div>
		<button class="btn btn-lg btn-primary" type="submit">Connexion</button>
		<p class="mt-5 mb-3 text-muted">© 2017-2019</p>
		</form>
</div>

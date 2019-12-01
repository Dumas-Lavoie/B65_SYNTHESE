<?php

require_once("action/LoginAction.php");
$action = new LoginAction();
$action->execute();

require_once("partial/headerWithMenu.php");
?>


<div id="signIn">
	<div class="textColor">
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

			<h1 class="h3 mb-3 font-weight-normal">Inscription</h1>

			<div class="flexBoite">
				<input type="radio" name="gender" value="isCamp">Camp<br>
				<input type="radio" name="gender" value="isHost"> Animateur<br>
			</div>

			<label for="inputUsername" class="sr-only">Nom d'utilisateur</label>
			<div class="flexBoite">
				<p>Nom d'utilisateur</p>
				<input type="t" id="inputUsername" class="form-control" placeholder="Nom utilisateur" name="username" required="true" autofocus="true" value="">
			</div>

			<div class="flexBoite">
				<label for="inputPassword" class="sr-only">Nom d'utilisateur</label>
				<p>Mot de passe</p>
				<input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" name="password" required="true">
			</div>


			<div class="flexBoite">
				<label for="inputPassword" class="sr-only">Password</label>
				<p>Répéter le mdp</p>
				<input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" name="passwordReEnter" required="true">
			</div>

			<button class="btn btn-lg btn-primary" type="submit">Inscription</button>
			<p class="mt-5 mb-3 text-muted">© 2017-2019</p>
		</form>
	</div>
</div>
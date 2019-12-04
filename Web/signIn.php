<?php

require_once("action/LoginAction.php");
$action = new LoginAction();
$action->execute();

require_once("partial/headerWithMenu.php");
?>


<div id="signIn">
	<div class="textColor">



		<h1 class="h3 mb-3 font-weight-normal">Inscription</h1>

		<div id="inscrTRadio" class="flexBoite">
			<div>
				<input type="radio" id="animInscType" name="drone" value="huey" checked>
				<label for="animInscType">Animateur</label>
			</div>

			<div>
				<input type="radio" id="campInscType" name="drone" value="huey" checked>
				<label for="campInscType">Camp</label>
			</div>
		</div>

		<div id="campSingInFields">
			<form action="login.php" method="POST">

				<label for="inputUsername" class="sr-only">Nom d'utilisateur</label>
				<div class="flexBoite">
					<p>Nom d'utilisateur</p>
					<input type="t" class="inputUsername" class="form-control" placeholder="Nom utilisateur" name="username" required="true" autofocus="true" value="">
				</div>

				<div class="flexBoite">
					<label for="inputPassword" class="sr-only">Nom d'utilisateur</label>
					<p>Mot de passe</p>
					<input type="password" class="inputPassword" class="form-control" placeholder="Mot de passe" name="password" required="true">
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

		<div id="animatorsSingInFields">
			<form action="login.php" method="POST">

			</form>
		</div>
	</div>
</div>
<?php

require_once("action/LoginAction.php");
$action = new LoginAction();
$action->execute();

require_once("partial/headerWithMenu.php");
?>

<div class="loginForm">

	<body class="text-center">


		<?php
		if ($action->logout) {
			?>
			<div class="alert alert-success aPostule">
				<strong>Succès!</strong> Déconnexion réussie
			</div>
		<?php
		}
		?>


		<?php
		if ($action->wrongLogin) {
			?>
			<div class="alert alert-danger">
				<strong>Erreur de connexion</strong>
			</div>
		<?php
		}
		?>

		<form class="form-signin" action="login.php" method="POST">
			<img src="images/campFireColor.png" width="100px" height="100px">
			<h1 class="h3 mb-3 font-weight-normal">Connexion</h1>
			<label for="inputEmail" class="sr-only">Courriel</label>
			<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Adresse courriel" required autofocus value="<?php echo isset($_COOKIE["remember-me"]) ? $_COOKIE["remember-me"] : "" ?>">
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Mot de passe" required>
			<div class="checkbox mb-3">
				<label id="remember-me">
					<input type="checkbox" value="remember-me" name="remember-me">Se souvenir</input>
				</label>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
			<p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
		</form>
	</body>

	<script>
		$("body").css("height", "100vh");
	</script>
</div>
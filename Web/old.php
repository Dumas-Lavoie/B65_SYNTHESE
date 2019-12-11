<!-- 	<h1 onclick="window.location.replace('index');">Camp Job finder</h1> -->
<div id="signIn">
	<div class="textColor .col-md-8 .order-md-1">


		<h1 class="h3 mb-3 font-weight-normal">Inscription</h1>

		<div id="inscrTRadio" class="flexBoite">
			<div>
				<input type="radio" id="animInscType" name="drone" value="huey" onclick="showRightField();" checked>
				<label for="animInscType">Animateur</label>
			</div>

			<div>
				<input type="radio" id="campInscType" name="drone" value="huey" onclick="showRightField();">
				<label for="campInscType">Camp</label>
			</div>
		</div>

		<div id="animatorsSingInFields">
			<form action="login.php" method="POST">

				<div class="fields">

					<h5>Vous êtes un(e) animateur(trice)</h5>

					<div class="flexBoite">
						<label for="inputUsername" class="sr-only">Nom d'utilisateur</label>
						<p>Nom d'utilisateur</p>
						<input type="t" class="inputUsername" class="form-control" placeholder="Nom utilisateur" name="username" required="true" autofocus="true" value="">
					</div>


					<div class="flexBoite">
						<label for="inputEmail" class="sr-only">Adresse courriel</label>
						<p>Adresse courriel</p>
						<input type="email" class="inputEmail" class="form-control" placeholder="Adresse courriel" name="email" required="true">
					</div>



					<div class="flexBoite">
						<label for="inputPassword" class="sr-only">Mot de passe</label>
						<p>Mot de passe</p>
						<input type="password" class="inputPassword" class="form-control" placeholder="Mot de passe" name="password" required="true">
					</div>


					<div class="flexBoite">
						<label for="inputPassword" class="sr-only">Password</label>
						<p>Répéter le mdp</p>
						<input type="password" id="inputPassword" class="form-control" placeholder="Réécrire le de passe" name="passwordReEnter" required="true">
					</div>

					<div class="flexBoite">
						<label for="capcha" class="sr-only">Question mystère</label>
						<p class="capcha">Que font 3 + 5?</p>
						<input type="text" id="capcha" class="form-control" placeholder="Réponse" name="capcha1" required="true">
					</div>
					
					<button class="btn btn-lg btn-primary" type="submit">Inscription</button>
					<p class="mt-5 mb-3 text-muted">© 2017-2019</p>
				</div>

			</form>
		</div>


		<div id="campSingInFields">
			<form action="login.php" method="POST">

				<h5>Vous êtes un camp ou une base de plein air</h5>
			</form>
		</div>
	</div>
</div>
<?php



require_once("partial/headerWithMenu.php");
?>



<body class="bg-light">

	<div class="container signInPage">
		<div class="py-5 text-center">
			<h2>Inscription</h2>
			<p class="lead">Ce formulaire sert à s'inscrire sur camp job finder. Peu importe le type de camp, vous trouverez votre compte!</p>
		</div>

		<div class="dropDownChoice">
			<div>Êtes-vous un animateur(trice) ou un camp?</div>
			<select name="registerkind" class="type">
				<option value="animator">Animateur/trice</option>
				<option value="camp">Camp ou base de plein air</option>
			</select>
		</div>


		<div class="row animatorInscription">

			<div class="col-md-8 order-md-1 animatorFields">
				<h4 class="mb-3">Informations -Animateur/trice</h4>
				<form class="needs-validation" novalidate="" action="signIn.php" method="POST">
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="firstName">Prénom</label>
							<input type="text" class="form-control" id="firstName" placeholder="Votre prénom" name="firstName" value="" required="">
							<div class="invalid-feedback">
								Valid first name is required.
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<label for="lastName">Nom</label>
							<input type="text" class="form-control" id="lastName" name="lastName" placeholder="Votre nom" value="" required="">
							<div class="invalid-feedback">
								Valid last name is required.
							</div>
						</div>
					</div>

					<div class="mb-3">
						<label for="email">Courriel</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="vous@exemple.com">
						<div class="invalid-feedback">
							Erreur dans l'adresse courriel.
						</div>
					</div>

					<div class="mb-3">
						<label for="address">Adresse</label>
						<input type="text" class="form-control" id="address" name="address" placeholder="Adresse" required="">
						<div class="invalid-feedback">
							Svp veuillez entrer votre adresse.
						</div>
					</div>

					<div class="mb-3">
						<label for="address2">Ville</label>
						<input type="text" class="form-control" id="city" name="city" placeholder="Votre ville">
					</div>

					<div class="row">
						<div class="col-md-5 mb-3">
							<label for="country">Pays</label>
							<select class="custom-select d-block w-100" name="country" id="country" required="">
								<option value="">Canada</option>
								<option>États-Unis</option>
							</select>
							<div class="invalid-feedback">
								Please select a valid country.
							</div>
						</div>

						<div class="col-md-3 mb-3">
							<label for="zip">Code postal</label>
							<input type="text" class="form-control" id="zip" name="zipCode" placeholder="Code postal" required="">
							<div class="invalid-feedback">
								Code postal requis.
							</div>
						</div>
					</div>

					<hr class="mb-4">

					<h4 class="mb-3">Mot de passe</h4>


					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="cc-name">Mot de passe</label>
							<input type="password" class="form-control" id="password" name="password1" placeholder="Mot de passe" required="">
							<small class="text-muted">Un bon mot de passe contient de 8 à 10 caractères variés (1-9 + #/() + A-Z + a-z ). </small>
							<div class="invalid-feedback">
								Le mot de passe est requis
							</div>
						</div>

						<div class="col-md-6 mb-3">
							<label for="cc-name">Récrire le mot de passe</label>
							<input type="password" class="form-control" id="re-type_password" name="password2" placeholder="Réécrire le mot de passe" required="">
							<small class="text-muted">Veuillez réécrire le MDP pour confirmer</small>
							<div class="invalid-feedback">
								Le mot de passe est requis
							</div>
						</div>
						<button class="btn btn-primary btn-lg btn-block" type="submit">S'inscire</button>
				</form>
			</div>
		</div>


	</div>

	<footer class="my-5 pt-5 text-muted text-center text-small">
		<p class="mb-1">© 2019 Félix Dumas-Lavoie</p>
	</footer>
	
	<script src="js/signIn.js"></script>
</body>

</html>
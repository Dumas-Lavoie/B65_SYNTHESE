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
				<form class="needs-validation" novalidate="">
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="firstName">First name</label>
							<input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
							<div class="invalid-feedback">
								Valid first name is required.
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<label for="lastName">Last name</label>
							<input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
							<div class="invalid-feedback">
								Valid last name is required.
							</div>
						</div>
					</div>

					<div class="mb-3">
						<label for="username">Username</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">@</span>
							</div>
							<input type="text" class="form-control" id="username" placeholder="Username" required="">
							<div class="invalid-feedback" style="width: 100%;">
								Your username is required.
							</div>
						</div>
					</div>

					<div class="mb-3">
						<label for="email">Email <span class="text-muted">(Optional)</span></label>
						<input type="email" class="form-control" id="email" placeholder="you@example.com">
						<div class="invalid-feedback">
							Please enter a valid email address for shipping updates.
						</div>
					</div>

					<div class="mb-3">
						<label for="address">Address</label>
						<input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
						<div class="invalid-feedback">
							Please enter your shipping address.
						</div>
					</div>

					<div class="mb-3">
						<label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
						<input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
					</div>

					<div class="row">
						<div class="col-md-5 mb-3">
							<label for="country">Country</label>
							<select class="custom-select d-block w-100" id="country" required="">
								<option value="">Choose...</option>
								<option>United States</option>
							</select>
							<div class="invalid-feedback">
								Please select a valid country.
							</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="state">State</label>
							<select class="custom-select d-block w-100" id="state" required="">
								<option value="">Choose...</option>
								<option>California</option>
							</select>
							<div class="invalid-feedback">
								Please provide a valid state.
							</div>
						</div>
						<div class="col-md-3 mb-3">
							<label for="zip">Zip</label>
							<input type="text" class="form-control" id="zip" placeholder="" required="">
							<div class="invalid-feedback">
								Zip code required.
							</div>
						</div>
					</div>
					<hr class="mb-4">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="same-address">
						<label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
					</div>
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="save-info">
						<label class="custom-control-label" for="save-info">Save this information for next time</label>
					</div>
					<hr class="mb-4">

					<h4 class="mb-3">Payment</h4>

					<div class="d-block my-3">
						<div class="custom-control custom-radio">
							<input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
							<label class="custom-control-label" for="credit">Credit card</label>
						</div>
						<div class="custom-control custom-radio">
							<input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
							<label class="custom-control-label" for="debit">Debit card</label>
						</div>
						<div class="custom-control custom-radio">
							<input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
							<label class="custom-control-label" for="paypal">Paypal</label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="cc-name">Name on card</label>
							<input type="text" class="form-control" id="cc-name" placeholder="" required="">
							<small class="text-muted">Full name as displayed on card</small>
							<div class="invalid-feedback">
								Name on card is required
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<label for="cc-number">Credit card number</label>
							<input type="text" class="form-control" id="cc-number" placeholder="" required="">
							<div class="invalid-feedback">
								Credit card number is required
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 mb-3">
							<label for="cc-expiration">Expiration</label>
							<input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
							<div class="invalid-feedback">
								Expiration date required
							</div>
						</div>
						<div class="col-md-3 mb-3">
							<label for="cc-expiration">CVV</label>
							<input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
							<div class="invalid-feedback">
								Security code required
							</div>
						</div>
					</div>
					<hr class="mb-4">
					<button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
				</form>
			</div>
		</div>

		<footer class="my-5 pt-5 text-muted text-center text-small">
			<p class="mb-1">© 2019 Félix Dumas-Lavoie</p>
		</footer>
	</div>

	<script src="js/signIn.js"></script>
</body>

</html>
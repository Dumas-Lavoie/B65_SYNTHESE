<!DOCTYPE html>
<html lang="fr">
    <head>
        <link href="css/global.css" rel="stylesheet" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<title>Camp job finder</title>
		<meta charset="utf-8" />
    </head>
    <body>
		<div class="header">
				<div class="site-title-section">
					<h2>Camp job finder</h2>
				</div>
				<div class="username-section">
					Bonjour,
					<?= $action->getUsername() ?> !
					<?php
						if ($action->isLoggedIn()) {
							?>
							<div>
								[
								<a href="?logout=true">Déconnexion</a>
								]
							</div>
							<?php
						}
					?>
				</div>
				<div class="clear"></div>

				<div class="menu">
					<ul>
						<li><a href="index.php">Accueil du site</a></li>
						<?php
							if (!$action->isLoggedIn()) {
								?>
								<li><a href="login.php">Se connecter</a></li>
								<?php
							}
							else {
								?>
								<li><a href="home.php">Mon accueil perso</a></li>
								<li><a href="profile.php">Mon profil</a></li>
								<?php
							}
						?>

					</ul>
				</div>
			</div>

		<div class="container">

<?php
require_once("action/IndexAction.php");

$action = new IndexAction();
$action->execute();

require_once("partial/headerWithMenu.php");
?>




<div id="frontPanel" class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light" class="textPresentation">
	<div class="col-md-5 p-lg-5 mx-auto my-5">
		<h1 class="display-4 font-weight-normal">Vivez une expérience incroyable</h1>
		<p class="lead font-weight-normal">Consultez des dizaines d'offres d'emplois et de camps.</p>
		<a class="btn btn-outline-secondary" href="features.php">En savoir plus</a>
	</div>
	<div class="product-device shadow-sm d-none d-md-block"></div>
	<div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
</div>




<?php
require_once("partial/footer.php");

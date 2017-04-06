<?php

require_once "inc/page_setup.php";

$db = new Database();
$pgTitle = "Home";

include ('inc/header.php');
include ('inc/nav.php');
?>

</head>



<!-- Start contents of main page here. -->

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<h2>Welcome to Ingredients For You!</h2>
			<h3>
			On our site you will find information on some of the freshest ingredients to complement your cooking experience!
			</h3>
		</div>
	</div>
		
	<?php 
		$ingredients = $db->getIngredients(); 
		foreach($ingredients as $ingredient) {
		?>
		<div class="row" style="border: 1px solid black; text-align: center; padding: 10px; margin-bottom: 2px;">
			<div class="col-xs-12">
				<h3 class="pull-left"> <?php echo $ingredient["ingredient_name"]?>:</h3>
				<img class="img-circle" style="height: 200px; width: 200px; margin-bottom: 5px;" src="assets/img/<?php echo $ingredient["image_name"];?>" alt="<?php echo $ingredient["ingredient_name"];?>" />
				<p><b>DESCRIPTION:</b><i> <?php echo $ingredient["description"]?></i></p>
			</div>
		</div>
	<?php }; // end the foreach loop ?>		
</div>
<!--  -->
<!-- End of contents -->
<?php include('inc/footer.php'); ?>

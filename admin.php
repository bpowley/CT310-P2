<?php

require_once "inc/page_setup.php";

$pgTitle = "admin";
include ('inc/header.php');

?>

</head>

<?php include ('inc/nav.php');?>

<!-- Start contents of main page here. -->

<div class="container col-xs-12">
	<h3>Add Admin Page functionality here</h3>
	<p>
		Probably things like add/update ingredient, edit comment, delete comments, etc.<br>
		Need to make sure this page is only accessible when a user with admin permissions is logged in.
		<li><a href="./addIngredient.php">Add an Ingredient</a></li>
		<li><a href="./createDB.php">Create Default Database</a></li>
	</p>
</div>

<!-- End of contents -->

<?php include('inc/footer.php'); ?>

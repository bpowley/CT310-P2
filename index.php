<?php
$pgTitle = "Home";
include ('header.php');
?>

</head>

<?php include ('nav.php'); ?>

<!-- Start contents of main page here. -->

<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h2>Welcome to Ingredients For You!</h2>
			<h3>
			On our site you will find information on some of the freshest ingredients to complement your cooking experience!
			</h3>
		</div>
	</div>
	<div class="row">

		<div class="col-md-4">
			<h4>Green Beans</h4>
			<a href="./greenbean.php"><img src="./greenbeans.jpg" class="img-circle center-block avatar" alt="dc" width="280" height="290"></a>
		</div>

		<div class="col-md-4">
			<h4>Mint</h4>
			<a href="./mint.php"><img src="./mint.jpg" class="img-circle center-block avatar" alt="bp" width="280" height="290"></a>
		</div>

		<div class="col-md-4">
			<h4>Oregano</h4>
			<a href="./oregano.php"><img src="./oregano.jpg" class="img-circle center-block avatar" alt="bp" width="280" height="290"></a>
		</div>
	</div>

</div>


<?php
function setupDatabaseConnection(){
	try{
		$dbh = new PDO("sqlite:./ingredients.db");
		echo '<pre class="bg-success">';
		echo 'Connection successful.';
		echo '</pre>';
		return $dbh;
	} catch (PDOException $e) {
		echo '<pre class="bg-danger">';
		echo 'Connection failed: ' . $e->getMessage();
		echo '</pre>';
		return FALSE;
	}
}

function dropTableByName(){
	
}

?>


<!-- End of contents -->
<?php include('footer.php'); ?>

<?php

require_once "inc/page_setup.php";

$pgTitle = "Home";
include ('inc/header.php');
include ('inc/nav.php');
?>

</head>



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
	
		<div class="col-xs-12">
			<ol>
				<li>Start a connection
					<?php if (!$dbh = setUpDatabaseConnection()) {die;} ?>
				</li>
				<li> Delete old ingredients, users, and comments tables.
					<?php dropTableByName("ingredients");
							dropTableByName("users");
							dropTableByName("comments");?>				
				</li>
				<li>Create Tables. Ingredients then Users then Comments.
					<?php createTableIngredients();
							createTableUsers();
							createTableComments();?>									
				</li>
			</ol>
		
		<?php /*
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
		</div>*/?>
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

function dropTableByName($tname){
	global $dbh;
   $sql = "DROP TABLE IF EXISTS $tname";
   $status = $dbh->exec ( $sql );
   if ($status === FALSE) {
      echo '<pre class="bg-danger">';
      print_r ( $dbh->errorInfo () );
      echo '</pre>';
   } else {
      echo '<pre class="bg-success">';
      echo 'Number of rows effected: ' . $status;
      echo '</pre>';
   }
}

function createTableIngredients(){
	$sql = "CREATE TABLE ingredients (
					id INTEGER PRIMARY KEY ASC,
					ingredient_name varchar(50),
					image_name varchar(50),
					description varchar(500))";
	createTableGeneric($sql);
}

function createTableUsers(){
	$sql = "CREATE TABLE users (
					id INTEGER PRIMARY KEY ASC,
					username varchar (15),
					password varchar (50),
					role int(2))";
	createTableGeneric($sql);
}

function createTableComments(){
	$sql = "CREATE TABLE comments (
					id INTEGER PRIMARY KEY ASC,
					ing_id int(5),
					comment_text varchar(500),
					user_id int(5),
					timestamp varchar(50),
					originating_ip varchar(10),
					FOREIGN KEY (ing_id) REFERENCES ingredients(id),
					FOREIGN KEY (user_id) REFERENCES uesrs(id))";	
	createTableGeneric($sql);
}

function createTableGeneric($sql) {
   global $dbh;
   $status = $dbh->exec ( $sql );
   if ($status === FALSE) {
      echo '<pre class="bg-danger">';
      print_r ( $dbh->errorInfo () );
      echo '</pre>';
   } else {
      echo '<pre class="bg-success">';
      echo 'Number of rows effected: ' . $status;
      echo '</pre>';
   }
}


function testedIngredientInsert(){
	global $dbh;
	
}

function testedUserInsert(){
	global $dbh;
	
}

function testedCommentInsert(){
	global $dbh;

}
?>


<!-- End of contents -->
<?php include('inc/footer.php'); ?>

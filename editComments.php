<?php

require_once "inc/page_setup.php";

$pgTitle = "editComments";
include ('inc/header.php');

$db = new Database();
$comments = $db->getComments();
$ingredients  = $db->getIngredients();

include ('inc/nav.php');

function showComments($db, $ingredient, $comments) {
	$sql = "SELECT id FROM ingredients WHERE ingredient_name='" . $ingredient . "'";
	$id = $db->prepare($sql);
	$id->execute();
	$id = $id->fetch();
	$newID = $id['id'];
	
	$sql = "SELECT * FROM comments WHERE ing_id='$newID'";
	$comment_col = $db->prepare($sql);
	$comment_col->execute();
	
	foreach ($comment_col as $c)
		echo $c['comment_text'] . "<br>";
}
?>

<div align = "center">
	<?php
		if (isset($_POST['ing']))
			showComments($db, $_POST['ing'], $comments);
	?>
	<form action = "#" method = "POST">
		<select name = "ing">
		<?php
			foreach ($ingredients as $ing)
				echo "<option value=\"" . $ing['ingredient_name'] . "\">" . $ing['ingredient_name'] . "</option>";
		?>
		</select>
		<input type="submit" value="Select">
	</form>
</div>


<?php include('inc/footer.php'); ?>

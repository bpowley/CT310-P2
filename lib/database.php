<?php
// require_once("<some_object(s).php>")
require_once("ingredient.php");
require_once("user.php");
require_once("comment.php");
class Database extends PDO {
  public function __construct() {
		parent::__construct ( "sqlite:" . __DIR__ . "/../ingredients.db" );
	}

	public function getNoOfIngredients(){
		$ing_num = $this->query("SELECT count(*) FROM ingredients");
		$num = $ing_num->fetchColumn();
		echo "there are: '$num' ingredients in the ingredients table!!!!!!";
		return $num;
	}

	public function getImage($name){
		$sql = "SELECT image_name FROM ingredients WHERE ingredient_name = '$name'";
		return $this->query($sql)->fetch();
	}

  	public function getIngredients() {
  		$sql = "SELECT * FROM ingredients";
  		return $this->query($sql);
  	}

    public function getIngredientDetails($name){
      $sql = "SELECT id, ingredient_name, image_name, description  FROM ingredients WHERE ingredient_name = '$name'";
      $result = $this->query ( $sql );
		  if ($result === FALSE) {
        // Only doing this for class. Would never do this in real life
        echo $sql;
        echo '<pre class="bg-danger">';
        print_r ( $this->errorInfo () );
        echo '</pre>';
        return NULL;
      }
      return Ingredient::getIngredientFromRow($result->fetch());
    }

  	public function getUsers(){
  		$sql = "SELECT * FROM users";
  		return $this->query($sql);
  	}
  	
  	public function addIngredient($name, $img, $dsc){
  		echo ' ------- now in addIngredient() -------------';
  		$lastID = $this->getNoOfIngredients();
 		$newID = $lastID + 1;
		$sql = "INSERT INTO ingredients (id, ingredient_name, image_name, description) VALUES ('$newID','$name','$img','$dsc')";
		echo $sql;
		if(!$this->exec($sql)){
			echo '<pre class="bg-danger">';
			print_r($this->errorInfo());
			echo '</pre>';		
		}
		  	
  	}
}
// create necessary database functions
 ?>

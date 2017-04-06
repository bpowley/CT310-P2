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
		$ing_num = $this->query("SELECT count(*) FROM images");
		return $ing_num->fetchColumn();	
	}
	
	public function getImage($name){
		$sql = "SELECT image_name FROM ingredients WHERE ingredient_name = '$name'";
		return $this->query($sql)->fetch();
	}
  
  	public function getIngredients() {
  		$sql = "SELECT * FROM ingredients";
  		return $this->query($sql);
  	}
}
// create necessary database functions
 ?>
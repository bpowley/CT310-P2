<?php

class Ingredient {
  public $id; // id unique to each ingredient
  public $name; // name of the ingredient
  public $image_name; // name of the image of the ingredient
  public $description; // description of the ingredient

  public function __construct($id=0, $name="", $img="", $dsc=""){
    $this->id = $id;
    $this->$name = $name;
    $this->$image_name = $img;
    $this->description = $dsc;
  }

  // add any necessary functions to support Ingredients

}


?>

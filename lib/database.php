<?php
// require_once("<some_object(s).php>")
class Database extends PDO {
  public function __construct() {
    parent::__construct("sqlite: " . __DIR__ , "/../someDatabase.db");
  }
}
// create necessary database functions
 ?>

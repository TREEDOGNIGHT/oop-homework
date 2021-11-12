<?php
class President {
  // Property Declaration and Definition - notice the "public" keyword before the definition
  public $name = "Barack Obama";

  // Method Definition - again, notice the "public" keyword before the actual definition
  public function greet($name) {
    return "Hello $name, my name is Barack Obama, nice to meet you!";
  }
}
$us_president = new President();

$president_name = $us_president->name;

$greetings_from_president = $us_president->greet('Donald');

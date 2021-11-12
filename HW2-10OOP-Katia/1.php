<?php
class President {
  // Property Declaration and Definition - notice the "public" keyword before the definition
  public $name = "Barack Obama";

  // Method Definition - again, notice the "public" keyword before the actual definition
  public function greet($name) {
    return "Hello INSERT_NAME_HERE, my name is $name, nice to meet you!";
  }
}
$us_president = new President();

echo $us_president->greet('Donald');


<?php

class Dummy {
  public $field1;
  public $field2;
  public $field3;

  public function __construct($field1, $field2 = 0, $field3 = null) {
    $this->field1 = $field1;
    $this->field2 = $field2;
    $this->field3 = $field3;
  }
}

$response = array(
  new Dummy("dummy1",1),
  new Dummy("dummy2",2,new Dummy("dummy2-1")),
  new Dummy("dummy3",3)
);

header("Content-type: application/json");
echo json_encode($response);

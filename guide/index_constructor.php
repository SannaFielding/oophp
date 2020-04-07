<?php
include(__DIR__ . "/config.php");
include(__DIR__ . '/src/Person4.php');

$object = new Person4("MegaMic", 42);

echo $object->details();
var_dump($object);

$object = new Person4("MegaMic");

echo $object->details();
var_dump($object);

$object = new Person4();

echo $object->details();
var_dump($object);

<?php
include(__DIR__ . '/src/Person3.php');

$object = new Person3();
$object->setAge(42);
$object->setName("MegaMic");

echo $object->getAge();
echo $object->getName();

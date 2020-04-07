<?php
include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload.php");

try {
    $person = new Person5("MegaMic");
    $person->setAge(-42);
} catch (PersonAgeException $e) {
    echo "Got exception: " . get_class($e) . "<hr>";
}

$person = new Person5("MegaMic", -42);

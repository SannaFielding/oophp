<?php
/**
 * Showing off a standard class with methods and properties.
 */
class Person2
{
    /**
     * @var string  $name   The name of the person.
     * @var integer $age    The age of the person.
     */
    private $name;
    private $age;


    /**
     * Print out details on the person.
     *
     * @return string with details on person.
     */
    public function details() {
        return "My name is {$this->name} and I am {$this->age} years old.";
    }
}

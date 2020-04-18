<?php
namespace Mos\Person;

/**
 * Showing off a standard class with methods and properties.
 */
class Person
{
    /**
     * @var string  $name   The name of the person.
     * @var integer $age    The age of the person.
     */
    public $name;
    public $age;


    /**
     * Constructor to create a Person.
     *
     * @param null|string $name The name of the person.
     * @param null|int    $age  The age of the person.
     */
    public function __construct(string $name = null, int $age = null)
    {
        $this->name = $name;
        $this->age = $age;
    }


    /**
     * Print out details on the person.
     *
     * @return string with details on person.
     */
    public function details()
    {
        return "My name is {$this->name} and I am {$this->age} years old.";
    }
}

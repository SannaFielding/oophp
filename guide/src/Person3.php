<?php
/**
 * Showing off a standard class with methods and properties.
 */
class Person3
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

    /**
     * Set the age of the person.
     *
     * @param int $age The age of the person.
     *
     * @return void
     */
    public function setAge(int $age)
    {
        $this->age = $age;
    }

    /**
     * Set the name of the person.
     *
     * @param string $name The name of the person.
     *
     * @return void
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Get the age of the person.
     *
     * @return int as the age of the person.
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Get the name of the person.
     *
     * @return string as the name of the person.
     */
    public function getName()
    {
        return $this->name;
    }
}

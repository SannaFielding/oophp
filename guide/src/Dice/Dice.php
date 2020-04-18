<?php
namespace sahx\Dice;

class Dice
{
    /**
     * @var int $sides       The number of sides on a die.
     * @var int $lastRoll    The value of the last roll.
     */
    private $sides;
    private $lastRoll;


    /**
     * Constructor to create a Die.
     * @param int $sides    The number of sides on a die, default is 6.
     * @param null|int $lastRoll    The value of the last roll, null before rolled.
     */
    public function __construct(int $sides = 6)
    {
        $this->sides = $sides;
        $this->lastRoll = null;
    }


    /**
     * Roll die.
     *
     * @return int as value of rolled die.
     */
    public function roll()
    {
        $this->lastRoll = rand(1, $this->sides);

        return $this->lastRoll;
    }

    /**
     * Return last roll of the die.
     *
     * @return int as value of last rolled die.
     */
    public function getLastRoll()
    {
        return $this->lastRoll;
    }
}

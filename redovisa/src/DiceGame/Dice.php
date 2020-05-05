<?php
namespace Sahx\DiceGame;

class Dice
{
    /**
     * @var int $sides       The number of sides on a dice.
     * @var int $lastRoll    The value of the last roll.
     */
    private $sides;
    private $lastRoll;


    /**
     * Constructor to create a Dice.
     * @param int $sides    The number of sides on a dice, default is 6.
     * @param null|int $lastRoll    The value of the last roll, null before rolled.
     */
    public function __construct(int $sides = 6)
    {
        $this->sides = $sides;
        $this->lastRoll = null;
    }


    /**
     * Roll dice.
     *
     * @return int as value of rolled dice.
     */
    public function roll()
    {
        $this->lastRoll = rand(1, $this->sides);

        return $this->lastRoll;
    }

    /**
     * Return last roll of the dice.
     *
     * @return int as value of last rolled dice.
     */
    public function getLastRoll()
    {
        return $this->lastRoll;
    }

    /**
     * Return number of sides on dice.
     *
     * @return int as how many sides.
     */
    public function getSides()
    {
        return $this->sides;
    }
}

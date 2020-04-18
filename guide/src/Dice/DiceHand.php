<?php
namespace sahx\Dice;

/**
 * A dicehand, consisting of dices.
 */
class DiceHand
{
    /**
     * @var Dice $dices   Array consisting of dices.
     * @var int  $values  Array consisting of last roll of the dices.
     */
     private $dices;
     private $values;

    /**
     * Constructor to initiate the dicehand with a number of dices.
     *
     * @param int $dices Number of dices to create, defaults to five.
     */
    public function __construct(int $dices = 5)
    {
        $this->dices  = [];
        $this->values = [];

        for ($i = 0; $i < $dices; $i++) {
            $this->dices[$i]  = new Dice();
            $this->values[$i] = $this->dices[$i]->roll();
        }
    }

    /**
     * Roll all dices save their value.
     *
     * @return void.
     */
    public function roll() {
        for ($i=0; $i < count($this->dices); $i++) {
            $this->values[$i] = $this->dices[$i]->roll();
        }
    }

    /**
     * Get values of dices from last roll.
     *
     * @return array with values of the last roll.
     */
    public function values() {
        return $this->values;
    }

    /**
     * Get the sum of all dices.
     *
     * @return int as the sum of all dices.
     */
    public function sum() {
        $sum = 0;

        for ($i=0; $i < count($this->dices); $i++) {
            $sum += $this->values[$i];
        }

        return $sum;
    }

    /**
     * Get the average of all dices.
     *
     * @return float as the average of all dices.
     */
    public function average() {
        $sum = $this->sum();

        return round($sum / count($this->values), 2);
    }
}

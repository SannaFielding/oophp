<?php
namespace Sahx\DiceGame;

/**
 * A dicehand, consisting of dice.
 */
class DiceHand
{
    /**
     * @var DiceGraphic $dices   Array consisting of dices.
     * @var int  $values  Array consisting of last roll of the dices.
     */
    private $dices;
    private $values;

    /**
     * Constructor to initiate the dicehand with a number of dices.
     *
     * @param int $dices Number of dices to create, defaults to two.
     */
    public function __construct(int $dices = 2)
    {
        $this->dices = [];
        $this->values = [];

        for ($i = 0; $i < $dices; $i++) {
            $this->dices[$i]  = new DiceGraphic();
            $this->values[$i] = $this->dices[$i]->roll();
        }
    }

    /**
     * Roll all dices save their value.
     *
     * @return void.
     */
    public function roll()
    {
        for ($i=0; $i < count($this->dices); $i++) {
            $this->values[$i] = $this->dices[$i]->roll();
        }
    }

    /**
     * Get graphic dices.
     *
     * @return array with graphic dices.
     */
    public function getGraphicDices()
    {
        $graphics = [];

        foreach ($this->dices as $value) {
            array_push($graphics, $value->graphic());
        }

        return $graphics;
    }

    /**
     * Get values of dices from last roll.
     *
     * @return array with values of the last roll.
     */
    public function values()
    {
        return $this->values;
    }

    /**
     * Get the sum of all dices.
     *
     * @return int as the sum of all dices.
     */
    public function sum()
    {
        $sum = 0;

        for ($i=0; $i < count($this->dices); $i++) {
            $sum += $this->values[$i];
        }

        return $sum;
    }

    /**
     * Check if a roll does not contain given number and is valid.
     * @param int $number   The number to check.
     *
     * @return bool as if roll is valid.
     */
    public function isValid(int $number)
    {
        $isValid = true;
        $numberOfValues = count($this->values);
        for ($i = 0; $i < $numberOfValues; $i++) {
            if ($this->values[$i] == $number) {
                $isValid = false;
            }
        }
        return $isValid;
    }
}

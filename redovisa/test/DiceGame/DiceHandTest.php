<?php

namespace Sahx\DiceGame;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class DiceHandObjectTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectNoArguments()
    {
        $hand = new DiceHand();
        $this->assertInstanceOf("\Sahx\DiceGame\DiceHand", $hand);

        $res = count($hand->values());
        $exp = 2;
        $this->assertEquals($exp, $res);
    }

    /**
     * Construct object and verify that the object has the expected
     * properties. Use one argument.
     */
    public function testCreateObjectOneArgument()
    {
        $hand = new DiceHand(4);
        $this->assertInstanceOf("\Sahx\DiceGame\DiceHand", $hand);

        $res = count($hand->values());
        $exp = 4;
        $this->assertEquals($exp, $res);
    }

    /**
     * Construct DiceHand object and roll.
     */
    public function testRollDiceHand()
    {
        $hand = new DiceHand();
        $initRolls = $hand->values();

        $hand->roll();

        $newValues = $hand->values();

        $this->assertNotEquals($initRolls, $newValues);
    }

    /**
     * Construct DiceHand object and test sum method.
     */
    public function testSumOfDiceHand()
    {
        $hand = new DiceHand();

        $exp = 0;
        $values = $hand->values();
        for ($i=0; $i < 2; $i++) {
            $exp += $values[$i];
        }

        $res = $hand->sum();

        $this->assertEquals($exp, $res);
    }

    /**
     * Construct DiceHand object and get graphic representation of
     * the dice in it.
     */
    public function testGetGraphicDices()
    {
        $hand = new DiceHand();

        $values = $hand->values();
        $exp = [];
        for ($i=0; $i < 2; $i++) {
            array_push($exp, ("dice-" . $values[$i]));
        }

        $res = $hand->getGraphicDices();

        $this->assertEquals($exp, $res);
    }

    /**
     * Test the isValid-method, when it is true.
     */
    public function testIsValidTrue()
    {
        $hand = new DiceHand();

        $values = $hand->values();
        $exp = true;
        for ($i=0; $i < 2; $i++) {
            if ($values[$i] === 1) {
                $exp = false;
            }
        }

        $res = $hand->isValid(1);

        $this->assertEquals($exp, $res);
    }

    /**
     * Test the isValid-method, when it is false.
     */
    public function testIsValidFalse()
    {
        $hand = new DiceHand();

        $values = $hand->values();
        $number = $values[0];
        $exp = true;
        for ($i=0; $i < 2; $i++) {
            if ($values[$i] === $number) {
                $exp = false;
            }
        }

        $res = $hand->isValid($number);

        $this->assertEquals($exp, $res);
    }
}

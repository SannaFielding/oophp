<?php

namespace Sahx\DiceGame;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class DiceObjectTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectNoArguments()
    {
        $dice = new Dice();
        $this->assertInstanceOf("\Sahx\DiceGame\Dice", $dice);

        $res = $dice->getLastRoll();
        $this->assertNull($res);
    }

    /**
     * Construct object and verify that the object has the expected
     * properties. Use one argument.
     */
    public function testCreateObjectOneArgument()
    {
        $dice = new Dice(4);
        $this->assertInstanceOf("\Sahx\DiceGame\Dice", $dice);

        $res = $dice->getSides();
        $exp = 4;
        $this->assertEquals($exp, $res);
    }

    /**
     * Construct dice object and roll. Assert that roll is integer and in the
     * right range.
     */
    public function testCreateDiceAndRoll()
    {
        $dice = new Dice();

        $res = $dice->roll();
        $this->assertIsInt($res);
        $this->assertGreaterThanOrEqual(1, $res);
        $this->assertLessThanOrEqual(6, $res);
    }
}

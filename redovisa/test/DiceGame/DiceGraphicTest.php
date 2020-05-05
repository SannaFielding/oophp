<?php

namespace Sahx\DiceGame;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class DiceGraphicObjectTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectNoArguments()
    {
        $dice = new DiceGraphic();
        $this->assertInstanceOf("\Sahx\DiceGame\DiceGraphic", $dice);

        $res = $dice->getLastRoll();
        $this->assertNull($res);
    }

    /**
     * Construct object and verify that the object has the expected
     * properties. Use one argument.
     */
    public function testCreateObjectOneArgument()
    {
        $dice = new DiceGraphic(4);
        $this->assertInstanceOf("\Sahx\DiceGame\DiceGraphic", $dice);

        $res = $dice->getSides();
        $exp = 6;
        $this->assertEquals($exp, $res);
    }

    /**
     * Construct dice object and roll. Assert that roll is integer and in the
     * right range.
     */
    public function testCreateDiceAndRoll()
    {
        $dice = new DiceGraphic();

        $res = $dice->roll();
        $this->assertIsInt($res);
        $this->assertGreaterThanOrEqual(1, $res);
        $this->assertLessThanOrEqual(6, $res);
    }

    /**
     * Construct dice object and roll. Assert that roll is integer and in the
     * right range.
     */
    public function testGraphicMethod()
    {
        $dice = new DiceGraphic();

        $roll = $dice->getLastRoll();
        $exp = "dice-" . $roll;
        $res = $dice->graphic();
        $this->assertEquals($exp, $res);
    }
}

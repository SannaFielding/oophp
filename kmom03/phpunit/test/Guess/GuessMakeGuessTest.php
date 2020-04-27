<?php

namespace Sahx\Guess;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class GuessMakeGuessTest extends TestCase
{
    /**
     * Construct object and make a guess that is correct. Make sure number of
     * guesses left decreases.
     */
    public function testMakeCorrectGuess()
    {
        $guess = new Guess(50);
        $this->assertInstanceOf("\Sahx\Guess\Guess", $guess);

        $result = $guess->makeGuess(50);

        $this->assertEquals("correct!!!", $result);

        $res = $guess->tries();
        $exp = 5;
        $this->assertEquals($exp, $res);
    }

    /**
     * Construct object and make a guess that is too low, but still valid.
     * Make sure number of guesses left decreases.
     */
    public function testMakeLowGuess()
    {
        $guess = new Guess(50);
        $this->assertInstanceOf("\Sahx\Guess\Guess", $guess);

        $result = $guess->makeGuess(1);

        $this->assertEquals("to low...", $result);

        $res = $guess->tries();
        $exp = 5;
        $this->assertEquals($exp, $res);
    }

    /**
     * Construct object and make a guess that is too high, but still valid.
     * Make sure number of guesses left decreases.
     */
    public function testMakeHighGuess()
    {
        $guess = new Guess(50);
        $this->assertInstanceOf("\Sahx\Guess\Guess", $guess);

        $result = $guess->makeGuess(100);

        $this->assertEquals("to high...", $result);

        $res = $guess->tries();
        $exp = 5;
        $this->assertEquals($exp, $res);
    }

    /**
     * Construct object and make a guess that is invalid.
     */
    public function testMakeOutOfTriesGuess()
    {
        $guess = new Guess(50, 0);

        $result = $guess->makeGuess(100);

        $this->assertEquals("no guesses left.", $result);
    }
}

<?php

namespace Sahx\Guess;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class GuessExceptionTest extends TestCase
{
    /**
     * Construct object and make a guess that is invalid.
     */
    public function testMakeInvalidGuess()
    {
        $this->expectException(GuessException::class);

        $guess = new Guess(50);
        $guess->makeGuess(200);
    }
}

<?php
/**
 * Guess my number, a class supporting the game through GET, POST and SESSION.
 */
class Guess
{
    /**
     * @var int $number   The current secret number.
     * @var int $tries    Number of tries a guess has been made.
     */
    public $number;
    public $tries;



    /**
     * Constructor to initiate the object with current game settings,
     * if available. Randomize the current number if no value is sent in.
     *
     * @param int $number The current secret number, default -1 to initiate
     *                    the number from start.
     * @param int $tries  Number of tries a guess has been made,
     *                    default 6.
     */
    public function __construct(int $number = -1, int $tries = 6)
    {
        if ($number === -1) {
            $this->random();
        } else {
            $this->setNumber($number);
        }
        $this->setTries($tries);
    }



    /**
     * Randomize the secret number between 1 and 100 to initiate a new game.
     *
     * @return void
     */
    public function random()
    {
        $this->setNumber(rand(1, 100));
    }



    /**
     * Get number of tries left.
     *
     * @return int as number of tries made.
     */
    public function getTries()
    {
        return $this->tries;
    }



    /**
     * Decrease the number of tries left.
     *
     * @return void
     */
    public function decTries()
    {
        $this->tries -= 1;
    }



    /**
     * Set the number of tries left.
     *
     * @return void
     */
    public function setTries(int $try = 6)
    {
        $this->tries = $try;
    }



    /**
     * Get the secret number.
     *
     * @return int as the secret number.
     */
    public function getNumber()
    {
        return $this->number;
    }



    /**
     * Set the secret number.
     *
     * @return void
     */
    public function setNumber(int $num)
    {
        $this->number = $num;
    }



    /**
     * Make a guess, decrease remaining guesses and return a string stating
     * if the guess was correct, too low or to high or if no guesses remains.
     *
     * @throws GuessException when guessed number is out of bounds.
     *
     * @return string to show the status of the guess made.
     */
    public function makeGuess($guess)
    {
        if ($guess === "") {
            throw new GuessException("NOT ELIGIBLE, SHOULD BE AN INTEGER BETWEEN 1 AND 100.");
        }

        if ($this->tries === 0) {
            throw new GuessException("NOT ELIGIBLE, YOU'RE OUT OF TRIES.");
        }

        if ($guess < 1 || $guess > 100) {
            throw new GuessException("OUT OF BOUNDS.");
        }

        $this->decTries();
        $corrNr = $this->number;

        if ($corrNr === $guess) {
            return $this->output("corr");
        } elseif ($guess > $corrNr) {
            return $this->output("high");
        } else {
            return $this->output("low");
        }
    }



    /**
     * Get correct output. Will return a string saying if the guess
     * was too high, too low, correct or if you're out of guesses.
     *
     * @return string with correct output.
     */
    public function output(string $input)
    {
        switch ($input) {
            case 'high':
                return "TOO HIGH.";
                break;
            case 'low':
                return "TOO LOW.";
                break;
            case 'corr':
                return "CORRECT!";
                break;
        }
    }
}

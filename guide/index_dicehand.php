<?php
namespace sahx\Dice;

/**
 * Throw a hand of dice.
 */
include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload_namespace.php");

$hand = new DiceHand();
$hand->roll();

?><h1>Rolling a dicehand with five dice</h1>

<p><?= implode(", ", $hand->values()) ?></p>
<p>Sum is: <?= $hand->sum() ?>.</p>
<p>Average is: <?= $hand->average() ?>.</p>

<?php

// namespace Anax\View;
namespace Sahx\Guess;

/**
 * Render content within an article.
 */

?><h1>Guess my number </h1>
<p>Guess a number between 1 and 100, you have <?= $tries ?> tries left.</p>

<form method="post">
    <input type='number' name='guess'>
    <input type='submit' name='doGuess' value='Make a guess'>
    <input type='submit' name='doInit' value='Start over'>
    <input type='submit' name='doCheat' value='Cheat'>
</form>

<?php if ($event === "doGuess") : ?>
    <p>Your guess <?= $guess ?> is <b><?= $res ?><b></p>
<?php endif; ?>

<?php if ($event === "doCheat") : ?>
    <p>CHEAT: Current number is: <?= $number ?>.</p>
<?php endif; ?>

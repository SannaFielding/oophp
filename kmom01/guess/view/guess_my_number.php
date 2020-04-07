<h1>Guess my number </h1>
<p>Guess a number between 1 and 100, you have <?= $_SESSION["game"]->getTries() ?> left.</p>

<form method="post">
    <input type='number' name='guess'>
    <!-- <input type='hidden' name='number' value='<?= $number ?>'>
    <input type='hidden' name='tries' value='<?= $tries ?>'> -->
    <input type='submit' name='doGuess' value='Make a guess'>
    <input type='submit' name='doInit' value='Start over'>
    <input type='submit' name='doCheat' value='Cheat'>
</form>

<?php if ($doGuess) : ?>
    <p>Your guess <?= $guess ?> is <b><?= $res ?><b></p>
<?php endif; ?>

<?php if ($doCheat) : ?>
    <p>CHEAT: Current number is: <?= $_SESSION["game"]->getNumber() ?>.</p>
<?php endif; ?>

<pre>
<?= var_dump($_POST) ?>
<?= var_dump($_SESSION) ?>

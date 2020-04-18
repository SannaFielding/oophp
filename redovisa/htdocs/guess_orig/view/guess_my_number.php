<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../guess_orig/stylesheet.css">
    </head>
    <body>
        <h1>Guess my number </h1>
        <p>Guess a number between 1 and 100, you have <?= $_SESSION["game"]->getTries() ?> tries left.</p>

        <form method="post" action="process.php">
            <input type='number' name='guess'>
            <input type='submit' name='doGuess' value='Make a guess'>
            <input type='submit' name='doInit' value='Start over'>
            <input type='submit' name='doCheat' value='Cheat'>
        </form>

        <?php if ($_SESSION["event"] === "doGuess") : ?>
            <p>Your guess <?= $guess ?> is <b><?= $_SESSION["res"] ?><b></p>
        <?php endif; ?>

        <?php if ($_SESSION["event"] === "doCheat") : ?>
            <p>CHEAT: Current number is: <?= $_SESSION["game"]->getNumber() ?>.</p>
        <?php endif; ?>

    </body>
</html>

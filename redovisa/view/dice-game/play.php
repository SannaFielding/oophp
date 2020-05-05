<?php

namespace Sahx\DiceGame;

?>
<h3>Poängställning</h3>
<?php if ($winner == "player") : ?>
    <p>Spelaren vann med <?= $playerScore ?> poäng!</p>
<?php elseif ($winner == "computer") : ?>
    <p>Datorn vann med <?= $computerScore ?> poäng!</p>
<?php else : ?>
    <p>Spelarens poäng: <?= $playerScore ?><br>
    Datorns poäng: <?= $computerScore ?></p>
<?php endif; ?>

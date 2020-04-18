<?php
namespace sahx\Dice;

/**
 * Throw some graphic dices.
 */
include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload_namespace.php");

$dice = new DiceGraphic();
$rolls = 6;
$res = [];
$class = [];
$sum = 0;
for ($i = 0; $i < $rolls; $i++) {
    $res[] = $dice->roll();
    $class[] = $dice->graphic();
    $sum += $res[$i];
}

?>

<!doctype html>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<h1>Rolling <?= $rolls ?> graphic dices</h1>

<p>
<?php foreach($class as $value) : ?>
    <i class="dice-sprite <?= $value ?>"></i>
<?php endforeach; ?>
</p>

<p class="dice-utf8">
<?php foreach($class as $value) : ?>
    <i class="<?= $value ?>"></i>
<?php endforeach; ?>
</p>

<p><?= implode(", ", $res) ?></p>
<p>Sum is: <?= $sum ?></p>
<p>Average is: <?= round(($sum / $rolls), 2) ?></p>

<?php
namespace sahx\Dice;

include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload_namespace.php");

$die = new Dice();
$sum = 0;
?>

<h1>Rolling dice six times</h1>
<ol>
    <?php for ($i=0; $i < 6; $i++) {
        $value = $die->roll();
        $sum += $value;
        ?>
        <li><?php echo $value ?></li>
    <?php } ?>
</ol>

<p>Sum is: <?php echo $sum; ?></p>
<p>Average is: <?php echo round($sum/6, 2) ?></p>

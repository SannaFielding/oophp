<?php

namespace Sahx\DiceGame;

?>
<h1>Spela tärningsspelet "100"!</h1>

<?php if ($winner == null) : ?>
    <?php if ($turn == "player") : ?>
        <h3>Spelarens tur</h3>

        <?php if ($valid) : ?>
            <form method="post" action="playerroll" >
                <input type="submit" class="button" name="roll" value="Slå tärningarna">
            </form>
            <br>
            <?php if ($sum != 0) : ?>
                <form method="post" action="save" >
                    <input type="submit" class="button" name="save" value="Spara poängen">
                </form>
            <?php endif; ?>
        <?php else : ?>
            <form method="post" action="save" >
                <input type="submit" class="button" name="save" value="Fortsätt">
            </form>
            <p>Du slog en etta och får därför inga poäng denna runda.</p>
        <?php endif; ?>
        <p>Poäng: <?= $sum ?> </p>
        <?php if ($values != null) : ?>
            <p class="dice-utf8">
                <?php foreach ($graphics as $graphic) : ?>
                    <i class="<?= $graphic ?>"></i>
                <?php endforeach; ?>
            </p>
        <?php endif; ?>

    <?php else : ?>
        <h3>Datorns tur</h3>
        <?php if ($sum == 0) : ?>
            <form method="post" action="computerroll" >
                <input type="submit" class="button" name="roll" value="Slå datorns tärningar">
            </form>
        <?php else : ?>
            <form method="post" action="save" >
                <input type="submit" class="button" name="save" value="Avsluta datorns tur">
            </form>
            <p>Datorn slog två gånger och fick <?= $app->session->get("sum") ?> poäng.</p>
            <?php if ($valid === false) : ?>
                <p>Men dessa poäng får den inte behålla för att den slog en etta.</p>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
<?php else : ?>
    <p><a href="setup">Spela en gång till!</a></p>
<?php endif; ?>

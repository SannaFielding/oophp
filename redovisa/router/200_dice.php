<?php

/**
* Page with post form to enter how many dices you want to play with.
*/
$app->router->get("dice-game/setup", function () use ($app) {
    $title = "Play the game!";

    $app->page->add("dice-game/setup");

    return $app->page->render([
        "title" => $title,
    ]);
});

/**
* Post form to get number of dice to play with.
* Redirects to init the game.
*/
$app->router->post("dice-game/setup", function () use ($app) {
    // Get nr of dices from post form.
    $app->session->set("nrOfDices", $app->request->getPost("nrOfDices"));

    return $app->response->redirect("dice-game/init");
});

/**
 * Init the game and redirect to play the game.
 */
$app->router->get("dice-game/init", function () use ($app) {
    // Init the game and create session variables.
    $app->session->set("turn", "player");
    $app->session->set("playerScore", 0);
    $app->session->set("computerScore", 0);
    $app->session->set("valid", true);
    $app->session->set("values", null);
    $app->session->set("sum", 0);
    $app->session->set("graphics", null);

    return $app->response->redirect("dice-game/play");
});


/**
 * Play the game - show game status.
 */
$app->router->get("dice-game/play", function () use ($app) {
    $title = "Play the game";

    // Get variables from session.
    $turn = $app->session->get("turn");
    $playerScore = $app->session->get("playerScore") ?? 0;
    $computerScore = $app->session->get("computerScore") ?? 0;
    $values = $app->session->get("values") ?? null;
    $sum = $app->session->get("sum") ?? 0;
    $valid = $app->session->get("valid") ?? true;
    $graphics = $app->session->get("graphics") ?? null;

    // Set winner to null, unless someone scored 100 points.
    $winner = null;
    if ($playerScore >= 100) {
        $winner = "player";
    } else if ($computerScore >= 100) {
        $winner = "computer";
    }

    // Send needed data to view.
    $data = [
        "playerScore" => $playerScore,
        "computerScore" => $computerScore,
        "turn" => $turn,
        "values" => $values,
        "sum" => $sum,
        "valid" => $valid,
        "winner" => $winner,
        "graphics" => $graphics
    ];

    $app->page->add("dice-game/turn", $data);
    $app->page->add("dice-game/play", $data);
//     $app->page->add("dice-game/debug");

    return $app->page->render([
        "title" => $title,
    ]);
});

/**
 * Post router for player roll.
 */
$app->router->post("dice-game/playerroll", function () use ($app) {
    // Set up new DiceHand and roll it.
    $diceHand = new Sahx\DiceGame\DiceHand($app->session->get("nrOfDices"));
    $diceHand->roll();

    // Set session variables.
    $app->session->set("valid", true);
    $app->session->set("values", $diceHand->values());
    $app->session->set("sum", ($app->session->get("sum") + $diceHand->sum()));
    $app->session->set("valid", $diceHand->isValid(1));
    $app->session->set("graphics", $diceHand->getGraphicDices());

    return $app->response->redirect("dice-game/play");
});

/**
 * Post router for computer roll.
 */
$app->router->post("dice-game/computerroll", function () use ($app) {
    // Set up new DiceHand and roll it.
    // Computer rolls 2 times before saving its score.
    $diceHand = new Sahx\DiceGame\DiceHand($app->session->get("nrOfDices"));
    for ($i = 0; $i < 2; $i++) {
        $diceHand->roll();
        if ($diceHand->isValid(1)) {
            $app->session->set("valid", true);
        }
        $app->session->set("sum", ($app->session->get("sum") + $diceHand->sum()));
    }
    $app->session->set("graphics", $diceHand->getGraphicDices());

    return $app->response->redirect("dice-game/play");
});

/**
 * Save score from round into overall score.
 */
$app->router->post("dice-game/save", function () use ($app) {

    $turn = $app->session->get("turn");

    if ($turn === "player") {
        $app->session->set("turn", "computer");
        if ($app->session->get("valid")) {
            $app->session->set("playerScore", ($app->session->get("playerScore") + $app->session->get("sum")));
        }
        return $app->response->redirect("dice-game/reset");
    } else {
        $app->session->set("turn", "player");
        if ($app->session->get("valid")) {
            $app->session->set("computerScore", ($app->session->get("computerScore") + $app->session->get("sum")));
        }
        return $app->response->redirect("dice-game/reset");
    };
});

/**
 * Reset session for next players turn.
 */
$app->router->get("dice-game/reset", function () use ($app) {

    $app->session->set("valid", true);
    $app->session->set("values", null);
    $app->session->set("sum", 0);
    $app->session->set("graphics", null);

    return $app->response->redirect("dice-game/play");
});

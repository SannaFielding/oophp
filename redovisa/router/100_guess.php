<?php
/**
 * Create routes using $app programming style.
 */
//var_dump(array_keys(get_defined_vars()));



/**
 * Init the game and redirect to play the game.
 */
$app->router->get("guess/init", function () use ($app) {
    // init the game.
    $_SESSION["game"] = new Sahx\Guess\Guess();
    $_SESSION["res"] = "";

    return $app->response->redirect("guess/play");
});



/**
 * Play the game - show game status.
 */
$app->router->get("guess/play", function () use ($app) {
    $title = "Play the game!";

    $res = $_SESSION["res"] ?? null;
    $event = $_SESSION["event"] ?? null;
    $guess = $_SESSION["guess"] ?? null;

    $_SESSION["guess"] = null;
    $_SESSION["res"] = null;

    $data = [
        "event" => $event,
        "res" => $res,
        "guess" => $guess,
        "tries" => $_SESSION["game"]->getTries(),
        "number" => $_SESSION["game"]->getNumber()
    ];

    $app->page->add("guess/play", $data);
    // $app->page->add("guess/debug", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});



/**
 * Rerouting-router
 */
$app->router->post("guess/play", function () use ($app) {

    if ($_POST["doInit"] === "Start over") {
        $_SESSION["event"] = "doInit";
    } elseif ($_POST["doGuess"] === "Make a guess") {
        $_SESSION["event"] = "doGuess";
    } elseif ($_POST["doCheat"] === "Cheat") {
        $_SESSION["event"] = "doCheat";
    }

    $_SESSION["guess"] = $_POST["guess"];
    $event = $_SESSION["event"];

    switch ($event) {
        case 'doInit':
            return $app->response->redirect("guess/init");
        case 'doGuess':
            return $app->response->redirect("guess/make-guess");
        default:
            return $app->response->redirect("guess/play");
    }
});



/**
 * Make a guess
 */
$app->router->get("guess/make-guess", function () use ($app) {

    try {
        $_SESSION["res"] = $_SESSION["game"]->makeGuess($_SESSION["guess"]);
    } catch (Sahx\Guess\GuessException $e) {
        $_SESSION["res"] = $e->getMessage();
    }

    return $app->response->redirect("guess/play");
});

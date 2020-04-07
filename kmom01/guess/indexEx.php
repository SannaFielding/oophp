<?php

include(__DIR__ . "/src/autoload.php");
include(__DIR__ . "/src/config.php");

$game = new Guess();

$number = $_POST["number"] ?? null;
$tries = $_POST["tries"] ?? null;
$guess = $_POST["guess"] ?? null;
$doInit = $_POST["doInit"] ?? null;
$doGuess = $_POST["doGuess"] ?? null;
$doCheat = $_POST["doCheat"] ?? null;

if ($doInit || $number === null) {
    // Init the game
    $number = $game->number();
    $tries = $game->tries();
} elseif ($doGuess) {
    // Make a guess
    $tries -= 1;
    if ($guess === $number) {
        $res = "CORRECT";
    } elseif ($guess > $number) {
        $res = $game->output("high");
    } else {
        $res = $game->output("low");
    }
    echo($res);
}

// Render the page
require __DIR__ . "/view/guess_my_numberEx.php";

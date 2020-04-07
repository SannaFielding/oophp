<?php

include(__DIR__ . "/src/autoload.php");
include(__DIR__ . "/src/config.php");

session_name("sahx11");
session_start();

$guess = $_POST["guess"] ?? null;
$doInit = $_POST["doInit"] ?? null;
$doGuess = $_POST["doGuess"] ?? null;
$doCheat = $_POST["doCheat"] ?? null;

if (!isset($_SESSION["game"]) || $doInit) {
    $_SESSION["game"] = new Guess();
}

// $guess = $_POST["guess"] ?? null;
// $doInit = $_POST["doInit"] ?? null;
// $doGuess = $_POST["doGuess"] ?? null;
// $doCheat = $_POST["doCheat"] ?? null;

// $number = $_SESSION["game"]->getNumber() ?? null;
// $tries = $_SESSION["game"]->getTries() ?? null;

// if ($doInit) {
//     // Init the game
//     echo("iniiiiing");
//     $number = $_SESSION["game"]->getNumber();
//     $tries = $_SESSION["game"]->getTries();
// } else
if ($doGuess) {
    // Make a guess
    try {
        $res = $_SESSION["game"]->makeGuess($guess);
    } catch (GuessException $e) {
        $res = $e->getMessage();
    }
//     $game->decTries();
//     if ($guess === $game->getNumber()) {
//         $res = "CORRECT";
//     } elseif ($guess > $game->getNumber()) {
//         $res = $game->output("high");
//     } else {
//         $res = $game->output("low");
//     }
}

// Render the page
require __DIR__ . "/view/guess_my_number.php";

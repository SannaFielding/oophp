<?php

include(__DIR__ . "/src/autoload.php");
include(__DIR__ . "/src/config.php");

$guess = $_SESSION["guess"] ?? null;
$doInit = $_POST["doInit"] ?? null;
$doGuess = $_POST["doGuess"] ?? null;
$doCheat = $_POST["doCheat"] ?? null;

if (!isset($_SESSION["game"])) {
    $_SESSION["game"] = new Guess();
}

switch ($_SESSION["event"]) {
    case 'doInit':
        $_SESSION["game"] = new Guess();
        $_SESSION["res"] = "";
        break;
    case 'doGuess':
        try {
            $_SESSION["res"] = $_SESSION["game"]->makeGuess($guess);
        } catch (GuessException $e) {
            $_SESSION["res"] = $e->getMessage();
        }
        break;
    case 'doCheat':
        $_SESSION["res"] = "CHEAT";
        break;
}

// Render the page
require __DIR__ . "/view/guess_my_number.php";

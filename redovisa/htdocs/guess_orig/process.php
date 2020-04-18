<?php

include(__DIR__ . "/autoload.php");
include(__DIR__ . "/config.php");

/**
 * A processing page that does a redirect.
 */

 $_SESSION["guess"] = $_POST["guess"];

if ($_POST["doInit"] === "Start over") {
    $_SESSION["event"] = "doInit";
} elseif ($_POST["doGuess"] === "Make a guess") {
    $_SESSION["event"] = "doGuess";
} elseif ($_POST["doCheat"] === "Cheat") {
    $_SESSION["event"] = "doCheat";
}

// Redirect to a result page.
$url = "index.php";
header("Location: $url");

<?php
session_start();

$hangman = [
    "assets/images/0.jpg",
    "assets/images/1.jpg",
    "assets/images/2.jpg",
    "assets/images/3.jpg",
    "assets/images/4.jpg",
    "assets/images/5.jpg",
    "assets/images/6.jpg",
    "assets/images/7.jpg",

];

if (isset($_GET["page"])){
    switch ($_GET["page"]){
        case "cities" : $filename = "./assets/files/cities.txt"; $bulgarian = "българският град";
            break;
        case "villages" : $filename = "./assets/files/villages.txt"; $bulgarian = "българското село";
            break;
        case "mountains" : $filename = "./assets/files/mountains.txt"; $bulgarian = "българската планина";
            break;
        case "rivers" : $filename = "./assets/files/rivers.txt"; $bulgarian = "българската река";
            break;
        case "lakes" : $filename = "./assets/files/lakes.txt"; $bulgarian = "българското езеро";
            break;
        case "main" : $filename = "./assets/files/cities.txt"; $bulgarian = "";
            break;
    }
    if (!isset($_POST["submit"])) {
        $filehandle = fopen($filename, "r");
        $filecontent = fread($filehandle, filesize($filename));
        fclose($filehandle);
        $wordsArray = explode(",", $filecontent);
        $theWord = mb_strtoupper($wordsArray[mt_rand(0, count($wordsArray) - 1)]);
        $spacesInTheWord = 0;

        for ($i = 0; $i < mb_strlen($theWord); $i++) {
            if (mb_substr($theWord, $i, 1) == " ") {
                $wordDashArray[$i] = " ";
                $spacesInTheWord++;
            } else {
                $wordDashArray[$i] = "_";

            }
            $wordLetterArray[$i] = mb_substr($theWord, $i, 1);
        }
        if ($spacesInTheWord > 0){
            $countLetters = mb_strlen($theWord) - $spacesInTheWord;
        }else{
            $countLetters = mb_strlen($theWord);
        }
        $theDashes = implode("&nbsp", $wordDashArray);
        $worning = "";
        $end = "";
        $_SESSION["wordDashArray"] = $wordDashArray;
        $_SESSION["wordLetterArray"] = $wordLetterArray;
        $_SESSION["theDashes"] = $theDashes;
        $_SESSION["theWord"] = $theWord;
        $_SESSION["countLetters"] = $countLetters;
        $_SESSION["enteredLetters"] = "";
        $_SESSION["mistakes"] = 0;
    } else {
        $allowedCharacters = ["А", "Б", "В", "Г", "Д", "Е", "Ж", "З", "И", "Й", "К", "Л", "М", "Н", "О", "П", "Р", "С", "Т", "У", "Ф", "Х", "Ц", "Ч", "Ш", "Щ", "Ъ", "Ь", "Ю", "Я"];
        $letter = mb_strtoupper(trim($_POST["letter"]));
        $worning = "";
        $end = "";
        $worningFlag = true;
        $mistakes = true;
        $duplicated = false;
        for ($i = 0; $i < count($allowedCharacters); $i++) {
            if ($letter == $allowedCharacters[$i]) {
                $worningFlag = false;
            }
        }
        if (!$worningFlag) {
            for ($i = 0; $i < mb_strlen($_SESSION["enteredLetters"]); $i++){
                if (mb_substr($_SESSION["enteredLetters"], $i, 1) == $letter){
                    $duplicated = true;
                    break;
                }
            }
            if (!$duplicated){
                for ($i = 0; $i < count($_SESSION["wordLetterArray"]); $i++) {
                    if ($_SESSION["wordLetterArray"][$i] == $letter) {
                        $_SESSION["wordDashArray"][$i] = $letter;
                        $mistakes = false;
                    }
                }
                if ($mistakes) {
                    $_SESSION["mistakes"]++;
                }
                $theDashes = implode("&nbsp", $_SESSION["wordDashArray"]);
                $_SESSION["theDashes"] = $theDashes;
                $_SESSION["enteredLetters"] .= $letter . "&nbsp";
                $enteredLettersArray = explode("&nbsp", $_SESSION["enteredLetters"]);
                if ($_SESSION["wordLetterArray"] == $_SESSION["wordDashArray"]) {
                    $end = "win";
                }
                if ($_SESSION["mistakes"] == 7) {
                    $end = "loss";
                }
            }else {
                $worning = "Вече сте въвели буквата '" . $letter . "'";
            }

        } else {
            $worning = "Може да въведете само една буква и тя трябва да е на кирилица!";
        }
    }

}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Бесеница</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        <?php
            if ($end == "win" || $end == "loss"){
                echo ".hide {display: none}";
            }
         ?>
    </style>
</head>
<body>
    <div id="mainWrapper">
        <header class="gradients">
            <img src="assets/images/header.png" alt="logo of hangman">
            <h1>Бесеница!</h1>
        </header>
        <div id="contentWrapper">
            <hr>


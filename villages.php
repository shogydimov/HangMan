<div class="hide">
    <h1>Намислих си едно българско село. Можеш ли да го познаеш?</h1>
    <div id="enter">
        <fieldset>
            <legend><h4>Буква на кирилица въведи и дали я има провери!</h4></legend>
            <form method="post">
                <input type="text" name="letter" placeholder="Въведете буква" autofocus required>
                <input type="submit" value="Провери" name="submit">
            </form>
            <p id="worning"><?= $worning; ?></p>
            <p id="enteredLetters">Въведени букви: <?= $_SESSION["enteredLetters"]; ?></p>
        </fieldset>

    </div>
    <div id="theDashes">
        <h4>Българско село с <?= $_SESSION["countLetters"] ?> букви:</h4>
        <p><?= $_SESSION["theDashes"]; ?></p>
        <p>Допуснати грешки : <span id="mistakes"><?= $_SESSION["mistakes"]; ?></span></p>
    </div>

    <div id="hangman">
        <img src="<?= $hangman[$_SESSION["mistakes"]];?>" alt="">
    </div>
    <a class="buton mainButon" href='?page=main'>Избери нова категория</a>
</div>
<?php
if ($end == "win"){
    include "./endWin.php";
}
if ($end == "loss"){
    include "./endLoss.php";
}
?>
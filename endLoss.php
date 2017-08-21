<div id="endLoss">
        <img class="endLoss" src='assets/images/hangman.png'>
        <div id="endLossHeaders">
            <h1 class="endLoss">Съжалявам!!!</h1><br>
            <h3 class="endLoss">Не успяхте да познаете <?= $bulgarian ?></h3><br>
            <h2 class="endLoss"><?=  $_SESSION["theWord"] ?></h2>
        </div>

            <a class="endLoss buton"  href=''>Нова игра в същата категория</a>
            <a class="endLoss buton" href='?page=main'>Избери нова категория</a>

</div>
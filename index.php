<?php
    require "./script.php";
    require "./header.php";
    if (isset($_GET["page"])){
        switch ($_GET["page"]){
            case "cities" : include "./cities.php";
                break;
            case "villages" : include "./villages.php";
                break;
            case "mountains" : include "./mountains.php";
                break;
            case "rivers" : include "./rivers.php";
                break;
            case "lakes" : include "./lakes.php";
                break;
            case "main" : include "./main.php";
        }
    }else {
        require "./main.php";
    }
    include "./footer.php";
?>

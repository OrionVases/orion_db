<?php

// initialize a session
session_start();

$defaultLang = 'en';


if (!empty($_GET["language"])) { 
    switch (strtolower($_GET["language"])) {
        case "en":
            
            $_SESSION['lang'] = 'en';
            break;
        case "gr":
    
            $_SESSION['lang'] = 'gr';
            break;
        default:
            
            $_SESSION['lang'] = $defaultLang;
            break;
    }
}


if (empty($_SESSION["lang"])) {

    $_SESSION["lang"] = $defaultLang;
}


?>
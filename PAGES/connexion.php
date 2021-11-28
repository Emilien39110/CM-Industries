<?php
    if (isset($_SESSION["user"])) {
        echo "<p>".$_SESSION["user"]."</p>";
        if ($_SESSION["admin"] == 1) {
            echo "ADMIN";
        }
        include_once("PAGES/logoutForm.php");
    }else{
        include_once("PAGES/loginForm.php");
        include_once("PAGES/registerForm.php");
    }


if (!isset($_SESSION["state"]))
    $_SESSION["state"]= "";
else {
    if (isset($_SESSION["user"]))
        $_SESSION["state"]="Se connecter";
    else if (!isset($_SESSION["user"]))
        $_SESSION["state"]="Se déconnecter";
}
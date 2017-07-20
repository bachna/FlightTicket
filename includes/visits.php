<?php

if (!isset($_COOKIE["visits"])) {

    setcookie("visits", 1, time () + 3600 * 24 * 365);   
    echo "Welcome on our site for the first time. </br></br>";

} else {
    setcookie("visits", $_COOKIE['visits'] + 1);
    echo "Hello, you visited us ". $_COOKIE['visits'] . " times. </br></br>";
}


    



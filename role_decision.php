<?php
    if (isset($_COOKIE["userid"])) {
        $username = $_COOKIE["userid"];
        echo "Username: " . $username;
    } else {
        echo "Cookie 'username' is not set!";
    }
?>
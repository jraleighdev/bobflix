<?php
    ob_start(); // turns on output buffering
    session_start();

    date_default_timezone_set("America/Chicago");

    try {
        $con = new PDO("mysql:dbname=bobflix;host=localhost", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    } 
    catch (PDOException $e) {
        exit("Connection Failed: " . $e->getMessage());
    }
?>
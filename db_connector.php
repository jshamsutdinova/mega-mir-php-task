<?php

function openConnDB() {
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "aFaquedath5!";
    $db = "records";

    $connDB = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

    if($connDB == false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    return $connDB;
}

function createTable($conn) {

    $sql = "CREATE TABLE records(
            `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `user_name` VARCHAR(30) NOT NULL,
            `message` VARCHAR(100) NOT NULL,
            `date` DATE NOT NULL
        )";

    mysqli_query($conn, $sql);

}

?>
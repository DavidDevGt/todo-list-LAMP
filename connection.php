<?php

function establishConnection() {
    $server_name = "localhost";
    $username = "admin";
    $password = "admin";
    $database_name = "todo_list";

    $connection = new mysqli($server_name, $username, $password, $database_name);

    if ($connection->connect_error) {
    die("Error al conectar. " . $connection->connect_error);
    }

    return $connection;
}

?>
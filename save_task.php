<?php
require './connection.php';

$response = array();

$connection = establishConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $connection->real_escape_string($_POST['title']);
    $description = $connection->real_escape_string($_POST['description']);

    $query = "INSERT INTO tasks (title, description) VALUES ('$title', '$description)";
    $result = $connection->query($query);

    if (!$result) {
        $response['status'] = 'error';
        $response['message'] = 'Error al añadir la tarea';
    } else {
        $response['status'] = 'success';
        $response['message'] = 'Tarea añadida';
    }
    echo json_encode($response);
}
?>
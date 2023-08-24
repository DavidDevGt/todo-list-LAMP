<?php
require './connection.php';

$response = array();

$connection = establishConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $connection->real_escape_string($_POST['id']);

    $query = "DELETE FROM tasks WHERE id = '$id'";
    $result = $connection->query($query);

    if (!$result) {
        $response['status'] = 'error';
        $response['message'] = 'Error al eliminar la tarea';
    } else {
        $response['status'] = 'success';
        $response['message'] = 'Tarea eliminada';
    }
    echo json_encode($response);
}
?>
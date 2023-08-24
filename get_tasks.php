<?php

require './connection.php';

$query = "SELECT * FROM tasks";
$result = $connection->query($query);

$tasks = array();

while ($row = $result->fetch_assoc()) {
    $tasks[] = $row;
}

echo json_encode($tasks);

?>
<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $sqlDelete = "DELETE FROM users WHERE id=$id";

    if ($conn->query($sqlDelete) === TRUE) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>

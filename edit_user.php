<<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>

<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $sqlSelect = "SELECT * FROM users WHERE id=$id";
    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <h2>Edit User</h2>
        <form action="edit_user.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="newUsername">New Username:</label>
            <input type="text" name="newUsername" value="<?php echo $row['username']; ?>" required>
            <label for="newEmail">New Email:</label>
            <input type="email" name="newEmail" value="<?php echo $row['email']; ?>" required>
            <label for="newPassword">New Password:</label>
            <input type="password" name="newPassword" required>
            <button type="submit">Update User</button>
        </form>
        <?php
    } else {
        echo "No user found with the specified ID.";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $newUsername = $_POST["newUsername"];
    $newEmail = $_POST["newEmail"];
    $newPassword = $_POST["newPassword"];

    $sqlUpdate = "UPDATE users SET username='$newUsername', email='$newEmail', password='$newPassword' WHERE id=$id";

    if ($conn->query($sqlUpdate) === TRUE) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

</body>
</html>

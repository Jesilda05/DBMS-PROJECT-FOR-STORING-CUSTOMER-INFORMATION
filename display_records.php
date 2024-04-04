<!-- display_records.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Records</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #007bff;
            margin-right: 10px;
        }
    </style>
</head>
<body>

<?php
include 'db_connection.php';

// READ Operation
$sqlRead = "SELECT id, username, email FROM users";
$result = $conn->query($sqlRead);

if ($result->num_rows > 0) {
    echo "<br>Records retrieved successfully:<br>";
    echo "<table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['username']}</td>
                <td>{$row['email']}</td>
                <td>
                    <a href='edit_user.php?id={$row['id']}'>Edit</a>
                    <a href='delete_user.php?id={$row['id']}'>Delete</a>
                </td>
              </tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<br>No records found.<br>";
}

// Close connection
$conn->close();
?>

</body>
</html>

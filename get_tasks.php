<?php
include 'connection.php';

$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["title"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td>" . $row["deadline"] . "</td>";
        echo "<td><a href='edit_task.php?id=" . $row["id"] . "' class='btn btn-warning btn-sm'>Edit</a> <a href='delete_task.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm'>Delete</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No tasks found</td></tr>";
}

$conn->close();
?>

<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "SELECT * FROM tasks WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $title = $row["title"];
        $description = $row["description"];
        $deadline = $row["deadline"];
    } else {
        echo "Task not found";
        exit();
    }
} else {
    echo "Invalid request";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<!-- Edit Task Form -->
<div class="container mt-5">
    <h2>Edit Task</h2>
    <form action="update_task.php" method="post">
        <div class="form-group">
            <label for="update-id">Task ID:</label>
            <input type="text" class="form-control" id="update-id" name="id" value="<?php echo $id; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="update-title">Title:</label>
            <input type="text" class="form-control" id="update-title" name="title" value="<?php echo $title; ?>" required>
        </div>
        <div class="form-group">
            <label for="update-description">Description:</label>
            <input type="text" class="form-control" id="update-description" name="description" value="<?php echo $description; ?>">
        </div>
        <div class="form-group">
            <label for="update-deadline">Deadline:</label>
            <input type="date" class="form-control" id="update-deadline" name="deadline" value="<?php echo $deadline; ?>" required>
        </div>
        <button type="submit" class="btn btn-warning">Update Task</button>
    </form>
</div>

<!-- Bootstrap JS and Popper.js scripts (required for Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

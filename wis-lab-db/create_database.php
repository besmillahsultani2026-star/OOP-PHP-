
<?php

$message = "";
$messageType = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $databaseName = trim($_POST["database_name"]);

    $conn = new mysqli("localhost", "root", "");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (!preg_match("/^[a-zA-Z0-9_]+$/", $databaseName)) {

        $message = "Invalid database name. Use only letters, numbers, and underscores.";
        $messageType = "danger";

    } else {

        $sql = "CREATE DATABASE `$databaseName`";

        if ($conn->query($sql) === TRUE) {

            $message = "Database '$databaseName' created successfully!";
            $messageType = "success";

        } else {

            $message = "Error creating database: " . $conn->error;
            $messageType = "danger";
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Database</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow p-4 mx-auto" style="max-width: 550px;">

        <h2 class="text-center mb-4">Create Database</h2>

        <?php if ($message != ""): ?>
            <div class="alert alert-<?php echo $messageType; ?>">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>

        <form method="POST">

            <div class="mb-3">

                <label class="form-label">Database Name</label>

                <input
                    type="text"
                    name="database_name"
                    class="form-control"
                    placeholder="Enter database name"
                    required
                >

            </div>

            <button type="submit" class="btn btn-primary w-100">
                Create Database
            </button>

        </form>

    </div>

</div>

</body>
</html>

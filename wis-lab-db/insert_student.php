
<?php

$message = "";
$messageType = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullName = trim($_POST["full_name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $department = trim($_POST["department"] ?? "");

    $conn = new mysqli("localhost", "root", "", "wis");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($fullName == "" || $email == "" || $department == "") {

        $message = "All fields are required.";
        $messageType = "danger";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $message = "Please enter a valid email address.";
        $messageType = "danger";

    } else {

        $sql = "INSERT INTO students (full_name, email, department)
                VALUES (?, ?, ?)";

        $stmt = $conn->prepare($sql);

        if ($stmt === FALSE) {

            $message = "Prepare failed: " . $conn->error;
            $messageType = "danger";

        } else {

            $stmt->bind_param("sss", $fullName, $email, $department);

            if ($stmt->execute()) {

                $message = "Student added successfully!";
                $messageType = "success";

            } else {

                $message = "Error inserting student: " . $stmt->error;
                $messageType = "danger";
            }

            $stmt->close();
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

    <title>Student Information System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow p-4 mx-auto" style="max-width: 650px;">

        <h2 class="text-center mb-2">Student Information System</h2>

        <p class="text-center text-muted mb-4">
            Register a new student
        </p>

        <?php if ($message != ""): ?>

            <div class="alert alert-<?php echo $messageType; ?>">
                <?php echo htmlspecialchars($message); ?>
            </div>

        <?php endif; ?>

        <form method="POST">

            <!-- Full Name -->
            <div class="mb-3">

                <label class="form-label">Full Name</label>

                <input
                    type="text"
                    name="full_name"
                    class="form-control"
                    placeholder="Enter full name"
                    maxlength="100"
                    required
                >

            </div>

            <!-- Email -->
            <div class="mb-3">

                <label class="form-label">Email Address</label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    placeholder="example@gmail.com"
                    maxlength="120"
                    required
                >

            </div>

            <!-- Department -->
            <div class="mb-3">

                <label class="form-label">Department</label>

                <input
                    type="text"
                    name="department"
                    class="form-control"
                    placeholder="Enter department"
                    maxlength="80"
                    required
                >

            </div>

            <!-- Buttons -->
            <div class="d-flex gap-2">

                <button type="submit" class="btn btn-primary flex-fill">
                    Save Student
                </button>

                <button type="reset" class="btn btn-secondary flex-fill">
                    Clear
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>

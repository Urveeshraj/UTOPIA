<?php
session_start();
include('includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate user
    $sql = "SELECT * FROM students WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Assuming password is stored in plaintext for simplicity. Use hashing in production.
        if ($row['password'] == $password) {
            $_SESSION['student_id'] = $row['id'];
            header('Location: index.php');
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "No user found with this email.";
    }
}
?>

<?php include('../includes/header.php'); ?>

<div class="container mt-4">
    <h1>Student Login</h1>
    <form action="login.php" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <?php if (isset($error)) { echo "<p class='text-danger'>$error</p>"; } ?>
    </form>
</div>

<?php include('../includes/footer.php'); ?>

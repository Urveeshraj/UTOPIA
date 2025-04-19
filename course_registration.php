<?php
session_start();
if (!isset($_SESSION['student_id'])) {
    header('Location: login.php');
    exit();
}
include('../includes/header.php');
?>

<div class="container mt-4">
    <h1>Course Registration</h1>
    <form action="course_registration.php" method="POST">
        <div class="mb-3">
            <label for="course" class="form-label">Course</label>
            <select class="form-control" id="course" name="course">
                <?php
                include('../includes/db.php');
                $sql = "SELECT * FROM courses";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['id']."'>".$row['name']."</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>

<?php include('../includes/footer.php'); ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = $_POST['course'];
    $student_id = $_SESSION['student_id'];

    $sql = "UPDATE students SET courses=CONCAT(courses, ',', '$course_id') WHERE id='$student_id'";
    if ($conn->query($sql) === TRUE) {
        echo "<p class='text-success'>Course registered successfully!</p>";
    } else {
        echo "<p class='text-danger'>Error: " . $conn->error . "</p>";
    }
}
?>

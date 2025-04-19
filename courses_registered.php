<?php
session_start();
if (!isset($_SESSION['student_id'])) {
    header('Location: login.php');
    exit();
}
include('../includes/header.php');
?>

<div class="container mt-4">
    <h1>Courses Registered</h1>
    <ul>
        <?php
        include('../includes/db.php');
        $student_id = $_SESSION['student_id'];
        $sql = "SELECT courses FROM students WHERE id='$student_id'";
        $result = $conn->query($sql);
        if ($row = $result->fetch_assoc()) {
            $courses = explode(',', $row['courses']);
            foreach ($courses as $course_id) {
                $course_sql = "SELECT name FROM courses WHERE id='$course_id'";
                $course_result = $conn->query($course_sql);
                if ($course_row = $course_result->fetch_assoc()) {
                    echo "<li>".$course_row['name']."</li>";
                }
            }
        }
        ?>
    </ul>
</div>

<?php include('../includes/footer.php'); ?>

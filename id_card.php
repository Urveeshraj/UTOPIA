<?php
session_start();
if (!isset($_SESSION['student_id'])) {
    header('Location: login.php');
    exit();
}
include('../includes/header.php');
?>

<div class="container mt-4">
    <h1>ID Card</h1>
    <div class="card" style="width: 18rem;">
        <?php
        include('../includes/db.php');
        $student_id = $_SESSION['student_id'];
        $sql = "SELECT * FROM students WHERE id='$student_id'";
        $result = $conn->query($sql);
        if ($row = $result->fetch_assoc()) {
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>".$row['name']."</h5>";
            echo "<p class='card-text'>ID: ".$row['id']."</p>";
            echo "<p class='card-text'>Email: ".$row['email']."</p>";
            echo "<p class='card-text'>Branch: ".$row['branch']."</p>";
            echo "</div>";
        }
        ?>
    </div>
</div>

<?php include('../includes/footer.php'); ?>

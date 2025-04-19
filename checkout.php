<?php
session_start();
if (!isset($_SESSION['student_id'])) {
    header('Location: login.php');
    exit();
}
include('includes/header.php');
?>

<div class="container mt-4">
    <h1>Checkout</h1>
    <p>Your payment is being processed...</p>
</div>

<?php include('../includes/footer.php'); ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount'];
    $student_id = $_SESSION['student_id'];

    // Simulate payment processing and update fees status
    $sql = "UPDATE students SET fees=1 WHERE id='$student_id'";
    if ($conn->query($sql) === TRUE) {
        echo "<p class='text-success'>Payment successful!</p>";
    } else {
        echo "<p class='text-danger'>Error: " . $conn->error . "</p>";
    }
}
?>

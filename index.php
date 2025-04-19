<?php
session_start();
if (!isset($_SESSION['student_id'])) {
    header('Location: login.php');
    exit();
}
include('../includes/header.php');
?>

<div class="container mt-4">
    <h1>Welcome, Student</h1>
    <p>This is the student portal where you can register for courses, check registered courses, pay fees, and more.</p>
    <ul>
        <li><a href="course_registration.php">Course Registration</a></li>
        <li><a href="courses_registered.php">Courses Registered</a></li>
        <li><a href="fee_payment.php">Fee Payment</a></li>
        <li><a href="checkout.php">Checkout</a></li>
        <li><a href="id_card.php">ID Card</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>

<?php include('../includes/footer.php'); ?>

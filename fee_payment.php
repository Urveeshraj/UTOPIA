<?php
session_start();
if (!isset($_SESSION['student_id'])) {
    header('Location: login.php');
    exit();
}
include('../includes/header.php');
?>

<div class="container mt-4">
    <h1>Fee Payment</h1>
    <form action="checkout.php" method="POST">
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="text" class="form-control" id="amount" name="amount" required>
        </div>
        <button type="submit" class="btn btn-primary">Proceed to Checkout</button>
    </form>
</div>

<?php include('../includes/footer.php'); ?>

<?php
session_start();
include 'db.php';

$user_id = $_SESSION['user_id'];
$plan_id = $_GET['id'];

$start = date("Y-m-d"); // today
$end = date("Y-m-d", strtotime("+30 days")); // +30 days

// Check if already subscribed
$check = $conn->query("SELECT * FROM subscriptions WHERE user_id=$user_id");

if($check->num_rows > 0){
    // Update existing
    $conn->query("UPDATE subscriptions 
    SET plan_id=$plan_id, start_date='$start', end_date='$end'
    WHERE user_id=$user_id");

    echo "Plan Updated Successfully ✅<br>";
} else {
    // Insert new
    $conn->query("INSERT INTO subscriptions (user_id, plan_id, start_date, end_date)
    VALUES ($user_id, $plan_id, '$start', '$end')");

    echo "Subscribed Successfully ✅<br>";
}

echo "<a href='dashboard.php'>Go to Dashboard</a>";
?>
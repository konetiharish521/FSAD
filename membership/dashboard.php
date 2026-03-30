<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
}

$user_id = $_SESSION['user_id'];

// Get user name
$resultUser = $conn->query("SELECT name FROM users WHERE id=$user_id");
$user = $resultUser->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Welcome <?php echo $user['name']; ?></h2>

<?php
$query = "SELECT plans.name, start_date, end_date 
FROM subscriptions 
JOIN plans ON subscriptions.plan_id = plans.id
WHERE user_id = $user_id";

$result = $conn->query($query);
$data = $result->fetch_assoc();

if($data){
    echo "Plan: " . $data['name'] . "<br>";
    echo "Start Date: " . $data['start_date'] . "<br>";
    echo "End Date: " . $data['end_date'];
} else {
    echo "No Plan Selected";
}
?>

<br><br>
<a href="plans.php">Choose Plan</a><br>
<a href="logout.php">Logout</a>

</body>
</html>
<link rel="stylesheet" href="style.css">
<?php
session_start();
include 'db.php';

$result = $conn->query("SELECT * FROM plans");

while($row = $result->fetch_assoc()){
    echo "<div class='card'>";
    echo "<h3>".$row['name']."</h3>";
    echo "<p>Price: ₹".$row['price']."</p>";
    echo "<a href='subscribe.php?id=".$row['id']."'>Choose Plan</a>";
    echo "</div>";
}
?>
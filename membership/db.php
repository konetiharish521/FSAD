<?php
$conn = new mysqli("localhost", "root", "", "membership_db");

if ($conn->connect_error) {
    die("Connection failed");
}
?>
<?php
$servername = "localhost8888";
$username = "root";
$password = "root";
$dbname = "narikiri";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<form action="send_message.php" method="post">
  <label for="character_name">Character Name:</label>
  <input type="text" id="character_name" name="character_name" required>
  <label for="message">Message:</label>
  <textarea id="message" name="message" required></textarea>
  <button type="submit">Send</button>
</form>

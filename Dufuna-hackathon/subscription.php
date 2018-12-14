<?php
$name = $_POST['name'];
$email = htmlspecialchars($_POST['email']);
saveToDatabase($name, $email);
header('Location:subscription.html');


function saveToDatabase($name, $email){
$serverName = "localhost";
$database = "hackathon";
$username = "root";
$pass_word = "";
//Open database connection
$conn = mysqli_connect($serverName, $username, $pass_word, $database);
// Check that connection exists
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO subscription (name, email, created_at)
VALUES ('$name', '$email', NOW())";
$result = mysqli_query($conn, $sql);
//Check for errors
if (!$result) {
die("Error: " . $sql . "<br>" . mysqli_error($conn));
}
//Close the connection
mysqli_close($conn);
}


?>
<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "scentique";
$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $conn->real_escape_string($_POST["username"]);
  $email = $conn->real_escape_string($_POST["email"]);
  $passwordHash = password_hash($_POST["password"], PASSWORD_DEFAULT);
  $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$passwordHash')";
  if ($conn->query($sql) === TRUE) {
    header("Location: login.php");
    exit();
  } else {
    $error = "Error: " . $conn->error;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register - Scentique</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <button onclick="toggleTheme()">🌗 Toggle Dark Mode</button>

  <h2>Register</h2>
  <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
  <form method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" required><br>
    <label for="email">Email:</label>
    <input type="email" name="email" required><br>
    <label for="password">Password:</label>
    <input type="password" name="password" required><br>
    <button type="submit">Register</button>
  </form>

  <p>Already have an account? <a href="login.php">Login here</a>.</p>

  <script>
    function toggleTheme() {
      document.body.classList.toggle("dark-mode");
    }
  </script>
</body>
</html>

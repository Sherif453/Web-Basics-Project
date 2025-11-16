<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$database = "scentique";
$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $conn->real_escape_string($_POST["username"]);
  $passwordInput = $_POST["password"];
  $sql = "SELECT * FROM users WHERE username='$username'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($passwordInput, $user["password"])) {
      $_SESSION["username"] = $user["username"];
      header("Location: index.html");
      exit();
    } else {
      $error = "Invalid password.";
    }
  } else {
    $error = "User not found.";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Scentique</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <button onclick="toggleTheme()">🌗 Toggle Dark Mode</button>

  <h2>Login</h2>
  <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
  <form method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" required><br>
    <label for="password">Password:</label>
    <input type="password" name="password" required><br>
    <button type="submit">Login</button>
  </form>

  <p>Don't have an account? <a href="register.php">Register here</a>.</p>

  <script>
    function toggleTheme() {
      document.body.classList.toggle("dark-mode");
    }
  </script>
</body>
</html>

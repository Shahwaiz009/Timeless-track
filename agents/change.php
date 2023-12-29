<?php
// Database connection parameters
$hostname = "localhost";
$username = "root";
$password = "";
$database = "timeless";

// Establish a database connection
$connection = mysqli_connect($hostname, $username, $password, $database);

// Check if the connection is successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start(); // Start session for storing user information

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $email = $_POST["email"];
    $password = $_POST["password"];
    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmPassword"];

    // Validate the input (you can add more validation as needed)
    if (empty($email) || empty($password) || empty($newPassword) || empty($confirmPassword)) {
        echo "All fields are required.";
    } else {
        // Sanitize the input
        $email = htmlspecialchars($email);
        $password = htmlspecialchars($password);
        $newPassword = htmlspecialchars($newPassword);
        $confirmPassword = htmlspecialchars($confirmPassword);

        // Check if the provided email exists in the database
        $emailCheckQuery = "SELECT id, password FROM agents WHERE email = '$email'";
        $emailCheckResult = mysqli_query($connection, $emailCheckQuery);

        if ($emailCheckResult) {
            $emailCheckRow = mysqli_fetch_assoc($emailCheckResult);

            if ($emailCheckRow) {
                $user_id = $emailCheckRow["id"];
                $hashedPassword = $emailCheckRow["password"];

                // Verify if the current password matches the stored hashed password
                if (password_verify($password, $hashedPassword)) {
                    // Current password is correct, proceed to update the password
                    if ($newPassword == $confirmPassword) {
                        // Hash the new password before storing it
                        $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                        // Update the password in the database
                        $updateQuery = "UPDATE agents SET password = '$hashedNewPassword' WHERE id = $user_id";
                        $updateResult = mysqli_query($connection, $updateQuery);

                        if ($updateResult) {
                            echo "Password updated successfully.";
                        } else {
                            echo "Error updating password: " . mysqli_error($connection);
                        }
                    } else {
                        echo "New password and confirm password do not match.";
                    }
                } else {
                    echo "Current password is incorrect.";
                }
            } else {
                echo "Email not found in the database.";
            }
        } else {
            echo "Error checking email availability: " . mysqli_error($connection);
        }
    }
}

// Close the database connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change password</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #222;
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .forgot-password {
  color: #4caf50;
  text-decoration: none;
  margin-top: 10px;
  display: inline-block;
}

.forgot-password:hover {
  text-decoration: underline;
}

#video-background {
      position: fixed;
      top: 50%;
      left: 50%;
      min-width: 100%;
      min-height: 100%;
      width: auto;
      height: auto;
      z-index: -100;
      transform: translateX(-50%) translateY(-50%);
      object-fit:cover; /* Make the video cover the entire container */
    }


    .signup-card {
      background: rgba(255, 255, 255, 0.3);
    padding: 20px;
    border-radius: 10px;
    width: 400px; /* Increased width to 400px */
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    text-align: center;
    backdrop-filter: blur(10px);
  }

    .signup-card h2 {
      color: #333;
    }

    .signup-card form {
      display: flex;
      flex-direction: column;
    }

    .signup-card input,
    .signup-card select {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .signup-card button {
      width: 100%;
      padding: 12px;
      background-color: #4caf50;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .signup-card button:hover {
      background-color: #45a049;
    }

    .login-link {
    color: #333;
    text-decoration: none;
    font-weight: bold;
  }

  .login-link:hover {
    text-decoration: underline;
  }
  </style>
</head>
<body>
  <video autoplay muted loop id="video-background">
    <source src="Timeless Track.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>

  <div class="signup-card">
    <h2>user change password</h2>
    <form action="" method="POST">
    <input type="email" placeholder="email" name="email" required>
    <input type="password" placeholder="Current Password" name="password" required>
    <input type="password" placeholder="New Password" name="newPassword" required>
    <input type="password" placeholder="Confirm Password" name="confirmPassword" required>
    <button type="submit" name="changePassword">Change Password</button>
      <p>Already have an account? <a href="login.php" class="login-link">Login</a></p>
    </form>
  </div>
</body>
</html>













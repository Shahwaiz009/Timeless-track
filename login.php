
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login page</title>
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
      max-width: 1480px;
  max-height: 900px;
      width: auto;
      height: auto;
      z-index: -100;
      transform: translateX(-50%) translateY(-50%);
       /* Make the video cover the entire container */
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
    <h2>User login</h2>
    <form  action="#" method="POST" name="login">
      <input type="email" placeholder="Email" required name="email" >
      <input type="password" placeholder="Password" required name="password">
      <i class="bi bi-eye-slash" id="togglePassword"></i>
      <button type="submit" name="login">Sign in</button>
      <a href="change.php" class="forgot-password">Forgot Password?</a>
      <p>New user here? <a href="signup.php" class="login-link">signup</a></p>
    </form>
  </div>
</body>
</html>



<script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function(){
        if(password.type === "password"){
            password.type = 'text';
        }else{
            password.type = 'password';
        }
        this.classList.toggle('bi-eye');
    });
</script>



<?php
include('connect/connection.php');
session_start();

if (isset($_POST["login"])) {
    $email = mysqli_real_escape_string($connect, trim($_POST['email']));
    $password = trim($_POST['password']);

    $stmt = mysqli_prepare($connect, "SELECT * FROM users WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $hashpassword = $row["password"];

        if ($row["status"] == 0) {
            echo '<script>alert("Please verify your email account before login.");</script>';
        } else if (password_verify($password, $hashpassword)) {
            $_SESSION['u_id'] = $row['u_id']; // Set user_id in session
            echo '<script>alert("Login successful"); window.location.href = "includes/new.php";</script>';
            exit();
        } else {
            echo '<script>alert("Email or password is incorrect. Please try again.");</script>';
        }
    } else {
        echo '<script>alert("Email or password is incorrect. Please try again.");</script>';
    }
}
?>

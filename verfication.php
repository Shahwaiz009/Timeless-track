<?php session_start()?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Two-Step Verification</title>
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
      object-fit: cover; /* Make the video cover the entire container */
    }

    .verification-card {
      background: rgba(255, 255, 255, 0.3); /* Adjust the alpha (4th parameter) for transparency */
      padding: 20px;
      border-radius: 10px;
      width: 400px; /* Increased width to 400px */
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
      text-align: center;
      backdrop-filter: blur(10px); /* Adjust the blur value as needed */
    }

    .verification-card h2 {
      color: #333;
    }

    .verification-card form {
      display: flex;
      flex-direction: column;
    }

    .verification-card input {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .verification-card button {
      width: 100%;
      padding: 12px;
      background-color: #4caf50;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .verification-card button:hover {
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

  <div class="verification-card">
    <h2>Verification Code</h2>
    <form action="#" method="POST">
    <input type="text" id="otp" class="form-control" name="otp_code" required autofocus>
      <button type="submit" name="verify">Verify</button>
    </form>
  </div>
</body>
</html>






<?php 
    include('connect/connection.php');
    if(isset($_POST["verify"])){
        $otp = $_SESSION['otp'];
        $email = $_SESSION['mail'];
        $otp_code = $_POST['otp_code'];

        if($otp != $otp_code){
            ?>
           <script>
               alert("Invalid OTP code");
           </script>
           <?php
        }else{
            mysqli_query($connect, "UPDATE users SET status = 1 WHERE email = '$email'");
            ?>
             <script>
                 alert("Verfiy account done, you may sign in now");
                   window.location.replace("login.php");
             </script>
             <?php
        }

    }

?>
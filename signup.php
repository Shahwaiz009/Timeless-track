<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup Page</title>
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
    <h2>User Signup</h2>
    <form <form action="#" method="POST" name="register" enctype="multipart/form-data">
      <input type="text" placeholder="Name" required name="name">
      <input type="email" placeholder="Email" required name="email">
      <input type="file" placeholder="image" required name="image">
      <input type="tel" placeholder="Phone Number" required name="phone_number">
      <select name="country">
        <option value="" disabled selected>Select Country</option>
        <option value="afghanistan">Afghanistan</option>
        <option value="albania">Albania</option>
        <option value="algeria">Algeria</option>
        <option value="argentina">Argentina</option>
        <option value="australia">Australia</option>
        <option value="austria">Austria</option>
        <option value="brazil">Brazil</option>
        <option value="canada">Canada</option>
        <option value="china">China</option>
        <option value="colombia">Colombia</option>
        <option value="denmark">Denmark</option>
        <option value="egypt">Egypt</option>
        <option value="finland">Finland</option>
        <option value="france">France</option>
        <option value="germany">Germany</option>
        <option value="greece">Greece</option>
        <option value="india">India</option>
        <option value="indonesia">Indonesia</option>
        <option value="ireland">Ireland</option>
        <option value="italy">Italy</option>
        <option value="japan">Japan</option>
        <option value="mexico">Mexico</option>
        <option value="netherlands">Netherlands</option>
        <option value="newzealand">New Zealand</option>
        <option value="nigeria">Nigeria</option>
        <option value="norway">Norway</option>
        <option value="pakistan">Pakistan</option>
        <option value="poland">Poland</option>
        <option value="portugal">Portugal</option>
        <option value="russia">Russia</option>
        <option value="safrica">South Africa</option>
        <option value="saudi">Saudi Arabia</option>
        <option value="spain">Spain</option>
        <option value="sweden">Sweden</option>
        <option value="switzerland">Switzerland</option>
        <option value="turkey">Turkey</option>
        <option value="uk">United Kingdom</option>
        <option value="usa">United States</option>
        <option value="vietnam">Vietnam</option>
        <!-- Add more countries as needed -->
      </select>
      <input type="password" placeholder="Password" required name="password">
      <button type="submit" name="register">Sign Up</button>
      <p>Already have an account? <a href="login.php" class="login-link">Login</a></p>
    </form>
  </div>
</body>
</html>






<?php
include('connect/connection.php');

if (isset($_POST["register"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $country = $_POST["country"];
    $password = $_POST["password"];
    
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/' . $image;
    
    $check_query = mysqli_query($connect, "SELECT * FROM users WHERE email ='$email'");
    $rowCount = mysqli_num_rows($check_query);

    if (!empty($email) && !empty($password) && !empty($phone_number)) {
        if ($rowCount > 0) {
            ?>
            <script>
                alert("User with email already exists!");
            </script>
            <?php
        } else {
            // Move uploaded file
            move_uploaded_file($image_tmp_name, $image_folder);

            $password_hash = password_hash($password, PASSWORD_BCRYPT);

            $result = mysqli_query($connect, "INSERT INTO users (name,email,image,phone_number,country, password, status) VALUES ('$name','$email','$image','$phone_number','$country', '$password_hash', 0)");

            if ($result) {
              move_uploaded_file($image_tmp_name, $image_folder);
                $otp = rand(100000, 999999);
                $_SESSION['otp'] = $otp;
                $_SESSION['mail'] = $email;

                require "phpmailer/PHPMailerAutoload.php"; // Corrected the path

                $mail = new PHPMailer;

                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'tls';

                $mail->Username = 'alishahwaiz889@gmail.com';
                $mail->Password = 'cxfyxyegakbrpyqu';

                $mail->setFrom('email account', 'OTP Verification');
                $mail->addAddress($_POST["email"]);

                $mail->isHTML(true);
                $mail->Subject = "Your verify code";
                $mail->Body = "<p>Dear user, </p> <h3>Your verify OTP code is $otp <br></h3>
                <br><br>
                <p>With regards,</p>
                <b>Programming with Lam</b>
                https://www.youtube.com/channel/UCKRZp3mkvL1CBYKFIlxjDdg";

                if (!$mail->send()) {
                    ?>
                    <script>
                        alert("<?php echo "Register Failed, Invalid Email " ?>");
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        alert("<?php echo "Register Successfully, OTP sent to " . $email ?>");
                        window.location.replace('verfication.php');
                    </script>
                    <?php
                }
            }
        }
    }
}
?>

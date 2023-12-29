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
    <form action="#" method="POST" name="register">
      <input type="text" placeholder="Name" required name="name">
      <input type="email" placeholder="Email" required name="email">
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
$host = "localhost";
$username = "root";
$password = "";
$database = "timeless";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $name = sanitizeInput($_POST["name"]);
    $email = sanitizeInput($_POST["email"]);
    $phone_number = sanitizeInput($_POST["phone_number"]);
    $country = sanitizeInput($_POST["country"]);
    $password = sanitizeInput($_POST["password"]);
    $hashedPassword = hashPassword($password);

    // Check if the email is unique before inserting into the database
    $checkEmailQuery = "SELECT id FROM agents WHERE email = '$email'";
    $result = $conn->query($checkEmailQuery);

    if ($result->num_rows > 0) {
        echo '<script>alert("Email address already exists. Please use a different email.");</script>';
    } else {
        $insertQuery = "INSERT INTO agents (name, email, phone_number, country, password, status) 
                        VALUES ('$name', '$email', '$phone_number', '$country', '$hashedPassword', 'pending')";

        if ($conn->query($insertQuery) === TRUE) {
            // Show an alert before redirecting
            echo '<script>alert("Registration successful. Waiting for admin approval.");</script>';
            
            // Redirect to a new page after the alert
            echo '<script>window.location.href = "login.php";</script>';
            exit(); // Make sure to exit after the script to prevent further execution
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

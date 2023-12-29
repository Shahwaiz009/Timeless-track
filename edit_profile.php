<?php
  include 'connect/connection.php';
  $selected_cat_id = isset($_GET['cat']) ? $_GET['cat'] : null;
 
  session_start();
  if (!isset($_SESSION['u_id'])) {
    header("Location: login.php");
    exit();
}
$u_id = $_SESSION['u_id'];



  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-ezvKFO3I5ml8JZNsP+eeSoPT8i5+5qLDbhaFG85LZBZlE+Ii/z5z2DmPu0b5rLRE" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-ezvKFO3I5ml8JZNsP+eeSoPT8i5+5qLDbhaFG85LZBZlE+Ii/z5z2DmPu0b5rLRE" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="includes/style2.css">
    <title>Document</title>
</head>
<body>
    <div id="main">
          <div id="sidebar">
               <div id="part1">
                <img src="apple-touch-icon.png" style="width: 40px; height: 40px; margin-top: 20px; margin-left: 8px;">
                <a href="index.php" style="text-decoration: none;"><h1 style="margin-top: -55px;">Timeless</h1></a>
            
            </div>
               
               <div id="part2">
                <h2 id="part2_h2">Countries</h2>
                   <li id="part2_li">
                   <ul><a  href='includes/new1.php'>Band required</a></ul><hr>
                   <ul><a href='cources.php?id=<?php echo urlencode($id); ?>'>Cources</a></ul><hr>
                   <ul><a  href='includes/new2.php'>Upload documents</a></ul><hr>
                    <ul><a  href='#'>Marks required</a></ul><hr>
                    <ul><a  href='#'>Scholarships</a></ul><hr>
                    <ul><a  href='includes/new3.php'>Notifications</a></ul><hr>
                    <ul><a  href='includes/new8.php'>Visa</a></ul><hr>
                    <ul><a  href='includes/new4.php'>Budget</a></ul><hr>
                    <ul><a  href='includes/new5.php'>Documnets needed</a></ul><hr>
                    <ul><a  href='includes/new6.php'>success story</a></ul><hr>
                    <ul><a  href='includes/new7.php'>services</a></ul><hr>
                   </li>
               </div>
                         

          </div>
          <div id="content">
              <div id="nav">
                <button id="toggleSidebar" onclick="toggleSidebar()">&#9776;</button>

                <form id="search-form" method="GET">
                    <input type="text" id="search" placeholder="Search" name="uni_title">
                    <input type="submit" value="Search" name="search">
                </form>

                <?php
include 'connect/connection.php';

// Assuming you have started the session and set the user_id variable
if (isset($_SESSION['u_id'])) {
    $id = $_SESSION['u_id'];

    $select = mysqli_query($connect, "SELECT * FROM `users` WHERE u_id = '$u_id'") or die('query failed');
    if (mysqli_num_rows($select) > 0) {
        $fetch = mysqli_fetch_assoc($select);

        echo '<div id="profile-container">
                <div id="profile-circle" onclick="toggleProfileMenu()">
                    <img src="uploaded_img/';

        if (isset($fetch['image']) && $fetch['image'] != '') {
            echo $fetch['image'];
        } else {
            echo 'images/default-avatar.png'; // Default image if no image is found
        }

        echo '" alt="Profile Image">
                        <div id="profile-menu">
                            <ul>
                            <li><a href="includes/new9.php">Edit Profile</a></li>
                            <li><a href="includes/new10.php">Track Documents</a></li>
                             <li><a href="#">Agents</a></li>
                             <li><a href="agents\register.php">Apply as agents</a></li>
                            <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>';
    }
}
?>

                


                <ul id="auth-links">
                    <li><a href="login.php" id="login-link"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                    <li><a href="signup.php" id="signup-link"><i class="fas fa-user-plus"></i> Sign Up</a></li>
                </ul>
                
                
              </div>
              <div id="content2">
              <div id="start">
              <div class="update-profile">

              <?php
$select = mysqli_query($connect, "SELECT * FROM `users` WHERE u_id = '$u_id'") or die('query failed');
if (mysqli_num_rows($select) > 0) {
    $fetch = mysqli_fetch_assoc($select);
}

?>

<form action="" method="post" enctype="multipart/form-data">
    <?php
    if (isset($fetch['image']) && $fetch['image'] == '') {
        echo '<img src="images/default-avatar.png" style="border-radius:50% 50%;">';
    } elseif (isset($fetch['image'])) {
        echo '<img style="border-radius:50% 50%; margin-left:300px; margin-top:-70px;" src="uploaded_img/' . $fetch['image'] . '">';
    }

    if (isset($message)) {
        foreach ($message as $msg) {
            echo '<div class="message">' . $msg . '</div>';
        }
    }
    ?>
    <div class="flex" style="margin-left:100px;">
        <div class="inputBox">
            <span>username :</span>
            <span  class="box"><?php echo isset($fetch['name']) ? $fetch['name'] : 'No email available'; ?></span>
            <span>your email :</span>
            <span  class="box"><?php echo isset($fetch['email']) ? $fetch['email'] : 'No email available'; ?></span>
            <span>your Country :</span>
            <span  class="box"><?php echo isset($fetch['country']) ? $fetch['country'] : 'No email available'; ?></span>
            <span>your Mobile :</span>
            <input type="text" name="update_phone_number" value="<?php echo isset($fetch['phon_number']) ? $fetch['phon_number'] : ''; ?>" class="box">
            <span>update your pic :</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
        </div>
    </div>
    <input type="submit" value="update profile" name="changePassword" class="btn">
    <a href="view.php" class="delete-btn">go back</a>
</form>
<form action="" method="POST" enctype="multipart/form-data">
<div class="flex" style="margin-left:100px;">
<div class="inputBox">
            <span>Email :</span>
            <input type="email" name="email" placeholder="enter email here" class="box">
            <span>old password :</span>
            <input type="password" name="password" placeholder="enter previous password" class="box">
            <span>new password :</span>
            <input type="password" name="newPassword" placeholder="enter new password" class="box">
            <span>confirm password :</span>
            <input type="password" name="confirmPassword" placeholder="confirm new password" class="box">
        </div>
    </div>
    <input type="submit" value="update profile" name="changePassword" class="btn">
    <a href="view.php" class="delete-btn">go back</a>
</div>
</form>
</div>



            </div>
        </div>
                </div>
          
    </div>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>company</h4>
                    <ul>
                        <li><a href="#">about us</a></li>
                        <li><a href="#">our services</a></li>
                        <li><a href="#">privacy policy</a></li>
                        <li><a href="#">Our team</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>C.E.O</h4>
                    <ul>
                        <li><a href="#">Ali shahwaiz</a></li>
                        <li><a href="#">alishahwaiz889@gmail.com</a></li>
                        <li><a href="#">Burewala</a></li>
                        <li><a href="#">14-Aug-2023</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Submit Queries</h4>
                    <ul>
                        <form>
                         Name:<input type="text" placeholder="Enter name">
                         <br><br>
                         Email:<input type="email" placeholder="Enter Email">
                         <br><br>
                         Desc:<textarea rows="4" cols="20";></textarea>
                         <br><br>
                         Submit:<input type="submit" placeholder="">
                     </form>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>follow us</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
   </footer>
 
   <script src="includes\ali.js"></script>
   <script>
var inactivityTimeout; // Variable to store the timeout ID

// Function to reset the inactivity timeout
function resetInactivityTimeout() {
    clearTimeout(inactivityTimeout); // Clear the existing timeout
    inactivityTimeout = setTimeout(logoutUser, 60000); // Set a new timeout (1 minute)

    // Update the last activity timestamp in sessionStorage
    sessionStorage.setItem('lastActivity', Date.now());
}

// Function to handle user logout
function logoutUser() {
    window.location.href = 'logout.php'; // Redirect to the logout page
}

// Function to check for inactivity and logout if needed
function checkForInactivity() {
    var lastActivity = sessionStorage.getItem('lastActivity');

    if (lastActivity) {
        var currentTime = Date.now();
        var elapsedTime = currentTime - lastActivity;

        // If more than 1 minute has passed since the last activity, log out the user
        if (elapsedTime > 60000) {
            logoutUser();
        }
    }

    // Reset the inactivity timeout
    resetInactivityTimeout();
}

// Add event listeners for mousemove and keydown events to reset the timeout on user activity
document.addEventListener('mousemove', checkForInactivity);
document.addEventListener('keydown', checkForInactivity);

// Initialize the inactivity timeout and last activity timestamp when the page loads
resetInactivityTimeout();
</script>

</body>
</html> 




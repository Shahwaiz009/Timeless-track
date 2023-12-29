<?php
include 'connect/connection.php';
session_start(); // Start the session (make sure it's started before using session variables)



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the user is logged in
    if (!isset($_SESSION['u_id'])) {
        die("User not logged in"); // You may want to redirect to a login page
    }

    // Get the user ID from the session
    $u_id = $_SESSION['u_id'];


    // Function to handle file uploads
    function uploadFile($file, $uploadDir) {
        if (!isset($file['name'])) {
            return null; // File not uploaded
        }

        $fileName = basename($file["name"]);
        $targetFilePath = $uploadDir . $fileName;

        if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
            return $fileName;
        } else {
            return null;
        }
    }

    // Set your upload directory
    $uploadDir = "uploaded_img/";

    // Process each form field and insert into the database
    $matricPath = uploadFile($_FILES['matric'], $uploadDir);
    $interPath = uploadFile($_FILES['inter'], $uploadDir);
    $bachelorPath = uploadFile($_FILES['bacholar1'] ?? [], $uploadDir);
    $mastersPath = uploadFile($_FILES['masters1'] ?? [], $uploadDir);

    $applyFor = $_POST['apply_for'];
    $language1 = $_POST['language1'];
    $languageOption = $_POST['language_option'];
    $proficencyPath = uploadFile($_FILES['proficency'], $uploadDir);
    $recommadation1Path = uploadFile($_FILES['recommadation1'], $uploadDir);
    $recommadation2Path = uploadFile($_FILES['recommadation2'], $uploadDir);
    $recommadation3Path = uploadFile($_FILES['recommadation3'], $uploadDir);
    $studyGap = $_POST['study_gap'];
    $work = $_POST['work'];
    $work1Path = uploadFile($_FILES['work1'], $uploadDir);
    $work2Path = uploadFile($_FILES['work2'], $uploadDir);
    $work3Path = uploadFile($_FILES['work3'], $uploadDir);
    $cvPath = uploadFile($_FILES['cv'], $uploadDir);
    $languageDocPath = uploadFile($_FILES['langage_doc'], $uploadDir);

    $status = "pending";

    // SQL query to insert data into the database along with the user ID
    $sql = "INSERT INTO uploads (id, matric, inter, bacholar1, masters1, apply_for, language1, language_option, proficency, recommadation1, recommadation2, recommadation3, study_gap, work, work1, work2, work3, cv, langage_doc, status)
            VALUES ('$id', '$matricPath', '$interPath', '$bachelorPath', '$mastersPath', '$applyFor', '$language1', '$languageOption', '$proficencyPath', '$recommadation1Path', '$recommadation2Path', '$recommadation3Path', '$studyGap', '$work', '$work1Path', '$work2Path', '$work3Path', '$cvPath', '$languageDocPath', '$status')";

    if ($connect->query($sql) === TRUE) {
        echo "<script>alert('Data inserted successfully');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }

    // Close the database connection
    $connect->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-ezvKFO3I5ml8JZNsP+eeSoPT8i5+5qLDbhaFG85LZBZlE+Ii/z5z2DmPu0b5rLRE" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-ezvKFO3I5ml8JZNsP+eeSoPT8i5+5qLDbhaFG85LZBZlE+Ii/z5z2DmPu0b5rLRE" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="includes/style1.css">
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
    $u_id = $_SESSION['u_id'];

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
              
              <?php
include 'connect/connection.php';

// Fetch all images from the 'success' table
$query = "SELECT * FROM success";
$result = $connect->query($query);

if ($result) {
    // Check if there are rows in the result set
    if ($result->num_rows > 0) {
        echo '<h2>Success of Timeless track</h2>';
        echo '<div style="display: flex; flex-wrap: wrap;">';

        // Loop through each row and display the images
        while ($row = $result->fetch_assoc()) {
            $successId = $row['success_id'];
            
            // Check if the 'img' and 'name' keys exist in the row
            if (array_key_exists('img', $row) && array_key_exists('name', $row)) {
                // Display image with a link or any other HTML structure
                echo '<div style="margin: 10px;">
                        <img src="' . $row['img'] . '" alt="Success Image ' . $successId . '" width="243" height="230">
                        <h2>' . $row['name'] . ' </h2>
                      </div>';
            } else {
                echo 'Image path or name not found for Success ID: ' . $successId;
            }
        }

        echo '</div>';
    } else {
        echo 'No images found in the database.';
    }
} else {
    echo 'Error fetching data from the database.';
}

// Close the database connection
$connect->close();
?>


                    
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




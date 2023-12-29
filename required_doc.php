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
                   <h1>All countries University Supporting Basic Documents</h1><br>
                   <p style="font-size: 18px; margin-left: 30px; margin-right: 30px; font-family: Sans-serif; color: black;">Whether applying to study in the UK alone or visiting Timeless track for your free consultation, use the checklist below to ensure you have all the right supporting documents to help make the most of your appointment and application.</p><br>
                   <h1>Required Documents</h1>
                       <h2 style="margin-left:20px;">Undergraduate:</h2>
                       <ul style="list-style: dotted; margin-left:60px; ">
                        <li>
                            <p style="color:black;">Copy of passport/visa (if available)</p><br>
                        </li>
                        <li>
                            <p style="color:black;">Academic transcript</p><br>
                        </li>
                        <li>
                            <p style="color:black;">Certificate of graduation</p><br>
                        </li>
                        <li>
                            <p style="color:black;">Certificate of English proficiency - IELTS/TOEFL/PTE Test/Other</p><br>
                       </li>
                       <li>
                            <p style="color:black;">Personal statement</p><br>
                       </li>
                       <li>
                            <p style="color:black;">Reference letters</p><br>
                       </li>
                       <li>
                            <p style="color:black;">CV (if applicable)</p><br>
                       </li>
                       </ul><br>
                       <h2 style="margin-left:20px;">Postgraduate:</h2>
                       <ul style="list-style: dotted; margin-left:60px; ">
                       <li>
                            <p style="color:black;">Certificate of graduation/bachelor’s degree</p><br>
                        </li>
                       </ul><br>
                       <h2 style="margin-left:20px;">PhD/Research:</h2>
                       <ul style="list-style: dotted; margin-left:60px; ">
                       <li>
                       <p style="color:black;">Certificate of graduation/master’s degree</p><br>
                            <p style="color:black;">Research proposal</p><br>
                        </li>
                       </ul><br>
                       <h1>Previous Education History</h1>
                       <ul style="list-style: dotted; margin-left:60px; ">
                        <li>
                            <p style="color:black;">Previous CAS letter</p><br>
                       </li>
                       <li>
                            <p style="color:black;">Confirmation of enrolment</p><br>
                       </li>
                       <li>
                            <p style="color:black;">Previous visas (Visa stamp and biometric card)</p><br>
                       </li>
                       </ul><br>
                       <h1>Reference Letters</h1>
                       <p style="color:black;">References are usually written by someone who knows you academically or professionally. Most references will talk about you from a teacher's or supervisor's perspective: the way in which you interact with other students and your performance in classes and seminars.
                           Your reference does not have to be academic, but an academic reference is expected if you're studying or have recently completed school or college. Choosing the right referee is crucial for your application to university. Things to consider:</p><br>
                           <ul style="list-style: dotted; margin-left:60px; ">
                          <li>
                            <p  style="color:black;">Choose an appropriate referee</p>
                          </li>
                          <li>
                            <p  style="color:black;">Print on official company or university letterhead</p>
                          </li>
                          <li>
                            <p  style="color:black;">Explain the relationship between you and the referee</p>
                          </li>
                          <li>
                            <p  style="color:black;">Express confidence that you will complete the course</p>
                          </li>
                          <li>
                            <p  style="color:black;">Don’t forget the signature of the referee</p>
                          </li>
                          
                       </ul><br>
                       <h1>Personal Statement</h1>
                       <p style="color:black;">A personal statement is required when applying to UK universities. In it, students are tasked with writing about what they hope to do on the course, what they hope to do after the course and why they are applying.</p>
                       <br>
                       <h1>What do I include in my Personal Statement?</h1>
                       <ul style="list-style: dotted; margin-left:60px; ">
                          <li>
                            <p  style="color:black;">Your career aspirations</p>
                          </li>
                          <li>
                            <p  style="color:black;">How did you become interested in studying the subject</p>
                          </li>
                          <li>
                            <p  style="color:black;">What, if any, relevant work experience you have undertaken that is related to the course or subject</p>
                          </li>
                          <li>
                            <p  style="color:black;">What aspects of your previous education you have found the most interesting</p>
                          </li>
                          <li>
                            <p style="color:black;">Other relevant academic interests and passions which display positive character and personality</p>
                          </li>
                       </ul><br>
                       <p style="color:black;">Genuine experiences of extra-curricular clubs, work experience or knowledge around a subject are much more likely to make your personal statement stand out, while admissions officers are also looking for positive evidence of your character, which will make you a productive member of the university.</p><br>
                       <h1>How long should my Personal Statement be?</h1><br>
                       <p style="color:black;">The length of a personal statement varies depending on the university, but generally, the average length for an undergraduate application is between 400-600 words, around one side of A4 paper or a maximum of 47 lines. Certain postgraduate programmes may require a 1000 word personal statement, but this will be clearly specified.
                           Try not to go over the given character limit as admissions officers have many personal statements to go through, and a clearly written and concise personal statement is more likely to stand out.</p><br>
                        <h1>What are common Personal Statement errors?</h1><br>
                        <ul style="list-style: dotted; margin-left:60px; ">
                          <li>
                            <p  style="color:black;">The personal statement is too short/long</p>
                          </li>
                          <li>
                            <p  style="color:black;">The personal statement does not include important information/includes negative information</p>
                          </li>
                          <li>
                            <p  style="color:black;">The personal statement has a confusing structure</p>
                          </li>
                          
                       </ul><br>
                       <p style="color:black;">It is also important to not lie about any aspect of your personal life and education history, or even exaggerate. Admissions officers will question you about almost all aspects of your application and will be able to see through any lies.</p><br>
                       <h1>Tips for writing a Personal Statement</h1><br>
                        <ul style="list-style: dotted; margin-left:60px; ">
                          <li>
                            <p  style="color:black;">Express a passion for your subject</p>
                          </li>
                          <li>
                            <p  style="color:black;">Start the statement strongly to grab attention</p>
                          </li>
                          <li>
                            <p  style="color:black;">Link outside interests and passions to your course</p>
                          </li>
                          <li>
                            <p  style="color:black;">Be honest, but don’t include negative information</p>
                          </li>
                          <li>
                            <p  style="color:black;">Don’t attempt to sound too clever</p>
                          </li>
                          <li>
                            <p  style="color:black;">Don’t leave it until the last minute; prepare ahead of the deadline</p>
                          </li>
                          <li>
                            <p  style="color:black;">Have friends and family proofread it</p>
                          </li>
                          <li>
                            <p  style="color:black;">Don’t duplicate material from your CV/resume</p>
                          </li>
                          
                       </ul><br>
                       <p style="color:black;">In terms of presentation, attempt to create five clear paragraphs of text in a clear font such as Arial or Times New Roman, with a maximum size of 12.</p><br><br>

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
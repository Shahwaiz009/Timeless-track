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

    


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
body{
	line-height: 1.5;
	font-family: 'Poppins', sans-serif;
}
*{
	margin:0;
	padding:0;
	box-sizing: border-box;
}
.container{
	max-width: 1170px;
	margin:auto;
}
.row{
	display: flex;
	flex-wrap: wrap;
}
ul{
	list-style: none;
}
.footer{
	background-color:  rgb(42, 41, 43);
    padding: 70px 0;
}
.footer-col{
   width: 25%;
   padding: 0 15px;
}
.footer-col h4{
	font-size: 18px;
	color: #ffffff;
	text-transform: capitalize;
	margin-bottom: 35px;
	font-weight: 500;
	position: relative;
}
.footer-col h4::before{
	content: '';
	position: absolute;
	left:0;
	bottom: -10px;
	background-color:  rgb(42, 41, 43);
	height: 2px;
	box-sizing: border-box;
	width: 50px;
}
.footer-col ul li:not(:last-child){
	margin-bottom: 10px;
}
.footer-col ul li a{
	font-size: 16px;
	text-transform: capitalize;
	color: #ffffff;
	text-decoration: none;
	font-weight: 300;
	color: #bbbbbb;
	display: block;
	transition: all 0.3s ease;
}
.footer-col ul li a:hover{
	color: #ffffff;
	padding-left: 8px;
}
.footer-col .social-links a{
	display: inline-block;
	height: 40px;
	width: 40px;
	background-color: black;
	margin:0 10px 10px 0;
	text-align: center;
	line-height: 40px;
	border-radius: 50%;
	color: #ffffff;
	transition: all 0.5s ease;
}
.footer-col .social-links a:hover{
	color:  rgb(42, 41, 43);
	background-color: #ffffff;
}

/*responsive*/
@media(max-width: 767px){
  .footer-col{
    width: 50%;
    margin-bottom: 30px;
}
}
@media(max-width: 574px){
  .footer-col{
    width: 100%;
}
}

#main{
	width: 100%;
	height: 800px;
	background-color: rgb(233, 164, 164);
}
#sidebar{
	background-color:  rgb(42, 41, 43);
	width: 15%;
	height: 800px;
	float: left;
	overflow-y: scroll;
}
#sidebar::-webkit-scrollbar {
    display: none;
}

#content{
	width: 85%;
	height: 800px;
	background-color: #24262b;
	float: right;
	
}



#nav{
	width: 100%;
	height: 75px;
	background-color: rgb(42, 41, 43);
    
}

#content2{
	width: 100%;
	height: 735px;
	background-color: rgb(136, 136, 126);
	overflow: scroll;
}

#start{
	margin-top: 45px;
	margin-left: 45px;
	margin-right: 45px;
}


#content2::-webkit-scrollbar {
    display: none;
}




#part1{
   float: center;
   height: 65px;
}

#part1 h1{
	text-align: center;
	font-size: 25px;
	padding: 10px;
	font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
	color: white;

}
#part2_h2{
	background-color: aliceblue;
	margin-top: 10px;

}


#part2_li{
	text-align: center;
	line-height: 40px;
	background-color:  rgb(42, 41, 43);
	list-style: none;
}

#part2_li ul{
	margin: 0%;
	padding: 3px;
}

#part2_li a{
	text-decoration: none;
    color: #c9c2c2; /* Adjust the color as needed */
    font-weight: bold;
    display: block;
    padding: 4px 0;
}




#search-form {
    display: flex;
    margin-top: -37px;
	margin-left: 38px;
	margin-right: 10px;
	width: 80px;
	padding: 10px;
}

#search {
    padding: 8px; /* Decreased padding */
    font-size: 14px; /* Decreased font size */
    border: 1px solid #ddd;
    border-radius: 4px;
    flex: 1;
}

#search:focus {
    outline: none;
    border-color: #4CAF50;
}

#search:focus::placeholder {
    color: transparent; /* Hide the placeholder text when the input is focused */
}

#search::placeholder {
    color: #aaa;
}

#search:focus + input[type="submit"] {
    background-color: #4CAF50;
    color: #fff;
    cursor: pointer;
}

input[type="submit"] {
    padding: 8px; /* Decreased padding */
    font-size: 14px; /* Decreased font size */
    background-color: #ddd;
    border: none;
    border-radius: 4px;
    margin-left: 5px;
    cursor: not-allowed;
}

input[type="submit"]:hover {
    background-color: #4CAF50;
    color: #fff;
    cursor: pointer;
}



#profile-container {
    position: relative;
	float: right;
	margin-top: -42px;
	margin-right: 30px;
}

#profile-circle {
    position: relative;
    cursor: pointer;
    display: inline-block;
}

#profile-circle img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
}

#profile-menu {
    display: none;
    position: absolute;
    top: 50px;
    right: 0;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-shadow: 0 0 10px  rgb(42, 41, 43);
    padding: 10px;
    z-index: 1;
}

#profile-menu ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

#profile-menu li {
    margin-bottom: 10px;
}

#profile-menu a {
    text-decoration: none;
    color: #333;
}

#profile-menu a:hover {
    color: #4CAF50;
}






#auth-links {
    display: flex;
    list-style: none;
    margin-top: -34px;
	margin-right: 20px;
	float: right;
}

#auth-links li {
    margin-left: 10px;
}

#auth-links a {
    text-decoration: none;
    color: #c2b1b1;
}

#auth-links a:hover {
    color: #4CAF50;
}



#toggleSidebar {
	font-size: 20px;
	cursor: pointer;
	background: none;
	border: none;
	color: #fff;
	margin-left: 10px;
	margin-top: 20px;
}

#content.hide-sidebar {
	margin-left: 0;
}

#content.show-sidebar {
	margin-left: 15%;
}



table {
	border-collapse: collapse;
	width: 80%;
	margin: auto;
	margin-top: 20px;
}

th, td {
	border: 1px solid #ddd;
	padding: 8px;
	text-align: left;
}

th {
	background-color: #f2f2f2;
}



.column {
    width: 25%;
    box-sizing: border-box;
    float: left;
    padding: 10px;
  }

  .row {
    margin-bottom: 20px;
  }

  .card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 30px;
    text-align: center;
	height: 270px;
    overflow-y: scroll;
  }

  .card::-webkit-scrollbar {
    display: none;
}
  h2 {
    font-size: 1.2rem;
    margin-bottom: 10px;
  }

  p {
    color: #555;
  }

  /* Add the following media query to adjust the layout for smaller screens */
@media (max-width: 767px) {
    .column {
        width: 100%; /* Set the width to 100% for smaller screens */
        margin-bottom: 20px; /* Add some spacing between rows */
    }
}

/* Add this media query for even smaller screens if needed */
@media (max-width: 574px) {
    .column {
        width: 100%;
    }
}

.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}


    </style>
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
              <?php
include 'connect/connection.php';
$id = $_SESSION['id'];

// Fetch data from the database
$query = "SELECT * FROM uploads WHERE id = '$id'";
$result = $connect->query($query);

if ($result) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $approvalStatus = $row['status'];

    if ($approvalStatus === 'approved') {
        // Display the table content
        echo '<table>
                <tr>
                  <th>id</th>
                  <th>Documents</th>
                  <th>reviews</th>
                  <th>Views</th>
                </tr>
                
                <tr>
                    <td>3</td>
                    <td>' . $row['matric'] . '</td>
                    <td>' . $row['review1'] . '</td>
                    <td><a href="view_image.php?image=' . $row['matric'] . '" target="_blank">View</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>' . $row['inter'] . '</td>
                    <td>' . $row['review2'] . '</td>
                    <td><a href="view_image.php?image=' . $row['inter'] . '" target="_blank">View</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>' . $row['bacholar1'] . '</td>
                    <td>' . $row['review3'] . '</td>
                    <td><a href="view_image.php?image=' . $row['inter'] . '" target="_blank">View</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>' . $row['masters1'] . '</td>
                    <td>' . $row['review4'] . '</td>
                    <td><a href="view_image.php?image=' . $row['inter'] . '" target="_blank">View</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>' . $row['proficency'] . '</td>
                    <td>' . $row['review5'] . '</td>
                    <td><a href="view_image.php?image=' . $row['inter'] . '" target="_blank">View</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>' . $row['recommadation1'] . '</td>
                    <td>' . $row['review6'] . '</td>
                    <td><a href="view_image.php?image=' . $row['inter'] . '" target="_blank">View</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>' . $row['recommadation2'] . '</td>
                    <td>' . $row['review7'] . '</td>
                    <td><a href="view_image.php?image=' . $row['inter'] . '" target="_blank">View</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>' . $row['recommadation3'] . '</td>
                    <td>' . $row['review8'] . '</td>
                    <td><a href="view_image.php?image=' . $row['inter'] . '" target="_blank">View</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>' . $row['work1'] . '</td>
                    <td>' . $row['review9'] . '</td>
                    <td><a href="view_image.php?image=' . $row['inter'] . '" target="_blank">View</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>' . $row['work2'] . '</td>
                    <td>' . $row['review10'] . '</td>
                    <td><a href="view_image.php?image=' . $row['inter'] . '" target="_blank">View</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>' . $row['work3'] . '</td>
                    <td>' . $row['review11'] . '</td>
                    <td><a href="view_image.php?image=' . $row['inter'] . '" target="_blank">View</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>' . $row['cv'] . '</td>
                    <td>' . $row['review12'] . '</td>
                    <td><a href="view_image.php?image=' . $row['inter'] . '" target="_blank">View</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>' . $row['langage_doc'] . '</td>
                    <td>' . $row['review13'] . '</td>
                    <td><a href="view_image.php?image=' . $row['inter'] . '" target="_blank">View</a></td>
                </tr>
                
                
                
                <!-- Add similar rows for other documents -->
              </table>';
            } else {
                echo 'Wait for approval';
            }
        } else {
            // No data in the database, show alert and redirect
            echo '<script>alert("Enter the data first."); window.location.href = "upload_doc.php";</script>';
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
</body>
</html> 
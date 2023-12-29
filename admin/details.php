<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "timeless";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set the number of records per page
$recordsPerPage = 15;

// Get the current page number
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = (int)$_GET['page'];
} else {
    $currentPage = 1;
}

// Calculate the offset for the query
$offset = ($currentPage - 1) * $recordsPerPage;

// Fetch data from the database with pagination
$result = $conn->query("SELECT * FROM uni_details LIMIT $offset, $recordsPerPage");
$totalRecords = $conn->query("SELECT COUNT(*) AS total FROM agents")->fetch_assoc()['total'];



$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Timeless Track</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="login.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="index.html">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->



  <li class="nav-item">
    <a class="nav-link collapsed" href="panding_approve.php">
      panding Approvals
    </a>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="details.php">
      Details
    </a>
</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="approve_agents.php">
      Approved agents
    </a>
    </li>
    
  <li class="nav-item">
    <a class="nav-link collapsed" href="country.php">
      Countries
    </a>

    
  </li><!-- End Charts Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="users.php">
      users
    </a>
    </li>

    <li class="nav-item">
    <a class="nav-link collapsed" href="scholarships.php">
      Scholarships
    </a>
  </li>

 

  <li class="nav-item">
    <a class="nav-link collapsed" href="post.php">
      Add post
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="queries.php">
      Queries
    </a>
  </li>

  



</ul>

</aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>University Details</h1>
    </div><!-- End Page Title -->
   
    <section class="section dashboard">
      <div class="row">
      <div id="cards" style="display: flex; justify-content: center; align-items: center;">
                <form method="post" action="details.php" enctype="multipart/form-data" style="width: 70%;">
                       
                <table style="width: 100%; border-collapse: collapse;">
                        
                        <thead>
                            <tr>
                                <th  style="text-align: left;">Details</th>
                                <th style="text-align: left;">Enter Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Rows -->
                            <tr>
                                <td style="padding: 15px;">University Name</td>
                                <td style="padding: 15px;"><input type="text" placeholder="Enter university name" class="input2" name="uni_title"></td>
                            </tr>
                            <tr>
                                <td style="padding: 15px;">Enter country</td>
                                <td style="padding: 15px;">
                                        <select name="country" class="input2">
                                            <option value="">Select country</option>
                                            <?php
                                            // Include your database connection file
                                            include '../connect/connection.php';

                                            $gets_cats = "SELECT * FROM countries";
                                            $run_cats = mysqli_query($connect, $gets_cats);
                                            while ($row_cats = mysqli_fetch_array($run_cats)) {
                                                $cat_id = $row_cats['cat_id'];
                                                $cat_name = $row_cats['cat_name'];
                                                echo "<option value='$cat_id'>$cat_name</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                            </tr>
                            <tr>
                                <td style="padding: 15px;">Univerity image 1</td>
                                <td style="padding: 15px;"><input type="file" placeholder="Enter value"class="input2" name="uni_img1"></td>
                            </tr>
                            <tr>
                            
                            <tr>
                                <td style="padding: 15px;">Univerity image 2</td>
                                <td style="padding: 15px;"><input type="file" placeholder="Enter value" id="input2" name="uni_img2"></td>
                            </tr>
                            <tr>
                                <td style="padding: 15px;">Univerity image 3</td>
                                <td style="padding: 15px;"><input type="file" placeholder="Enter value" class="input2" name="uni_img3"></td>
                            </tr>
                            <tr>
                                <td style="padding: 15px;">Ielts</td>
                                <td style="padding: 15px;"><input type="text" placeholder="Enter value" class="input2" name="ielts"></td>
                            </tr>
                            <tr>
                                <td style="padding: 15px;">Duolingo</td>
                                <td style="padding: 15px;"><input type="text" placeholder="Enter value" class="input2" name="Duolingo"></td>
                            </tr>
                            <tr>
                                <td style="padding: 15px;">Language_cert</td>
                                <td style="padding: 15px;"><input type="text" placeholder="Enter value" class="input2" name="Language_cert"></td>
                            </tr>
                            <tr>
                                <td style="padding: 15px;">POST</td>
                                <td style="padding: 15px;"><textarea class="input2" placeholder="Enter the post data here" name="uni_post"></textarea></td>
                            </tr>
                            <tr>
                                <td style="padding: 15px;">PTE</td>
                                <td style="padding: 15px;"><input type="text" placeholder="Enter value" class="input2" name="PTE"></td>
                            </tr>
                            <tr>
                                <td style="padding: 15px;">TOEFL</td>
                                <td style="padding: 15px;"><input type="text" placeholder="Enter value" class="input2" name="TOEFL"></td>
                            </tr>
                            <tr>
                                <td style="padding: 15px;">Inter</td>
                                <td style="padding: 15px;"><input type="text" placeholder="Enter value" class="input2" name="inter"></td>
                            </tr>
                            <tr>
                                <td style="padding: 15px;">Oxford</td>
                                <td style="padding: 15px;"><input type="text" placeholder="Enter value" class="input2" name="oxford"></td>
                            </tr>
                            <tr>
                                <td style="padding: 15px;">Bacholor</td>
                                <td  style="padding: 15px;"><input type="text" placeholder="Enter value" class="input2" name="bacholar"></td>
                            </tr>
                            <tr>
                                <td style="padding: 15px;">Masters</td>
                                <td style="padding: 15px;"><input type="text" placeholder="Enter value" class="input2" name="masters"></td>
                            </tr>
                            <tr>
                                <td style="padding: 15px;">submit</td>
                                <td style="padding: 15px;"><input type="submit" name="submit" ></td>
                            </tr>
                        </tbody>
                    </table>

                </form>
                    
                </div>


      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>



<?php
include '../connect/connection.php';

if (isset($_POST['submit'])) {
    $uni_title = $_POST['uni_title'];
    $country = $_POST['country'];
    $uni_post = $_POST['uni_post'];
    $ielts = $_POST['ielts'];
    $Duolingo = $_POST['Duolingo'];
    $Language_cert = $_POST['Language_cert'];
    $PTE = $_POST['PTE'];
    $oxford = $_POST['oxford'];
    $bacholar = $_POST['bacholar'];
    $inter = $_POST['inter'];
    $masters = $_POST['masters'];
    $TOEFL = $_POST['TOEFL'];

    $uni_img1 = $_FILES['uni_img1']['name'];
    $uni_img2 = $_FILES['uni_img2']['name'];
    $uni_img3 = $_FILES['uni_img3']['name'];

    $temp_name1 = $_FILES['uni_img1']['tmp_name'];
    $temp_name2 = $_FILES['uni_img2']['tmp_name'];
    $temp_name3 = $_FILES['uni_img3']['tmp_name'];

    if ($uni_title == '' or $ielts == '' or $Duolingo == '' or $uni_img1 == '' or $bacholar == '') {
        echo "<script>alert('Please enter all the required data!')</script>";
        exit();
    }

    // Move uploaded files to a desired directory
    move_uploaded_file($temp_name1, "../images/" . $uni_img1);
    move_uploaded_file($temp_name2, "../images/" . $uni_img2);
    move_uploaded_file($temp_name3, "../images/" . $uni_img3);

    // Adjust the following query with your actual column names
    $insert_details = "INSERT INTO `uni_details` (`cat_id`, `uni_title`, `uni_post`, `uni_img1`, `uni_img2`, `uni_img3`, `ielts`, `Duolingo`, `Language_cert`, `PTE`, `oxford`, `bacholar`, `inter`, `masters`, `TOEFL`, `Date`)
    VALUES ('$country','$uni_title','$uni_post','$uni_img1','$uni_img2', '$uni_img3', '$ielts', '$Duolingo', '$Language_cert', '$PTE', '$oxford', '$bacholar', '$inter', '$masters', '$TOEFL', NOW())";


    if ($connect->query($insert_details) === TRUE) {
        echo "<script>alert('Data inserted successfully!')</script>";
    } else {
        echo "Error: " . $insert_details . "<br>" . $connect->error;
    }
}

// Close the database connection
?>

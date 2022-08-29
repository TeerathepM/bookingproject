<?php 
    include 'function.php';
    session_start();
?>
<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Member</title>

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Parallax HTML5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Meghna Template v1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

    <!-- CSS
		================================================== -->
    <!-- Fontawesome Icon font -->
    <link rel="stylesheet" href="plugins/themefisher-font/style.css">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
    <!-- Animate.css -->
    <link rel="stylesheet" href="plugins/animate-css/animate.css">
    <!-- Magnific popup css -->
    <link rel="stylesheet" href="plugins/magnific-popup/dist/magnific-popup.css">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="plugins/slick-carousel/slick.css">
    <link rel="stylesheet" href="plugins/slick-carousel/slick-theme.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="css/style.css">


</head>

<body id="home" data-spy="scroll" data-target=".navbar-nav" data-offset="80">
    <!--
	Start Preloader
	==================================== -->
    <div class="preloader">
        <div class="sk-cube-grid">
            <div class="sk-cube sk-cube1"></div>
            <div class="sk-cube sk-cube2"></div>
            <div class="sk-cube sk-cube3"></div>
            <div class="sk-cube sk-cube4"></div>
            <div class="sk-cube sk-cube5"></div>
            <div class="sk-cube sk-cube6"></div>
            <div class="sk-cube sk-cube7"></div>
            <div class="sk-cube sk-cube8"></div>
            <div class="sk-cube sk-cube9"></div>
        </div>
    </div>
    <!-- End Preloader
	==================================== -->

    <!-- 
Sticky Navigation
==================================== -->
    <?php
                    $result = $obj->fetchInfo($_SESSION['username']);
                    $row = mysqli_fetch_assoc($result);
                ?>
    <header id="navigation" class="navigation">
        <div class="container">
            <div class="navbar-header w-100">
                <nav class="navbar navbar-expand-lg navbar-dark px-0">
                    <!-- logo -->
                    <a class="navbar-brand logo" href="main.php">
                        <!-- <img src="images/logo.png" alt="Website Logo" /> -->
                        <svg width="40px" height="40px" viewBox="0 0 45 44" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Group" transform="translate(2.000000, 2.000000)" stroke="#57CBCC"
                                    stroke-width="3">
                                    <ellipse id="Oval" cx="20.5" cy="20" rx="20.5" ry="20"></ellipse>
                                    <path d="M6,7 L33.5,34.5" id="Line-2" stroke-linecap="square"></path>
                                    <path d="M21,20 L34,7" id="Line-3" stroke-linecap="square"></path>
                                </g>
                            </g>
                        </svg>
                    </a>
                    <!-- /logo -->
                    <p class="text-dark" style="margin-bottom:0; background-color:#fff;padding:8px;border-radius:5px">
                        <strong><?php echo $row['member_name']?></strong>
                    </p>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar01"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbar01">

                        <ul class="navbar-nav navigation-menu ml-auto">
                            <li class="nav-item">
                                <a class="nav-link text-light" href="main.php"><strong>Home</strong></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="member.php"><strong>MEMBER</strong></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php"
                                    onclick="return confirm('คุณต้องการออกจากระบบหรือไม่')"><b>Logout<b></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!--
End Sticky Navigation
==================================== -->

    <!--
		Start About Section
		==================================== -->
    <section class="bg-one about section">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <!-- section title -->
                    <div class="title text-center wow fadeIn" data-wow-duration="1500ms">
                        <h2>MEMBER</h2>
                        <div class="border"></div>
                    </div>
                    <!-- /section title -->
                </div>

                    <!-- /section title -->
                </div>

                <table class="table">
                    <thead>
                        <tr align="center">
                            <th class="text-light"><strong>ชื่อ</strong></th>
                            <th class="text-light"><strong>Email</strong></th>
                            <th class="text-light"><strong>เบอร์โทรศัพท์</strong></th>
                            <th class="text-light"><strong>Username</strong></th>
                            <th class="text-light"><strong>Edit</strong></th>
                            <th class="text-light"><strong>Delete</strong></th>
                        </tr>
                    </thead>

                    <?php
                    $fetch = $obj->info();
                    while($row = mysqli_fetch_assoc($fetch)){ ?>
                    <tbody>
                        <tr align="center">
                            <td><p class="text-light" style="margin-bottom:0;"><?php echo $row['member_name']?></p></td>
                            <td><p class="text-light" style="margin-bottom:0;"><?php echo $row['member_email']?></p></td>
                            <td><p class="text-light" style="margin-bottom:0;"><?php echo $row['member_phone']?></p></td>
                            <td><p class="text-light" style="margin-bottom:0;"><?php echo $row['username']?></p></td>
                            <td><a href="update.php?id=<?php echo $row['member_id']?>" class="btn btn-warning rounded-lg">Edit</a></td>
                            <td><a href="del.php?id=<?php echo $row['member_id']?>" class="btn btn-danger rounded-lg" onclick="return confirm('คุณต้องการลบรายการนี้หรือไม่')">Delete</a></td>
                        </tr>
                    </tbody>
                    <?php
                    }
                ?>
                </table>

            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- End section -->

    <!-- 
	Essential Scripts
	=====================================-->

    <!-- Main jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="plugins/bootstrap/bootstrap.min.js"></script>
    <!-- Slick Carousel -->
    <script src="plugins/slick-carousel/slick.min.js"></script>
    <!-- Portfolio Filtering -->
    <script src="plugins/filterzr/jquery.filterizr.min.js"></script>
    <!-- Magnific popup -->
    <script src="plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <!-- Google Map API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgeuuDfRlweIs7D6uo4wdIHVvJ0LonQ6g"></script>
    <script src="plugins/google-map/gmap.js"></script>
    <!-- wow.min Script -->
    <script src="plugins/wow/wow.min.js"></script>
    <!-- Custom js -->
    <script src="js/script.js"></script>

</body>

</html>
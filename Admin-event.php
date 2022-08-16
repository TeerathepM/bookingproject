<!DOCTYPE html>
<html lang="en" class="isPWA">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <title>จองรถตู้นำเที่ยว รถเช่าขับเอง</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
    <link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">

</head>

<body class="theme-light">

    <script src="https://static.line-scdn.net/liff/edge/versions/2.3.0/sdk.js"></script>
    <script>
    function runApp() {
        liff.getProfile().then(profile => {
            document.getElementById("pictureUrl").src = profile.pictureUrl;
            document.getElementById("displayName").innerHTML = profile.displayName;
            document.getElementById('getDecodedIDToken').innerHTML = liff.getDecodedIDToken().email;
        }).catch(err => console.error(err));
    }
    liff.init({
        liffId: "1657289532-lRA94mGv"
    }, () => {
        if (liff.isLoggedIn()) {
            runApp();
        } else {
            liff.login();
        }
    }, err => console.error(err.code, error.message));
    </script>

    <div id="preloader">
        <div class="spinner-border color-highlight" role="status"></div>
    </div>

    <div id="page">
        <div class="header header-fixed header-logo-center header-auto-show">
            <a href="transport.php" class="header-title">UBON</a>
            <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
            <a href="#" data-menu="menu-main" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a>
            <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-dark"><i
                    class="fas fa-sun"></i></a>
            <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-light"><i
                    class="fas fa-moon"></i></a>

        </div>

        <div id="footer-bar" class="footer-bar-6">
            <a href="Admin.php" class="active-nav"><i class="fa-solid fa-van-shuttle"></i><span>ทัวร์</span></a>
            <a href="Admin-event.php" class="active-nav circle-nav"><i class="fa-solid fa-guitar"></i><span>อีเว้นท์</span></a>
            <a href="#" data-menu="menu-main" class="active-nav"><i class="fa fa-bars"></i><span>Menu</span></a>
        </div>

        <div class="page-title page-title-fixed">
            <h1>UBON</h1>
            <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-share"><i
                    class="fa fa-share-alt"></i></a>
            <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-light" data-toggle-theme><i
                    class="fa fa-moon"></i></a>
            <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-dark" data-toggle-theme><i
                    class="fa fa-lightbulb color-yellow-dark"></i></a>
            <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-main"><i
                    class="fa fa-bars"></i></a>
        </div>

        <div class="page-title-clear mt-3">
        </div>

        <div class="page-content mt-5 ">


            <div class="card card-style">
                <section class="main-content">
                    <div class="container pt-4 pb-4">
                    <a name="" id="" class="btn btn-primary mb-3" href="create_event.php" role="button">Create</a>
                    <a name="" id="" class="btn btn-warning mb-3 text-black" href="event.php" role="button">UserPage</a>
                        <?php
                                include('connect.php');
                                // Create connection
                                $conn = new mysqli($servername, $username, $password, $dbname);
                                // Check connection
                                if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                                }
                                
                                $sql = "SELECT * FROM tbevents";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                        ?>

                        <div id="card" class="col-lg">
                            <div class="card bg-white p-3 mb-4 shadow img-fluid"
                                style="background-image: url('images/bg2.jpg'); background-position: center; background-size: cover; background-repeat: no-repeat;">
                                <div class="d-flex justify-content-between mb-4">
                                    <div class="user-info">
                                        <div class="user-info__img">
                                            <!-- <img src="img/logo.jpg" alt="User Img"> -->
                                        </div>
                                        <div class="user-info__basic">
                                            <p class="mb-1"
                                                style="text-shadow: #C8C8C8 1px 1px 5px; font-size:20px; font-weight:700; color:green;">
                                                <?php echo $row["event_name"]; ?>
                                            </p>
                                            <p class="text-muted mb-0"
                                                style="text-shadow: #C8C8C8 1px 1px 5px; font-size:16px; font-weight:700;">
                                                ราคา
                                                <?php echo $row["event_price"]; ?> ต่อตั๋ว</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="mb-0"
                                    style="text-shadow: #C8C8C8 1px 1px 5px; font-size:16px; font-weight:600;">
                                    <?php echo $row["event_detail"]; ?>
                                </p>
                                <span id="status" class="font-weight-bold mt-1"
                                    style="text-shadow: #C8C8C8 1px 1px 5px; font-size:18px;">
                                    <p style="color:green;"><?php echo $row["event_status"]; ?>
                                    <p>
                                </span>

                                <span id="date" class="font-weight-bold mt-1"
                                    style="text-shadow: #C8C8C8 1px 1px 5px; font-size:18px;">
                                    <p style="color:green;"><?php echo "ว/ด/ป ". $row["event_date"]; ?>
                                        <?php echo " เวลา ". $row["event_time"]; ?>
                                    <p>
                                </span>

                                <div class="d-flex justify-content-between mt-4">
                                    <div>
                                        <h5 class="mb-0"
                                            style="color:#fff; background-color:#0077BB; padding:6px 11px; border-radius:10px">
                                            ตั๋วที่เหลือ <?php echo $row["event_ticket"]; ?>
                                        </h5>
                                    </div>

                                    <span>
                                        <button type="button"
                                            onclick="window.location='payment.php?id=<?php echo $row['event_id']?>&company=<?php echo $row['event_name']?>'"
                                            id="reserve"
                                            class="btn btn-primary">จองตั๋ว</button>
                                        <button type="button"
                                            onclick="window.location='form_update_event.php?id=<?php echo $row['event_id']?>'"
                                            id="reserve"
                                            class="btn btn-warning text-black">แก้ไข</button>
                                        <button type="button"
                                            onclick="window.location='del_event.php?id=<?php echo $row['event_id']?>'"
                                            id="reserve"
                                            class="btn btn-danger">ลบ</button>

                                    </span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <?php  }
                    } else {
                    echo "0 results";
                    }
                $conn->close();
            ?>

                    </div>
                </section>
            </div>

        </div>
        <!-- Page content ends here-->

        <!-- Main Menu-->
        <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-load="html/menu-main.html"
            data-menu-width="280" data-menu-active="nav-components"></div>

        <!-- Share Menu-->
        <div id="menu-share" class="menu menu-box-bottom rounded-m" data-menu-load="html/menu-share.html"
            data-menu-height="370"></div>

        <!-- Colors Menu-->
        <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="html/menu-colors.html"
            data-menu-height="480"></div>


    </div>

    <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="scripts/custom.js"></script>
    </div>



</body>

</html>
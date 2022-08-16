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
            <a href="transport.php" class="active-nav circle-nav"><i
                    class="fa-solid fa-van-shuttle"></i><span>ทัวร์</span></a>
            <a href="event.php" class="active-nav"><i class="fa-solid fa-guitar"></i><span>อีเว้นท์</span></a>
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
            <center>
                <div class="user-info">
                    <div class="user-info__img">
                        <img id="pictureUrl" class="img-fluid rounded-circle shadow-xl" style="width: 80px">
                    </div>
                    <div class="user-info__basic mt-1">
                        <h5 class="mb-0" id="displayName"></h5>
                        <p class="text-muted mb-0" id="getDecodedIDToken"></p>
                    </div>
                </div>
            </center>
        </div>

        <div class="page-content mt-5 ">


            <div class="card card-style">
                <section class="main-content">
                    <div class="container pt-4 pb-4">
                        <?php
                                include('connect.php');
                                // Create connection
                                $conn = new mysqli($servername, $username, $password, $dbname);
                                // Check connection
                                if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                                }

                                isset( $_GET['id'] ) ? $get_id = $_GET['id'] : $get_id = "";
                                $sql = "SELECT * FROM tbevents WHERE event_id = '$get_id'";
                                $result = $conn->query($sql);
                                $row = mysqli_fetch_array($result);
                        ?>

                        <form method="POST" action="update_event.php">
                            <span><h5>รหัสตั๋ว</h5></span>
                            <div class="input-style has-borders no-icon validate-field mb-4">
                                <input type="text" class="form-control w-300" id="form-Ticket" name="ID-Ticket" value="<?php echo $row['event_id']?>" readonly>
                            </div>

                            <span><h5>ชื่อตั๋ว</h5></span>
                            <div class="input-style has-borders no-icon validate-field mb-4">
                                <input type="text" class="form-control w-300" id="form-Ticket" name="Input-Name" value="<?php echo $row['event_name']?>" require>
                            </div>

                            <span><h5>ราคาตั๋ว</h5></span>
                            <div class="input-style has-borders no-icon validate-field mb-4">
                                <input type="text" class="form-control" id="form-Price" name="Input-Price" value="<?php echo $row['event_price']?>" require>
                            </div>

                            <span><h5>ข้อมูลตั๋ว</h5></span>
                            <div class="input-style has-borders no-icon validate-field mb-4">
                                <input type="text" class="form-control" id="form-detail" name="Input-detail" value="<?php echo $row['event_detail']?>" require>
                            </div>

                            <span><h5>เวลาตั๋ว</h5></span>
                            <div class="input-style has-borders no-icon validate-field mb-4">
                            <input type="time" class="form-control" id="form-Time" name="Input-Time" value="<?php echo $row['event_time']?>" require>
                            </div>

                            <span><h5>วันที่</h5></span>
                            <div class="input-style has-borders no-icon validate-field mb-4">
                            <input type="date" class="form-control" id="form-Date" name="Input-Date" value="<?php echo $row['event_date']?>" require>
                            </div>

                            <span><h5>จำนวนที่ต้องการจองตั๋ว</h5></span>
                            <div class="input-style has-borders no-icon validate-field mb-4">
                            <input id="seat-tour" type="text" class="form-control" id="form-seat" name="Input-Ticket" value="<?php echo $row['event_ticket']?>" require>
                            </div>

                            <button type="submit" class="btn btn-primary">ตกลง</button>
                            <a href="Admin-event.php" type="button" class="btn btn-danger">ยกเลิก</a>
                        </form>

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
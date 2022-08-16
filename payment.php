<!DOCTYPE HTML>
<html lang="en" class="isPWA">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>จองที่นั่ง</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
    <link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
</head>

<body class="theme-light">

    <script src="https://static.line-scdn.net/liff/edge/versions/2.3.0/sdk.js"></script>
    <script>
    function runApp() {
        liff.getProfile().then(profile => {
            const image = document.getElementById("pictureUrl").src = profile.pictureUrl;
            const name = document.getElementById("displayName").innerHTML = profile.displayName;
            const mail = document.getElementById("getDecodedIDToken").innerHTML = liff.getDecodedIDToken()
                .email;

            console.log(document.getElementById('form-email').value = mail);

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
            <a href="transport.php" class="active-nav"><i
                    class="fa-solid fa-van-shuttle"></i><span>ทัวร์</span></a>
            <a href="event.php" class="active-nav circle-nav"><i class="fa-solid fa-guitar"></i><span>อีเว้นท์</span></a>
            <a href="#" data-menu="menu-main" class="active-nav"><i class="fa fa-bars"></i><span>Menu</span></a>
        </div>

        <div class="page-title page-title-fixed">
            <h1>จองที่นั่ง</h1>
            <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-share"><i
                    class="fa fa-share-alt"></i></a>
            <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-light" data-toggle-theme><i
                    class="fa fa-moon"></i></a>
            <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-dark" data-toggle-theme><i
                    class="fa fa-lightbulb color-yellow-dark"></i></a>
            <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-main"><i
                    class="fa fa-bars"></i></a>
        </div>
        <div class="page-title-clear mt-3"></div>
        <div class="page-content mt-5">

            <div class="card card-style" style="width:45%; margin:auto auto">
                <div class="content">
                    <?php
                include('connect.php');
                // Create connection
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }

                $id = $_GET['id'];
                $company = $_GET['company'];

                $sql = "SELECT * FROM `tbevents` WHERE event_id = '$id'";
                $result = $conn->query($sql);
                $fetch = mysqli_fetch_array($result);

                ?>
                    <div class="content mb-0">
                        <center>
                            <div class="user-info">
                                <div class="user-info__img">
                                    <img id="pictureUrl" class="img-fluid rounded-circle shadow-xl" style="width: 80px">
                                </div>
                                <div class="user-info__basic mt-2">
                                    <h5 class="mb-0" id="displayName"></h5>
                                    <p class="text-muted mb-0" id="getDecodedIDToken"></p>
                                </div>
                            </div>
                        </center>

                        <form method="POST" action="payment_succed.php?count=<?php echo $fetch['event_ticket']?>"
                            onsubmit="return checkInput()" class="mt-4">

                            <input type="hidden" class="form-control" name="id" value="<?php echo $id?>" require>

                            <div>
                                <h5>ชื่อบริการ</h5>
                            </div>
                            <div class="input-style has-borders has-icon validate-field mb-4">
                                <i class="fa-solid fa-building"></i>
                                <input type="text" class="form-control validate-name" id="form-service" name="service"
                                    placeholder="ชื่อบริการ" value="<?php echo $company?>" readonly>
                            </div>


                            <span>
                                <h5>ชื่อ-สกุล</h5>
                            </span>
                            <div class="input-style has-borders no-icon validate-field mb-4">
                                <input type="text" class="form-control validate-text" id="form-fName" name="Name"
                                    placeholder="ชื่อ" value="">
                            </div>

                            <span>
                                <h5>เบอร์โทร</h5>
                            </span>
                            <div class="input-style has-borders no-icon validate-field mb-4">
                                <input type="tel" class="form-control validate-text" id="form-Phone" name="Phone"
                                    placeholder="เบอร์โทร">
                                <i class="fa fa-times disabled invalid color-red-dark"></i>
                                <i class="fa fa-check disabled valid color-green-dark"></i>
                            </div>

                            <span>
                                <h5>E-mail</h5>
                            </span>
                            <div class="input-style has-borders no-icon validate-field mb-4">
                                <input type="email" class="form-control validate-text" id="form-email" name="Email"
                                    value="" placeholder="Email" readonly>
                            </div>
                            <span>
                                <h5>เวลา</h5>
                            </span>
                            <div class="input-style has-borders no-icon mb-4">
                                <input type="text" class="form-control validate-text" class="form-control"
                                    id="form-time" name="ticket-price" value="<?php echo $fetch['event_time']?>"
                                    readonly>
                            </div>
                            <span>
                                <h5>วันที่</h5>
                            </span>
                            <div class="input-style has-borders no-icon mb-4">
                                <input type="text" class="form-control validate-text" class="form-control"
                                    id="form-date" name="ticket-price" value="<?php echo $fetch['event_date']?>"
                                    readonly>
                            </div>

                            <span>
                            <span>
                            <span>
                                <h5>ราคาต่อ 1 ตั๋ว</h5>
                            </span>
                            <div class="input-style has-borders no-icon mb-4">
                                <input type="text" class="form-control validate-text" class="form-control"
                                    id="form-price" name="ticket-price" value="<?php echo $fetch['event_price']?>"
                                    readonly>
                            </div>

                            <span>
                                <h5>จำนวนที่จอง</h5>
                            </span>
                            <div>
                                <input type="range" class="ios-slider" min="1" max="<?php echo $fetch['event_ticket']?>"
                                    value="1" name="ticket-count" id="customRange2">
                                <div id="count" style="margin-left:7px; color:orange; font-size:16px; font-weight:600">
                                </div>
                            </div>


                            <span>
                                <h5>รวมเป็นเงิน</h5>
                            </span>
                            <div class="input-style has-borders no-icon mb-4">
                                <label for="total">รวมเป็นเงิน</label>
                                <input type="text" class="form-control" id="form-total" name="total" value="" readonly>
                                <div id="status" class="text-danger font-weight-bold mb-3" style="font-size: 24px;">
                                </div>

                                <button type="button" class="btn btn-danger"
                                    style="float:right; margin-right:5px" onclick="<?php echo "window.location='event.php'"; ?>">ยกเลิก</a>
                                <button type="submit" class="btn btn-primary" id="display" name="submit"
                                    onclick="return confirm('คุณต้องการจ่าย ' + conText() + ' บาท หรือไม่');"
                                    style="float:right; margin-right:5px">ตกลง</button>
                            </div>
                        </form>
                    </div>


                    <?php
        if($fetch['event_ticket'] == 0){
            echo "<script>document.getElementById('display').disabled = true</script>";
            echo "<script>document.getElementById('status').innerHTML = 'สินค้าหมด'</script>";
        }
    ?>
                </div>
            </div>

        </div>
        <!-- Page content ends here-->

        <!-- Main Menu-->
        <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-load="html/menu-main.html"
            data-menu-width="280" data-menu-active="nav-components"></div>

        <!-- Share Menu-->
        <div id="menu-share" class="menu menu-box-bottom rounded-m" data-menu-load="html/menu-share.html"
            data-menu-height="370">
        </div>

        <!-- Colors Menu-->
        <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="html/menu-colors.html"
            data-menu-height="480"></div>


    </div>

    <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="scripts/custom.js"></script>

</body>

</html>

<script>
// แสดง Range ผลแบบ Realtime และ ลูปช่องจำนวนที่จอง
var slider = document.getElementById("customRange2");
var output = document.getElementById("count");
output.innerHTML = slider.value;
slider.oninput = function() {
    output.innerHTML = this.value;
    getTxt()
}

// แสดงผลช่องรวมเงิน
var txt = document.getElementById("customRange2").value * <?php echo $fetch['event_price']?>;
document.getElementById("form-total").value = txt + " บาท";

// ช่องรวมเงินคำนวนกับจำนวนที่จองแล้วนำไปแสดงผล
function getTxt() {
    var txt = document.getElementById("customRange2").value * <?php echo $fetch['event_price']?>;
    document.getElementById("form-total").value = txt + " บาท";
}

// แสดง Confirm เมื่อกดตกลงถามความมั่นใจ
function conText() {
    var txt = document.getElementById("customRange2").value * <?php echo $fetch['event_price']?>;
    document.getElementById("form-total").value = txt;
    return txt;

}

// เช็คช่องว่าง
function checkInput() {
    var name = document.getElementById('form-fName');
    if (name.value == "") {
        alert('กรุณากรอกชื่อจริง');
        return false;
    }
    var name = document.getElementById('form-lName');
    if (name.value == "") {
        alert('กรุณากรอกนามสกุล');
        return false;
    }
    var name = document.getElementById('form-Phone');
    if (name.value == "") {
        alert('กรุณากรอกเบอร์โทรศัพท์');
        return false;
    }
    var name = document.getElementById('form-email');
    if (name.value == "") {
        alert('กรุณากรอกอีเมล');
        return false;
    }
}
</script>
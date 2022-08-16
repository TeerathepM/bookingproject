<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>จองรถตู้นำเที่ยว รถเช่าขับเอง</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <section class="main-content">
        <div class="container">
            <div class="user-info">
                <div class="user-info__img">
                    <img id="pictureUrl" width="25%">
                </div>
                <div class="user-info__basic">
                    <h5 class="mb-0" id="displayName"></h5>
                    <p class="text-muted mb-0" id="getDecodedIDToken"></p>
                </div>
            </div>

            <script src="https://static.line-scdn.net/liff/edge/versions/2.3.0/sdk.js"></script>
            <script>
            function runApp() {
                liff.getProfile().then(profile => {
                    const image = document.getElementById("pictureUrl").src = profile.pictureUrl;
                    const name = document.getElementById("displayName").innerHTML = profile.displayName;
                    const mail = document.getElementById("getDecodedIDToken").innerHTML = liff
                        .getDecodedIDToken()
                        .email;


                    document.getElementById('form-email').value = mail;
                }).catch(err => console.error(err));
            }
            liff.init({
                liffId: "1657289532-lRA94mGv"
            }, () => {
                if (liff.isLoggedIn()) {
                    runApp()
                } else {
                    liff.login();
                }
            }, err => console.error(err.code, error.message));

            console.log(name);
            </script>


            <br />
            <center>
                <div class="alert alert-success" role="alert">
                    ผู้ประกอบการเดินรถของเรา
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="https://liff.line.me/1657259113-dBQzlzPJ">อีเว้นท์</a></li>
                        <li class="breadcrumb-item"><a href="https://liff.line.me/1657259113-LXVReROW">เที่ยวบิน</a>
                        </li>
                        <li class="breadcrumb-item"><a href="https://liff.line.me/1657259113-5XnAzAOd">จองรถตู้</a></li>
                    </ol>
                </nav>
            </center>

            <!-- BackHome -->
            <a href="transport.php">
                <button type="button" id="button-margin" class="btn btn-primary mb-3"><i class="fas fa-long-arrow-left"></i>  ย้อนกลับ</button>
            </a>


            <div class="row d-flex justify-content-center">
                <?php
                include('connect.php');
                // Create connection
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }
                ?>

                <table class="table" >
                    <thead>
                        <tr align="center">
                            <th scope="col">ลำดับ</th>
                            <th scope="col">บริการ</th>
                            <th scope="col">ชื่อ-สกุล</th>
                            <th scope="col">เบอร์โทรศัพท์</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">จำนวณ</th>
                            <th scope="col">วันที่</th>
                            <th scope="col">เวลา</th>
                            <th>ยกเลิก</th>
                        </tr>
                    </thead>

                    <?php
                            $sql = "SELECT * FROM `transports_user`";
                            $result = $conn->query($sql);   
                            $count = 0;

                            while($fetch = mysqli_fetch_array($result)){
                            ?>

                    <tbody>
                        <tr align="center">
                            <th scope="row"><?php echo $count+=1;?></th>
                            <td><?php echo $fetch['Service']?></td>
                            <td><?php echo $fetch['Name']?></td>
                            <td><?php echo $fetch['Phone']?></td>
                            <td><?php echo $fetch['Email']?></td>
                            <td><?php echo $fetch['Length']?></td>
                            <td><?php echo $fetch['Date']?></td>
                            <td><?php echo $fetch['Time']?></td>
                            <td><a href="status-cancel.php?id=<?php echo $fetch['ID']?>" onclick="return confirm('คุณต้องการยกเลิกหรือไม่')" class="btn btn-sm btn-danger">ยกเลิก</a></td>
                        </tr>

                    </tbody>

                    <?php
                        }
                    ?>

                </table>


            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
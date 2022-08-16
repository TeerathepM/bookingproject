<?php
        include('connect.php');
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

            // Add User
                if(isset($_POST['submit'])){
                    $id = $_POST['id'];
                    $service = $_POST['service'];
                    $name = $_POST['Name'];
                    $Phone = $_POST['Phone'];
                    $Email = $_POST['Email'];
                    $date = date("Y-m-d",strtotime($_POST['Date']));
                    $time = date("H:i:s",strtotime($_POST['Time']));
                    $Seat = $_POST['seat-count'];
                    $count = $_GET['count'];
                    $balance = $count - $Seat;
                    
                    $sql = "SELECT * FROM transports_user WHERE Name = '$name'";
                    $result = $conn->query($sql);

                    if(mysqli_num_rows($result) == 0){
                            $insert = "INSERT INTO transports_user (`ID`,`Service`,`Name`,`Phone`,`Email`,`Length`,`Date`,`Time`)
                            VALUES  ('','$service','$name','$Phone','$Email','$Seat','$date','$time')";
                            $result = $conn->query($insert);

                            if($result){
                                $sql = "SELECT * FROM tbtransports";
                                $result = $conn->query($sql);

                                // Update Tour
                                $count = $_GET['count'] - $_POST['seat-count'];
                            
                                $update = "UPDATE tbtransports
                                    SET trans_seat='$balance'
                                    WHERE trans_id = '$id'";
                                $result = $conn->query($update);

                                $sql = "SELECT * FROM tbtransports";
                                $result = $conn->query($sql);
                                $row = mysqli_fetch_array($result);

                                if($result){
                                    if($row['trans_seat'] != 0){
                                        $status_seat = "UPDATE tbtransports SET trans_staus = 1 WHERE trans_id = $id";
                                        $result = $conn->query($status_seat);
                                    }
                                    else{
                                        $status_seat = "UPDATE tbtransports SET trans_staus = 2 WHERE trans_id = $id";
                                        $result = $conn->query($status_seat);
                                    }
                                    echo "<script>alert('จองสำเร็จ')</script>";
                                    echo "<script>window.location='transport.php'</script>";
                                }
                            }
                            else{
                                echo "<script>alert('ไม่สามารถจองได้')</script>";
                                header('Refresh: 0; url=transport.php');
                            }
                    }

                    elseif(mysqli_num_rows($result) > 0){
                        $sql = "SELECT * FROM transports_user WHERE Date = '$date'";
                        $result = $conn->query($sql);

                        if(mysqli_num_rows($result) == 0){
                            $insert = "INSERT INTO transports_user (`ID`,`Service`,`Name`,`Phone`,`Email`,`Length`,`Date`,`Time`)
                            VALUES  ('','$service','$name','$Phone','$Email','$Seat','$date','$time')";
                            $result = $conn->query($insert);

                            if($result){
                                $sql = "SELECT * FROM tbtransports";
                                $result = $conn->query($sql);

                                // Update Tour
                                $count = $_GET['count'] - $_POST['seat-count'];
                            
                                $update = "UPDATE tbtransports
                                    SET trans_seat='$balance'
                                    WHERE trans_id = '$id'";
                                $result = $conn->query($update);

                                $sql = "SELECT * FROM tbtransports";
                                $result = $conn->query($sql);
                                $row = mysqli_fetch_array($result);

                                if($result){
                                    if($row['trans_seat'] != 0){
                                        $status_seat = "UPDATE tbtransports SET trans_staus = 1 WHERE trans_id = $id";
                                        $result = $conn->query($status_seat);
                                    }
                                    else{
                                        $status_seat = "UPDATE tbtransports SET trans_staus = 2 WHERE trans_id = $id";
                                        $result = $conn->query($status_seat);
                                    }
                                    echo "<script>alert('จองสำเร็จ')</script>";
                                    echo "<script>window.location='transport.php'</script>";
                                }
                            }
                            else{
                                echo "<script>alert('ไม่สามารถจองได้')</script>";
                                header('Refresh: 0; url=transport.php');
                            }
                        }
                        else{
                            echo "<script>alert('คุณเคยจองแล้ว กรุณาจองวันอื่น')</script>";
                            echo "<script>window.location='transport.php'</script>";
                        }
                    }

                }



    ?>
<?php
        include('connect.php');
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

            // Add User
            if(isset($_POST['submit'])){
                $id = $_POST['id'];
                $Fname = $_POST['Name'];
                $Phone = $_POST['Phone'];
                $Email = $_POST['Email'];
                $Ticket = $_POST['ticket-count'];
                $count = $_GET['count'];
                $balance = $count - $Ticket;
                    
                    $sql = "SELECT * FROM event_user WHERE Name = '$Fname'";
                    $result = $conn->query($sql);

                    if(mysqli_num_rows($result) == 0){
                        $insert = "INSERT INTO event_user (`ID`,`Name`,`Phone`,`Email`,`Ticket`)
                        VALUES ('','$Fname','$Phone','$Email','$Ticket')";
                        $result = $conn->query($insert);

                            if($result){
                                $sql = "SELECT * FROM tbevents";
                                $result = $conn->query($sql);

                                // Update Tour
                                $count = $_GET['count'] - $_POST['ticket-count'];
                        
                                $update = "UPDATE tbevents
                                    SET event_ticket='$balance'
                                    WHERE event_id = '$id'";
                                $result = $conn->query($update);

                                $sql = "SELECT * FROM tbevents";
                                $result = $conn->query($sql);
                                $row = mysqli_fetch_array($result);

                                if($result){
                                    echo "<script>alert('จองสำเร็จ')</script>";
                                    echo "<script>window.location='event.php'</script>";
                                }
                            }
                            else{
                                echo "<script>alert('ไม่สามารถจองได้')</script>";
                                header('Refresh: 0; url=event.php');
                            }
                    }
                        if(mysqli_num_rows($result) == 0){
                            $insert = "INSERT INTO event_user (`ID`,`Name`,`Phone`,`Email`,`Ticket`)
                            VALUES ('','$Fname','$Phone','$Email','$Ticket')";
                            $result = $conn->query($insert);

                            if($result){
                                $sql = "SELECT * FROM tbevents";
                                $result = $conn->query($sql);

                                // Update Tour
                                $count = $_GET['count'] - $_POST['ticket-count'];
                            
                                $update = "UPDATE tbevents
                                    SET event_ticket='$balance'
                                    WHERE event_id = '$id'";
                                $result = $conn->query($update);

                                $sql = "SELECT * FROM tbevents";
                                $result = $conn->query($sql);
                                $row = mysqli_fetch_array($result);

                                if($result){
                                    if($row['event_ticket'] != 0){
                                        $status_seat = "UPDATE tbevents SET event_status = 1 WHERE trans_id = $id";
                                        $result = $conn->query($status_seat);
                                    }
                                    else{
                                        $status_seat = "UPDATE tbevents SET event_status = 2 WHERE trans_id = $id";
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

                
                        
                        
                        
                        
                        ?>
<?php
    class CRUD {
        function connect() {
            $this->con_db = mysqli_connect('booking.cdchmht6aepu.ap-southeast-1.rds.amazonaws.com','admin','admin1234','dberp');
            if(mysqli_connect_error()){
                die('ไม่สามารถเชื่อมต่อฐานข้อมูลได้') . mysqli_connect_error();
            }
        }

        function register($username,$password,$name,$email,$phone) {
            $conn = $this->con_db;
            $sql = "SELECT * FROM table_members WHERE username = '$username'";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) > 0){
                echo "<script>alert('Username Aleady')</script>";
                echo "<script>window.location='register.php'</script>";
            }
            else{
                $insert = "INSERT INTO table_members(`member_name`,`member_email`,`member_phone`,`username`,`password`) VALUES ('$name','$email','$phone','$username','$password')";
                $result = mysqli_query($conn,$insert);
                echo "<script>alert('Register Success')</script>";
                echo "<script>window.location='login.php'</script>";
            }
        }

        function login($username,$password) {
            $conn = $this->con_db;
            $sql = "SELECT * FROM table_members WHERE `username` = '$username' AND `password` = '$password'";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) == 1){
                echo "<script>window.location='main.php'</script>";
            }
            else{
                echo "<script>alert('Username or Password incorrect')</script>";
                echo "<script>window.location='login.php'</script>";
            }
        }

        function fetchInfo($username) {
            $conn = $this->con_db;
            $sql = "SELECT * FROM table_members WHERE `username` = '$username'";
            $result = mysqli_query($conn,$sql);
            return $result;
        }

        function info() {
            $conn = $this->con_db;
            $sql = "SELECT * FROM table_members";
            $result = mysqli_query($conn,$sql);
            return $result;
        }

        function infoid($id) {
            $conn = $this->con_db;
            $sql = "SELECT * FROM table_members WHERE member_id = '$id'";
            $result = mysqli_query($conn,$sql);
            return $result;
        }

        function update($username,$password,$name,$email,$phone,$id) {
            $conn = $this->con_db;
            $sql = "SELECT * FROM `table_members` WHERE username = '$username'";
            $result = mysqli_query($conn,$result);

            if(mysqli_num_rows($result) == 1){
                echo "<script>alert('Username Aleady')</script>";
                echo "<script>window.location='update.php'</script>";
            }
            else{
                $update = "UPDATE `table_members`
                SET `member_name` = '$name',
                    `member_email` = '$email',
                    `member_phone` = '$phone',
                    `username` = '$username',
                    `password` = '$password'
                WHERE `member_id` = '$id'";
                $result = mysqli_query($conn,$update);

                if($result){
                    echo "<script>alert('Update Success')</script>";
                    echo "<script>window.location='member.php'</script>";
                }
                else{
                    echo "<script>alert('Update Failed')</script>";
                    echo "<script>window.location='member.php'</script>";
                }
            }

        }

        function del($id) {
            $conn = $this->con_db;
            $del = "DELETE FROM `table_members` WHERE member_id = '$id'";
            $result = mysqli_query($conn,$del);

            if($result){
                echo "<script>alert('Delete Success')</script>";
                echo "<script>window.location='member.php'</script>";
            }
            else{
                echo "<script>alert('Delete Failed')</script>";
                echo "<script>window.location='member.php'</script>";
            }
        }
    }

    $obj = new CRUD();
    $obj->connect();
?>
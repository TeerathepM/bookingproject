<?php
    include 'connect.php';
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Delete Tour
    
    if(isset($_GET['id'])){
        $sql = "SELECT * FROM tbtransports";
        $result = $conn->query($sql);

        $id = $_GET['id'];
        $del_sql = "DELETE FROM tbtransports WHERE trans_id = $id";
        $result = $conn->query($del_sql);

        if($result){
            echo "<script>alert('ลบข้อมูลสำเร็จ')</script>";
            echo "<script>window.location='Admin.php';</script>";
        }
        else{
            echo "<script>alert('ลบข้อมูลไม่สำเร็จ')</script>";
            echo "<script>window.location='Admin.php';</script>";
        }
    }
?>
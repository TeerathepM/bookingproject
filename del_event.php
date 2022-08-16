<?php
    include 'connect.php';
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Delete Tour
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbevents";
        $result = $conn->query($sql);
        
        $del_sql = "DELETE FROM `tbevents` WHERE event_id = '$id'";
        $result = $conn->query($del_sql);

        

        if($result){
            echo "<script>alert('ลบข้อมูลสำเร็จ')</script>";
            echo "<script>window.location='Admin-event.php';</script>";
        }
        else{
            echo "<script>alert('ลบข้อมูลไม่สำเร็จ')</script>";
            echo "<script>window.location='Admin-event.php';</script>";
        }
        
    }
?>
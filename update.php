<?php
    include 'connect.php';
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // Update Tour
    $name_tour = $_POST['Input-Tour'];
    $price_tour = $_POST['Input-Price'];
    $detail_tour = $_POST['Input-detail'];
    $seat_tour = $_POST['Input-seat'];
    $id = $_POST['id'];

    $update = "UPDATE tbtransports
        SET trans_name='$name_tour',
            trans_price='$price_tour',
            trans_detail='$detail_tour',
            trans_seat='$seat_tour'
        WHERE trans_id='$id'";
    $result = $conn->query($update);

    $sql = "SELECT * FROM tbtransports WHERE trans_id = '$id'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);

    if($result){
        if($row['trans_seat'] == 0){
            $status_seat = "UPDATE tbtransports SET trans_staus = 2 WHERE trans_id = $id";
            $result = $conn->query($status_seat);
        }
        else{
            $status_seat = "UPDATE tbtransports SET trans_staus = 1 WHERE trans_id = $id";
            $result = $conn->query($status_seat);
        }
        echo "<script>alert('แก้ไขข้อมูลสำเร็จ')</script>";
        header('Refresh: 0; url=Admin.php');
    }
    else{
        echo "<script>alert('แก้ไขข้อมูลผิดพลาด')</script>";
        header('Refresh: 0; url=Admin.php');
    }
?>
<script src="JS/status.js"></script>
<?php
    include 'connect.php';
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // Update ticket
    $name_ticket = $_POST['Input-Name'];
    $price_ticket = $_POST['Input-Price'];
    $detail_ticket = $_POST['Input-detail'];
    $time_ticket = $_POST['Input-Time'];
    $date_ticket = $_POST['Input-Date'];
    $ticket = $_POST['Input-Ticket'];
    isset( $_POST['ID-Ticket'] ) ? $id = $_POST['ID-Ticket'] : $id = "";

    $sql = "SELECT * FROM tbevents WHERE event_id = '$id'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);

    $update = "UPDATE tbevents
        SET event_name='$name_ticket',
            event_price='$price_ticket',
            event_detail='$detail_ticket',
            event_ticket='$ticket',
            event_time='$time_ticket',
            event_date='$date_ticket'
        WHERE event_id='$id'";
    $result = $conn->query($update);

    if($result){
        if($row['event_ticket'] == 0){
            $status_ticket = "UPDATE tbevents SET event_status = 2 WHERE event_id = $id";
            $result = $conn->query($status_ticket);
        }
        else{
            $status_ticket = "UPDATE tbevents SET event_status = 1 WHERE event_id = $id";
            $result = $conn->query($status_ticket);
        }
        echo "<script>alert('แก้ไขข้อมูลสำเร็จ')</script>";
        header('Refresh: 0; url=Admin-event.php');
    }
    else{
        echo "<script>alert('แก้ไขข้อมูลผิดพลาด')</script>";
        header('Refresh: 0; url=Admin-event.php');
    }
?>
<script src="JS/status.js"></script>
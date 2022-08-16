<?php
    include 'connect.php';
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if(isset($_GET['id'])){
        $sql = "SELECT * FROM transports_user";
        $result = $conn->query($sql);
        $fetch_user = mysqli_fetch_array($result);
        $id = $_GET['id'];

        $del = "DELETE FROM transports_user WHERE ID = '$id'";
        $result = $conn->query($del);

        if($result){
            echo "<script>alert('ยกเลิกสำเร็จ')</script>";
            echo "<script>window.location='status.php'</script>";
        }
        else{
            echo "<script>alert('ไม่สามารถยกเลิกได้')</script>";
            echo "<script>window.location='status.php'</script>";
        }
    }
?>
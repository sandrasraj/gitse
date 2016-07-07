<?php
if($_GET){
    $id = $_GET['id'];
    include_once 'db.php';
    $query = sprintf("DELETE FROM orders WHERE id=%d",$id);
    $result = mysqli_query( $link, $query );


    if($result){
        $_SESSION['error'] = array(
            'message' => "Order Deleted Successfully!",
            'type'    => 'success'
        );


        header('location:orders.php');
        exit();
    } else {
        $_SESSION['error'] = array(
            'message' => "Failed to delete.",
            'type'    => 'danger'
        );


        header('location:orders.php');
        exit();
    }

}
<?php
if($_GET){
    $id = $_GET['id'];
    include_once 'db.php';
    $query = sprintf("DELETE FROM products WHERE id=%d",$id);
    $result = mysqli_query( $link, $query );

    //delete images 
    $queryFlower = sprintf("DELETE FROM products WHERE id=%d",$id);
    $resultFlower = mysqli_query( $link, $queryFlower );

    if($result){
        $_SESSION['error'] = array(
            'message' => "Deleted product Succesfully",
            'type'    => 'success'
        );


        header('location:list-product.php');
        exit();
    } else {
        $_SESSION['error'] = array(
            'message' => "Failed to delete.",
            'type'    => 'danger'
        );


        header('location:list-product.php');
        exit();
    }

}
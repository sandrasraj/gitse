<?php
if($_GET){
    $id = $_GET['id'];
    include_once 'db.php';
    $query = sprintf("DELETE FROM category WHERE id=%d",$id);
    $result = mysqli_query( $link, $query );
    if($result){
        $_SESSION['error'] = array(
            'message' => "Deleted category Succesfully",
            'type'    => 'success'
        );


        header('location:list_category.php');
        exit();
    } else {
        $_SESSION['error'] = array(
            'message' => "Failed to delete.",
            'type'    => 'danger'
        );


        header('location:list_category.php');
        exit();
    }

}
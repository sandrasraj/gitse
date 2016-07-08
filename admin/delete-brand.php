<?php
if($_GET){
    $id = $_GET['id'];
    include_once 'db.php';
    $query = sprintf("DELETE FROM brands WHERE id=%d",$id);
    $result = mysqli_query( $link, $query );

    //delete images 
    $queryimage = sprintf("DELETE FROM images WHERE brand_id=%d",$id);
    $resultimage = mysqli_query( $link, $queryimage );

    if($result){
        $_SESSION['error'] = array(
            'message' => "Deleted brand Succesfully",
            'type'    => 'success'
        );


        header('location:list-brand.php');
        exit();
    } else {
        $_SESSION['error'] = array(
            'message' => "Failed to delete.",
            'type'    => 'danger'
        );

        header('location:list-brand.php');
        exit();
    }

}
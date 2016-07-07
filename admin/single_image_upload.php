<?php

if ($_POST) {
    include_once 'db.php';
    $product_id = $_POST['id'];

    $query = sprintf("SELECT * FROM products WHERE id=%d", $product_id);
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    $product_image_name = $row['image'];
//    $product_id = $row['product_id'];
    //PHP Upload Script
    if (!is_dir("images")) {
        mkdir("images");
    }

    $max_size = 30000;          // maximum file size, in KiloBytes
    $allowtype = array('jpg', 'jpeg');        // allowed extensions

    if (isset($_FILES['fileToUpload']) && strlen($_FILES['fileToUpload']['name']) > 1) {

        $sepext = explode('.', strtolower($_FILES['fileToUpload']['name']));
        $type = array_pop($sepext);       // gets extension
        $err = '';         // to store the errors
        // Checks if the file has allowed type and size
        if (!in_array($type, $allowtype)) {
            $err .= 'The file: <b>' . $_FILES['fileToUpload']['name'] . '</b> doesnot not have the allowed extension type.';
        }
        if ($_FILES['fileToUpload']['size'] > $max_size * 1000) {
            $err .= '<br/>Maximum file size is: ' . $max_size . ' KB.';
        }

//        $img_q = sprintf("DELETE FROM products WHERE image='%s'", $product_image_name);
//        mysqli_query($link, $img_q);
        $uploadpath = 'images/' . 
        chmod($uploadpath, 0644);
        unlink($uploadpath);

        $uploadpath = "images/".date('Ymd-hms').".".$type;

        // If no errors, upload the image, else, output the errors
        if ($err == '') {
            if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadpath)) {
                $query = sprintf("UPDATE products SET image='%s' WHERE id=%d", $uploadpath, $product_id);
                $result = mysqli_query($link, $query);
                $_SESSION['error'] = array(
                    'message' => 'Image Sucessfully Edited!',
                    'type' => 'success'
                );

                die();
            } else {
                $_SESSION['error'] = array(
                    'message' => "Image Upload Failed",
                    'type' => 'danger'
                );

                die();
            }
        } else {
            $_SESSION['error'] = array(
                'message' => $err,
                'type' => 'danger'
            );
           
            die();
        }
    }
}
?>
<?php
include_once "../config/dbconnect.php";

if(isset($_POST['upload']))
{
    $barcode = $_POST['barcode'];
    $category = $_POST['prod_category'];
    $desc = $_POST['prod_desc'];
    $price = $_POST['prod_price'];
    $stock = $_POST['stock'];

    $name = $_FILES['prod_file']['name'];
    $temp = $_FILES['prod_file']['tmp_name'];

    $location = "./uploads/";
    $image = $location . $name;

    $target_dir = "../uploads/";
    $finalImage = $target_dir . $name;

    move_uploaded_file($temp, $finalImage);

    $insert = mysqli_query($conn, "INSERT INTO product (barcode, product_name, product_image, price, product_desc, category_id, stock) VALUES ('$barcode', '$desc', '$image', $price, '$desc', '$category', $stock)");

    if (!$insert) {
        echo mysqli_error($conn);
    } else {
        echo "Records added successfully.";
    }
}
?>

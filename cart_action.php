<?php 
session_start();
include "admin/include/db_conn.php";
    //print_r($_POST['name']);
    $item = implode(',', $_POST['name']);

    $price = implode(',', $_POST['price']);

    $qty = implode(',', $_POST['qty']);

    $amount = implode(',', $_POST['amount']);

    $total = $_POST['total'];

    $customer_id = $_SESSION['id'];

    $sql = "insert into order_details (customer_id, item_name, item_price, item_qty, item_amount, total)
    values( '{$customer_id}', '{$item}', '{$price}', '{$qty}', '{$amount}', '{$total}')";
    if(mysqli_query($conn, $sql)){
        echo "Order successfully.you will call soon.";
        unset($_SESSION['cart']);
    }


?>
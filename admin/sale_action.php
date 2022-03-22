<?php 
    include "include/db_conn.php";
    
    $customer = $_POST['customer'];
    $payment = $_POST['payment-type'];
    $product = implode(",",$_POST['product']);
    $rate = implode(",",$_POST['rate']);
    $qty = implode(",",$_POST['quantity']);
    $amount = implode(",",$_POST['amount']);
    $total_qty = $_POST['total_qty'];
    $total_amt = $_POST['total_amt'];

    // echo $product."<br>";
    // echo $rate."<br>";
    // echo $qty."<br>";
    // echo $amount."<br>";
    // echo $total_qty."<br>";
    // echo $total_amt."<br>";

    $sql = "insert into sale (customer_name, payment_type, product, rate, qty, amount, total_qty, total_amt)
     values('{$customer}', '{$payment}', '{$product}', '{$rate}', '{$qty}', '{$amount}', '{$total_qty}', '{$total_amt}')";
     if(mysqli_query($conn, $sql)){
         echo "insert succesfully";
     }

?>
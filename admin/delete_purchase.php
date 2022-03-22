<?php 

    include('include/db_conn.php');
    $id = $_GET['id'];
    $sql = 'delete from new_purchase where invoice_number ='.$id;
    if(mysqli_query($conn, $sql)){
        echo "<script>
                alert('delete Succesfully');
                window.location.href = 'manage_purchase.php';
                </script>"; 
    }
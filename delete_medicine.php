<?php 
    include('include/db_conn.php');
    $id = $_GET['id'];
    $sql = 'delete from medicines where id ='.$id;
    if(mysqli_query($conn, $sql)){
        echo "<script>
                alert('delete Succesfully');
                window.location.href = 'manage_medicine.php';
                </script>"; 
    }
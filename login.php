<?php 
include "admin/include/db_conn.php";
  if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "select * from customers where EMAIL = '{$email}' and PASS = '{$password}'";
    $table = mysqli_query($conn, $sql);
    if(mysqli_num_rows($table) > 0){

      while($row= mysqli_fetch_assoc($table)){
        session_start();
        $_SESSION['id'] = $row['ID'];
        $_SESSION['name'] = $row['NAME'];
        echo "<script>
          alert('login successfully');
          window.location.href='all-item.php';
        </script>";
      }
      
    }else{
      echo "<script>
          alert('User and password not matched');
          window.location.href='all-item.php';
        </script>";
    }
  }
?>
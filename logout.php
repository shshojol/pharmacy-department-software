<?php 
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    session_destroy();
    echo "<script>
          alert('logout successfully');
          window.location.href='all-item.php';
        </script>";
?>
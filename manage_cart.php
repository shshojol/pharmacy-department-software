<?php 
    //print_r($_POST);
    session_start();

if(isset($_SESSION['id'])){
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['add_to_cart'])) {
            if (isset($_SESSION['cart'])) {
                $myitem = array_column($_SESSION['cart'], 'item_name');
                if(in_array($_POST['item_name'], $myitem)){
                    echo "<script>
                        alert('Item alreay exits');
                        window.location.href='all-item.php';
                    </script>";
                }else{
                    $count =  count($_SESSION['cart']);
                    $_SESSION['cart'][$count] = array('item_name' => $_POST['item_name'], 'item_price' => $_POST['item_price']);
                         echo "<script>
                             alert('Item Added');
                             window.location.href='all-item.php';
                         </script>";
                }
              
            } else {
                $_SESSION['cart'][0] = array('item_name' => $_POST['item_name'], 'item_price' => $_POST['item_price']);
                echo "<script>
                        alert('Item Added');
                        window.location.href='all-item.php';
                    </script>";
            }
        }
    }
}else{
    echo "<script>
            alert('You have to login first');
            window.location.href='all-item.php';
        </script>";
}
?>
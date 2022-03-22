<?php
include "include/header.php";
include "admin/include/db_conn.php";

//session_destroy();
//print_r($_SESSION['cart']);
?>
<div class="container">
    <div class="row">
        <?php
        $sql = "select * from medicines";
        $table = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($table)) {
        ?>
            <div class="col-lg-2" style="margin:5px;">
                <form action="manage_cart.php" method="post">
                    <div class="card">
                        <div class="card-body">
                            <img class="card-img-top" width="80" height="60" src="admin/upload/medicine/<?php echo $row['image']; ?>" alt="Card image cap">
                            <h5 class="card-title"><?php echo $row['NAME']; ?></h5>
                            <p><?php echo $row['RATE']; ?>tk.</p>
                            <input type="hidden" name="item_name" value="<?php echo $row['NAME']; ?>">
                            <input type="hidden" name="item_price" value="<?php echo $row['RATE']; ?>">
                            <button type="submit" class="btn btn-primary text-center" name="add_to_cart">add to cart</button>
                        </div>
                    </div>
                </form>
            </div>
        <?php } ?>
    </div>
</div>
<!-- Trigger the modal with a button -->
<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter password" id="pwd" required>
                    </div>
                    <div class="form-group form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox"> Remember me
                        </label>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<?php
include "include/footer.php";
?>
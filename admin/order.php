<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location:login.php');
}
include('include/db_conn.php');
include('include/header.php');
include('include/sidebar.php');

?>

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Order Medicine</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">

                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>Customer Number</th>
                                <th>Customer Address</th>
                                <th>Medicine Name</th>
                                <th> Price</th>
                                <th>Quantity</th>
                                <th>Amount</th>
                                <th>Grand Total</th>
                                <th>DATE</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                                $sql = "SELECT customers.NAME, customers.CONTACT_NUMBER, customers.ADDRESS,od.id, od.item_name, od.item_price, od.item_qty, od.item_amount, od.total,od.date
                                FROM order_details  as od 
                                INNER JOIN customers ON od.customer_id = customers.ID order by od.id DESC";
                                $table = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_assoc($table)){
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row['NAME']; ?></td>
                                <td><?php echo $row['CONTACT_NUMBER']; ?></td>
                                <td><?php echo $row['ADDRESS']; ?></td>
                                <td><?php echo $row['item_name']; ?></td>
                                <td><?php echo $row['item_price']; ?></td>
                                <td><?php echo $row['item_qty']; ?></td>
                                <td><?php echo $row['item_amount']; ?></td>
                                <td><?php echo $row['total']; ?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td class="text-right">
                                    <a href=""><button id='pending' class="btn  btn-outline-success">Pending</button></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>
<div class="sidebar-overlay" data-reff=""></div>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/Chart.bundle.js"></script>
<script src="assets/js/chart.js"></script>
<script src="assets/js/app.js"></script>
<script>
    $(document).ready(function(){
        $('#pending').click(function(e){
            e.preventDefault();
            $('#pending').text('Delivered');
        });
    });
</script>
</body>


<!-- Mirrored from preclinic.dreamguystech.com/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 31 Jan 2021 14:17:55 GMT -->

</html>
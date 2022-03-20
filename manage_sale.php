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
                <h4 class="page-title">Manage Sale</h4>
            </div>
        </div>
        <form action="" method="post">
            <div class="row">
                <div class="col-sm-6 col-md-2">
                    <div class="form-group">
                        <input type="date" class="form-control" name="start_date">
                    </div>
                </div>
                <div class="col-sm-6 col-md-2">
                    <div class="form-group">
                        <input type="date" class="form-control" name="end_date">
                    </div>
                </div>
                     <div class="form-group">
                        <input type="submit" class="form-control btn btn-primary" name="submit" value="Search" style="margin-top:29px;">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-primary" name="reset" value="Reset" style="margin-top:29px;">
                    </div>
            </div>
        </form>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">

                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th>Invoice Number</th>
                                <th>Customer Name</th>
                                <th>Medicine Name</th>
                                <th>Sale Date</th>
                                <th>Payment Type</th>
                                <th>Total Quantity</th>
                                <th>Total Amount</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "select * from sale order by sale_invoice DESC";
                                $table = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_assoc($table)){
                            ?>
                            <tr>
                                
                                <td><?php echo $row['sale_invoice']; ?></td>
                                <td> 
                                    <?php 
                                        $supplier_name = "select NAME from customers where ID = ".$row['customer_name'];
                                        $supplier_result = mysqli_query($conn, $supplier_name);
                                        while($supplier_row = mysqli_fetch_assoc($supplier_result)){
                                            echo $supplier_row['NAME'];
                                        }
                                    ?>
                                </td>
                                <td><?php echo $row['product']; ?></td>
                                <td><?php echo $row['sale_date']; ?></td>
                                <td><?php echo $row['payment_type']; ?></td>
                                <td><?php echo $row['total_qty']; ?></td>
                                <td><?php echo $row['total_amt']; ?></td>
                                
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" target="_blank" href="purchase_invoice/sale_invoice.php?id=<?php echo $row['sale_invoice']; ?>"><i class="fa fa-pencil m-r-5"></i>Download Invoice pdf</a>
                                            <a class="dropdown-item" href="delete_sale.php?id=<?php echo $row['sale_invoice']; ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
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

<div class="sidebar-overlay" data-reff=""></div>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/Chart.bundle.js"></script>
<script src="assets/js/chart.js"></script>
<script src="assets/js/app.js"></script>

</body>


<!-- Mirrored from preclinic.dreamguystech.com/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 31 Jan 2021 14:17:55 GMT -->

</html>
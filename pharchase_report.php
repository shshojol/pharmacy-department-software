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
                <h4 class="page-title">Purchase Report</h4>
            </div>
        </div>
        <form action="" method="post">
            <div class="row">
                <div class="col-sm-6 col-md-2">
                    <div class="form-group">
                        <label>Start Date<span class="text-danger" >*</span></label>
                        <input type="date" class="form-control" name="start_date">
                    </div>
                </div>
                <div class="col-sm-6 col-md-2">
                    <div class="form-group">
                        <label>End Date<span class="text-danger">*</span></label>
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
                                <th>Supplier Name</th>
                                <th>Medicine Name</th>
                                <th>Purchase Date</th>
                                <th>Payment Type</th>
                                <th>Total Quantity</th>
                                <th>Total Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(isset($_POST['reset'])){
                                $sql = "select * from new_purchase order by invoice_number DESC";
                            }
                                if(isset($_POST['submit'])){
                                    $start_date = $_POST['start_date'];
                                    $end_date = $_POST['end_date'];

                                    $sql = "select * from new_purchase";
                                    if(!empty($_POST['start_date']) AND empty($end_date)){
                                        $sql .= " where purchase_date = '{$start_date}'";
                                    }
                                    elseif(!empty($_POST['start_date']) AND !empty($_POST['start_date']) ){
                                        $sql .= " WHERE purchase_date BETWEEN '{$start_date}' AND '{$end_date}'";
                                    }else{}

                                }else{
                                    $sql = "select * from new_purchase order by invoice_number DESC";
                                }
                            
                                
                                $table = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_assoc($table)){
                            ?>
                            <tr>
                                <td><?php echo $row['invoice_number']; ?></td>
                                <td> 
                                    <?php 
                                        $supplier_name = "select NAME from suppliers where id = ".$row['supplier_name'];
                                        $supplier_result = mysqli_query($conn, $supplier_name);
                                        while($supplier_row = mysqli_fetch_assoc($supplier_result)){
                                            echo $supplier_row['NAME'];
                                        }
                                    ?>
                                </td>
                                <td><?php echo $row['product']; ?></td>
                                <td><?php echo $row['purchase_date']; ?></td>
                                <td><?php echo $row['payment_type']; ?></td>
                                <td><?php echo $row['total_qty']; ?></td>
                                <td class="amount"><?php echo $row['total_amt']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2"></th>
                                <th>
                                    <span id="total_qty"></span>
                                </th>
                                <th></th>
                                <th></th>
                                <th>Total Purchases</th>
                                <th><span id="total_amt"></span> tk</th>
                            </tr>
                        </tfoot>
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
<script>
    $(document).ready(function(){
        var z =0;
        $(".amount").each(function() {   
            $('#total_amt').text( z = z + parseInt($(this).text()) );               
         });
    });
</script>
</body>


<!-- Mirrored from preclinic.dreamguystech.com/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 31 Jan 2021 14:17:55 GMT -->

</html>
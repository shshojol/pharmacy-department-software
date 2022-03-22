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
                <h4 class="page-title">Add Purchase</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form action="#" method="post" id="add_form">
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Supplier Name<span class="text-danger">*</span></label>
                                <select class="form-control" name="supplier" id="">
                                    <!-- <option value="">Select Supplier Name</option> -->
                                    <?php
                                    $sql3 = "select * from suppliers";
                                    $table3 = mysqli_query($conn, $sql3);
                                    while ($row3 = mysqli_fetch_assoc($table3)) {
                                    ?>
                                        <option value="<?php echo $row3['ID']; ?>"><?php echo  $row3['NAME']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Payment Type<span class="text-danger">*</span></label>
                                <select class="form-control" name="payment-type">
                                    <option value="Cash payment">Cash Payment</option>
                                    <option value="Banking">Banking</option>
                                    <option value="Payment Due">Payment Due</option>
                                </select>
                            </div>
                        </div>



                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-hover table-white">
                                    <thead>
                                        <tr>
                                            
                                            <th  class="col-sm-2">Medicine</th>

                                            <th >Rate</th>
                                            <th >Quantity</th>
                                            <th >Amount</th>
                                            <th> </th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr id="master">
                                            
                                            <td>
                                                <input class="form-control product" name="product[]" type="text" required>
                                            </td>

                                            <td>
                                                <input class="form-control rate" name="rate[]"  type="text" required>
                                            </td>
                                            <td>
                                                <input class="form-control quantity" name="quantity[]"  type="text" required>
                                            </td>
                                            <td>
                                                <input class="form-control form-amt amount" name="amount[]"  readonly=""  type="text" required>
                                            </td>
                                            <td>
                                                
                                                <input type="button" class="btn btn-primary add" value="ADD">
                                            </td>
                                            <td>
                                                
                                                <input type="button" class="btn btn-danger del" value="REMOVE">
                                            </td>
                                        </tr>
                                   
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="2">Total</th>
                                            <th>
                                                <span id="total_qty"></span> Items
                                                <!-- <input class="form-control" type="number" id="total_qty" name="total_qty"> Items -->
                                            </th>
                                            <th></th>
                                            <th>Grand Total</th>
                                            <th><span id="total_amt"></span> tk</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="text-center m-t-20">
                        <!-- <button class="btn btn-grey submit-btn m-r-10">Save & Send</button> -->
                        <button class="btn btn-primary submit-btn" id="add_btn">Save</button>
                    </div>
                </form>
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
    $(document).ready(function() {
        //add row
        $("table").on("click", ".add", function() {
            // Clone the #master, remove the id from the clone and append it to body.
            $('#master').clone().removeAttr('id').appendTo('tbody');
        });


        //delete row
        $("table").on("click", ".del", function() {
            // Remove the parent TR tag completely from DOM.
            $(this).closest("tr").remove();
        });

        $('table').on('input', 'input', function() {
            $('tbody tr').each(function() {
                // Cache the value of the current row.
                $this = $(this);

                // Do this only if this is not the master row.
                //if (this.id != "master")

                // Set the value of .Amount here (making sure you set it to integer multiplying two values).
                $this.find(".amount").val(+$this.find(".quantity").val() * +$(this).find(".rate").val());

                $("#total_amt, #total_qty").text(0);

                $(".amount").each(function() {
                    if (this.value != "")
                        $("#total_amt").text(parseInt($("#total_amt").text()) + parseInt($(this).val()));
                });
                $(".quantity").each(function() {
                    if (this.value != "")
                        $("#total_qty").text(parseInt($("#total_qty").text()) + parseInt($(this).val()));
                });

            });
        });

        $("#add_form").submit(function(e){
            e.preventDefault();
            var total_qty = $('#total_qty').text();
            var total_amt = $('#total_amt').text();
           
            $("#add_btn").val('adding....');
            $.ajax({
                url: 'purchase_action.php',
                method: 'post',
                data: $(this).serialize() + "&total_qty="+total_qty + "&total_amt="+total_amt,
                success: function(data){
                alert('Purchase Succesfully'); 
                // alert('Purchase Succesfully');
                window.location.href = 'manage_purchase.php';
                
                }
                
            });
        });


    });
</script>

</body>


<!-- Mirrored from preclinic.dreamguystech.com/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 31 Jan 2021 14:17:55 GMT -->

</html>
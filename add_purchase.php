<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location:login.php');
}
include('include/db_conn.php');
include('include/header.php');
include('include/sidebar.php');

$name = '';
$email = '';
$contact = '';
$address = '';


$ename = '';
$eemail = '';
$econtact = '';
$eaddress = '';


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];


    $er = 0;
    if (empty($name)) {
        $er++;
        $ename = "Required";
    }
    if (empty($email)) {
        $er++;
        $eemail = "Required";
    }
    if (empty($contact)) {
        $er++;
        $econtact = "Required";
    }
    if (empty($address)) {
        $er++;
        $eaddress = "Required";
    }
    if ($er == 0) {
        $sql = "INSERT INTO suppliers(NAME, EMAIL, CONTACT_NUMBER, ADDRESS) 
            VALUES ('$name', '$email', '$contact','$address')";
        if (mysqli_query($conn, $sql)) {

            echo "<script>
                alert('Add Succesfully');
                window.location.href = 'manage_supplier.php';
                </script>";
        }
    }
}

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
                <form>
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Supplier Name<span class="text-danger">*</span></label>
                                <select class="form-control" name="supplier" id="">
                                    <option value="">Select Supplier Name</option>
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
                                    <option value="0">Cash Payment</option>
                                    <option value="1">Banking</option>
                                    <option value="2">Payment Due</option>
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
                                            <th style="width: 120px;">#</th>
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
                                                <input class="form-control sl" type="text" >
                                            </td>
                                            <td>
                                                <input class="form-control product" type="text" >
                                            </td>

                                            <td>
                                                <input class="form-control rate"  type="text">
                                            </td>
                                            <td>
                                                <input class="form-control quantity"  type="text">
                                            </td>
                                            <td>
                                                <input class="form-control form-amt amount" readonly=""  type="text">
                                            </td>
                                            <td>
                                                <!-- <a href="#" class="add" class="text-success font-18" title="Add"><i class="fa fa-plus"></i></a> -->
                                                <input type="button" class="btn btn-primary add" value="ADD">
                                            </td>
                                            <td>
                                                <!-- <input type="button" value="&times;" class="del" /> -->
                                                <input type="button" class="btn btn-danger del" value="REMOVE">
                                            </td>
                                        </tr>
                                   
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="2">Total</th>
                                            <th><span id="total_qty"></span> Items</th>
                                            <th></th>
                                            <th>Grand Total</th>
                                            <th><span id="total_amt"></span> tk</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- <div class="table-responsive">
                                <table class="table table-hover table-white">
                                    <tfoot>
                                        <tr>
                                            <th colspan="2">Total</th>
                                            <th><span id="total_qty"></span> Items</th>
                                            <th></th>
                                            <th>Grand Total</th>
                                            <th><span id="total_amt"></span> tk</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div> -->
                        </div>
                    </div>
                    <div class="text-center m-t-20">
                        <button class="btn btn-grey submit-btn m-r-10">Save & Send</button>
                        <button class="btn btn-primary submit-btn">Save</button>
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

    });
</script>

</body>


<!-- Mirrored from preclinic.dreamguystech.com/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 31 Jan 2021 14:17:55 GMT -->

</html>
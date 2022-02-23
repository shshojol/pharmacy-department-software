<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location:login.php');
}
include('include/db_conn.php');
include('include/header.php');
include('include/sidebar.php');

$id = $_GET['id'];




if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $packing = $_POST['packing'];
    $generic_name = $_POST['generic_name'];
    $supplier = $_POST['supplier'];

    $er = 0;
    
    if ($er == 0) {
        $sql = "UPDATE medicines SET NAME='$name', PACKING = '$packing', GENERIC_NAME = '$generic_name', SUPPLIER_NAME = '$supplier'
             WHERE id = " . $id;

        if (mysqli_query($conn, $sql)) {

            echo "<script>
                alert('update Succesfully');
                window.location.href = 'manage_medicine.php';
                </script>";
        }
    }
}

//fetch table query

$sql2 = 'select * from medicines where id = ' . $id;
$table2 = mysqli_query($conn, $sql2);
while ($row2 = mysqli_fetch_assoc($table2)) {
?>

    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Update Medicine</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-box">
                        <h4 class="card-title">Update supplier form</h4>
                        <form action="" method='post'>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Name</label>
                                <div class="col-md-9">
                                    <input type="text" required name='name' value="<?php echo $row2['NAME']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Packing</label>
                                <div class="col-md-9">
                                    <input type="text" required name='packing' value="<?php echo $row2['PACKING']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Generic Name</label>
                                <div class="col-md-9">
                                    <input type="text" required name='generic_name' value="<?php echo $row2['GENERIC_NAME']; ?>" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Supplier</label>
                                <div class="col-md-9">
                                    
                                    <select class="form-control" name="supplier" id="">
                                        <option value="" style="display:none">Select Supplier Name</option>
                                        <?php
                                        $sql3 = "select * from suppliers";
                                        $table3 = mysqli_query($conn, $sql3);
                                        while ($rw = mysqli_fetch_assoc($table3)) {
                                        ?>
                                            <option  value="<?php echo $rw['ID']; ?>"<?php if($row2['SUPPLIER_NAME']==$rw['ID']) echo "selected"; ?>><?php echo  $rw['NAME']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" name='submit' class="btn btn-primary">Submit</button>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php } ?>
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
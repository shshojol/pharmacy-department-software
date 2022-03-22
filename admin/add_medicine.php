<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location:login.php');
}
include('include/db_conn.php');
include('include/header.php');
include('include/sidebar.php');

$name = '';
$packing = '';
$generic_name = '';
$supplier = '';
$quantity = '';
$mrp = '';
$rate = '';



if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $packing = $_POST['packing'];
    $generic_name = $_POST['generic_name'];
    //$quantity = $_POST['quantity'];
    $rate = $_POST['rate'];
    $supplier = $_POST['supplier'];


    $image = $_FILES['image']['name'];
        $target_dr_name = "upload/medicine/";
        $target_file_dr_image = $target_dr_name . basename($_FILES['image']['name']);
        
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file_dr_image, PATHINFO_EXTENSION));
        
        // valid file extansion
        $extentsions_arr = array("jpg","jepg","png");


         // Check extention is valid or not
         if(in_array($imageFileType, $extentsions_arr)) {
            
            // Upload file
            $is_upload_dr_image = move_uploaded_file($_FILES['image']['tmp_name'], $target_dr_name.$image);
            
            if($is_upload_dr_image) {
                
                // Deprtment Add Query
                $sql_serv_insert =  "INSERT INTO medicines(NAME, PACKING, GENERIC_NAME, SUPPLIER_NAME, image, RATE) 
                VALUES ('$name', '$packing', '$generic_name','$supplier','$image', '$rate')";
               
                $sql_serv_result = $conn->query($sql_serv_insert);

                if($sql_serv_result === TRUE) {
                  echo "<script>
                  alert('Add Succesfully');
                  window.location.href = 'manage_medicine.php';
                  </script>";  
                } else {
                  echo "<script>alert('Sorry ! Could not add the medicine, Try Again');</script>"; 
                }
            } else {
                echo "<script>alert('Sorry ! Could not upload image, Try Again');</script>";  
            }
        } else {
           echo "<script>alert('Sorry ! Inalid extension detected, Try Again');</script>"; 
        }  

    // $er = 0;

    // if ($er == 0) {
    //     $sql = "INSERT INTO medicines(NAME, PACKING, GENERIC_NAME, SUPPLIER_NAME, QUANTITY, MRP, RATE) 
    //         VALUES ('$name', '$packing', '$generic_name','$supplier', '$quantity', '$mrp', '$rate')";
    //     if (mysqli_query($conn, $sql)) {

    //         echo "<script>
    //             alert('Add Succesfully');
    //             window.location.href = 'manage_medicine.php';
    //             </script>";
    //     }
    // }
}


//add modal supplier
if (isset($_POST['add_supplier'])) {
    $supplier_name = $_POST['supplier_name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $er = 0;
    if ($er == 0) {
        $sql = "INSERT INTO suppliers(NAME, EMAIL, CONTACT_NUMBER, ADDRESS) 
            VALUES ('$supplier_name', '$email', '$contact','$address')";
        if (mysqli_query($conn, $sql)) {

            echo "<script>
                alert('Add Succesfully');

                </script>";
        }
    }
}
?>

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Add Medicine</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card-box">
                    <h4 class="card-title">Add Medicine form</h4>
                    <form action="" method='post' enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Medicine Name</label>
                            <div class="col-md-5">
                                <input type="text" name='name' placeholder="Medicine Name" value='<?php echo $name; ?>' class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name='packing' placeholder="Packing e.g. 10 TAB / 100 ML" value='<?php echo $packing; ?>' class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Generic Name</label>
                            <div class="col-md-9">
                                <input type="text" name='generic_name' placeholder="Generic Name" value='<?php echo $generic_name; ?>' class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Medicine Rate</label>
                            <div class="col-md-9">
                                <input type="text" name='rate' placeholder="Medicine Rate(BDT)" value='<?php echo $rate; ?>' class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Medicine Image</label>
                            <input class="col-md-9" type="file" class="form-control border" name="image" required>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Supplier</label>
                            <div class="col-md-9">

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



                        <div class="">
                            <a href="" class="btn btn-primary" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm">
                                + Add New Supplier</a>
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

<!-- add new supplier show modal form -->
<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method='post'>
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Add New Supplier</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="form34">Name</label>
                        <input type="text" required name='supplier_name' placeholder="supplier name" id="form34" class="form-control validate">
                    </div>

                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="form29">Email</label>
                        <input type="email" required name='email' placeholder="supplier name" id="form29" class="form-control validate">

                    </div>

                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="form32">Contact Number</label>
                        <input type="text" required id="form32" name='contact' placeholder="supplier contact number" class="form-control validate">

                    </div>

                    <div class="md-form">
                        <label data-error="wrong" data-success="right" for="form8">Address</label>
                        <textarea type="text" required name='address' id="form8" placeholder="supplier address" class="md-textarea form-control" rows="4"></textarea>

                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <input type="submit" class="btn btn-primary" name='add_supplier' value="Add Supplier">
                    <!-- <button class="btn btn-primary" name='add_supplier' type='submit'>Add Supplier</button> -->
                </div>
            </div>
        </form>

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
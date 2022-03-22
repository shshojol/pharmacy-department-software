<?php
session_start();
if(!isset($_SESSION['id']))
{
    header('location:login.php');
}
    include('include/db_conn.php');
    include('include/header.php');
    include('include/sidebar.php');
    
    $id = $_GET['id'];

    $ename = '';
    $econtact = '';
    $eaddress = '';
    $edoctor = '';
    $edoc_number = '';

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $doctor = $_POST['doctor'];
        $doc_number = $_POST['doc_number'];

        $er = 0;
        if(empty($name)){
            $er++;
            $ename = "Required";
        }
        if(empty($contact)){
            $er++;
            $econtact = "Required";
        }
        if(empty($address)){
            $er++;
            $eaddress = "Required";
        }
        // if(empty($doctor)){
        //     $er++;
        //     $edoctor = "Required";
        // }
        // if(empty($doc_number)){
        //     $er++;
        //     $edoc_number = "Required";
        // }
        if($er == 0){
            $sql = "UPDATE customers SET NAME='$name', CONTACT_NUMBER = '$contact', ADDRESS = '$address',
            DOCTOR_NAME ='$doctor', DOCTOR_NUMBER ='$doc_number' WHERE id = ".$id;

            if(mysqli_query($conn, $sql)){
            
                echo "<script>
                alert('update Succesfully');
                window.location.href = 'manage_customer.php';
                </script>";      
            }
        }

    }

    //fetch table query
    
    $sql2 = 'select * from customers where id = '.$id;
    $table2 = mysqli_query($conn, $sql2);
    while($row2 = mysqli_fetch_assoc($table2)){
?>
        
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Update Customer</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-box">
                            <h4 class="card-title">Update Customer form</h4>
                            <form action="" method='post'>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name='name' value="<?php echo $row2['NAME']; ?>" class="form-control"><?php echo $ename; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Contact Number</label>
                                    <div class="col-md-9">
                                        <input type="text" name='contact' value="<?php echo $row2['CONTACT_NUMBER']; ?>" class="form-control"><?php echo $econtact; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Address</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control"  name="address" id="" cols="30" rows="10"><?php echo $row2['ADDRESS']; ?></textarea><?php echo $eaddress; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Doctor's name</label>
                                    <div class="col-md-9">
                                        <input type="text" name='doctor' value="<?php echo $row2['DOCTOR_NAME']; ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Doctor's Contact Number</label>
                                    <div class="col-md-9">
                                        <input type="text" name='doc_number' value="<?php echo $row2['DOCTOR_NUMBER']; ?>" class="form-control">
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
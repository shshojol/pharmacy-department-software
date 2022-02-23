<?php
session_start();
if(!isset($_SESSION['id']))
{
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


    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];


        $er = 0;
        if(empty($name)){
            $er++;
            $ename = "Required";
        }
        if(empty($email)){
            $er++;
            $eemail = "Required";
        }
        if(empty($contact)){
            $er++;
            $econtact = "Required";
        }
        if(empty($address)){
            $er++;
            $eaddress = "Required";
        }
        if($er == 0){
            $sql = "INSERT INTO suppliers(NAME, EMAIL, CONTACT_NUMBER, ADDRESS) 
            VALUES ('$name', '$email', '$contact','$address')";
            if(mysqli_query($conn, $sql)){
            
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
                        <h4 class="page-title">Add Supplier</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-box">
                            <h4 class="card-title">Add Supplier form</h4>
                            <form action="" method='post'>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name='name' value='<?php echo $name; ?>' class="form-control"><?php echo $ename; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" name='email' value='<?php echo $email; ?>' class="form-control"><?php echo $eemail; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Contact Number</label>
                                    <div class="col-md-9">
                                        <input type="text" name='contact' value='<?php echo $contact; ?>' class="form-control"><?php echo $econtact; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Address</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control"  name="address" id="" cols="30" rows="10"><?php echo $address; ?></textarea><?php echo $eaddress; ?>
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
<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location:login.php');
}
include('include/db_conn.php');
include('include/header.php');
include('include/sidebar.php');

$id = $_GET['id'];




// if (isset($_POST['submit'])) {
//     $name = $_POST['name'];
//     $packing = $_POST['packing'];
//     $generic_name = $_POST['generic_name'];
//     $supplier = $_POST['supplier'];
//     $rate = $_POST['rate'];

//     $er = 0;

//     if ($er == 0) {
//         $sql = "UPDATE medicines SET NAME='$name', PACKING = '$packing', GENERIC_NAME = '$generic_name', SUPPLIER_NAME = '$supplier', RATE = '{$rate}'
//              WHERE id = " . $id;

//         if (mysqli_query($conn, $sql)) {

//             echo "<script>
//                 alert('update Succesfully');
//                 window.location.href = 'manage_medicine.php';
//                 </script>";
//         }
//     }
// }


if(isset($_POST['submit']))
{

    $er = 0;
    if(empty($_FILES['image']['name']))
    {
        $img_name = $_POST['old-image'];
    }else{
        $img_name = $_FILES['image']['name'];
        $ext = explode('.' , $img_name);
        if(is_array($ext) && count($ext) > 1)
        {
            $ext = end($ext);
            $ext = strtolower($ext);
            if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png')
            {
                $sp = $_FILES['image']['tmp_name'];
                $dp = "upload/medicine/".$img_name;
                move_uploaded_file($sp, $dp);

            }else{
                $er++;
                echo "<script>alert('Invalid format.Only jpg,jpeg and png format allowed');</script>";
            }
            
        }else{
            $er++;
            echo "<script>alert('Invalid format');</script>";
          
        }   
    }

    
    if($er == 0)
    {
        $name = $_POST['name'];
        $packing = $_POST['packing'];
        $generic_name = $_POST['generic_name'];
        $supplier = $_POST['supplier'];
        $rate = $_POST['rate'];

        $sql1 = "UPDATE medicines SET NAME='$name', PACKING = '$packing', GENERIC_NAME = '$generic_name', SUPPLIER_NAME = '$supplier', image = '{$img_name}', RATE = '{$rate}'
        WHERE id = " . $id;

        if(mysqli_query($conn, $sql1))
        {  
            echo "<script>alert('medicine update Sucessfully');
                window.location.href='manage_medicine.php';
            </script>";
        }else{
            echo "<script>alert('medicine update not possible');</script>";
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
                        <form action="" method='post' enctype="multipart/form-data">
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
                                <label class="col-md-3 col-form-label">Medicine Rate</label>
                                <div class="col-md-9">
                                    <input type="text" required name='rate' value="<?php echo $row2['RATE']; ?>" class="form-control">
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
                                            <option value="<?php echo $rw['ID']; ?>" <?php if ($row2['SUPPLIER_NAME'] == $rw['ID']) echo "selected"; ?>><?php echo  $rw['NAME']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Medicine Image</label>
                                <input type="file" class="form-control border" name="image">
                                <img src="upload/medicine/<?php echo $row2['image']; ?>" height="150px">
                                <input type="hidden" name="old-image" value="<?php echo $row2['image']; ?>">
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
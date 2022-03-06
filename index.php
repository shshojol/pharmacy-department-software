<?php
session_start();
if(!isset($_SESSION['id']))
{
    header('location:login.php');
}
    include('include/header.php');
    include('include/sidebar.php');
    include('include/db_conn.php');

?>
        
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
							<span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
							<div class="dash-widget-info text-right">
                                <?php 
                                    $customer_sql = "select * from customers";
                                    $customer_table = mysqli_query($conn, $customer_sql);
                                    $total_customer = mysqli_num_rows($customer_table);
                                ?>
								<h3><?php echo $total_customer; ?></h3>
								<span class="widget-title1">Total Customer<i class="fa fa-check" aria-hidden="true"></i></span>
							</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                            <div class="dash-widget-info text-right">
                                <?php 
                                    $supplier_sql = "select * from suppliers";
                                    $supplier_table = mysqli_query($conn, $supplier_sql);
                                    $total_supplier = mysqli_num_rows($supplier_table);
                                ?>
                                <h3><?php echo $total_supplier; ?></h3>
                                <span class="widget-title2">Total Supplier <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <?php 
                                    $sale_sql = "SELECT SUM(total_amt) as total FROM sale WHERE sale_date = CURDATE()";
                                    $sale_table = mysqli_query($conn, $sale_sql);
                                    $row = mysqli_fetch_assoc($sale_table);
                                    $total_sale = $row['total'];                                
                                ?>
                                <h3>Tk. <?php echo $total_sale; ?></h3>
                                <span class="widget-title3">Today Total Sale<i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <?php 
                                    $purchase_sql = "SELECT SUM(total_amt) as total FROM new_purchase WHERE purchase_date = CURDATE()";
                                    $purchase_table = mysqli_query($conn, $purchase_sql);
                                    $purchase_row = mysqli_fetch_assoc($purchase_table);
                                    $purchase_sale = $purchase_row['total'];                                
                                ?>
                                <h3>Tk. <?php echo $purchase_sale; ?></h3>
                                <span class="widget-title4">Today Total Purchase<i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="row">
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="card">
							<div class="card-body">
								<div class="chart-title">
									<h4>Patient Total</h4>
									<span class="float-right"><i class="fa fa-caret-up" aria-hidden="true"></i> 15% Higher than Last Month</span>
								</div>	
								<canvas id="linegraph"></canvas>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="card">
							<div class="card-body">
								<div class="chart-title">
									<h4>Patients In</h4>
									<div class="float-right">
										<ul class="chat-user-total">
											<li><i class="fa fa-circle current-users" aria-hidden="true"></i>ICU</li>
											<li><i class="fa fa-circle old-users" aria-hidden="true"></i> OPD</li>
										</ul>
									</div>
								</div>	
								<canvas id="bargraph"></canvas>
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

</body>


<!-- Mirrored from preclinic.dreamguystech.com/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 31 Jan 2021 14:17:55 GMT -->
</html>
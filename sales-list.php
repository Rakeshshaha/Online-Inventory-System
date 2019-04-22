<!-- sales-list.php -->
<?php include 'template/header.php'; ?>

<body>
    <!-- main -->
    <div class="main-top-intro">
        <div class="bg-layer">
            <!-- header -->
            <div class="wrapper">
                <?php include 'template/navbar.php'; ?>
                <!-- //header -->
                <div class="container content-inner-info">
                    <h2 class="text-center">Sales List</h2>
                    <div class="row content-w3layouts-main" style="max-width: 100%;">
						<div class="col-md-2"></div>
                        <div class="col-md-8 form-w3ls-left-info" >
                        	<form action="" method="POST">
                        		<div class="row">
                        			<div class="col-md-6">
                        				<input type="text" name="phone">
                        			</div>
                        			<div class="col-md-6">
                        				<input type="submit" class="btn btn-primary" name="filter" value="Filter">
                        			</div>
                        		</div>
                        		
                        	</form>
                            <table class="table table-bordered table-dark">
								<thead>
								    <tr>
								      <th scope="col">#</th>
								      <th scope="col">Customer Name</th>
								      <th scope="col">Phone</th>
								      <th scope="col">Date</th>
								      <th scope="col">Time</th>
								      <th scope="col">Total Bill</th>
								      <th scope="col">Action</th>
								    </tr>
								</thead>
								<?php 
								if (isset($_POST['filter'])) {
									$phone_no = $_POST['phone'];
								?>
							  	<tbody>
							  		<?php
										include 'dbCon.php';
										$con = connect();
										$sql = "SELECT * FROM `sales_info` where phone = '$phone_no';";
										$result = $con->query($sql);
										$count =1;
										foreach ($result as $r) {
									?>
								    <tr>
								      <th scope="row"><?php echo $count; ?></th>
								      <td><?php echo $r['customer_name']; ?></td>
								      <td><?php echo $r['phone']; ?></td>
								      <td><?php echo $r['date']; ?></td>
								      <td><?php echo $r['time']; ?></td>
								      <td><?php echo $r['total_bill']; ?></td>
								      <td><a target="_blank" href="invoice-print.php?sale_number=<?php echo $r['sale_no']; ?>">View</a></td>
								    </tr>
								    <?php $count++; } ?>
							  	</tbody>
							  	<?php } else{ ?>
								<tbody>
							  		<?php
										include 'dbCon.php';
										$con = connect();
										$sql = "SELECT * FROM `sales_info`;";
										$result = $con->query($sql);
										$count =1;
										foreach ($result as $r) {
									?>
								    <tr>
								      <th scope="row"><?php echo $count; ?></th>
								      <td><?php echo $r['customer_name']; ?></td>
								      <td><?php echo $r['phone']; ?></td>
								      <td><?php echo $r['date']; ?></td>
								      <td><?php echo $r['time']; ?></td>
								      <td><?php echo $r['total_bill']; ?></td>
								      <td><a href="invoice.php?sale_number=<?php echo $r['sale_no']; ?>">View</a></td>
								    </tr>
								    <?php $count++; } ?>
							  	</tbody>	
							  	<?php } ?>
							</table>
                        </div>

                    </div>
                </div>
                <!-- copyright -->
                 <?php include 'template/footer.php'; ?>
                <!-- //copyright -->
            </div>
        </div>
    </div>
    <!-- //main -->

</body>

</html>

<!-- product-list.php -->
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
                    <h2 class="text-center">Product List</h2>
                    <div class="row content-w3layouts-main" style="max-width: 100%;">
						<div class="col-md-2"></div>
                        <div class="col-md-8 form-w3ls-left-info" >
                            <table class="table table-bordered table-dark">
								<thead>
								    <tr>
								      <th scope="col">#</th>
								      <th scope="col">Product Name</th>
								      <th scope="col">Quantity</th>
								      <th scope="col">Unit Price</th>
								      <th scope="col">Action</th>
								    </tr>
								</thead>
							  	<tbody>
							  		<?php
										include 'dbCon.php';
										$con = connect();
										$sql = "SELECT * FROM `products_info` ;";
										$result = $con->query($sql);
										$count =1;
										foreach ($result as $r) {
									?>
								    <tr>
								      <th scope="row"><?php echo $count; ?></th>
								      <td><?php echo $r['product_name']; ?></td>
								      <td ><?php echo $r['quantity']; ?> (<?php echo $r['extension']; ?>)</td>
								      <td><?php echo $r['unit_price']; ?></td>
								      <td>
										  <a class="btn btn-success" href="addStock.php?p_id=<?php echo $r['id']; ?>">Change Stock</a>
								      </td>
								    </tr>
								    <?php $count++; } ?>
							  	</tbody>
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

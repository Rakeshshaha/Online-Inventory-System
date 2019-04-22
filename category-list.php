<!-- category-list.php -->
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
                    <h2 class="text-center">Category List</h2>
                    <div class="row content-w3layouts-main" style="max-width: 100%;">
						<div class="col-md-2"></div>
                        <div class="col-md-8 form-w3ls-left-info" >
                            <table class="table table-bordered table-dark">
								<thead>
								    <tr>
								      <th scope="col">#</th>
								      <th scope="col">Category Name</th>
								      <th scope="col">Action</th>
								    </tr>
								</thead>
							  	<tbody>
							  		<?php
										include 'dbCon.php';
										$con = connect();
										$sql = "SELECT * FROM `categories` ORDER BY category_name ASC;";
										$result = $con->query($sql);
										$count =1;
										foreach ($result as $r) {
									?>
								    <tr>
								      <th scope="row"><?php echo $count; ?></th>
								      <td><?php echo $r['category_name']; ?></td>
								      <td><a href="delete.php?c_id=<?php echo $r['id']; ?>">Detele</a></td>
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

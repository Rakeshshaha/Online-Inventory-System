<!-- sub-category-add.php -->
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
                    <h2 class="text-center">Sub-Category Add</h2>
                    <div class="row content-w3layouts-main" style="max-width: 100%;">
						<div class="col-md-2"></div>
                        <div class="col-md-8 form-w3ls-left-info" >
                            <form action="manage-insert.php" method="post">
                            	<select name="category" required="" class="">
                            		<option> -Select Category- </option>
                            		<?php
										include 'dbCon.php';
										$con = connect();
										$sql = "SELECT * FROM `categories` ORDER BY category_name ASC;";
										$result = $con->query($sql);
										foreach ($result as $r) {
									?>
                            		<option value="<?php echo $r['id']; ?>"><?php echo $r['category_name']; ?></option>
                            		<?php } ?>
                            	</select>
                                <input type="text" name="name" placeholder="Sub-Category Name" required="" />
                                <div class="bottom">
                                	<input class="btn btn-primary" type="submit" name="addsubcategory" value="Submit">
                                </div>
                            </form>
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

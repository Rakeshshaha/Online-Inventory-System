<!-- category-add.php -->
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
                    <h2 class="text-center">Category Add</h2>
                    <div class="row content-w3layouts-main" style="max-width: 100%;">
						<div class="col-md-2"></div>
                        <div class="col-md-8 form-w3ls-left-info" >
                            <form action="manage-insert.php" method="post">
                                <input type="text" name="name" placeholder="Category Name" required="" />
                                <div class="bottom">
                                	<input class="btn btn-primary" type="submit" name="addcategory" value="Submit">
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

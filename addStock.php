<!-- addStock.php -->
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
                    <h2 class="text-center">Change Stock</h2>
                    <div class="row content-w3layouts-main" style="max-width: 100%;">
						<div class="col-md-2"></div>
                        <div class="col-md-8 form-w3ls-left-info" >
                            <form action="manage-insert.php" method="post">
                                <input type="number" name="qty" placeholder="Product Quantity" required="" />
                                <input type="hidden" name="p_id" value="<?php echo $_GET['p_id']; ?>">
                                <div class="bottom">
                                	<input class="btn btn-primary" type="submit" name="changestock" value="Submit">
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

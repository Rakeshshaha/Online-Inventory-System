<!-- product-add.php -->
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
                    <h2 class="text-center">Product Add</h2>
                    <div class="row content-w3layouts-main" style="max-width: 100%;">
						<div class="col-md-2"></div>
                        <div class="col-md-8 form-w3ls-left-info" >
                            <form action="manage-insert.php" method="post">
                                <select name="category" required="" class="" id="category">
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
                                <select name="subcategory" required="" class="" id="sub_category">
                                    <option> -Select Subcategory- </option>
                                </select>
                                <input type="text" placeholder="Product Name" name="product_name" required="" />
                                <input type="number" min="1" placeholder="Product Quantity" name="product_qty" required="" />
                                <select name="extension" required="" class="" >
                                    <option> -Select Measurement- </option>
                                    <option value="Bags">Bags</option>
                                    <option value="Litter">Litter</option>
                                    <option value="KG">KG</option>
                                </select>
                                <input type="text" placeholder="Product Unit Price" name="product_u_price" required="" />
                                <div class="bottom">
                                    <input type="submit" class="btn btn-primary" name="addproduct" value="Submit">
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
    <script type="text/javascript">
        $(document).ready(function(){
            $('#category').on('change',function(){
                var cId = $(this).val();
                if(cId){
                    $.ajax({
                        type:'POST',
                        url:'ajaxCategoryData.php',
                        data:'c_id='+cId,
                        success:function(html){
                            $('#sub_category').html(html);
                        }
                    }); 
                }else{
                    $('#sub_category').html('<option value="">Select Categoy first</option>');
                }
            });
        });
    </script>

</body>

</html>

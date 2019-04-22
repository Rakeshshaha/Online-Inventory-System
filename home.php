<!-- home.php -->
<?php include 'template/header.php'; ?>
    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="typeahead.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
	.typeahead { border: 2px solid #FFF;border-radius: 4px;padding: 8px 12px;background: rgba(66, 52, 52, 0.5);color: #FFF;}
	.tt-menu { width:100%; }
	ul.typeahead{margin:0px;padding:10px 0px;}
	ul.typeahead.dropdown-menu li a {padding: 10px !important;	border-bottom:#CCC 1px solid;color:#FFF;}
	ul.typeahead.dropdown-menu li:last-child a { border-bottom:0px !important; }
	.bgcolor {max-width: 550px;min-width: 290px;max-height:340px;background:url("world-contries.jpg") no-repeat center center;padding: 100px 10px 130px;border-radius:4px;text-align:center;margin:10px;}
	.demo-label {font-size:1.5em;color: #686868;font-weight: 500;color:#FFF;}
	.dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover {
		text-decoration: none;
		background-color: #1f3f41;
		outline: 0;
	}
	</style>	
<body>
    <!-- main -->
    <div class="main-top-intro">
        <div class="bg-layer">
            <!-- header -->
            <div class="wrapper">
                <?php include 'template/navbar.php'; ?>
                <!-- //header -->
				<?php 
				include 'dbCon.php';
				$con = connect();
					if ((isset($_SESSION['alrtsms']) && ($_SESSION['alrtsms']) == 0 )) { ?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong class="text-danger">Inventory Alart</strong>	
				<?php	$pqsql = "SELECT * FROM `products_info` WHERE quantity < 50;";
						$pqresult = $con->query($pqsql);
						foreach ($pqresult as $pqr) {
				?>
				  	<div class="alert alert-primary" role="alert">
					  <strong>Details: </strong><?php echo $pqr['product_name'] ?> <?php echo $pqr['quantity'] ?> <?php echo $pqr['extension'] ?>
					</div>
				<?php } ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
				<?php $_SESSION['alrtsms'] = 1; } ?>

                <div class="container content-inner-info">
                    <h2 class="text-center">Bill Add</h2>
                    <div class="row content-w3layouts-main" style="max-width: 100%;">
						<div class="col-md-2"></div>
                        <div class="col-md-8 form-w3ls-left-info" >
                            <form class="" action="manage-insert.php" method="post">
                            	<div class="row">
	                                <div class="col-md-8">
	                                	<input type="text" name="txtCountry[]" id="txtCountry" class="typeahead"/>
	                                </div>
	                                <div class="col-md-4">
	                                	<input class="btn btn-primary" type="submit" name="addList" value="Submit">
	                                </div>
	                            </div>
                            </form>
                        </div>
                    </div>
                    <?php if (isset($_SESSION['employee_name'])) { ?>
                    <div class="row content-w3layouts-main" style="max-width: 100%;">
						<div class="col-md-2"></div>
                        <div class="col-md-8 form-w3ls-left-info" >
                            <form class="" action="manage-insert.php" method="post">
                            	<div class="row">
                            		<div class="col-md-6"><input type="text" name="name" placeholder="Customer Name"></div>
                            		<div class="col-md-6"><input type="text" name="phone" placeholder="Phone Number"></div>
                            	</div>
                            	<table class="table table-bordered table-dark">
									<thead>
									    <tr>
									      <th scope="col">#</th>
									      <th scope="col">Product Name</th>
									      <th scope="col">Quantity</th>
									      <th scope="col">Measurement</th>
									      <th scope="col">Unit Price</th>
									    </tr>
									</thead>
								  	<tbody>
								  		<?php
								  		
										foreach ($_SESSION['employee_name'] as $item) {
											$pn = $item['employee_name'];
											$sql2 = "SELECT * FROM `products_info` WHERE product_name = '$pn';";
											$result = $con->query($sql2);
										?>
										    <tr>
											<?php foreach ($result as $r) { ?>		
										      <th scope="row">1</th>
										      <td>
										      	<?php echo $r['product_name']; ?> 
										      	<input type="hidden" name="p_id[]" value="<?php echo $r['id']; ?>">
										      </td>
										      <td><input type="number" name="qty[]" min="1"></td>
										      <td>
										      	<select name="extension[]" required="" class="" >
				                                    <option> -Select Measurement- </option>
				                                    <option value="Bags">Bags</option>
				                                    <option value="Litter">Litter</option>
				                                    <option value="KG">KG</option>
				                                </select>
										      </td>
										      <td>
										      	<?php echo $r['unit_price']; ?>
										      	<input type="hidden" name="up[]" value="<?php echo $r['unit_price']; ?>">	
										      	</td>
										    <?php } ?>
										    </tr>
									    <?php 
									     	}
									    ?>
								  	</tbody>
								</table>
								<input type="submit" class="btn btn-primary" name="confirm" value="Confirm">
                            </form>
                        </div>

                    </div>
                    <?php } ?>
                </div>
                <!-- copyright -->
                 <?php include 'template/footer.php'; ?>
                <!-- //copyright -->
            </div>
        </div>
    </div>
    <!-- //main -->

</body>
<script>
    $(document).ready(function () {
        $('#txtCountry').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "server.php",
					data: 'query=' + query,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
						result($.map(data, function (item) {
							return item;
                        }));
                    }
                });
            }
        });
    });
</script>

</html>

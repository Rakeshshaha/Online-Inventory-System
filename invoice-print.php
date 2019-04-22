<!-- invoice-print.php -->
<?php include 'template/header.php'; ?>
	<body>
		
		<div class="invoice">
			<header class="clearfix">
				<div class="row">
					<div class="col-sm-6 mt-md">
						<h2 class="h2 mt-none mb-sm  text-bold text-dark">INVOICE</h2>
						<h4 class="h4 m-none text-bold">#<?php echo $_GET['sale_number']; ?></h4>
					</div>
				</div>
			</header>
			<div class="bill-info">
				<div class="row">
					<div class="col-md-6">
						<div class="bill-to">
							<p class="h5 mb-xs text-semibold">To:</p>
							<?php
					  		include 'dbCon.php';
							$con = connect();
								$sid = $_GET['sale_number'];
								$sql2 = "SELECT * FROM `sales_info` WHERE sale_no = '$sid';";
								$result = $con->query($sql2);
								foreach ($result as $r) {
									$customer_name = $r['customer_name'];
									$phone = $r['phone'];
									$date = $r['date'];
									$time = $r['time'];
									$total_bill = $r['total_bill'];
								}
							?>
							<address>
								Name: <?php echo $customer_name; ?>
								<br/>
								Phone: +<?php echo $phone; ?>
							</address>
						</div>
					</div>
					<div class="col-md-6">
						<div class="bill-data text-right">
							<p class="mb-none">
								<span class="">Invoice Date:</span>
								<span class="value"><?php echo $date; ?></span>
							</p>
							<p class="mb-none">
								<span class="">Invoice Time:</span>
								<span class="value"><?php echo $time; ?></span>
							</p>
						</div>
					</div>
				</div>
			</div>
		
			<div class="table-responsive">
				<table class="table invoice-items text-dark">
					<thead>
						<tr class="h4 ">
							<th id="cell-item"   class="text-semibold">Item</th>
							<th id="cell-desc"   class="text-semibold">Quantity</th>
							<th id="cell-qty"    class="text-center text-semibold">Unit Price</th>
							<th id="cell-total"  class="text-center text-semibold">Sub Total</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sid = $_GET['sale_number'];
							$sql3 = "SELECT `id`, `sale_no`, `p_id`, `qty`, `measurement`, `unit_price`, (select product_name from products_info where id=sales_product.p_id)as pname FROM `sales_product` WHERE sale_no = '$sid';";
							$result3 = $con->query($sql3);
							foreach ($result3 as $r3) {
							?>
						<tr>
							<td class="text-semibold"><?php echo $r3['pname']; ?></td>
							<td class="text-semibold"><?php echo $r3['qty']; ?> (<?php echo $r3['measurement']; ?>)</td>
							<td class="text-center"><?php echo $r3['unit_price']; ?> Per (<?php echo $r3['measurement']; ?>)</td>
							<td class="text-center"><?php echo $st = $r3['qty'] * $r3['unit_price']; ?></td>
						</tr>
						<?php } ?>
					</tbody>
					</tbody>
				</table>
			</div>
		
			<div class="invoice-summary">
				<div class="row">
					<div class="col-sm-8"></div>
					<div class="col-sm-4 col-sm-offset-8">
						<table class="table h5 text-dark ">
							<tbody>
								<tr class="h4">
									<td colspan="2">Grand Total</td>
									<td class="text-left"><?php echo $total_bill; ?> Taka</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
						

		<script>
			window.print();
		</script>
	</body>
</html>
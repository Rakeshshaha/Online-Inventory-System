<!-- manage-insert.php -->
<?php 
session_start();
	include 'dbCon.php';
	$con = connect();

	if (isset($_POST['addcategory'])) {
		$c_name = $_POST['name'];

		$iquery="INSERT INTO `categories`( `category_name`) 
            VALUES ('$c_name');";
    	if ($con->query($iquery) === TRUE) {
    		echo '<script>alert("New category added successfully")</script>';
    		echo '<script>window.location="category-add.php"</script>';
    	}else {
            echo "Error: " . $iquery . "<br>" . $con->error;
        }
	}

	if (isset($_POST['addsubcategory'])) {
		$c_id = $_POST['category'];
		$sc_name = $_POST['name'];

		$iquery="INSERT INTO `sub_category`(`category_id`, `sub_category_name`) 
            VALUES ('$c_id','$sc_name');";
    	if ($con->query($iquery) === TRUE) {
    		echo '<script>alert("New subcategory added successfully")</script>';
    		echo '<script>window.location="sub-category-add.php"</script>';
    	}else {
            echo "Error: " . $iquery . "<br>" . $con->error;
        }
	}

	if (isset($_POST['addproduct'])) {
		$c_id = $_POST['category'];
		$sc_id = $_POST['subcategory'];
		$product_name = $_POST['product_name'];
		$product_qty = $_POST['product_qty'];
		$extension = $_POST['extension'];
		$product_u_price = $_POST['product_u_price'];

		$iquery="INSERT INTO `products_info`( `category_id`, `sub_category_id`, `product_name`, `quantity`, `unit_price`, `extension`) 
            VALUES ('$c_id','$sc_id','$product_name','$product_qty','$product_u_price','$extension');";
    	if ($con->query($iquery) === TRUE) {
    		echo '<script>alert("New product added successfully")</script>';
    		echo '<script>window.location="product-add.php"</script>';
    	}else {
            echo "Error: " . $iquery . "<br>" . $con->error;
        }
	}

	if (isset($_POST['changestock'])) {
		$p_id = $_POST['p_id'];
		$qty = $_POST['qty'];
		$total = 0;

		$sql = "SELECT * FROM `products_info` WHERE id = '$p_id';";
		$result = $con->query($sql);
        foreach ($result as $r) {
        	$total = $qty + $r['quantity'];
        }

		$iquery="UPDATE `products_info` SET `quantity`='$total' WHERE id = '$p_id';";
    	if ($con->query($iquery) === TRUE) {
    		echo '<script>alert("Stock changed")</script>';
    		echo '<script>window.location="product-list.php"</script>';
    	}else {
            echo "Error: " . $iquery . "<br>" . $con->error;
        }
	}

    if (isset($_POST['addList'])) {
        for($c = 0; $c < count($_POST["txtCountry"]); $c++)
        {
            $employeeName = array (
                'employee_name' => $_POST["txtCountry"][$c]
            );
            $_SESSION['employee_name'][] = $employeeName;
        }
//        foreach ($_SESSION['employee_name'] as $item) {
//            echo  $item['employee_name'], '<br />';
//
//        }
        echo '<script>window.location="home.php"</script>';
    }

    if (isset($_POST['confirm'])) {
        date_default_timezone_set("Asia/Dhaka");
         $bill_time =date("h:i:sa");
         $bill_date =date("Y-m-d");
         $sale_number= uniqid();
         $c_name = $_POST['name'];
         $c_phone = $_POST['phone'];

         $total = 0;
        for($p = 0; $p < count($_POST["p_id"]); $p++) {
            $total = $total + $_POST['qty'][$p] * $_POST['up'][$p];
        }

        $ins1 = false;

        $iquery="INSERT INTO `sales_info`(`sale_no`, `customer_name`, `phone`, `date`, `time`, `total_bill`) 
            VALUES ('$sale_number','$c_name','$c_phone','$bill_date','$bill_time','$total');";
            if ($con->query($iquery) === TRUE) {
                $ins1 = true;
            }else {
                echo "Error: " . $iquery . "<br>" . $con->error;
            }

        $ins2 = false;
        if ($ins1 == true ) {
            for($q = 0; $q < count($_POST["p_id"]); $q++) {
                $p_id  = $_POST["p_id"][$q];
                $qty = $_POST["qty"][$q];
                $extension = $_POST["extension"][$q];
                $up = $_POST["up"][$q];
                $iquery2="INSERT INTO `sales_product`(`sale_no`, `p_id`, `qty`, `measurement`, `unit_price`) 
                VALUES ('$sale_number','$p_id','$qty','$extension','$up');";
                if ($con->query($iquery2) === TRUE) {
                    $ins2 = true;
                }else {
                    echo "Error: " . $iquery2 . "<br>" . $con->error;
                }
            }
        }
        if ($ins1 == true && $ins2 == true) {
            header("Location: invoice.php?sale_number=".$sale_number."");
        }
    }
?>
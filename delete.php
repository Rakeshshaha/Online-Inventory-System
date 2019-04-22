<!-- delete.php -->
<?php 
	if (isset($_GET['c_id'])) {
		$id =$_GET['c_id'];
		$cdelete = false;
		$sql ="DELETE FROM `categories` WHERE id = '$id';";
		include_once 'dbCon.php';
		$con = connect();
		if ($con->query($sql) === TRUE) {
			$cdelete = true;
	    } else {
			echo "Error: " . $sql . "<br>" . $con->error;
		} 
		if ($cdelete == true) {
			$sql2 ="DELETE FROM `sub_category` WHERE category_id = '$id';";
			if ($con->query($sql2) === TRUE) {
				echo '<script>alert("Category Deleted")</script>';
				echo '<script>window.location="category-list.php"</script>';
		    } else {
				echo "Error: " . $sql . "<br>" . $con->error;
			} 
		}
	}
?>
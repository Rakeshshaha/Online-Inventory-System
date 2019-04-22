<!-- ajaxCategoryData.php -->
<?php
//Include database configuration file
include 'dbCon.php';
$con = connect();
if(isset($_POST["c_id"]) && !empty($_POST["c_id"])){
    //Get all state data
    $query = $con->query("SELECT * FROM sub_category WHERE category_id = ".$_POST['c_id']." ORDER BY sub_category_name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display states list
    if($rowCount > 0){
        echo '<option value="">Select Category</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['id'].'">'.$row['sub_category_name'].'</option>';
        }
    }else{
        echo '<option value="">Subcategory not available</option>';
    }
}
?>
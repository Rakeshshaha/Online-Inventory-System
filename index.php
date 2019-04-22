<!-- index.php -->
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
                    <h2>Hello Sir</h2>
                    <div class="content-w3layouts-main">

                        <div class="form-w3ls-left-info">
                            <form action="" method="post">
                                <input type="email" name="email" placeholder="Email Address" required="" />
                                <input type="password" name="password" placeholder="Password" required="" />
                                <div class="bottom">
                                    <input type="submit" class="btn btn-primary" name="login" value="Log In">
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
<?php 
//Login checker

if(isset($_POST['login'])){
    
    $email        = $_POST['email'];
    $password     = $_POST['password'];
    
    $sql = "SELECT * FROM `users` 
            WHERE `email`='$email' 
            AND `password`='$password'";

    include_once 'dbCon.php';
    
    $con = connect();
    
    $result = $con->query($sql);
    
    if($result->num_rows > 0){
        $_SESSION['isLoggedIn'] = TRUE;
        
        foreach($result as $row){
            $_SESSION['id']     = $row['id'];
            $_SESSION['user_name']  = $row['user_name'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['email']  = $row['email'];
            $_SESSION['password'] =$row['password'];
        }
        $_SESSION['alrtsms'] = 0;
        echo '<script>window.location="home.php"</script>';
        
    }else{
        
        session_unset(); 
        echo '<script>alert("Email Or Password Incorrect")</script>';
        
        
    }
}
?>
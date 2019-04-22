<!-- navbar.php -->
<header>
    <div class="header-w3layouts">
        <h1>
            <a class="navbar-brand logo" href="#">
                RKS
            </a>
        </h1>
    </div>
    <div class="nav_w3pvt">
        <nav>
            <label for="drop" class="toggle mt-lg-0 mt-2"><span class="fa fa-bars" aria-hidden="true"></span></label>
            <input type="checkbox" id="drop" />
            <ul class="menu">
                <?php if((!isset($_SESSION['isLoggedIn']))){ ?>
                <li class="active"><a href="index.php">Home</a></li>
                <?php } ?>
                
                <?php if((isset($_SESSION['isLoggedIn']) && $_SESSION['role'] == 0  )){ ?>
                <li class="p-0">
                    <!-- First Tier Drop Down -->
                    <label for="drop-3" class="toggle">Category <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                    <a href="#">Category <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                    <input type="checkbox" id="drop-3" />
                    <ul class="inner-dropdown">
                        <li><a href="category-add.php">Add Category</a></li>
                        <li><a href="sub-category-add.php">Add Sub-Category</a></li>
                        
                    </ul>
					
					
					
					

                </li>
                <li class="p-0">
                    <!-- First Tier Drop Down -->
                    <label for="drop-4" class="toggle">Products <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                    <a href="#">Products <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                    <input type="checkbox" id="drop-4" />
                    <ul class="inner-dropdown">
                        <li><a href="product-add.php">Add Product</a></li>
                        <li><a href="product-list.php">Product List</a></li>
                    </ul>
                </li>
                <?php } ?>
                <?php if((isset($_SESSION['isLoggedIn']) && $_SESSION['role'] == 0  ) || (isset($_SESSION['isLoggedIn']) && $_SESSION['role'] == 1  )){ ?>
                <li class=""><a href="sales-list.php">Sales List</a></li>
                <?php } ?>
                <?php if((isset($_SESSION['isLoggedIn']))){ ?>
                <li><a href="logout.php">Logout (<?php echo $_SESSION['user_name']; ?>)</a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
    
    <div class="clear"></div>


</header>
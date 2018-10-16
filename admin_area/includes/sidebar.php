<nav class="navbar navbar-inverse navbar-fixed-top">
    
    <div class="navbar-header">
        
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        
        <a class="navbar-brand" href="index.php?dashboard">Admin Panel</a>
        
    </div>
    
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i>
                THH <b class="caret"></b>
            </a>
            
            <ul class="dropdown-menu">
                <li>
                    <a href="index.php?user_profile">
                        <i class="fa fa-fw fa-user"></i> Profile
                    </a>
                </li>
                <li>
                    <a href="index.php?view_products">
                        <i class="fa fa-fw fa-envelope"></i> Products
                        <span class="badge">7</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?view_customers">
                        <i class="fa fa-fw fa-gear"></i> Customers
                        <span class="badge">12</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?view_cats">
                        <i class="fa fa-fw fa-gear"></i> Product Categories
                        <span class="badge">5</span>
                    </a>
                </li>
                
                <li class="divider"></li>
                
                <li>
                    <a href="logout.php">
                        <i class="fa fa-fw fa-power-off"></i> Log Out
                    </a>
                </li>
                
            </ul>
        </li>
    </ul>
    
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php?dashboard">
                    <i class="fa fa-fw fa-dashboard"></i> Dashboard
                </a>
            </li>
            
            <li>
                <a href="#" data-toggle="collapse" data-target="#products">
                    <i class="fa fa-fw fa-table"></i> Products
                    <i class="fa fa-fw fa-caret-down"></i>
                </a> 
                
                <ul id="products" class="collapse">
                    <li>
                        <a href="index.php?insert_product">Insert Products</a>
                    </li>
                    <li>
                        <a href="index.php?view_product">View Products</a>
                    </li>
                </ul>
                
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#p_cat">
                    <i class="fa fa-fw fa-pencil"></i> Products Categories
                    <i class="fa fa-fw fa-caret-down"></i>
                </a> 
                
                <ul id="p_cat" class="collapse">
                    <li>
                        <a href="index.php?insert_p_cat">Insert Product Category</a>
                    </li>
                    <li>
                        <a href="index.php?view_p_cat">View Products Categories</a>
                    </li>
                </ul>
                
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#cat">
                    <i class="fa fa-fw fa-arrows-v"></i> Categories
                    <i class="fa fa-fw fa-caret-down"></i>
                </a> 
                
                <ul id="cat" class="collapse">
                    <li>
                        <a href="index.php?insert_cat">Insert Category</a>
                    </li>
                    <li>
                        <a href="index.php?view_cats">View Categories</a>
                    </li>
                </ul>
                
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#slides">
                    <i class="fa fa-fw fa-gear"></i> Slides
                    <i class="fa fa-fw fa-caret-down"></i>
                </a> 
                
                <ul id="slides" class="collapse">
                    <li>
                        <a href="index.php?insert_slides">Insert Slide</a>
                    </li>
                    <li>
                        <a href="index.php?view_slides">View Slides</a>
                    </li>
                </ul>
                
            </li>
            
            <li>
                <a href="index.php?view_customers">
                    <i class="fa fa-fw fa-edit"></i> View Customers
                </a>
            </li>
            <li>
                <a href="index.php?view_orders">
                    <i class="fa fa-fw fa-list"></i> View Orders
                </a>
            </li>
            <li>
                <a href="index.php?view_payments">
                    <i class="fa fa-fw fa-pencil"></i> View Payments
                </a>
            </li>
            
            <li>
                <a href="#" data-toggle="collapse" data-target="#users">
                    <i class="fa fa-fw fa-gear"></i> Users
                    <i class="fa fa-fw fa-caret-down"></i>
                </a> 
                
                <ul id="users" class="collapse">
                    <li>
                        <a href="index.php?insert_user">Insert User</a>
                    </li>
                    <li>
                        <a href="index.php?view_users">View Users</a>
                    </li>
                    <li>
                        <a href="index.php?user_profile">Edit Profile</a>
                    </li>
                </ul>
                
            </li>
            
            <li>
                <a href="logout.php">
                    <i class="fa fa-fw fa-power-off"></i> Log Out
                </a>
            </li>
        </ul>
    </div>
    
</nav>

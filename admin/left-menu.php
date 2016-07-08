<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/admin.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $_SESSION['auth']['username'];?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
                <a href="dashboard.php">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tags"></i>
                    <span>Products</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="add-product.php"><i class="fa fa-circle-o"></i> Add Products</a></li>
                    <li><a href="list-product.php"><i class="fa fa-circle-o"></i> List Products</a></li>
                </ul>
            </li>
         
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tags"></i>
                    <span>Brands</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="add-brand.php"><i class="fa fa-circle-o"></i> Add Brand</a></li>
                    <li><a href="list-brand.php"><i class="fa fa-circle-o"></i> List Brands</a></li>
                </ul>
            </li>
            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
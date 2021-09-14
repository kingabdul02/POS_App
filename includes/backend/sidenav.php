<!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile d-flex no-block dropdown m-t-20">
                                <div class="user-pic"><img src="../assets/backend/images/users/1.jpg" alt="users" class="rounded-circle" width="40" /></div>
                                <div class="user-content hide-menu m-l-10">
                                    <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php if ($_SESSION['user_type'] == 1) {?>
                                          <h5 class="m-b-0 user-name font-medium"><?php echo $_SESSION["username"] ?>  <i class="fa fa-angle-down"></i></h5>
                                          <span class="op-5 user-email">Administrator</span>
                                      <?php }elseif ($_SESSION['user_type'] == 2) {?>
                                        <h5 class="m-b-0 user-name font-medium"><?php echo $_SESSION["username"] ?> <i class="fa fa-angle-down"></i></h5>
                                        <span class="op-5 user-email">Cashier</span>
                                      <?php } ?>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="../logout.php"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
                        <?php if ($_SESSION['user_type'] == 1) {?>
                          <!-- Administrator role-->
                        <li class="p-15 m-t-10"><a href="sales.php" class="btn btn-block create-btn text-white no-block d-flex align-items-center"><i class="fa fa-plus-square"></i> <span class="hide-menu m-l-5"> Sales</span> </a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="category.php" aria-expanded="false"><i class="mdi mdi-border-all"></i><span class="hide-menu">Category</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="products.php" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Products</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="expensis.php" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Expensis</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="report.php" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Reports</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="stock.php" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Stock</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="vat_services.php" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">VAT/Services</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="users.php" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Users</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.php?id=<?php echo $_SESSION['u_id'] ?>&role=admin" aria-expanded="false"><i class="mdi mdi-account-network"></i><span class="hide-menu">Profile</span></a></li>
                        <li class="text-center p-40 upgrade-btn">
                                <!-- <a href="backup_db.php" class="btn btn-block btn-danger text-white" target="_blank">Backup Database</a>-->
                        </li>
                      <?php }elseif ($_SESSION['user_type'] == 2) {?>
                        <!-- Cashier role`-->`
                      <li class="p-15 m-t-10"><a href="sales.php" class="btn btn-block create-btn text-white no-block d-flex align-items-center"><i class="fa fa-plus-square"></i> <span class="hide-menu m-l-5"> Sales</span> </a></li>
                      <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                      <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="expensis.php" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Expensis</span></a></li>
                      <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.php" aria-expanded="false"><i class="mdi mdi-account-network"></i><span class="hide-menu">Profile</span></a></li>
                    <?php } ?>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->

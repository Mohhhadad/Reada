<div class="navbar navbar-inverse set-radius-zero" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href='dashboard.php'>

                    <img src="assets/img/logo33.png" width='300'height='150'/>
                </a>

            </div>

            <div class="right-div">
                <h4 class="header-line"><?php if(isset($_SESSION['alogin'])) { echo "Hello : " . $_SESSION['alogin'] . "<br><a href=\"logout.php\" class=\"btn btn-danger pull-right\">LOG ME OUT</a>";} ?></h4>
                
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="dashboard.php" class=<?php $page = explode("/", $_SERVER["PHP_SELF"])[3]; if($page == "dashboard.php") { echo "'menu-top-active'";} else { echo "''"; } ?> >DASHBOARD</a></li>
                        
                           
                            <li>
                                <a href="#"  id="ddlmenuItem" data-toggle="dropdown"
                                   class=                                    <?php $page = explode("/", $_SERVER["PHP_SELF"])[3]; if($page == "add-category.php" or $page == "manage-categories.php") { echo "'menu-top-active'";} else { echo "''"; } ?> 

                                   > Categories <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="add-category.php"
                                    class=
                                     <?php $page = explode("/", $_SERVER["PHP_SELF"])[3]; if($page == "add-category.php") { echo "'menu-top-active'";} else { echo "''"; } ?>                          >Add Category</a></li>
                                    
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-categories.php"
                                    class=
                                    <?php $page = explode("/", $_SERVER["PHP_SELF"])[3]; if($page == "manage-categories.php") { echo "'menu-top-active'";} else { echo "''"; } ?>                             >Manage Categories</a></li>
                                </ul>
                            </li>
                            <li>
                                
                                
                                <a href="#" id="ddlmenuItem" data-toggle="dropdown" 
                                   class=                           
                                    <?php $page = explode("/", $_SERVER["PHP_SELF"])[3]; if($page == "add-college.php" or $page == "manage-college.php") { echo "'menu-top-active'";} else { echo "''"; } ?> 
                                   
                                   > College <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="add-college.php"
                                    class=
                                    <?php $page = explode("/", $_SERVER["PHP_SELF"])[3]; if($page == "add-college.php") { echo "'menu-top-active'";} else { echo "''"; } ?>
                                                               
                                                               >Add College</a></li>
                                    
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-college.php"
                                    class=
                                    <?php $page = explode("/", $_SERVER["PHP_SELF"])[3]; if($page == "manage-college.php") { echo "'menu-top-active'";} else { echo "''"; } ?>                            
                                                                
                                                                >Manage College</a></li>
                                </ul>
                            </li>
                            
                            
                            <li><a href="manage-books.php" class=<?php $page = explode("/", $_SERVER["PHP_SELF"])[3]; if($page == "manage-books.php") { echo "'menu-top-active'";} else { echo "''"; } ?> >Manage Books</a></li>

                            
                            <li><a href="PreparingOrders.php" class=
                                    <?php $page = explode("/", $_SERVER["PHP_SELF"])[3]; if($page == "PreparingOrders.php") { echo "'menu-top-active'";} else { echo "''"; } ?>
                                   
                                   >Prepare Orders</a></li>

                            <li><a href="manage-payment-of.php" class=<?php $page = explode("/", $_SERVER["PHP_SELF"])[3]; if($page == "manage-payment-of.php") { echo "'menu-top-active'";} else { echo "''"; } ?> >Transactions</a></li>
                            
                            
                            
                            
                            
                             <li><a href="adminsupport.php"class=
                                    <?php $page = explode("/", $_SERVER["PHP_SELF"])[3]; if($page == "adminsupport.php") { echo "'menu-top-active'";} else { echo "''"; } ?> 
                                   
                                    >Online Support</a></li>
                            
                            <li>
                                <a href="#" id="ddlmenuItem" data-toggle="dropdown" class=
                                   
                                   <?php $page = explode("/", $_SERVER["PHP_SELF"])[3]; if($page == "change-password.php" or $page == "reg-students.php" or $page == "mng-shippingCo.php"  ) { echo "'menu-top-active'";} else { echo "''"; } ?>"menu-top-active"
                                   
                                   
                                   > Manage <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="change-password.php" class=
                                          <?php $page = explode("/", $_SERVER["PHP_SELF"])[3]; if($page == "change-password.php") { echo "'menu-top-active'";} else { echo "''"; } ?>                      
                                                               >Change Password</a></li>
                                    
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="reg-students.php"
                                    class=
                                            <?php $page = explode("/", $_SERVER["PHP_SELF"])[3]; if($page == "reg-students.php") { echo "'menu-top-active'";} else { echo "''"; } ?> 
                                                               >Register Students</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="mng-shippingCo.php"
                                    class=
                                            <?php $page = explode("/", $_SERVER["PHP_SELF"])[3]; if($page == "mng-shippingCo.php") { echo "'menu-top-active'";} else { echo "''"; } ?>
                                                                >Shipping Company</a></li>
                                </ul>
                            </li>
                    
                            </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
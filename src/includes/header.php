
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
<?php if($_SESSION['login'])
{
?> 
            <?php 
$EmailId=$_SESSION['user'];
$sql1 ="SELECT FullName from tblstudents where EmailId=:EmailId ";
$query1 = $dbh -> prepare($sql1);
$query1->bindParam(':EmailId',$EmailId,PDO::PARAM_STR);
$query1->execute();
$results=$query1->fetchAll(PDO::FETCH_OBJ);
if($query1->rowCount() > 0)
{
foreach($results as $result);
}
               ?>  


            <div class="right-div">
                 <h4 class="header-line">Hello : <?php echo htmlentities($result->FullName);?></h4>
               

                <a href="logout.php" class="btn btn-danger pull-right">LOG ME OUT</a>
            </div>
            <?php }?>
<?php if($_SESSION['slogin'])
{
?> 
            <div class="right-div">
            <h4 class="header-line">Hello : <?php echo $_SESSION['slogin'];?></h4>
                <a href="logout.php" class="btn btn-danger pull-right">LOG ME OUT</a>
            </div>
            <?php }?>
        </div>
    </div>

    <!-- LOGO HEADER END-->
<?php if($_SESSION['login'])
{
?>    
<section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="dashboard.php" class=<?php $page = explode("/", $_SERVER["PHP_SELF"])[2]; if($page == "dashboard.php") { echo "'menu-top-active'";} else { echo "''"; } ?>>DASHBOARD</a></li>
                            
                            
                            
                         <li><a href="manage-books.php" class=<?php $page = explode("/", $_SERVER["PHP_SELF"])[2]; if($page == "manage-books.php") { echo "'menu-top-active'";} else { echo "''"; } ?>>Search Books</a></li>

                            
                           <li>
                                <a href="#" id="ddlmenuItem" data-toggle="dropdown"
                                   class=
                                   <?php $page = explode("/", $_SERVER["PHP_SELF"])[2]; if($page == "mybooks.php" or $page == "add-book.php") { echo "'menu-top-active'";} else { echo "''"; } ?>
                                   > Books <i class="fa fa-angle-down"></i></a>
                               
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="add-book.php"
                                    class=
                                    <?php $page = explode("/", $_SERVER["PHP_SELF"])[2]; if($page == "add-book.php") { echo "'menu-top-active'";} else { echo "''"; } ?>
                                                               >Add Book</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="mybooks.php"
                                     class=
                                    <?php $page = explode("/", $_SERVER["PHP_SELF"])[2]; if($page == "mybooks.php") { echo "'menu-top-active'";} else { echo "''"; } ?>
                                                               >My Book</a></li>
                            
                                </ul>
                            </li>
                          

                            <li><a href="orderedbooks.php" class=<?php $page = explode("/", $_SERVER["PHP_SELF"])[2]; if($page == "orderedbooks.php") { echo "'menu-top-active'";} else { echo "''"; } ?>>MY Order</a></li>
                            
                            <li><a href="payment.php" class=<?php $page = explode("/", $_SERVER["PHP_SELF"])[2]; if($page == "payment.php") { echo "'menu-top-active'";} else { echo "''"; } ?>>My Wallet</a></li>

                            
                          
                            <li><a href="support.php" class=<?php $page = explode("/", $_SERVER["PHP_SELF"])[2]; if($page == "support.php") { echo "'menu-top-active'";} else { echo "''"; } ?>>Online Support</a></li>
                            
                            
                              <li>
                                <a href="#" id="ddlmenuItem" data-toggle="dropdown"
                                   class=
                                   <?php $page = explode("/", $_SERVER["PHP_SELF"])[2]; if($page == "my-profile.php" or $page == "Address.php" or $page == "change-password.php" ) { echo "'menu-top-active'";} else { echo "''"; } ?>
                                   > Account <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="my-profile.php"
                                    class=
                                    <?php $page = explode("/", $_SERVER["PHP_SELF"])[2]; if($page == "my-profile.php") { echo "'menu-top-active'";} else { echo "''"; } ?>
                                                               >My Profile</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="Address.php"
                                     class=
                                    <?php $page = explode("/", $_SERVER["PHP_SELF"])[2]; if($page == "Address.php") { echo "'menu-top-active'";} else { echo "''"; } ?>
                                                               >My Address</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="change-password.php"
                                    class=
                                    <?php $page = explode("/", $_SERVER["PHP_SELF"])[2]; if($page == "change-password.php") { echo "'menu-top-active'";} else { echo "''"; } ?>
                                                               >Change Password</a></li>
                                </ul>
                            </li>
                            
                            <li><a href="FAQs.php" class=<?php $page = explode("/", $_SERVER["PHP_SELF"])[2]; if($page == "FAQs.php") { echo "'menu-top-active'";} else { echo "''"; } ?>
                                   >FAQs</a></li>
                            
                            
                            


                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php } elseif ($_SESSION['slogin'])
{
?>    
<section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="ShipCoDash.php"
                                   class=
                                    <?php $page = explode("/", $_SERVER["PHP_SELF"])[2]; if($page == "ShipCoDash.php") { echo "'menu-top-active'";} else { echo "''"; } ?>
                                   
                                   >DASHBOARD</a></li>
                            
                             
                           

                            <li><a href="ShippingReq.php"
                                   class=
                                    <?php $page = explode("/", $_SERVER["PHP_SELF"])[2]; if($page == "ShippingReq.php") { echo "'menu-top-active'";} else { echo "''"; } ?>>Shipping Request</a></li>
                            
                            
                            <li><a href="ShipingCochange-password.php"
                                   class=
                                    <?php $page = explode("/", $_SERVER["PHP_SELF"])[2]; if($page == "ShipingCochange-password.php") { echo "'menu-top-active'";} else { echo "''"; } ?>
                                   
                                   >Change Paddword</a></li>

                           
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php } else { ?>
        <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">                           

  <li><a href="adminlogin.php"
         class=
                                    <?php $page = explode("/", $_SERVER["PHP_SELF"])[2]; if($page == "adminlogin.php") { echo "'menu-top-active'";} else { echo "''"; } ?>>Admin Login</a></li>
                            <li><a href="signup.php"
                                   class=
                                    <?php $page = explode("/", $_SERVER["PHP_SELF"])[2]; if($page == "signup.php") { echo "'menu-top-active'";} else { echo "''"; } ?>>Student Signup</a></li>
                            
                             <li><a href="index.php"
                                    class=
                                    <?php $page = explode("/", $_SERVER["PHP_SELF"])[2]; if($page == "index.php") { echo "'menu-top-active'";} else { echo "''"; } ?>>Student Login</a></li>
                            
                            <li><a href="shippinglogin.php"
                                   class=
                                    <?php $page = explode("/", $_SERVER["PHP_SELF"])[2]; if($page == "shippinglogin.php") { echo "'menu-top-active'";} else { echo "''"; } ?>>Shipping Login</a></li>

                          

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php } ?>
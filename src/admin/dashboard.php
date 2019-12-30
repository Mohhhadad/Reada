<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Reada | Admin DashBoard</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">ADMIN DASHBOARD</h4>
                
                            </div>

        </div>
             
             <div class="row">

                 
                 
<a href="reg-students.php"><div class="col-md-3 col-sm-3 col-xs-6">
    <div class="alert alert-success back-widget-set text-center">
            <i class="fa fa-users fa-5x"></i>
            <?php 
            $sql3 ="SELECT id from tblstudents WHERE Status='1' ";
            $query3 = $dbh -> prepare($sql3);
            $query3->execute();
            $results3=$query3->fetchAll(PDO::FETCH_OBJ);
            $regstds=$query3->rowCount();
            ?>
                <h3><?php echo htmlentities($regstds);?></h3>
                        Active Registered Users
    </div>
</div></a>
                 
                 
<a href="reg-students.php"><div class="col-md-3 col-sm-3 col-xs-6">
    <div class="alert alert-danger back-widget-set text-center">
        <i class="fa fa-times-circle-o fa-5x"></i>
        <?php 
     $sql3 ="SELECT id from tblstudents WHERE Status='0' ";
     $query3 = $dbh -> prepare($sql3);
     $query3->execute();
     $results3=$query3->fetchAll(PDO::FETCH_OBJ);
     $regstds=$query3->rowCount();
        ?>
    <h3><?php echo htmlentities($regstds);?></h3>
                           Inactive Registered Users
    </div>
    </div>  </a>

         
 <a href="manage-books.php"><div class="col-md-3 col-sm-3 col-xs-6">
    <div class="alert alert-danger back-widget-set text-center">
                            <i class="fa fa-minus-circle fa-5x"></i>
<?php 
$sql ="SELECT id from tblbooks where com='0' ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$listdbooks=$query->rowCount();
?>


                            <h3><?php echo htmlentities($listdbooks);?></h3>
                      Pending Added Books
        </div>
</div></a>
                 
 <a href="manage-books.php"><div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-success back-widget-set text-center">
                            <i class="fa fa-book fa-5x"></i>
<?php 
$sql ="SELECT id from tblbooks where com='1' ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$listdbooks=$query->rowCount();
?>


                            <h3><?php echo htmlentities($listdbooks);?></h3>
                      Available Books
                        </div>
</div></a>
             </div>

                 
                 
<div class="row">

            
                 <a href=""><div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-info back-widget-set text-center">
                            <i class="fa fa-shopping-cart fa-5x"></i>
<?php 
$sql1 ="SELECT id from tblbooks where com='2' ";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$issuedbooks=$query1->rowCount();
?>

                            <h3><?php echo htmlentities($issuedbooks);?> </h3>
                           Ordered Books
                        </div>
                    </div></a>
             
                      
                      
                      
               <a href="manage-college.php"> <div class="col-md-3 col-sm-3 rscol-xs-6">
                      <div class="alert alert-info back-widget-set text-center">
                            <i class="fa fa-building fa-5x"></i>
<?php 
$sql5 ="SELECT id from tblcollege ";
$query5 = $dbh -> prepare($sql5);
$query5->execute();
$results5=$query5->fetchAll(PDO::FETCH_OBJ);
$listdcats=$query5->rowCount();
?>

                            <h3><?php echo htmlentities($listdcats);?> </h3>
                        College
                        </div>
                    </div></a>
                                   
                      
<a href="manage-categories.php"><div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-info back-widget-set text-center">
                            <i class="fa fa-th fa-5x"></i>
<?php 
$sql4 ="SELECT id from tblcategory ";
$query4 = $dbh -> prepare($sql4);
$query4->execute();
$results4=$query4->fetchAll(PDO::FETCH_OBJ);
$listdathrs=$query4->rowCount();
?>


                            <h3><?php echo htmlentities($listdathrs);?></h3>
                      category
                        </div>
    </div>  </a>
                      
    
<a href="adminsupport.php"><div class="col-md-3 col-sm-3 col-xs-6">
                  <div class="alert alert-warning back-widget-set text-center">
                            <i class="fa fa-comments-o fa-5x"></i>
<?php 
$sql4 ="SELECT supportid from support WHERE status='Pending' ";
$query4 = $dbh -> prepare($sql4);
$query4->execute();
$results4=$query4->fetchAll(PDO::FETCH_OBJ);
$listdathrs=$query4->rowCount();
?>


                            <h3><?php echo htmlentities($listdathrs);?></h3>
                      Pending Support 
                        </div>
                    </div> </a>      
                      
            
    <a href=""><div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-warning back-widget-set text-center">
                            <i class="fa fa-recycle fa-5x"></i>
<?php 

$sql2 ="SELECT orderID from ordertbl where status='On Way'";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$returnedbooks=$query2->rowCount();
?>

                            <h3><?php echo htmlentities($returnedbooks);?></h3>
                          Shippment Under Progress
                        </div>
                    </div></a>

             

     
 <a href="PreparingOrders.php"> <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-warning back-widget-set text-center">
                            <i class="fa fa-cubes fa-5x"></i>
<?php 
$sql6 ="SELECT orderID from ordertbl WHERE status='Pending' ";
$query6 = $dbh -> prepare($sql6);
$query6->execute();
$results6=$query6->fetchAll(PDO::FETCH_OBJ);
$listdathrs6=$query6->rowCount();
?>


                            <h3><?php echo htmlentities($listdathrs6);?></h3>
                      Preparing Orders
                        </div>
                    </div>    </a>
    
    
    
    
     <a href="manage-payment-of.php">
         <div class="col-md-3 col-sm-3 col-xs-6">
                     <div class="alert alert-danger back-widget-set text-center">
                            <i class="fa fa-money fa-5x"></i>

<?php 
$sqlpay = "SELECT * from payment WHERE approved=0 ";
$querypay = $dbh -> prepare($sqlpay);
$querypay->execute();
$resultpay=$querypay->fetchAll(PDO::FETCH_OBJ);
     
$balance=$querypay->rowCount();
?>

                            <h3><?php echo htmlentities($balance);?></h3>
                           Pending Transactions
                        </div>
                    </div>
    </a>
     

     
         </div>             
 
         
            
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
<?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>

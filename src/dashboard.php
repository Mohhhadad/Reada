<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
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
    <title>Reada | Student Dashboard</title>
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
                <h4 class="header-line">Student DASHBOARD</h4>
                
                            </div>

        </div>
             
             
             <div class="row">


                 <div class="col-md-3 col-sm-3 col-xs-6">
                      <a href="mybooks.php"><div class="alert alert-danger back-widget-set text-center">
                            <i class="fa fa-cog fa-5x"></i>
<?php 
$EmailId=$_SESSION['user'];
$sql1 ="SELECT EmailId from tblbooks where EmailId=:EmailId AND com='0'";
$query1 = $dbh -> prepare($sql1);
$query1->bindParam(':EmailId',$EmailId,PDO::PARAM_STR);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$addedbookOnPro=$query1->rowCount();
?>

                            <h3><?php echo htmlentities($addedbookOnPro);?> </h3>
                            Added book - on progress
                        </div></a>
                    </div>
 
                 
                 
                 
                 
                 
                 
                 <div class="col-md-3 col-sm-3 col-xs-6">
                      <a href="orderedbooks.php"><div class="alert alert-info back-widget-set text-center">
                            <i class="fa fa-shopping-cart fa-5x"></i>
<?php 
$EmailId=$_SESSION['user'];
$sql1 ="SELECT EmailId from ordertbl where EmailId=:EmailId";
$query1 = $dbh -> prepare($sql1);
$query1->bindParam(':EmailId',$EmailId,PDO::PARAM_STR);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$Bookordered=$query1->rowCount();
?>

                            <h3><?php echo htmlentities($Bookordered);?> </h3>
                            Book ordered!
                        </div></a>
                    </div>
             
               <div class="col-md-3 col-sm-3 col-xs-6">
                     <a href="mybooks.php"> <div class="alert alert-success back-widget-set text-center">
                            <i class="fa fa-book fa-5x"></i>

                          <?php 
$EmailId=$_SESSION['user'];
$sql1 ="SELECT EmailId from tblbooks where EmailId=:EmailId AND com='1'";
$query1 = $dbh -> prepare($sql1);
$query1->bindParam(':EmailId',$EmailId,PDO::PARAM_STR);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$avalibleUrBooks=$query1->rowCount();
?>

                            <h3><?php echo htmlentities($avalibleUrBooks);?></h3>
                          available books added by you!
                        </div></a>
                    </div>
                 
                 
               <div class="col-md-3 col-sm-3 col-xs-6">
                      <a href="mybooks.php"><div class="alert alert-warning back-widget-set text-center">
                            <i class="fa fa-retweet fa-5x"></i>

                          <?php 
$EmailId=$_SESSION['user'];
$sql1 ="SELECT EmailId from tblbooks where EmailId=:EmailId AND com='2'";
$query1 = $dbh -> prepare($sql1);
$query1->bindParam(':EmailId',$EmailId,PDO::PARAM_STR);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$avalibleUrBooks=$query1->rowCount();
?>

                            <h3><?php echo htmlentities($avalibleUrBooks);?></h3>
                           books Slod!
                        </div></a>
                    </div>
                 
             </div>                 
                 
                             <div class="row">
 
 <div class="col-md-3 col-sm-3 col-xs-6">
                      <a href="payment.php"><div class="alert alert-success back-widget-set text-center">
                            <i class="fa fa-money fa-5x"></i>

<?php 
$user=$_SESSION['login'];
$sqlp = "SELECT SUM(`amount`) AS Balance from payment WHERE useremail='$user' AND approved = 1";
$queryp = $dbh -> prepare($sqlp);
$queryp->execute();
$resultp=$queryp->fetchAll(PDO::FETCH_OBJ);
if($queryp->rowCount() > 0)
{
foreach($resultp as $resultcp);
}
        $balance=$resultcp->Balance;
?>

                            <h3><?php echo htmlentities($balance);?></h3>
                           Available Money!
                        </div></a>
                    </div>
                                 
                                 

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

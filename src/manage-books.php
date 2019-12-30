<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
else{ 
if(isset($_GET['Order']))
{
    
    $EmailAdd=$_SESSION['user'];
    $sqlck = "SELECT City from Address WHERE EmailId='$EmailAdd'";
    $queryck = $dbh -> prepare($sqlck);
$queryck->execute();
$resultsk=$queryck->fetchAll(PDO::FETCH_OBJ);
if($queryck->rowCount() > 0)
{
foreach($resultsk as $resultck);
}
    $x=$resultck->City;
  
$bookidpri=$_GET['Order'];
$sqlpri = "SELECT `BookPrice`, `EmailId` FROM `tblbooks` WHERE `id`='$bookidpri'";
$querypri = $dbh -> prepare($sqlpri);
$querypri->execute();
$resultpri=$querypri->fetchAll(PDO::FETCH_OBJ);
if($querypri->rowCount() > 0)
{
foreach($resultpri as $resultcpri);
}
        $BookPrice=$resultcpri->BookPrice; 
    $Bookowner=$resultcpri->EmailId;    
  
    
$sqlp = "SELECT SUM(`amount`) AS Balance FROM payment WHERE useremail='$EmailAdd' AND approved = 1";
$queryp = $dbh -> prepare($sqlp);
$queryp->execute();
$resultp=$queryp->fetchAll(PDO::FETCH_OBJ);
if($queryp->rowCount() > 0)
{
foreach($resultp as $resultcp);
}
        $balance=$resultcp->Balance;

{if($x=='none'){
   echo '<script>alert("Oops. We do not have your address information. Please set your address in your profile.")</script>';
                }
 elseif($balance < $BookPrice){
   echo '<script>alert("Oops. No enough money.")</script>';
                }
 else{
        
$id=$_GET['Order'];
$EmailId=$_SESSION['user'];
$sqlid = "INSERT INTO  ordertbl (BookID,EmailId) VALUES(:id,:EmailId)";
$query = $dbh->prepare($sqlid);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> bindParam(':EmailId',$EmailId, PDO::PARAM_STR);
$query -> execute();
$sqld = "UPDATE tblbooks SET com = 2 WHERE id=:id ";
$query = $dbh->prepare($sqld);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();

$sqlbuy = "INSERT INTO  payment (useremail,amount, typeoftras, approved,bookid) VALUES('$EmailId','-$BookPrice','Buy',1,'$id') ";
$query = $dbh->prepare($sqlbuy);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
     
     
     
$sqlsell = "INSERT INTO  payment (useremail,amount, typeoftras, approved,bookid) VALUES('$Bookowner','$BookPrice','Sell',1,'$id') ";
$query = $dbh->prepare($sqlsell);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
     
        $msg="Your order is Successfully placed";



header('location:manage-books.php');

 }}}  ?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Reada | Manage Books</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                <h4 class="header-line">Search Books</h4>
                
                 <?php
        if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?> 
    </div>
     <div class="row">
    <?php if($_SESSION['error']!="")
    {?>
<div class="col-md-6">
<div class="alert alert-danger" >
 <strong>Error :</strong> 
 <?php echo htmlentities($_SESSION['error']);?>
<?php echo htmlentities($_SESSION['error']="");?>
</div>
</div>
<?php } ?>
<?php if($_SESSION['msg']!="")
{?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 
 <?php echo htmlentities($_SESSION['msg']);?>
<?php echo htmlentities($_SESSION['msg']="");?>
</div>
</div>
<?php } ?>
<?php if($_SESSION['updatemsg']!="")
{?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 
 <?php echo htmlentities($_SESSION['updatemsg']);?>
<?php echo htmlentities($_SESSION['updatemsg']="");?>
</div>
</div>
<?php } ?>


   <?php if($_SESSION['delmsg']!="")
    {?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 
 <?php echo htmlentities($_SESSION['delmsg']);?>
<?php echo htmlentities($_SESSION['delmsg']="");?>
</div>
</div>
<?php } ?>

</div>


        </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Books Listing
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Book Name</th>
                                            <th>Author</th>
                                            <th>Book Language</th>
                                            <th>Condition Rate</th>
                                            <th>Category</th>
                                            <th>college</th>
                                            <th>ISBN</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php $sql = "SELECT tblbooks.BookName,tblbooks.Author,tblcategory.CategoryName,tblcollege.College,tblbooks.ISBNNumber,tblbooks.BookPrice,tblbooks.BookLanguage,tblbooks.ConditionRate,tblbooks.Description,tblbooks.id as bookid from  tblbooks join tblcategory on tblcategory.id=tblbooks.CatId join tblcollege on tblcollege.id=tblbooks.CollegeId where com='1'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>                                      
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center"><?php echo htmlentities($result->BookName);?></td>
                                            <td class="center"><?php echo htmlentities($result->Author);?></td>
                                            <td class="center"><?php echo htmlentities($result->BookLanguage);?></td><td class="center"><?php echo htmlentities($result->ConditionRate);?></td>
                                            <td class="center"><?php echo htmlentities($result->CategoryName);?></td>
                                            <td class="center"><?php echo htmlentities($result->College);?></td>
                                            <td class="center"><?php echo htmlentities($result->ISBNNumber);?></td>
                                            <td class="center"><?php echo htmlentities($result->BookPrice);?></td>
                                            <td class="center"><?php echo htmlentities($result->Description);?></td>
                                            <td class="center">  
                                                <a href="manage-books.php?Order=<?php echo htmlentities($result->bookid);?>" onclick="return confirm('I want to order this book. It will not be visible after being ordered and it will ship to you by shipping company. Thank you.');" >  <button class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Order</button>
                                                </a>
                                              
                                        </tr>
 <?php $cnt=$cnt+1;}} ?>                                      
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
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
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>

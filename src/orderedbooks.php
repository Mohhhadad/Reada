<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
 header('location:index.php');
}
else{ 
if(isset($_GET['updateR']))
{
$orderID=$_GET['updateR'];
$sqlR = "UPDATE ordertbl SET DateOfReseved = CURRENT_TIMESTAMP(), status='On Way'  WHERE orderID=:orderID ";
$query = $dbh->prepare($sqlR);
$query -> bindParam(':orderID',$orderID, PDO::PARAM_STR);
$query -> execute();
}elseif(isset($_GET['updateD']))
{
$orderID=$_GET['updateD'];
$sqlD = "UPDATE ordertbl SET DateOfDelivered = CURRENT_TIMESTAMP(), status='Delivered'  WHERE orderID=:orderID ";
$query = $dbh->prepare($sqlD);
$query -> bindParam(':orderID',$orderID, PDO::PARAM_STR);
$query -> execute();
}
    ?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Reada | My Order</title>
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
                <h4 class="header-line">Ordered Books</h4>
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
                           Listing of Ordered Books 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order ID </th>
                                            <th>Date Of Recived</th>
                                            <th>Date Of Delivered</th>
                                            <th>Book Name</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$EmailId=$_SESSION['user'];    
$sql = "SELECT * FROM ordertbl join tblbooks on tblbooks.id=ordertbl.BookID WHERE ordertbl.EmailId=:EmailId ";
$query = $dbh -> prepare($sql);
$query -> bindParam(':EmailId',$EmailId, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>                                      
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center"><?php echo htmlentities($result->orderID);?></td>
                                            <td class="center"><?php echo htmlentities($result->DateOfReseved);?></td>
                                            <td class="center"><?php echo htmlentities($result->DateOfDelivered);?></td>
                                            <td class="center"><?php echo htmlentities($result->BookName);?></td>
                                            
                                            <td class="center"><?php if($result->status=='Delivered') {?>
                                            <a href="#" class="btn btn-success btn-xs">Delivered</a>
                                            <?php } elseif($result->status=='On Way') {?>
                                            <a href="#" class="btn btn-info btn-xs">On Way</a>
                                            <?php } else {?>
                                            <a href="#" class="btn btn-danger btn-xs">Pending</a>
                                            <?php } ?></td>
                                            
                                            
                                        
                
                                                
                                              
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

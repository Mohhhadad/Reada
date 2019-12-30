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

    
if(isset($_POST['postcomment'])){

$EmailId=$_SESSION['user'];
$sql1 ="SELECT * from support where email='$EmailId' ORDER BY supportid desc LIMIT 1 ";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$resultsc=$query1->fetchAll(PDO::FETCH_OBJ);
if($query1->rowCount() > 0)
{
foreach($resultsc as $resultc);
}
    $x=$resultc->status;
               

    {if($x=='Pending'){
   echo '<script>alert("You Have a Pending Comment. Please wait until veiwe by admin. ")</script>';}
    
else{
//POET THE COMMENT 
$EmailId=$_SESSION['user'];
$comment=$_POST['comment'];

$sqlc="INSERT INTO support SET msg='$comment', email='$EmailId', time=CURRENT_TIMESTAMP(),status='Pending'";
    
    

$queryc = $dbh->prepare($sqlc);
$queryc->bindParam(':msg',$comment,PDO::PARAM_STR);


$queryc->execute();

echo '<script>alert("Your Comment Submited Successfully!")</script>'; 

    }}}
    ?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Reada | Online Support</title>
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
                <h4 class="header-line">ONLINE SUPPORT</h4>
                <br>
                <h5>Before Use Online Support, We Advice you to see The FAQ . It Might Have an Answer to Your Concern By cilick on  <a href="FAQs.php"> FAQ Page</a> If not go back to this page . We Are Here To Help you!</h5>
            
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
                           Listing of Your Comments and Admin Responses  
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Ticket ID </th>
                                            <th>Date of Posted</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$EmailId=$_SESSION['user'];    
$sql = "SELECT * FROM support WHERE support.email=:EmailId ";
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
                                            <td class="center"><?php echo htmlentities($result->supportid);?></td>
                                           <td class="center"><?php echo htmlentities($result->time);?></td>
                                            
                                            <td class="center"><?php echo htmlentities($result->msg);?></td>
                                           
                                            
                                            
                                            <td class="center"><?php if($result->status=='Pending') {?>
                                            <a href="#" class="btn btn-danger btn-xs">Pending</a>
                                            <?php } elseif($result->status=='Viewed') {?>
                                            <a href="#" class="btn btn-success btn-xs">Viewed</a>
                                            <?php } else {?>
                                            <a href="#" class="btn btn-info btn-xs">ADMIN</a>
                                            <?php } ?></td>
                                            
                                               
                                            
                                        

                                        </tr>
 <?php $cnt=$cnt+1;}} ?>                                      
                                    </tbody>
                                    
                                    
                                </table>
                                
                                                <form method="post" action="support.php">
                                                    
                                                    <label>Write here your Comment : </label><input type='text' name='comment' autocomplete="off"  size='60'required >
                                                    <input type="submit" name="postcomment" class="btn btn-primary"><br>
                                                    <p class="help-block">Note: Be aware that you can not post another comment until the admin response your prevoius  comment.</p>

                                                    
                                                           
                                                           
                                                           </form>
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

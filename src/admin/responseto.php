<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    { 
 header('location:index.php');
}

 
$email=$_SESSION['emailsu'];

if(isset($_POST['postcomment'])){
$comment=$_POST['comment'];
$sqlu="UPDATE support SET status='Viewed' WHERE email='$email' AND status='Pending'";
$queryu = $dbh->prepare($sqlu);
$queryu->execute();
    
$sqlc="INSERT INTO support SET msg='$comment', email='$email', time=CURRENT_TIMESTAMP(),status='ADMIN'";
$queryc = $dbh->prepare($sqlc);
$queryc->bindParam(':msg',$comment,PDO::PARAM_STR);
$queryc->bindParam(':email',$emails,PDO::PARAM_STR);

$queryc->execute();
    

echo '<script>alert("Your Comment Submited successfully")</script>';
     header('location:adminsupport.php');


}
    ?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Reada | Response To Support</title>
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
                                            <th>Ticket ID </th>
                                            <th>FROM</th>
                                            <th>Date of Posted</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$emails=$_GET['email'];
$_SESSION['emailsu'] =  $emails  ;                         
$sql = "SELECT * FROM support WHERE email='$emails' ";
$query = $dbh -> prepare($sql);
$query -> bindParam(':email',$email, PDO::PARAM_STR);
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
                                            <td class="center"><?php echo htmlentities($result->email);?></td>
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
                                
                                                <form method="post" action="responseto.php">
                                                    <label>Write here your Comment :<br>
                                                    <textarea name="comment" cols="50" rows="1"  autocomplete="off" required> </textarea> </label>
                                                    
                                                    
                                                    
                                                    <input type="submit" name="postcomment" class="btn btn-primary">
                                                           
                                                           
                                                           </form>
                            </div>
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
<?php  ?>

<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 
    
if(isset($_GET['emailpa']))
{
$email=$_GET['emailpa'];
$status=0;
$sql = "UPDATE `payment` SET `approved`= 1 WHERE `useremail`='$email'";
$query = $dbh->prepare($sql);
$query -> bindParam(':email',$email, PDO::PARAM_STR);
$query -> execute();
header('location');
}
    

if(isset($_GET['emailtra']))
{
$email=$_GET['emailtra'];
$sql = "UPDATE payment SET amount = amount * -1 , approved='1' WHERE `useremail` ='$email' AND `approved`='0' AND `typeoftras`='Transfer money From Reada'";
$query = $dbh->prepare($sql);
$query -> bindParam(':email',$email, PDO::PARAM_STR);
$query -> execute();
header('location');
}



//code for active students

    
    
    
    
    
    
    
    
if(isset($_POST['Create']))
{    
        $bankacc=$_POST['bankacc'];
        $amount=$_POST['amount'];
    $user=$_SESSION['user'];

$sqlc = "INSERT INTO  payment (useremail ,bankacc , amount, typeoftras, approved) VALUES ('$user', '$bankacc','$amount','add money', '0')";
$queryc = $dbh->prepare($sqlc);
$queryc -> execute();
header('location:payment.php#manag');
}


    ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Reada | Financial Transactions</title>
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
                <h4 class="header-line" id='manag'>Manage Studnts' Transactions </h4>
    </div>

            
            
            
            
  <div class="container">
            
 <?php 
$user=$_SESSION['login'];
$sqlp = "SELECT SUM(`amount`) AS Balance from payment WHERE useremail='$user'";
$queryp = $dbh -> prepare($sqlp);
$queryp->execute();
$resultp=$queryp->fetchAll(PDO::FETCH_OBJ);
if($queryp->rowCount() > 0)
{
foreach($resultp as $resultcp);
}
        $balance=$resultcp->Balance;
      ?>      
            
             
             </div>
            <div class="row">
                <div class="col-md-12">
                
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        
                        <div class="panel-heading">
                          Transactions Sheet 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Transaction Time</th>
                                            <th>Amount</th>
                                            <th>Type</th>
                                            <th>IBAN</th>
                                            <th>status</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>             
                                    
                                    
                                    <tbody>
 <?php
$sql = "SELECT * FROM payment WHERE approved=0 ";
$query = $dbh -> prepare($sql);
$query -> bindParam(':email',$email, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>                                                
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center"><?php echo htmlentities($result->trantime);?></td>
                                            <td class="center"><?php echo htmlentities($result->amount);?></td>
                                            <td class="center"><?php echo htmlentities($result->typeoftras);?></td>
                                            <td class="center"><?php echo htmlentities($result->bankacc);?></td>

                                            
                                            <td class="center"><?php if($result->approved=='1') {?>
                                            <a href="#" class="btn btn-success btn-xs">Approved</a>
                                            <?php } elseif($result->approved=='0') {?>
                                            <a href="" class="btn btn-info btn-xs">Pending</a>
                                            <?php } else {?>
                                            <a href="#" class="btn btn-danger btn-xs">Rejected</a>
                                            <?php } ?></td>
                                            
                                            <td class="center">
                                            <?php $x=htmlentities($result->typeoftras);
 
                                                if($x=='Transfer money to Reada')
                                                {?> <a href="manage-payment-of.php?emailpa=<?php echo htmlentities($result->useremail);
                                                     $xx=$result->useremail;?>" onclick="return confirm('Are sure to Accept this money.');">  <button class="btn btn-success"><i class="fa fa-check"></i>Accept </button>
                                                </a>
                                                
                                                <?php ;}
 else{ ?>
                                                
                                                
                                                
                                            <a href="manage-payment-of.php?emailtra=<?php echo htmlentities($result->useremail);
                                                     $xx=$result->useremail;?>" onclick="return confirm('Are sure that you transferred the moeny!');">
                                               
                                               <button class="btn btn-danger"><i class="fa fa-check"></i> Transfer</button>
                                                </a><?php;}?> 
                                            </td>
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

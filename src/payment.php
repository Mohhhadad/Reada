<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
else{ 
    
   
    
    
    
    
if(isset($_POST['Create']))
{ 
    
     
    {$user=$_SESSION['login'];
    
$sqlp = "SELECT SUM(`amount`) AS Balance from payment WHERE useremail='$user' AND approved = 1";
$queryp = $dbh -> prepare($sqlp);
$queryp->execute();
$resultp=$queryp->fetchAll(PDO::FETCH_OBJ);
if($queryp->rowCount() > 0)
{
foreach($resultp as $resultcp);
}
        $balances=$resultcp->Balance;
    $balance=htmlentities($balances);}
    
    
    
    $com=$_POST['addorreq'];
    $amount=$_POST['amount'];

    $user=$_SESSION['login'];
    $sql = "SELECT * from payment where useremail='$user' AND approved ='0'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$addedbookOnPro=$query->rowCount();
    $zxc=htmlentities($addedbookOnPro);
    
   if ($zxc == 1){
        echo '<script>alert("Oops. You have a Pending transaction, You have to wait before make a new transaction.")</script>';
   
   
   }elseif($com =='Transfer money From Reada' and $balance < $amount){
   
   echo '<script>alert("Oops. Please Reduce the Amount, your balance is less than the amount")</script>';}
    
    
    else{
    
    
    
    
        $bankacc=$_POST['bankacc'];
        $amount=$_POST['amount'];
    $user=$_SESSION['user'];
    $com=$_POST['addorreq'];


$sqlc = "INSERT INTO  payment 
(useremail ,bankacc , amount, typeoftras, approved) VALUES 
('$user', '$bankacc','$amount','$com', '0')";
$queryc = $dbh->prepare($sqlc);
$queryc -> execute();
header('location:payment.php#manag');
}}


    ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Reada | Manage Your Money</title>
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
                <h4 class="header-line" id='manag'>Manage Your Money</h4>
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
                    <h4>Your balance is <?php   echo $balance; ?> S.R. If you want to add money to your account please go to the end of this page or <a href="#addmoney">Press Here</a><br><br>
                    For more information please open a ticket in <a href="support.php" >online support</a></h4>
                
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
                                            <th>status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$user=$_SESSION['login'];
$sql = "SELECT * from payment where useremail='$user'";
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
                                            <td class="center"><?php echo htmlentities($result->trantime);?></td>
                                            <td class="center"><?php echo htmlentities($result->amount);?></td>
                                            <td class="center"><?php echo htmlentities($result->typeoftras);?></td>
                                            
                                            <td class="center"><?php if($result->approved=='1') {?>
                                            <a href="#" class="btn btn-success btn-xs">Approved</a>
                                            <?php } elseif($result->approved=='0') {?>
                                            <a href="" class="btn btn-info btn-xs">Pending</a>
                                            <?php } else {?>
                                            <a href="#" class="btn btn-danger btn-xs">Rejected</a>
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
        <div class="container">
            <div class="col-md-12">
            <div class="row">
    
                
        <br>
                
<h4 class="header-line" id='addmoney'>Add/Request Money to/from your account</h4>
                <h4>To add money: You must transfer the amount to our bank account(SA123456789123).Then complete the form and choose add moeny.
                <h4> To request your money: You must complete the form and choose request moeny in the form .

                    </h4>

<div class="col-md-7 col-sm-3 col-xs-1 col-md-offset-2" >

<div class="panel-heading">
<div class="panel panel-danger">
<div class="panel-heading">
 
<form role="form" method="post">

<div><br>

<label>Enter Your IBAN That You Transfer Money From/To:<span  style="color:red;">*</span>  &nbsp &nbsp  

SA &nbsp<input type="number" name="bankacc" autocomplete="off" required size='27'/> &nbsp &nbsp  
    <hr>
    
    </label> 
    
    &nbsp &nbsp &nbsp &nbsp  
    
    <label>Enter The Amount of Money That You would Transfer:<span  style="color:red;">*</span> &nbsp &nbsp 
    <input  type="number" name="amount" autocomplete="off" required size='27' />&nbsp S.R
    </label>

    <hr>
     
    
    
    
    
   <div class="form-group">
 <label >Choice The Type<span  style="color:red;">*</span></label><br>
      
      
 <label><input class="" type="radio" name="addorreq" value="Transfer money to Reada" required="required"
              
               />&nbsp;Add Money</label> &nbsp;&nbsp;
      
 <label><input class="" type="radio" name="addorreq" value="Transfer money From Reada" required="required" /> &nbsp;Request Money</label>
    

    
    <hr>
    
    </div>
   <p> <input type="checkbox" name='he ' required /> &nbsp I Understand that my money may take few days until the transaction be approved</p>
    <hr>

&nbsp &nbsp &nbsp

 <button type="submit" name="Create" class="btn btn-primary" >Create a transaction </button>
</form><br>
    
                </div></div>      
                
    </div>        </div></div>       
                
                
                
                
                
                            

            
   
                    </div></div></div></div></div></div>

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

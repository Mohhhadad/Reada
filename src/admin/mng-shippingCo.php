<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

// code for block student    
if(isset($_GET['InShippingID']))
{
$id=$_GET['InShippingID'];
$status=0;
$sql = "update shippingco set shipStatus='$status'  WHERE ShippingID='$id'";
$query = $dbh->prepare($sql);
$query -> execute();
 
header('location:mng-shippingCo.php');
}



//code for active students
if(isset($_GET['AcShippingID']))
{
$id=$_GET['AcShippingID'];
$status=1;
$sql = "update shippingco set shipStatus='$status'  WHERE ShippingID='$id'";
$query = $dbh->prepare($sql);
$query -> execute();
       echo '<script>alert("Hello! I am an alert box!");</script>';
header('location:mng-shippingCo.php');
}
    
    
    
if(isset($_POST['Create']))
{    
        $shipusername=$_POST['shipusername'];
        $shippassword=md5($_POST['shippassword']);

$sqlc = "INSERT INTO  shippingco (ShipUserName,ShipPassword, shipStatus) VALUES ('$shipusername', '$shippassword', '1')";
$queryc = $dbh->prepare($sqlc);
$queryc -> execute();
header('location:mng-shippingCo.php');
}


    ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Reada | Manage Shipping Company Accounts</title>
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
                <h4 class="header-line">Manage Shipping Company Accounts</h4>
    </div>
         <div class="container">
            <div class="col-md-12">
            <div class="row">
    
                
        
<h5 class="header-line">Adding New Shipping Company</h5>
<div class="col-md-7 col-sm-3 col-xs-1 col-md-offset-2" >


               <div class="panel-heading">
<div class="panel panel-danger">
<div class="panel-heading">
 
<form role="form" method="post">

<div><br>
<label>Enter New Shipping Username</label> &nbsp &nbsp &nbsp &nbsp  <label>Enter Password of Shipping</label>
</div>

<input type="text" name="shipusername" autocomplete="off" required size='27'/> &nbsp &nbsp &nbsp &nbsp
<input  type="text" name="shippassword" autocomplete="off" required size='25' />

&nbsp &nbsp &nbsp

 <button type="submit" name="Create" class="btn btn-primary" >Create </button>
</form><br>
    
                </div></div>      
                
    </div>        </div></div>       
                
                
                
                
                
            </div></div>
            
            
            
            <br><br>
            
  <div class="container">
            <div class="col-md-12">
                
<h5 class="header-line">Managing Existing Shipping Company</h5>

            
            </div></div>
            
            
            
            
            
            
            
        </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Shipping Company 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Shipping Company ID</th>
                                            <th>Shipping Company Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php $sql = "SELECT * from shippingco";
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
                                            <td class="center"><?php echo htmlentities($result->ShippingID);?></td>
                                            <td class="center"><?php echo htmlentities($result->ShipUserName);?></td>
                                            <td class="center"><?php if($result->shipStatus==1)
                                            {
                                                echo htmlentities("Active");
                                            } else {


                                            echo htmlentities("Blocked");
}
                                            ?></td>
                                            <td class="center">
<?php if($result->shipStatus==1)
 {?>
<a href="mng-shippingCo.php?InShippingID=<?php echo htmlentities($result->ShippingID);?>" 
   onclick="return confirm('Are you sure you want to block this Company?');" >  
    <button class="btn btn-danger"> Inactive</button>
<?php } else {?>

            <a href="mng-shippingCo.php?AcShippingID=<?php echo htmlentities($result->ShippingID);?>"
                  onclick="return confirm('Are you sure you want to active this Company?');" >
                <button class="btn btn-primary"> Active</button> 
                                            <?php } ?>
                                          
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

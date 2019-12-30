<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
if(isset($_POST['add']))
{
    if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        echo "<script>alert('Incorrect verification code');</script>" ;
    } 
    else {    
//Code for student ID

$EmailId=$_SESSION['user'];
$city=$_POST['city'];
$Postcode=$_POST['postcode'];
$ApartmentNumber=$_POST['apartmentnumber'];
$Street=$_POST['street'];
$Neighborhood=$_POST['neighborhood'];



$sql="UPDATE Address SET City='$city',Nighborhood='$Neighborhood',Postcode='$Postcode',ApartmentNumber='$ApartmentNumber',Street='$Street' WHERE EmailId='$EmailId'";
    
    

$query = $dbh->prepare($sql);
$query->bindParam(':AddressID',$AddressID,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':Street',$Street,PDO::PARAM_STR);
$query->bindParam(':Neighborhood',$Neighborhood,PDO::PARAM_STR);
$query->bindParam(':ApartmentNumber',$ApartmentNumber,PDO::PARAM_STR);
$query->bindParam(':Postcode',$Postcode,PDO::PARAM_STR);
$query->bindParam(':EmailId',$EmailId,PDO::PARAM_STR);

$query->execute();

        $msg="Your Address is Successfully Updated";

echo '<script>alert("Your Address is Successfully Updated.")</script>'; 

    }}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Reada | My Address</title>
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

               
                <h4 class="header-line"> <?php echo htmlentities($result->FullName);?> Address </h4>
                
                <?php
        if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?> 
    </div>
    

<div class="row">
    <div class="col-md-9 col-md-offset-1">
 <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                          Add Address 
            </div>
<div class="panel-body">
<form  method="post" action="Address.php">
    
    <?php 
$EmailId=$_SESSION['user'];
$sql1 ="SELECT * from Address where EmailId='$EmailId' ";
$query1 = $dbh -> prepare($sql1);
$query1->bindParam(':EmailId',$EmailId,PDO::PARAM_STR);
$query1->execute();
$results=$query1->fetchAll(PDO::FETCH_OBJ);
if($query1->rowCount() > 0)
{
foreach($results as $result);
}
               ?>  

               

<div class="form-group">
<label>City</label>
<input class="form-control" type="text" name="city" autocomplete="off"  value='<?php echo htmlentities($result->City);?>' required />
</div>                        
                                    
<div class="form-group">
<label>Street</label>
<input class="form-control" type="text" name="street" autocomplete="off" value='<?php echo htmlentities($result->Street);?>' required/>
</div>
                                    
 <div class="form-group">
<label>Neighborhood</label>
<input class="form-control" type="text" name="neighborhood" autocomplete="off" value='<?php echo htmlentities($result->Nighborhood);?>' required/>
</div>
                                    
 <div class="form-group">
<label>Apartment Number</label>
<input class="form-control" type="number" name="apartmentnumber" autocomplete="off" value='<?php echo htmlentities($result->ApartmentNumber);?>' required/>
</div>
                                    
<div class="form-group">
<label>Post Code</label>
<input class="form-control" type="number" name="postcode" autocomplete="off" value='<?php echo htmlentities($result->Postcode);?>' required/>
</div>                                 
    
                                  
<div class="form-group">
<label>Verification code : </label>
<input type="text"  name="vercode" maxlength="5" autocomplete="off"  style="width: 150px; height: 25px;" required />&nbsp;<img src="captcha.php">
</div>      
		<input type="submit" name="add" class="btn btn-primary">
</form>
	<br/>
            </div></div></div></div></div></div></div>
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

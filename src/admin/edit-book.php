<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['update']))
{
$bookname=$_POST['bookname'];
$category=$_POST['category'];
$author=$_POST['author'];
$college=$_POST['college'];
$isbn=$_POST['isbn'];
$price=$_POST['price'];
$Blanguage=$_POST['Blanguage'];
$descr=$_POST['descr']; 
$rating=$_POST['rating'];
$com=$_POST['com'];
$bookid=intval($_GET['bookid']);
$sql="update  tblbooks set BookName=:bookname,CatId=:category,CollegeId=:college,Author=:author,ISBNNumber=:isbn,BookPrice=:price,com=:com,BookLanguage=:Blanguage,Description=:descr,ConditionRate=:rating where id=:bookid";
$query = $dbh->prepare($sql);
$query->bindParam(':bookname',$bookname,PDO::PARAM_STR);
$query->bindParam(':category',$category,PDO::PARAM_STR);
$query->bindParam(':college',$college,PDO::PARAM_STR);
$query->bindParam(':author',$author,PDO::PARAM_STR);
$query->bindParam(':isbn',$isbn,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
$query->bindParam(':com',$com,PDO::PARAM_STR);
$query->bindParam(':Blanguage',$Blanguage,PDO::PARAM_STR);
$query->bindParam(':descr',$descr,PDO::PARAM_STR);
$query->bindParam(':rating',$rating,PDO::PARAM_STR);
$query->bindParam(':bookid',$bookid,PDO::PARAM_STR);
$query->execute();
$_SESSION['msg']="Book info updated successfully";
header('location:manage-books.php');


}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Reada | Edit Book</title>
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
    <div class="content-wra">
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Add Book</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
<div class="panel panel-info">
<div class="panel-heading">
Book Info
</div>
<div class="panel-body">
<form role="form" method="post">
<?php 
$bookid=intval($_GET['bookid']);
$sql = "SELECT tblbooks.com,tblbooks.BookName,tblbooks.Author,tblcategory.CategoryName,tblcategory.id as cid,tblcollege.College,tblcollege.id as athrid,tblbooks.ISBNNumber,tblbooks.BookPrice,tblbooks.BookLanguage,tblbooks.ConditionRate,tblbooks.Description,tblbooks.id as bookid from  tblbooks join tblcategory on tblcategory.id=tblbooks.CatId join tblcollege on tblcollege.id=tblbooks.CollegeId where tblbooks.id=:bookid";
$query = $dbh -> prepare($sql);
$query->bindParam(':bookid',$bookid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  

<div class="form-group">
<label>Book Name<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="bookname" value="<?php echo htmlentities($result->BookName);?>" required />
</div>
    
    <div class="form-group">
<label>Author Name<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="author" value="<?php echo htmlentities($result->Author);?>" required />
</div>
    
    <div class="form-group">
        
<div class="form-group">
<label>Book Language: "<span style="color:red;">*</span></label>
                    <select class="form-control" name= "Blanguage" >
                        <option <?php if (htmlentities($result->BookLanguage)==='Arabic'){echo 'selected="selected"';};?>>Arabic</option>
                        <option <?php if (htmlentities($result->BookLanguage)==='English'){echo 'selected="selected"';};?>>English</option>
                    </select>
</div>                                    
                                    
                       
    
<div class="form-group">

<label>Condition Rate:<span style="color:red;">*</span></label>
                    <select class="form-control" name= "rating">
                        
                        <option <?php if (htmlentities($result->ConditionRate)==='As New'){echo 'selected="selected"';};?> >As New</option>

                        <option <?php if (htmlentities($result->ConditionRate)==='Fine'){echo 'selected="selected"';};?> >Fine</option>
                        
                        <option option <?php if (htmlentities($result->ConditionRate)==='Good'){echo 'selected="selected"';};?>>Good</option>
                        
                        <option option <?php if (htmlentities($result->ConditionRate)==='Fair'){echo 'selected="selected"';};?>>Fair</option>
                       
                        <option option <?php if (htmlentities($result->ConditionRate)==='Poor'){echo 'selected="selected"';};?>>Poor</option>

                    </select>
</div>     

<div class="form-group">
<label> Category<span style="color:red;">*</span></label>
<select class="form-control" name="category" required="required">
<option value="<?php echo htmlentities($result->cid);?>"> <?php echo htmlentities($catname=$result->CategoryName);?></option>
<?php 
$status=1;
$sql1 = "SELECT * from  tblcategory where Status=:status";
$query1 = $dbh -> prepare($sql1);
$query1-> bindParam(':status',$status, PDO::PARAM_STR);
$query1->execute();
$resultss=$query1->fetchAll(PDO::FETCH_OBJ);
if($query1->rowCount() > 0)
{
foreach($resultss as $row)
{           
if($catname==$row->CategoryName)
{
continue;
}
else
{
    ?>  
<option value="<?php echo htmlentities($row->id);?>"><?php echo htmlentities($row->CategoryName);?></option>
 <?php }}} ?> 
</select>
</div>

<div class="form-group">
<label> College<span style="color:red;">*</span></label>
<select class="form-control" name="college" required="required">
<option value="<?php echo htmlentities($result->athrid);?>"> <?php echo htmlentities($athrname=$result->College);?></option>
<?php 

$sql2 = "SELECT * from  tblcollege ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);
if($query2->rowCount() > 0)
{
foreach($result2 as $ret)
{           
if($athrname==$ret->College)
{
continue;
} else{

    ?>  
<option value="<?php echo htmlentities($ret->id);?>"><?php echo htmlentities($ret->College);?></option>
 <?php }}} ?> 
</select>
</div>


<div class="form-group">
<label>ISBN Number<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="isbn" value="<?php echo htmlentities($result->ISBNNumber);?>"  required="required" />
<p class="help-block">An ISBN is an International Standard Book Number.ISBN Must be unique</p>
</div>

 <div class="form-group">
 <label>Price<span style="color:red;">*</span></label>
 <input class="form-control" type="text" name="price" value="<?php echo htmlentities($result->BookPrice);?>"   required="required" />
 </div>
    
        
<div class="form-group">
<label>Description<span style="color:red;">*</span></label>
<textarea name="descr" value="" cols="70" rows="8"  autocomplete="off" required> <?php echo htmlentities($result->Description);?></textarea>
</div>         
        
    
  <div class="form-group">
 <label >Book Status<span  style="color:red;">*</span></label><br>
      <?php $x=htmlentities($result->com); ?>
      
 <label><input class="" type="radio" name="com" value="0" required="required"
               <?php if ($x==0) {echo "checked";}?>
               />&nbsp;Not Active</label> &nbsp;&nbsp;
      
 <label><input class="" type="radio" name="com" value="1" required="required" 
               <?php if ($x==1) {echo "checked";}?>
               /> &nbsp;Available</label>&nbsp;&nbsp;
     <!--
 
 <!-<label><input class="" type="radio" name="com" value="2" required="required" 
               <?php if ($x==2) {echo "checked";}?>
               />&nbsp;Ordered</label>
      -->
      &nbsp;&nbsp;


 </div>   
    
 <?php }} ?>
<button type="submit" name="update" class="btn btn-info">Update </button>

                                    </form>
                            </div>
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
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>

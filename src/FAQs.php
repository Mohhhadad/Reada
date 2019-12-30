<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<?php include('includes/header.php');?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Reada | FAQs</title>
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
<!-- MENU SECTION END-->
<div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line">FAQs</h4>
</div>
</div>
             
<!--LOGIN PANEL START-->           
<div class="row">
<div class="col-md-20 col-sm-20 col-xs-30 col-md-offset-20" >
<div class="panel panel-info">
<div class="panel-heading">
FAQs</div>
    
 <section class="cd-faq js-cd-faq container max-width-md margin-top-lg margin-bottom-lg">
	<ul class="cd-faq__categories">
		<li><a class="cd-faq__category cd-faq__category-selected truncate" href="#basics">Basices</a></li>
		<li><a class="cd-faq__category truncate" href="#account">Account</a></li>
		<li><a class="cd-faq__category truncate" href="#order">Order</a></li>
		<li><a class="cd-faq__category truncate" href="#shipping">Shipping And Delivery</a></li>
		
	</ul> <!-- cd-faq__categories -->

	<div class="cd-faq__items">
		<ul id="basics" class="cd-faq__group">
			<label class="cd-faq__title"><h2>Basics</h2></label>
			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>Do i have to sign up to get the advantages of the website?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>Yes, you have to sign up.</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>

			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>How do i sign up?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>Click on user sign up in the header above and fill in the fields to sign up. </p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>

			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>How can i add book?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>There are two ways 
                First, you have to login and then click add book in the header above to register your book.
                Second, deliver the book by hand to the office that located in the university  and then the admin will register the book for you.</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>
            
            <li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>Can i rent book?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>No you can not.</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>

			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>How do i delete my book?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>You have to contact with the admin to delete your book then he will delete your book.</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>
            
            <li class="cd-faq__item">
                <a class="cd-faq__trigger" href="#0"><span>What is an "ISBN"?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>ISBN stands for "International Standard Book Number." This unique identifier of each book edition is printed on the copyright page as well as back cover near the bar code. Checking the ISBN guarantees you’ve got the right book.</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>
            
             <li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>Who takes care of shipping?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>A third party which we make a contract with to deliver the books.</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>
            
            <li class="cd-faq__item">
                <a class="cd-faq__trigger" href="#0"><span>What software the website is compatible with?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>It is compatible with Windows, Android and Ios software.</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>
		</ul> <!-- cd-faq__group -->


		<ul id="account" class="cd-faq__group">
			<label class="cd-faq__title"><h2>Account</h2></label>
			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>How do i change my password?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>After login click on Account in the header above then click Change Password.</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>

			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>How do i delete my account?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>You have to contact with the admin and then he will delete your account.</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>

			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>How do I change my account settings?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>After login click on Account in the header above then click My Profile.</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>

			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>I forgot my password?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>There is forgot passowrd in user login.</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>
		</ul> <!-- cd-faq__group -->


		<ul id="order" class="cd-faq__group">
			<label class="cd-faq__title"><h2>Order</h2></label>
			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>What should I do if my order hasn't been delivered yet?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>Contact with the admin.</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>

			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>When my order will be delivered?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>There is date of delivered in the ordered Book page.</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>
            
            </ul>
            <ul id="shipping" class="cd-faq__group">
                <label class="cd-faq__title"><h2>Sipping and Deliver</h2></label>
			<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span>What should I do if my order hasn't been delivered yet?</span></a>
				<div class="cd-faq__content">
          <div class="text-component">
            <p>Contact with the admin.</p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>
                
		</ul> <!-- cd-faq__group -->
	</div> <!-- cd-faq__items -->

  
  <div class="cd-faq__overlay" aria-hidden="true"></div>
</section> <!-- cd-faq -->
     <!-- CONTENT-WRAPPER SECTION END-->
      <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
    </div>
</div>
</div>
</div>
</div>

           
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



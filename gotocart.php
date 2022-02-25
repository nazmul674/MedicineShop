

<?php
session_start();
include 'Includes/db_connection.php';
$conn = OpenCon();
include 'Function/function.php';
//echo "successssfully connected db";
$dbb=Openfunc();
?>

  <!DOCTYPE HTML>
   <html>
    <head>
        <title> "database" </title>
		<link rel="stylesheet" href="Styles/styles.css" media="all"/>
		<style>
		</style>
		
    </head>
    <body> 
    
	<div class="main_wrapper">
       <!header start from here>
       <div class= "head_wrapper">
       <img src="Images\logo1.jpg" alt="banner" />;
        </div>
       <!ends here>
       <div id="navbar">  
       <ul id="menu">
           <li><a href="index.php"> Home</a></li>
           <li><a href="all_product.php"> All product</a></li>
            <li><a href="cart.php">shopping cart</a></li>
            <li><a href="my_account.php">My account</a></li>
            <li><a href="using_register.php">SignUp</a></li>
               <li><a href="Contact.php">Contact Us</a></li>
           </ul>
           
            <div id="search_box">
                <form method="GET" action="result.php" enctype="multipart/form-data"> 
                <input type="text" name="query" placeholder="search a product"/>
                <input type="submit" name="search" value="search" />                
                </form>
            </div> 
       </div>
    
       <div class="content_wrapper">
       
        <div id="right_content"> 
          <div id="headline">
              <div id="head_content"> 
                  <b>welcome guest</b>
                  <b style="color:yellow;"> Shopping cart</b>
                  <span> item:<?php item();?>  Total price <?php price(); ?> 
                  <a href="gotocart.php" style="color:yellow">Go to cart </a>
                  </span>
                  
              </div>
          </div>
          
          
          <?php 
            add_cart();
            ?>
          
           <div id="product_box">
            <?php
               if(!isset($_SESSION['customer_email'])){
                   include ("Customer/customer_login.php");  
               }else{
                   include("payment.php");
               }
               ?>
        </div>
        </div>
        <div id="leftcontent"> 
                 
               <div id="left_sidebar"> Categories </div>
               <ul id="category">
                  <?php
                   get_category();
                    ?> 
               </ul>
              </div>  
               </div>
       <div> footliner area </div>

        </div>

      </body>
</html>
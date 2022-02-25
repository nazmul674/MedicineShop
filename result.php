
<?php
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
           <div id="product_box">
            <?php 
               
               if(isset($_GET['search'])){
                   $ques=$_GET['query'];
           $query = "Select * from products where drug_title like '%$ques%' " ;
           $result= mysqli_query($dbb,$query);
            while($row_product= mysqli_fetch_array($result)){
                   $drug_title= $row_product['drug_title'];
                  $cat_id= $row_product['cat_id'];
                  $brand_id= $row_product['brand_id'];
                  $drug_image1= $row_product['drug_image1'];
                  //$drug_image2= $row_product['drug_image2'];
                  $price= $row_product['price'];
                  $drug_des= $row_product['drug_des'];
                 $drug_id= $row_product['drug_id'];
                
                echo "
                <div id='single_product'>
                <h4> $drug_title </h4>
                <img src= 'Admin_area/product_images/$drug_image1' width='180' height='180' />
                   <p><b> Price: $price tk</b></p>
           
                <a href= 'details.php?drug_id=$drug_id' style='float:right;'> Details </a>
                 <a href= 'index.php?add_cart=$drug_id'><button style='float:left;'> Add to cart</button> </a>
              
                </div>
                ";
                
            }
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
<?php
function OpenFunc()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "1234";
 $db = "myshop";
 $dbb = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return  $dbb;
 }
//getting ip address

function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}



 function get_drug(){
     global $dbb;
if(!isset($_GET['category'])) {
    
        
           $query = "Select * from products order by rand()" ;
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
                
                <a href= 'delete.php?drug_id=$drug_id' style='float:right;'> Delete </a> 
                
                <a href= 'index.php?add_cart=$drug_id'><button style='float:left;'> Add to cart</button> </a>
              
                </div>
                ";
                
            }
    
     }
     }


function get_drug_from_catagory_base(){
if(isset($_GET['category'])) {
       $cat_id= $_GET['category'];
            
           global $dbb;
           $query_pro = "Select * from products where cat_id='$cat_id'";
           $result_pro= mysqli_query($dbb,$query_pro);
    $count= mysqli_num_rows($result_pro);
    
    if($count==0){
              echo "no product available here";
              
          }
            while($row_product_pro= mysqli_fetch_array($result_pro)){
                   $drug_title= $row_product_pro['drug_title'];
                  $cat_id= $row_product_pro['cat_id'];
                  $brand_id= $row_product_pro['brand_id'];
                  $drug_image1= $row_product_pro['drug_image1'];
                  //$drug_image2= $row_product['drug_image2'];
                  $price= $row_product_pro['price'];
                  $drug_des= $row_product_pro['drug_des'];
                 $drug_id= $row_product_pro['drug_id'];
                
                echo "
                <div id='single_product'>
                <h4> $drug_title </h4>
                <img src= 'Admin_area/product_images/$drug_image1' width='180' height='180' />
                   <p><b> Price: $price tk</b></p>
    
              <a href= 'details.php?drug_id=$drug_id' style='float:right;'> Details </a>
               <a href= 'Admin_area/Update_product.php?drug_id=$drug_id' style='float:right;'> Update </a>
                <a href= 'delete.php?drug_id=$drug_id' style='float:right;'> Delete </a>
                
                 <a href= 'index.php?add_cart=$drug_id'><button style='float:left;'> Add to cart</button> </a>
                
                 
              
                </div>
                ";
                
            }
    
}
}






function get_category(){
                global $dbb;
    
                   $query="select * from Category";
                 $result= mysqli_query($dbb,$query);
                 while($row =mysqli_fetch_array( $result)){
                      
                      $cat_id=$row['cat_id'];
                      $cat_title=$row['cat_title'];
                
                echo "<li><a href='index.php?category=$cat_id'> $cat_title </a></li>";
                  }               
}
function add_cart(){
    
    global $dbb;
    if(isset($_GET['add_cart'])){
        
       $ip_address=getUserIpAddr();
        $drug_id=$_GET['add_cart'];
        
        $check= "select * from cart where p_id='$drug_id'  AND ip_add='$ip_address' ";
        $run= mysqli_query($dbb,$check);
        if(mysqli_num_rows($run)>0 ){
            echo"";
        }else{
            global $dbb;
            $query= "insert into cart(p_id,ip_add) values('$drug_id','$ip_address')";
            $run= mysqli_query($dbb,$query);
            echo "<script>windows.open('index.php','self')</script>";
        }
        
    }
      
}
function item(){
    
    global $dbb;

    if(isset($_GET['add_cart'])){
           $ip_address=getUserIpAddr();
        
        $query="SELECT * from cart where ip_add='$ip_address'";
        $run=mysqli_query($dbb,$query);
        
         $count= mysqli_num_rows($run);
        
  
    }
    
    
    else{
        global $dbb;
        $ip_address=getUserIpAddr();
         $query="SELECT * from cart where ip_add='$ip_address'";
        $run=mysqli_query($dbb,$query);
        
         $count= mysqli_num_rows($run);
    }
    echo $count;

}
function price(){
 global $dbb;
    $total=0;
  $ip_address=getUserIpAddr(); 
    $query= "select * from cart where ip_add='$ip_address'";
    $run=mysqli_query($dbb,$query);
    while($record = mysqli_fetch_array($run)){
        global $dbb;
        $drug_id=$record['p_id'];
        $querytwo= "select * from products where drug_id='$drug_id'";
        $run_querytwo= mysqli_query($dbb,$querytwo);
     while($drug_price = mysqli_fetch_array($run_querytwo)){
        
         $drug_price=array($drug_price['price']);
         $value=array_sum($drug_price);
             $total+=$value;
         
       }
           }

         echo $total;
}


?>
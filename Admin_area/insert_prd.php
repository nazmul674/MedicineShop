
<?php
/*amra browser e insert_prdct likhe search krbo but seta k db te connect krar jnno admin_area r includes er bitor j db ache shodo oi path ta dilei hbe..admin_area likhte hoi na karon brwsr e insert_prdct search krle tkn i se jene jai insert_prdct admin e ache..so erpr admin_area r shb file just oi folder er name diyei access kora jabe*/
include 'includes\db_connection.php';
$conn = OpenCon();
echo "successssfully connected db1";
?>

  <!DOCTYPE HTML>
   <html>
    <head>
        <title> "database" </title>
        
    </head>
    <body bgcolor="lightblue" > 

      <form method="POST" action="insert_prd.php" enctype="multipart/form-data">
      <table width="600px" align= "center" border="5px" bgcolor="antiquewhite">
      
      <tr align="center">
          <td colspan="2"> <h2>Insert new product</h2></td>
      </tr>
      <tr >
      <td align="right"> Product title</td>
      <td><input type= "text" name="product_title" /></td>
      </tr>
    <tr>
      <tr >
            <td align="right"> Product category</td>
      <td>
      <select name="product_cat">
          <options>Select a cateorgy></options>
           
            <?php
                   $query="select * from Category";
                 $result= mysqli_query($conn,$query);
                 while($row =mysqli_fetch_array( $result)){
                      
                      $cat_id=$row['cat_id'];
                      $cat_title=$row['cat_title'];
                    echo "<option value='$cat_id'> $cat_title  </options>";
                  }?>
             
      </select>  
      </td>
          </tr>
      
      <tr >
             <td align="right"> Product brand</td>
      <td><input type= "text" name="product_brand" /></td>
      </tr>
      
      <tr>
            <td align="right"> Product image1</td>
      <td><input type= "file" name="product_images1" /></td>
      </tr>
      
      <tr>
            <td align="right"> Product image2</td>
      <td ><input type= "file" name="product_images2" /></td>
      </tr>
      
      <tr>
            <td align=right> Product price</td>
      <td align=right><input type= "text" name="product_price" /></td>
      </tr>
      
      <tr >
            <td align=right> Product description</td>
          <td ><textarea name="product_des" cols="35" rows="10"> </textarea></td>
      </tr>
        <tr >
      <td align="right"> Product id</td>
      <td><input type= "text" name="product_id" /></td>
      </tr>
         <tr align="center">
          <td colspan="2"><input type ="submit" name="insert_product" value="insert_product"></td>
          </tr>
          </table>
        </form>
       </body>
       
</html>
?>

<?php

if(isset($_POST['insert_product'])){
    
    $product_title= $_POST['product_title'];
    $product_cat= $_POST['product_cat'];
    $product_brand= $_POST['product_brand'];
    $product_price= $_POST['product_price'];
    $product_des= $_POST['product_des'];
     $product_id= $_POST['product_id'];
    $status = 'on';
//image name..as image is media so we must use 'file' for that
  $product_image1= $_FILES['product_images1']['name'];
$product_image2= $_FILES['product_images2']['name'];
                                    
    //image temp_name
$temp_name1 = $_FILES['product_images1']['tmp_name'];
$temp_name2 = $_FILES['product_images2']['tmp_name'];
    
    $target1 = "product_images/".basename($product_image1);  
    $target2 = "product_images/".basename($product_image2);

 //upload file on folder
 move_uploaded_file($temp_name1,"$target1");
 move_uploaded_file($temp_name2,"$target2");                                                                          
/*to insert into database we know that we must put query..ei naam gla database theke nite hbe..ikhaaner naam na egula*/
                                        
$insert_product = "insert into products(drug_title,cat_id,brand_id,drug_image1,drug_image2,price,drug_des,status,drug_id) values('$product_title','$product_cat','$product_brand','$product_image1','$product_image2','$product_price','$product_des','status','$product_id') ";
$run_product= mysqli_query($conn,$insert_product);

if($run_product)
{
echo "<script>alert ('inserted_successfully')</script>";
}
else{
    echo "<script>alert('error')</script>";
}
}                                       
?>
     
     
     
     
     
     
     
     
      
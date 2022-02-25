
 

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 <?php
  @session_start();
  include 'Includes/db_connection.php';
  $conn=Openconnection();

  ?>
  <div>
   
   
    <form action="checkout.php" method="POST">
    
    <table width="600" backgroundcolor="black" align="center">
    
    <tr align="center">
        <td colspan="4"><h3 > login or register</h3></td>
    </tr>
    
    <tr>
    <td align="right"> <b>Your email: </b></td>
    <td> <input type="text" name="your_email" value="">
    </td>
    </tr>
    
    <tr>
        <td align="right"><b>pasword: </b></td> 
        <td><input type="text" name="your_password" value=""></td>
    </tr>
    <tr align="center">
        <td colspan="4">
            <a href="forget_password.php">Forgot Password</a>
        </td>
    </tr>
    
     <tr align="center">
         <td colspan="4"> <input type="submit" name="login" value="login"></td>
    </tr>
    </table>
    

    </form>
    
        <h3><a href="customer_register.php"> Register Here! </a></h3>.
</div>

<?php

if(isset($_POST['login'])){
   
    
    $email= $_POST['your_email'];
    $password=$_POST['your_password'];
    $query= "select * from customers where customer_email='$email' AND customer_pass='$password'";
    $run=mysqli_query($conn,$query);
    if(mysqli_num_rows($run)>0){
        
        $_SESSION['customer_email']=$email;
        echo "<script> window.open('index.php','_self')</script>";
    }else{
        echo "<script> alert('email or password is wrong! try again')</script>";
    }
  
    
    }





?>










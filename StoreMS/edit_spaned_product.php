<?php
  require ('connection.php');
  session_start();
  $user_first_name= $_SESSION['user_first_name'];
  $user_last_name= $_SESSION['user_last_name'];

  if(!empty($user_first_name) && !empty($user_last_name)){
  require ('my_function.php');

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edite Spand Product</title>
</head>
<body>


    <?php 
    if (isset($_GET['id'])){

        $getid= $_GET['id'];

        $sql = "SELECT * FROM spend_product WHERE spand_product_id =$getid";
        $query = $conn->query($sql);

        $data = mysqli_fetch_assoc($query);
        $spand_product_id  = $data ['spand_product_id'];
        $spand_product_name = $data ['spand_product_name'];
        $spand_product_quentity= $data ['spand_product_quentity'];
        $spand_product_entry_date = $data ['spand_product_entry_date'];
     
    }


    if (isset($_GET['spand_product_name'])){
      $new_spand_product_name =$_GET['spand_product_name'];
      $new_spand_product_quentity =$_GET['spand_product_quentity'];
      $new_spand_product_entry_date=$_GET['spand_product_entry_date'];
      $new_spand_product_id=$_GET['spand_product_id'];


      $sql1="UPDATE spend_product SET spand_product_name='$new_spand_product_name',

      
        spand_product_quentity='$new_spand_product_quentity',
      spand_product_quentity='$new_spand_product_quentity'
      where spand_product_id=$new_spand_product_id";

     
      if($conn->query($sql1) == true){
          echo 'Update Successfull';
      }
      else{
          echo 'Not Update';
      }
  }
 



    ?>

    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
        
        Product : <br>
        <select name="spand_product_name">
            

        <?php
         $sql = "SELECT * FROM product";

         $query= $conn->query ($sql);
       
         while ($data= mysqli_fetch_array($query)){
       
           $data_id =  $data['id'];
           $data_name = $data ['product_name'];
       
           ?> 

           <option value='<?php echo $data_id?>' <?php if($spand_product_name == $data_id){echo 'selected';}?>>

           <?php echo $data_name ?>
          
          
          </option>"; 
          <?php } 
          
          ?>
            
        </select>
        
        <br> <br>
        Product Quantity: <br>
        <input type="number" name="spand_product_quentity" value="<?php echo $spand_product_quentity ?>"> <br><br>

        Store Product Entry Date: <br>
        <input type="date" name="spand_product_entry_date" value="<?php echo $spand_product_entry_date ?>"> <br><br>
        <input type="text" hidden name="spand_product_id" value="<?php echo $spand_product_id?>"> <br><br>

        <input type="submit" value="Submit">
       
    </form>
    
</body>
</html>

<?php 
}
else{
    header('location:login.php');
}

?>
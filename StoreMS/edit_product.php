<?php
  require ('connection.php');
  session_start();
  $user_first_name= $_SESSION['user_first_name'];
  $user_last_name= $_SESSION['user_last_name'];

  if(!empty($user_first_name) && !empty($user_last_name)){
 


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>

    <?php

    if (isset($_GET['id'])){

        $getid= $_GET['id'];

        $sql = "SELECT * FROM product WHERE id=$getid";
        $query = $conn->query($sql);

        $data = mysqli_fetch_assoc($query);
        $id = $data ['id'];
        $product_name = $data ['product_name'];
        $product_catagory= $data ['product_catagory'];
        $product_code= $data ['product_code'];
        $product_entry_date	= $data ['product_entry_date'];
       
    }

    if (isset($_GET['product_name'])){
        $new_product_name    =$_GET ['product_name'];
        $new_product_catagory=$_GET ['product_catagory'];
        $new_product_code    =$_GET ['product_code'];
        $new_product_entry_date=$_GET ['product_entry_date'];
        $new_id               =$_GET ['id'];


        $sql1="UPDATE product SET product_name='$new_product_name',

        
        product_catagory='$new_product_catagory',
        product_code='$new_product_code',
        product_entry_date='$new_product_entry_date'
        where id=$new_id";

       
        if($conn->query($sql1) == true){
            echo 'Update Successfull';
        }
        else{
            echo 'Not Update';
        }
    }
   


    


    ?>

    <?php 

    $sql = "SELECT * FROM catagory";

    $query= $conn->query ($sql);


    
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
        Product : <br>
        <input type="text" name="product_name" value="<?php echo $product_name?>" > <br><br>
        Product Catagory : <br>
        <select name="product_catagory">
            

            <?php
               while ($data= mysqli_fetch_array($query)){

                $catagory_id =  $data['catagory_id'];
                $catagory_name = $data ['catagory_name'];

                ?>
                <option value='<?php echo $catagory_id ?>' <?php if($catagory_id == $product_catagory) {echo 'selected';}?> ><?php echo $catagory_name ?> </option>
               
            
              <?php }

              ?>
        
            


        </select>
        
        <br> <br>
        Product Code: <br>
        <input type="text" name="product_code" value="<?php echo $product_code?>" > <br><br>

        Product Entry Date: <br>
        <input type="date" name="product_entry_date" value="<?php echo $product_entry_date?>" > <br><br>
        <input type="text" name="id" hidden value="<?php echo $id?>" > <br><br>

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
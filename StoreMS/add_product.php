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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <title>Add Product</title>
</head>
<body>

<div class="container bg-light">
      <div class="container-fluied border-bottom border-success"> <!---top bar start---->
      <?php include('top_bar.php'); ?>
         

      </div><!---top bar end---->
      <div class="container-fluied"> 
        <div class="row bg-light"> 
          <div class="col-sm-3 p-0 m-0"><!---left bar-start---->
          <?php include('left_bar.php') ?>

          </div><!---end of left bar-start---->

          <div class="col-sm-9 border-start border-success"><!---Right bar-start---->

          <div class="container p-4 m-4">
          <?php
    if (isset($_GET['product_name'])){
       $product_name = $_GET['product_name'];
       $product_catagory = $_GET['product_catagory'];
       $product_code = $_GET['product_code'];
       $product_entry_date = $_GET['product_entry_date'];

    

        $sql = "INSERT INTO product (product_name, product_catagory,product_code,product_entry_date) 
        VALUES ('$product_name', '$product_catagory','$product_code','$product_entry_date')";
        if($product_name==''){
            ?>
            <h5 class="text-danger">Plese Insert Product Name</h5>

            <?php
        }
        else if($product_catagory==''){
            ?>
            <h5 class="text-danger">Plese Insert Product Catagory</h5>

            <?php
        }
        else if($product_code==''){
            ?>
            <h5 class="text-danger">Plese Insert Product code</h5>

            <?php
        }
        else if($product_entry_date==''){
            ?>
            <h5 class="text-danger">Plese Insert Entry Date</h5>

            <?php
        }

        else if ($conn-> query($sql) ==true){
            echo 'Data Inserted';
        }
        else{
            header('location:add_product.php');
            echo 'Data Not Inserted';
        }
    

    }



    


    ?>

    <?php 

    $sql = "SELECT * FROM catagory";

    $query= $conn->query ($sql);


    
    ?>

    <div class="form-control p-5">
        <h3>Add Product</h3>
    <form class="form-control" action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
        <label for="">Product :</label> <br>
        <input class="form-control" type="text" name="product_name"> <br>
        <label for="">Product Catagory : </label><br>
        <select class="form-select" name="product_catagory">
            

            <?php
               while ($data= mysqli_fetch_array($query)){

                $catagory_id =  $data['catagory_id'];
                $catagory_name = $data ['catagory_name'];

                echo "<option value='$catagory_id'>$catagory_name</option>";
                
               }
            ?>
            


        </select>
        
        <br> 
        <label for="">Product Code:</label> <br>
        <input type="text" class="form-control" name="product_code"> <br>

        <label for="">Product Entry Date:</label> <br>
        <input class="form-control" type="date" name="product_entry_date" > <br>

        <input class="btn btn-success" type="submit" value="Submit">
       
    </form>
       

    </div>



          </div><!---End Of coantainer---->

            </div><!---right bar-end---->
            </div><!---end of row---->
        

             </div>
                <div class="container-fluied border-top border-success"> 
                 <?php include('bottombar.php')?>
             </div>

    </div>
    
</body>
</html>
<?php
  }
else{
    header('location:login.php');
}

?>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <title>Spand Product</title>
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
    if (isset($_GET['spand_product_name'])){
       $spand_product_name = $_GET['spand_product_name'];
       $spand_product_quentity = $_GET['spand_product_quentity'];
       $spand_product_entry_date = $_GET['spand_product_entry_date'];

        $sql = "INSERT INTO spend_product (spand_product_name, spand_product_quentity,	spand_product_entry_date) 
        VALUES ('$spand_product_name', '$spand_product_quentity','$spand_product_entry_date')";
    
        if ($conn-> query($sql) ==true){
            echo 'Data Inserted';
        }
        else{
            echo 'Data Not Inserted';
        }
    

    }



    


    ?>
    

    <?php 

    ?>
    <div class="form-control p-5">
        <h3>Add Spand Product</h3>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET" class="form-control">
        
        <label for="" >Product :</label> <br>
        <select name="spand_product_name "class="form-select">
            

            <?php
              data_list ('product','id','product_name');

               
            ?>
            
        </select>
        
        <br> 
        <label for=""> Spand Product Quantity: </label><br>
        <input type="text" name="spand_product_quentity" class="form-control"> <br>

         <label for="">Spend Entry Date:</label><br>
        <input type="date" name="spand_product_entry_date"class="form-control" > <br><br>

        <input type="submit" class="btn btn-success" value="Submit">
       
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
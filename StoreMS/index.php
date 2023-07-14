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
    <title>Store Menagement Systems ||SMS</title>
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
            <div class="row p-3">
              <div class="col-sm-3">
                <a href="add_catagory.php"><i class="fas fa-folder-plus fa-5x text-success curser-pointer"></i></a>
                <p>Add Catagory</p>
              </div>
              <div class="col-sm-3">
              <a href="list_of_catagory.php"><i class="fas fa-folder-open fa-5x text-success"></i></a>
                <p>List Catagory</p>
              </div>
              <div class="col-sm-3">
              <a href="add_product.php"><i class="fas fa-box-open fa-5x text-success"></i></a>
                <p>Add Product</p>
              </div>
              <div class="col-sm-3">
              <a href="list_of_product.php"><i class="fas fa-stream fa-5x text-success"></i></a>
                <p>Product List</p>
              </div>
            </div>

            <hr>

            <div class="row p-3">
              <div class="col-sm-3">
                <a href="add_store_product.php"><i class="fas fa-trash-restore fa-5x text-success curser-pointer"></i></a>
                <p>Store Product</p>
              </div>
              <div class="col-sm-3">
              <a href="list_of_entry_product.php"><i class="fas fa-box fa-5x text-success"></i></a>
                <p>Store product List</p>
              </div>
              <div class="col-sm-3">
              <a href="add_spand_product.php"><i class="fas fa-plus-circle fa-5x text-success"></i></a>
                <p>Spand Product</p>
              </div>
              <div class="col-sm-3">
              <a href="list_of_spand_product.php"><i class="fas fa-window-restore fa-5x text-success"></i></a>
                <p>Spand Product List</p>
              </div>
            </div>
            <hr>
            <div class="row p-3">
              <div class="col-sm-3">
                <a href="report.php"><i class="fas fa-chart-bar fa-5x text-success curser-pointer"></i></a>
                <p>Report</p>
              </div>
              <div class="col-sm-3">

              </div>
              <div class="col-sm-3">
          
              </div>
              <div class="col-sm-3">
         
              </div>
            </div>

            <hr>


            <div class="row p-3">
              <div class="col-sm-3">
                <a href="add_users.php"><i class="fas fa-user-plus fa-5x text-success curser-pointer"></i></a>
                <p>Add User</p>
              </div>
              <div class="col-sm-3">
                <a href="list_of_users.php"><i class="fas fa-users fa-5x text-success curser-pointer"></i></a>
                   <p>List of User</p>
              </div>
              <div class="col-sm-3">
          
              </div>
              <div class="col-sm-3">
         
              </div>
            </div>
          </div><!---right bar-end---->
        </div><!---end of row---->
        

      </div>
      <div class="container-fluied border-top border-success"> 
        <?php include('bottombar.php')?>
      </div>

    </div>

    <?php 
}
else{
    header('location:login.php');
}

?>

</body>
</html>


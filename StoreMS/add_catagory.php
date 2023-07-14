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
    
    <title>Add Catagpry Product</title>
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

          <div class="container p-4 ">
                <?php
                if (isset($_GET['catagory_name'])){
                    $catagory_name = $_GET['catagory_name'];
                    $catagory_entry_date = $_GET['catagory_entry_date'];


                $sql = "INSERT INTO catagory (catagory_name, catagory_entry_date) 
                VALUES ('$catagory_name', '$catagory_entry_date')";
            
                if ($conn-> query($sql) ==true){
                    echo 'Data Inserted';
                }
                else{
                    echo 'Data Not Inserted';
                }
            

                }
                ?>

                <div class="form-control p-5">
                    <h3>Add Catagory</h3>
                <form action="add_catagory.php" method="GET" class="form-control">
                <label for="">Catagory:</label><br>
                <input type="text" name="catagory_name"class="form-control"> <br>
                <label for="">Catagory Entry Date:</label> <br>
                <input type="date" name="catagory_entry_date" class="form-control"> <br><br>

                <input type="submit" value="Submit" class="btn btn-success ">
            
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
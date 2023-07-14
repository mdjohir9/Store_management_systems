<?php
  require ('connection.php');
  session_start();
  $user_first_name= $_SESSION['user_first_name'];
  $user_last_name= $_SESSION['user_last_name'];

  if(!empty($user_first_name) && !empty($user_last_name)){

    $sql3 ="SELECT * FROM product";
    $query3 =$conn ->query($sql3);

    $data_list=array();

   while ( $data3 =mysqli_fetch_assoc($query3)){
    $id    =$data3 ['id'];
    $product_name =$data3 ['product_name'];
    
    $data_list [$id] = $product_name;

   }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <title>Report</title>
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

          <div class="container p-4">
                

    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
    <label for="" class="fs-4">Select Product:</label> <br>
    <select name="product_name" class="form-control-sm fs-6 p-2 m-0">
        <?php
        
        $sql= "SELECT * FROM product";
        $query =$conn ->query($sql);

        while ( $data = mysqli_fetch_assoc($query)){
            $id= $data ['id'];
            $product_name= $data ['product_name'];

        
        
        
        ?>

            <option value="<?php echo $id ?>"> <?php echo $product_name?> </option>

            <?php 
            }
            ?>
             

    </select>
    <input type="submit" value="Genaret Report" class="btn btn-success p-2">
    
       
       
    </form>
    

    <?php 

    //Report Store data
    if (isset($_GET['product_name'])){
         $product_name =$_GET['product_name'];
         $sql1 ="SELECT * FROM store_product where store_product_name =$product_name";

         $query1 = $conn->query($sql1);

         while ($data1 =mysqli_fetch_array($query1)){
         $store_product_quentity =$data1['store_product_quentity'];
         $store_product_entry_date =$data1['store_product_entry_date'];
         $store_product_name =$data1['store_product_name'];

         ?>
         <h2 class="pt-2">Store Product</h2>
         <?php

         echo "<h4 class='bg-success p-1 text-white text-center'>$data_list[$store_product_name]</h4>";
         echo "<table class='table table-success table-striped table-hover'>
         <tr>
         <th class='text-center'>Store Date</th>
         <th class='text-center'>Product Amount</th>
         </tr>";
         echo "<tr>
         <td class='text-center'>$store_product_entry_date</td>
         <td class='text-center'>$store_product_quentity</td> 
         </tr>";
         echo "</table>";

         }

         
    }

    ?>

    

    <?php 
         

    

    //Report Spand data
    if (isset($_GET['product_name'])){
        $product_name =$_GET['product_name'];
        $sql4 ="SELECT * FROM spend_product where spand_product_name =$product_name";

        $query4 = $conn->query($sql4);

        while ($data4 =mysqli_fetch_array($query4)){
        $spand_product_quentity =$data4['spand_product_quentity'];
        $spand_product_entry_date	 =$data4['spand_product_entry_date'];
        $spand_product_name =$data4['spand_product_name'];

        ?>
        <h2 class="pt-2">Spand Product</h2>
        <?php

        echo "<h4 class='bg-success p-1 text-white text-center'>$data_list[$spand_product_name]</h4>";
        echo "<table class='table table-success table-striped table-hover'>
        <tr>
        <th class='text-center'>Spand Date</th>
        <th class='text-center'>Product Amount</th>
        </tr>";
        echo "<tr>
        <td class='text-center'>$spand_product_entry_date</td>
        <td class='text-center'>$spand_product_quentity</td> 
        </tr>";
        echo "</table>";

        }

        
    }

    ?>
       

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
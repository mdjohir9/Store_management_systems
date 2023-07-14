<?php
    require ('connection.php');

    session_start();
    $user_first_name= $_SESSION['user_first_name'];
    $user_last_name= $_SESSION['user_last_name'];
  
    if(!empty($user_first_name) && !empty($user_last_name)){
  
  

    $sql1 ="SELECT * FROM product";
    $query1 =$conn ->query($sql1);

    $data_list=array();

   while ( $data1 =mysqli_fetch_assoc($query1)){
    $id    =$data1 ['id'];
    $product_name =$data1 ['product_name'];
    
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
    
    <title>List of Product</title>
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
          <h4 class="text-center bg-success text-white p-1">List of store Product</h4>

          <?php
           
   
    
    $sql= "SELECT * FROM store_product";
    $query =$conn ->query($sql);

    echo "<table class='table table-success table-striped table-hover'> 
    <tr>
     <th class='text-center'>Product Name </th>  
     <th class='text-center'>Product Qunatity</th>
     <th class='text-center'>Store Product Entry Date</th>
     <th class='text-center'>Action</th>
    ";

    $total=0;

    while ( $data = mysqli_fetch_assoc($query)){
        $store_product_id         = $data ['store_product_id'];
        $store_product_name       = $data ['store_product_name'];
        $store_product_quentity   = $data ['store_product_quentity'];
        $store_product_entry_date = $data ['store_product_entry_date'];

        $total +=$store_product_quentity;
        echo " <tr> 
            <td class='text-center'>$data_list[$store_product_name]</td> 
            <td class='text-center'>$store_product_quentity</td> 
            
            <td class='text-center'> $store_product_entry_date</td> 
            <td class='text-end'> 
            <a href='edit_store_product.php? id=$store_product_id' class='btn btn-success'>Edit</a> 
            <a href='edit_store_product.php? id=$store_product_id' class='btn btn-danger'>Delate</a> 
            
            </td>
        

        </tr>";

 
        

        
        


   

    }

    echo "</tr>

    <tr> 
    <td class='text-center'>Total</td>
    <td class='text-center'>$total</td>
    <td ></td>
    <td></td>
    </tr>
    
    
    </table>";
  
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
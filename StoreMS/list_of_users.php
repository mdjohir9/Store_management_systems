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
    
    <title>List of Users</title>
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
          <h4 class="text-center bg-success text-white p-1">List of User</h4>

          <?php
    
    $sql= "SELECT * FROM users";
    $query =$conn ->query($sql);

    echo "<table class='table table-success table-striped table-hover'> 
    <tr>
    <th class='text-center'>User ID</th>  
     <th class='text-center'> First Name</th>  
     <th class='text-center'> Last Name</th>
     <th class='text-center'>User Email</th>
     <th class='text-end px-5'>Action</th>
    ";

    while ( $data = mysqli_fetch_assoc($query)){
        $user_id =$data['user_id'];
        $user_first_name= $data['user_first_name'];
        $user_last_name= $data ['user_last_name'];
        $user_email= $data ['user_email'];
        $user_password= $data ['user_password'];
        echo " <tr> 
            <td class='text-center'>$user_id</td>
            <td class='text-center'>$user_first_name</td> 
            <td class='text-center'>$user_last_name</td> 
            <td class='text-center'>$user_email</td> 
           
            <td class='text-end'>
             <a href='edit_users.php? id=$user_id' class='btn btn-success'>Edit</a>
             <a href='edit_users.php? id=$user_id' class='btn btn-danger'>Delate</a>

            </td>
        
        </tr> ";

    }

    echo "</tr> </table>";
    
    
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
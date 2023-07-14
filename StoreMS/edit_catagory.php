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
    <title>edit Catagpry Product</title>
</head>
<body>

    <?php

    if (isset($_GET['id'])){
        $getid = $_GET ['id'];

        $sql = "SELECT * FROM catagory WHERE catagory_id =$getid";
        $query = $conn-> query($sql);
        $data = mysqli_fetch_assoc($query);

        $catagory_id= $data ['catagory_id'];
        $catagory_name = $data ['catagory_name'];
        $catagory_entry_date= $data ['catagory_entry_date'];


    }

    if (isset($_GET['catagory_name']) ){

        $new_catgory_name       = $_GET ['catagory_name'];
        $new_catgory_entry_date = $_GET ['catagory_entry_date'];
        $new_catgory_id         = $_GET ['catagory_id'];

        $SQL1="UPDATE catagory SET catagory_name='$new_catgory_name',
        catagory_entry_date='$new_catgory_entry_date' WHERE catagory_id=$new_catgory_id";

        if($conn->query($SQL1) ==true){
            echo 'Update Successfull';

        }
        else {
            echo 'not update';
        }

    }
     

    

    ?>

    <form action="edit_catagory.php" method="GET">
        Catagory: <br>
        <input type="text" name="catagory_name" value="<?php echo $catagory_name ?>" > <br><br>

        Catagory Entry Date: <br>
        <input type="date" name="catagory_entry_date" value="<?php echo $catagory_entry_date ?>"> <br><br>
        <input type="text" hidden name="catagory_id" value="<?php echo $catagory_id ?> "> 
        

        <input action="index.php" type="submit" value="Update">
        
       
    </form>
    
</body>
</html>

<?php 
}
else{
    header('location:login.php');
}

?>

<!-- if (isset ($_GET ['catagory_name'])){
       
       $new_catagory_name= $_GET ['catagory_name'];
       $new_catagory_date =$_GET ['catagory_entry_date'];
       $new_catagory_id =$_GET ['catagory_id'];
       

       $sql1="UPDATE catagory SET catagory_name ='$new_catagory_name', 
       catagory_entry_date ='$new_catagory_date', WHERE catagory_id= $new_catagory_id";

       if($conn ->query($sql1) ==true){
           echo 'Update Successful';

       }

       else {
           echo 'not Update !please try agin';
       }
    } -->
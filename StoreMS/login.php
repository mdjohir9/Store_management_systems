<?php
  require ('connection.php');
  session_start();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <title>Login</title>
</head>
<body>

 

    <?php 

    ?>



    <div class="container">

    <div class="form-div bg-light">
    <?php

if (isset($_POST['user_email'])){

    $user_email = $_POST['user_email'];
    $user_password =$_POST['user_password'];

    $sql ="SELECT * FROM users WHERE user_email='$user_email' 
    AND user_password='$user_password' ";

    $query = $conn->query($sql);
    if(mysqli_num_rows($query)>0){

        $data =mysqli_fetch_array($query);
        $user_first_name =	$data['user_first_name'];
        $user_last_name =$data['user_last_name'];
        $_SESSION['user_first_name']=$user_first_name;
        $_SESSION['user_last_name'] =$user_last_name;


        header('location:index.php');
    }
    else{
        echo '<h5>login feild</h5>';

    }


}






?>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="">
            
            User Email: <br>
        <input type="email" name="user_email" > <br><br>
            User Password: <br>
        <input type="password" name="user_password" > <br><br>

        <input type="submit" value="login" class="btn btn-success">
        
    </form>
    </div>

  

    </div>

    <style>
        .form-div{
            width: 500px;
            height: 600px;
            padding: 50px;
            margin: auto;
        }
        input{
            width: 300px;
            height: 40px;
            border: 1px solid green;
            border-radius: 10px;
            padding: 10px;
        }
        .btn{
            box-shadow: 5px 5px 5px gray;
        }
        form{
            width: 300px;
            margin: auto;
            padding: 10px;

        }
        h5{
            color: red;
        }
    
    </style>
    
</body>
</html>
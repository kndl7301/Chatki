<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>

<body>

</body>

</html>

<?php

$conn = mysqli_connect("localhost","root","","chat");

if(!$conn){
    echo "database connection error  <br>";
}


if(isset($_POST['gönder'])){

      
    $Username =$_POST['Username'];
    $lname =$_POST['lname'];
    $email =$_POST['email'];
    $password =$_POST['password'];
    $photo =$_POST['photo'];
    $unique_id=rand();

    $encpassword=md5($password);
   
ss


    if(empty($Username) || empty($lname) || empty($email) || empty($password)){
        echo " <div class='error-text'>All inputs must be filled</div>";
        
    }

   

        else{

            
        $sql = "INSERT into users(Username,lname,email,password,img,unique_id)values('$Username','$lname','$email','$encpassword','$photo','$unique_id')";
	    $sonuc=mysqli_query($conn,$sql);


        echo '<center><h1>Your registiration has been successfully. You can login <a href=http:/phpprojects/chatki/login.php>here </a>now</h1></center>';

        

    }

  
}


?>
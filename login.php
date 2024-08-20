<?php

$conn = mysqli_connect("localhost","root","","chat");

if(!$conn){
    echo "database connection error  <br>";


}


session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>

<body>
    <div class="wrapper">
        <section class="form-login">
            <header>Realtime chat</header>
            <form action="#" method="post">
                <div class="error-text">this is an error message</div>



                <div class="field">
                    <label>Email Address</label>
                    <input type="text" placeholder="Email Address" name="email">
                </div>




                <div class="field">
                    <label>password</label>
                    <input id="password" type="password" placeholder="password" name="password">
                    <i class="fa-solid fa-eye toggle"></i>
                </div>

                <div class="field">

                    <input type="submit" value="Login" class=" btn btn-success" name="login">
                </div>


            </form>
            <div class="link">Not yet sign up? &nbsp<a href="Register.php">Sign now</a> </div>
            <br>
        </section>
    </div>
</body>



<?php

if(isset($_POST['login'])){
 
    $email=$_POST['email'];
    $password=$_POST['password'];

   
    $sql="SELECT * FROM users WHERE email = '$email' ";

    $select=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($select);

    $unique_id=$row['unique_id'];

    $encpassword=md5($password);


    $sql="SELECT * FROM users WHERE email = '$email' AND password = '$encpassword'  ";
    $select=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($select);



    if (is_array($row)) {
      
      $_SESSION['email']=$row['email'];
      $_SESSION['password']=$row['password'];
    
      
    if(!empty($email) && !empty($password)){
          header("location:users.php");
      exit();
      
    }
      
 
    
    }else
    {
          echo "<h1>geçersiz email yada şifre</h1>";
    ;
    }






}


?>

<script>
let password = document.querySelector("input[type='password']");
let show = document.querySelector("#password");



let toggle = document.querySelector(".toggle");
toggle.onclick = () => {
    if (password.type == "password") {
        password.type = "text";
        toggle.style.color = "black";


    } else
        password.type = "password";


}
</script>

</html>
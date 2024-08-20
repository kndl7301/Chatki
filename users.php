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
    <title>Users</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <div class="wrapper">
        <section class="users">
            <header>
                <div class="content">

                    <div class="details">


                        <?php

                        $sql="SELECT * FROM users where email = '".$_SESSION['email']."' ";

                        $select=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_array($select);

                        echo "<img onclick='show(this)' src=images/$row[img]>";
                        echo "$row[Username]";
                        $username=$row['Username'];
                     
                
                        $sender_id=$row["user_id"];
                        $email=$_SESSION['email'];
  
                     
                        $sql2 = "UPDATE users SET status='1' WHERE email='".$_SESSION['email']."'";
                        $sonuc=mysqli_query($conn,$sql2);                 
 
                    ?>

                        <p>Active now</p>
                    </div>
                    <button class="card"
                        style=" margin-left:90px;border-radius:8px;background:#08a300;height:30px;width:50px;margin-top:40px;">
                        <a href="Friends.php" style="color:black;"><i class="fa-solid fa-user-group"
                                style="margin-left:10px"></i></a>
                        <div class="text-muted" style="  border: 2px solid red">Friends</div>
                    </button>
                    <button class="card"
                        style="margin-left:10px;border-radius:8px;background:#fbf100;height:30px;width:50px;margin-top:40px;"><a
                            href="Orders.php" style="color:black;"><i class="fa-solid fa-user-plus"
                                style="margin-left:10px"></a></i>
                        <div class="text-muted" style="  border: 2px solid red;">Requests</div>
                    </button>

                </div>

                <form action="" method="post">
                    <input type="submit" style="background:#CB1C1C;border-radius:7px;height:40px;width:70px;color:white"
                        name='logout' value="logout">
                </form>
                <?php 

        if(isset($_POST['logout'])){
            $sql2 = "UPDATE users SET status='0' WHERE email='".$_SESSION['email']."'";
            $sonuc=mysqli_query($conn,$sql2);

            header("location:login.php");
        }

?>
            </header>
            <br>
            <div class="search">
                <form action="Search.php" method="post">

                    <input class="searchinput" type="search" style="border-radius:7px;height:40px;width:300px"
                        name="input" placeholder="Enter name to search">
                    <button style="border-radius:8px;background:#0080FF"><input type="submit" class="btn " name="search"
                            value="ara"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>

            </div>

            <?php  

// select all users  except user logged in because the user can not send message to himself/herself and show the users  

$sql="SELECT * FROM users where  email !='".$_SESSION['email']."' " ; 
$select=mysqli_query($conn,$sql);

?>


            <br><br>
            <?php
while($row=mysqli_fetch_array($select)){


?>
            <div class="users" style="display:flex">


                <div class="userlist">


                    <img src='images/<?php echo $row["img"] ;  ?> '>

                    <br><br>

                    <form action="chat.php" method="post">
                        <a href='chat.php?reciever_id=<?php echo "".$row['user_id']."";?>& sender_id=<?php echo $sender_id;?>'
                            style='text-decoration:none;color:black;'>
                            <h5 style="margin-top:-85px; margin-left:70px;font-size:20px;width:200px;">
                                <?php echo  $row['Username'];
echo  $row['user_id'];
$alici=$row['Username'];


$reciever_id =$row['user_id'];


?>

                            </h5>
                        </a>
                    </form>
                </div>

                <div class="request" style="width:150px;">
                    <form action="users.php" method="post">
                        <?php 
$status=$row['status'];
echo "<button  id='request' value='$reciever_id' name='request' click='request' onclick='Request()' style='border-radius:8px;background:#fbf100;height:35px;width:50px;margin-top:10px'><i class='fa-solid fa-user-plus fa-lg' ></i><input type='submit'  value='' style='background-color:#fbf100;border:1px solid #fbf100' name='request' ></button>
";

// here the status code of user can be 1 or 0 if status==1 user is online else status code==0 user is offline


if($status == 1){
    echo "       <i class='fa-solid fa-circle fa-lg' style='color:green;margin-left:55px;'></i>";
}else{

    echo "       <i class='fa-solid fa-circle fa-lg' style='color:grey;margin-left:55px;margin-top:-50px'></i>";

}

?>
                    </form>
                </div>
            </div>
            <?php



?>


            <?php

}


?>

        </section>
    </div>

    <?php

//  this part of code is show the searched user which is Username lıke the value in the input 
        $output = "";

        if(isset($_POST['search'])){
            $input = $_POST['input'];

            


            if(!empty($input)){
                $query="SELECT * FROM users  WHERE Username LIKE '%$input%'";

                $res = mysqli_query($conn,$query);


                if(mysqli_num_rows($res) < 1){
                   
                // if there is no similarity between the input value and  the Usernames in the database no user founded will be print on the screen
                    $output = "
                    
                    
                    no user founded
                        

                    ";
                }else{
                    while($row = mysqli_fetch_array($res)){
                 
                // if there is a user in database lıke input value the program will get this user with his/her profile and username 
                //when you click this user program take this users'id on the url and  you are going to the chating with this user in chat.php page       
                        $output =$output."
                        
                        
                        <br>
                        <div style='display:flex;width:350px'> 
                        
                        <img src='images/".$row['img']."'>
                 
                        
                            
                            <a href='chat.php?reciever_id=".$row['user_id']."' style='text-decoration:none;color:black;margin-left:20px;margin-top:15px;font-size:20px'>    ".$row['Username']."
                            
                            <i class='fa-solid fa-circle' style='color:green;margin-left:180px'></i>
                            
                         </div>
                        ";
                    }
                }



            }
        }


       
        
     // sending an request and inserting into the  requests table   

if (isset($_POST['request'])) {
    $reciever_id = $_POST['request'];
    $sender = $username;
    
    // Fetch receiver details
    $receiver_query = "SELECT Username FROM users WHERE user_id = '$reciever_id'";
    $receiver_result = mysqli_query($conn, $receiver_query);
    $receiver_row = mysqli_fetch_array($receiver_result);
    
    $receiver_name = $receiver_row['Username'];
    
    $email = $_SESSION['email'];
    date_default_timezone_set('Africa/Nairobi');
    $date = date('m/d/Y h:i:s a', time());

    // Use prepared statement to insert request
    $request_query = "INSERT INTO requests (sender_id, sender, reciever_id, reciever, request_time, email) VALUES ('$sender_id', '$sender', '$reciever_id', '$receiver_name', '$date', '$email')";
    $stmt = mysqli_prepare($conn, $request_query);
   
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

   

?>


    <table width="350px">
        <?php	
	
    echo $output;
   
	?>
    </table>
    <?php

?>




    <script>
    let searchbuton = document.querySelector(".searchbuton");
    let searchinput = document.querySelector(".searchinput");
    let userlist = document.querySelector(".userlist");


    searchinput.onkeyup = () => {
        userlist.innerHTML = "";
    }


    let request = document.querySelector("#request");

    function Request() {

        alert("Request Was Sent");

    }
    </script>


</body>

<style>
.text-muted {
    display: none;
    border-radius: 7px;

}

.card:hover .text-muted {
    display: block;
}


.card:hover .text-muted {


    Background-color: black;
    margin-top: -60px;


}
</style>

</html>
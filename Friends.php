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
    <title>Friends</title>
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
                    <a href='users.php?'><i class="fas fa-arrow-left"></i></a>
                    <div class="details">


                        <?php

                        $sql="SELECT * FROM users where email = '".$_SESSION['email']."'";

                        $select=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_array($select);

                        echo "<img onclick='show(this)' src=images/$row[img]>";
                 
                        $sender_id=$row["user_id"];
                     
  
                     
                        $sql2 = "UPDATE users SET status='1' WHERE email='".$_SESSION['email']."'";
                        $sonuc=mysqli_query($conn,$sql2);                 
 
                    ?>

                        <p>Active now</p>
                    </div>
                    <button class="card"
                        style="margin-left:130px;border-radius:8px;background:#fbf100;height:30px;width:50px;margin-top:22px;"><a
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
                request.style.color = "Green";
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
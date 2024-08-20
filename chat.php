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
    <title>Chatki</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>

<body>

    <div class="wrapper">
        <section class="chat-area" style="width: 465px;background-color:  #f8f9fa">
            <header>
                <div class="content">
                    <a href='users.php?'><i class="fas fa-arrow-left"></i></a>

                    <?php   
                      $reciever_id=$_GET['reciever_id'];
                      $sender_id=$_GET['sender_id'];

                      $sql="SELECT * FROM users WHERE user_id = '$reciever_id'";

                      $select=mysqli_query($conn,$sql);
                      $row=mysqli_fetch_array($select);
                      
                      echo " <img src='images/".$row['img']."'>";
                      ?>&nbsp

                    <div class="details">
                        <h3><?php echo $row['Username']; 
                              $status=$row['status'];

                              if($status == 1){
                                  echo "       <i class='fa-solid fa-circle' style='color:green;'></i><br><p>Active Now</p>";
                              }else{
                          
                                  echo "       <i class='fa-solid fa-circle' style='color:grey;'></i><p>Offline</p>";
                          
                              } ?></h3>

                    </div>
                </div>
            </header>


            <div class="chat-box" id="chatbox"
                style=" overflow: scroll;display:flex; width: 460px; flex-direction: column-reverse;">

                <?php
               $sender_id=$_GET['sender_id'];

                if(isset($_POST['send'])){
                    $message= $_POST['message'];
                    $imgurl= $_POST['imgurl'];

                  $sql="INSERT INTO mesagges (sender_id,reciever_id,message,imgurl) values('$sender_id','$reciever_id','$message','$imgurl')";
                  $sonuc=mysqli_query($conn,$sql);

                } 


              
                
                ?>
                <br>



            </div>

            <form action="#" class="typing-area" method="post" style="overflow:hidden">

                <input type="text" name="sender_id" hidden value='<?php echo $_SESSION['sender_id']?>'>
                <input type="text" name="reciever_id" hidden value="<?php echo $reciever_id?>">
                <input class="searchinput" type="search" name="message" placeholder="Write your messages here...">&nbsp


                <input type="file" id="myFileInput" name="imgurl" style="display:none;">

                <label id="lbl" for="myFileInput" style="  height:48px;  cursor: pointer;"> <img src="images/galeri.jpg"
                        width="75px" height="75px" alt=""></label>
                &nbsp


                <input type="submit" class="btn btn-success" id="send" value="Send" name="send" style="display:none;">
                <label for="send" style="  height:48px;  cursor: pointer;"> <img src="images/send.jpg" width="75px"
                        height="75px" alt=""></label>




            </form>

        </section>
    </div>

</body>


</html>

<script>
function getmessage() {


    $("#chatbox").load("load_messages.php?reciever_id=<?php echo $reciever_id;?>&sender_id=<?php echo $sender_id;?>",
        function(responseTxt, statusTxt, xhr) {
            if (statusTxt == "success")
                if (statusTxt == "error")
                    alert("Error: " + xhr.status + ": " + xhr.statusText);
        });
}
setInterval(getmessage, 1000);
</script>
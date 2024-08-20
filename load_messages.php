<?php

$conn = mysqli_connect("localhost","root","","chat");

if(!$conn){
    echo "database connection error  <br>";


}
session_start();

?>

<?php
    $reciever_id=$_GET['reciever_id'];
    $sender_id=$_GET['sender_id'];

$sql2="SELECT * FROM mesagges where reciever_id=$reciever_id and  sender_id=$sender_id  or  reciever_id=$sender_id and  sender_id=$reciever_id  
ORDER BY msg_id DESC ";
$select=mysqli_query($conn,$sql2);





while($row=mysqli_fetch_array($select)){                
?>

<?php
if($row['sender_id']== $sender_id){
?>
<?php if($row['message'] !==null && trim($row['message']) !== ''){


?>
<div class="chat-outgoing"> <?php  echo  $row['message']; ?></div>
<?php

}

?>



<?php if($row['imgurl'] !==null && trim($row['imgurl']) !== ''){


?>
<div class=" ">
    <?php    echo " <img style='margin-left:280px;width: 120px;height: 120px;' src='images/".$row['imgurl']."'>"; ?>
</div>

<?php

}

?>

<?php
}

else{

?>

<?php if($row['message'] !==null && trim($row['message']) !== ''){


?>
<div class="chat-incoming"> <?php  echo  $row['message']; ?> </div>
<?php

}

?>



<?php if($row['imgurl'] !==null && trim($row['imgurl']) !== ''){


?>

<div style="position:relative;">
    <?php    echo " <img style='margin-left:25px;width: 120px;height: 120px;' src='images/".$row['imgurl']."'>"; ?><br><br><br>
</div>

<?php

}

?>



<?php
} ?>


<br>

<?php

}

?>
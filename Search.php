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
     <title>Search</title>
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
                     <a href="users.php" ?id=25><i class="fas fa-arrow-left"></i></a>
                     <div class="details">



                         <?php

                        $sql="SELECT * FROM users where email = '".$_SESSION['email']."'";

                        $select=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_array($select);

                        echo "<img src=images/$row[img]>";
                        echo   $row['Username'];
                        $unique_id=$row['unique_id'];
                      
                        
 
                    ?>


                         <p>Active now</p>
                     </div>

                 </div>
                 <a href="login.php" class="btn btn-danger logout">Logout</a>
             </header>
             <br>
             <div class="search">
                 <form action="Search.php" method="post">

                     <input class="searchinput" type="search" name="input" placeholder="Enter name to search">
                     <button style="border-radius:8px;background:#0080FF"><input type="submit" class="btn "
                             name="search" value="ara"><i class="fa-solid fa-magnifying-glass;"></i></button>
                 </form>



             </div>





             <?php

$unique_id=$row['user_id'];

$output = "";

if(isset($_POST['search'])){
    $input = $_POST['input'];

	


    if(!empty($input)){
        $query="SELECT * FROM users  WHERE Username LIKE '%$input%' AND email !='".$_SESSION['email']."'  	";
        $res = mysqli_query($conn,$query);


        if(mysqli_num_rows($res) < 1){
        // if there is no similarity between the input value and  the Usernames in the database no user founded will be print on the screen

            $output = "
               
            no user founded
				

            ";
        }else{
            while($row = mysqli_fetch_array($res)){
              // if there is a user in database lıke input value the program will get thşs user with his/her profile and username  
              //when you click this user program take this users'id on the url and  you are going to the chating with this user in chat.php page       

                $output =$output."
                
				<br><br> &nbsp&nbsp&nbsp&nbsp&nbsp  
				
                <div style='background-color:white;margin-top:300px;margin-left:-465px;width:448px;brder-radius:7px;height:65px'>
                <img src='images/".$row['img']."'>
             
				
					 <a href='chat.php?reciever_id=".$row['user_id']."&sender_id=$unique_id' style='text-decoration:none;color:black;font-size:20px'>    ".$row['Username']."
				
                 
                    
</div>
                ";

                


$status=$row['status'];

if($status == 1){
    echo "       <i class='fa-solid fa-circle' style='color:green;margin-left:300px;'></i>";
}else{

    echo "       <i class='fa-solid fa-circle' style='color:grey;'></i>";

}


            }
        }



    }
}


?>

     </div>
     </section>
     </div>

     <table width="350px">
         <br> <br><br><?php	
	


    echo $output;
   
	?>
     </table>


 </body>

 </html>
<?php
$conn = mysqli_connect("localhost", "root", "", "chat");
if (!$conn) {
    echo "Database connection error<br>";
}

session_start();

if (isset($_POST['sil'])) {
   
        echo "Edwdww";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <div class="content">
                    <a href='users.php'><i class="fas fa-arrow-left"></i></a>
                    <div class="details">
                        <img onclick='show(this)' src="images/<?php echo $row['img']; ?>"> 
                        <p>Active now</p>
                    </div>
                    <button class="card" style="margin-left:130px;border-radius:8px;background:#08a300;height:30px;width:50px;margin-top:22px;">
                        <a href="Friends.php" style="color:black;"><i class="fa-solid fa-user-group"></i></a>
                        <div class="text-muted" style="border: 2px solid red;">Friends</div>
                    </button>
                </div>
                <form action="" method="post">
                    <input type="submit" style="background:#CB1C1C;border-radius:7px;height:40px;width:70px;color:white" name='logout' value="logout">
                </form>
            </header>
            <form action="orders.php" method="post">
                <button name="ekle">Accept</button>
                <button name="sil">Delete</button>
            

            </form>
        </section>
    </div>
</body>
</html>

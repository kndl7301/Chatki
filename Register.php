<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>

<body>
    <div class="wrapper">
        <section class="form-signup">
            <header>Realtime chat</header>
            <form action="signup.php" method="post">
                <div class="error-text">Please fill the all inputs requirement</div>
                <div class="name-details">
                    <div class="field">
                        <label>UserName</label>
                        <input type="text" placeholder="UserName" name="Username">
                    </div>
                    <div class="field">
                        <label>Last Name</label>
                        <input type="text" placeholder="Last Name" name="lname">
                    </div>
                </div>
                <div class="field">
                    <label>Email Address</label>
                    <input type="text" placeholder="Email Address" name="email">
                </div>
                <div class="field">
                    <label>password</label>
                    <input id="password" type="password" placeholder="password" name="password">


                    <i class="fa-solid fa-eye toggle"></i>
                </div>
                <div class="mx-3">
                    <label>Select image</label><br>
                    <input type="file" placeholder="select image" name="photo">
                </div>
                <div class="field button">

                    <input type="submit" class=" btn btn-dark" value="Register and start chating" name="gönder">
                </div>

            </form>
            <div class="link">Already sign up? &nbsp<a href="login.php">Login now</a> </div>
            <br>
        </section>
    </div>




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




</body>

</html>
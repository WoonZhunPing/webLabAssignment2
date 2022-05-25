<?php

if (isset($_POST["signinButton"])) {
    include 'dbConnector.php';
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    $sqlLogin = "SELECT * FROM userdata WHERE uEmail = '$email' and uPass = '$password'";

    $stmt = $conn->prepare($sqlLogin);
    $stmt->execute();
    $number_of_rows = $stmt->fetchColumn();

    if ($number_of_rows > 0) {

        echo "<script>alert('Sucessfull login!')</script>";
        echo "<script>window.location.replace('index.php')</script>";
    } else {
        echo "<script>alert('Wrong email or password! Please try again')</script>";
        echo "<script>window.location.replace('login.php')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in for My Tutor</title>

    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>

<body>

    <div class="w3-header w3-black w3-display-container w3-padding-24 w3-center">
        <h1 style="font-size:32px; color: white">My Tutor</h1>
    </div>

    <div class="w3-display-container" id="loginSection">

        <div style=" display:flex; justify-content:center">

            <div class="w3-container w3-round">

                <div class="w3-container w3-blue" style="width: 400px; margin-top: 75px;">
                    <h3>Login</h2>
                </div>

                <form action="login.php" method="post" style=" border:2px">

                    <p>
                        <label for="tEmail"><b>Email:</b></label>
                        <input class="w3-input w3-round w3-border" type="email" name="email" id="tEmail" placeholder="login@hotmail.com" required>
                    </p>

                    <p>
                        <label for="tPassword"> <b>Password:</b></label>
                        <input class="w3-input w3-round w3-border" type="password" name="password" id="tPassword" placeholder="login123" required>
                    </p>

                    <p>
                        <input class="w3-check" type="checkbox"> Remember me
                    </p>

                    <p style="color:white">
                        <button class="w3-button w3-round " id="signinButton" name="signinButton">
                            Sign in
                        </button>
                    </p>

                    <p id="forgetPass">
                        <a href="#">Forget your password?</a>
                    </p>

                    <p id="tRegister">
                        No account?
                        <a href="register.php">Create one!</a>
                    </p>

                </form>

            </div>
        </div>
    </div>


    <footer class="w3-container w3-center w3-black">
        <p>MyTutor <br>Designed by Woon</p>

    </footer>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

</body>

</html>



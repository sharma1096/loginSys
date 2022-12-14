<?php
$showAlert = false;
$showError = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'partials/_dbconnect.php';
    $user_name = $_POST['username'];
    $password = $_POST['Password'];
    $cpassword = $_POST['Cpassword'];

    if ($password == $cpassword) {
        $sqlQuery = "SELECT * FROM `user` WHERE `username` = '$user_name'";
        // the above line is to check user already exists or not
        $result = mysqli_query($connection, $sqlQuery);

        $num = mysqli_num_rows($result);

        // echo $num;

        if ($num > 0) {
            echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failed!</strong> Account already exists...Plese login!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        } else {
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);

            $sqlQuery = "INSERT INTO `user` (`username`, `password`, `date`) VALUES('$user_name', '$hashPassword', current_timestamp())";

            $result = mysqli_query($connection, $sqlQuery);

            if ($result) {
                $showAlert = true;
            } else {
                $showError = true;
            }
        }
    } else {
        $showError = true;
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>SignUp</title>
</head>

<body>
    <?php require 'partials/_nav.php'; ?>

    <!-- alert -->
    <?php if ($showAlert) {
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You account is now created...
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    } elseif ($showError) {
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failed!</strong> Failed to create account...Plese try again!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    } ?>

    <div class="container my-3">
        <h1 class="text-center">SignUp to our website</h1>
        <form action="/PHPtutorial/loginSys/signUp.php" method="POST">
            <div class="form-group">
                <label for="username">UserName</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" class="form-control" id="Password" name="Password">
            </div>
            <div class="form-group">
                <label for="Cpassword">Confirm Password</label>
                <input type="password" class="form-control" id="Cpassword" name="Cpassword">
            </div>
            <button type="submit" class="btn btn-block btn-primary">SignUp</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>
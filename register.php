<?php
include "db.php";

$msg = "";

if (isset($_POST['register'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // password hash
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // insert query
    $sql = "INSERT INTO users (username, email, password)
            VALUES ('$username', '$email', '$hashedPassword')";

    if (mysqli_query($conn, $sql)) {
        $msg = "<div class='alert alert-success'>Registration successful!</div>";
    } else {
        $msg = "<div class='alert alert-danger'>Error: Username or Email already exists</div>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    Register
                </div>
                <div class="card-body">

                    <?= $msg ?>

                    <form method="POST">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>

                        <button type="submit" name="register" class="btn btn-primary btn-block">
                            Register
                        </button>
                    </form>

                </div>
                <div class="card-footer text-center">
                    Already have account? <a href="login.php">Login</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

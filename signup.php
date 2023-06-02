<!doctype html>
<html lang="en">

<head>
    <title>PWS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="CSS/jquery.cleditor.css">

    

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6 text-center mb-5">
                    <h2 class="heading-section">Get started!</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url(images/01.png);">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Sign Up</h3>
                                </div>
                            </div>
                            <form action="signup.php" class="signin-form" method="post">

                                <div class="form-group mb-3">
                                    <label class="label" for="fname">Fist name</label>
                                    <input type="text" class="form-control" placeholder="First name" name="fname" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="label" for="lname">Last name</label>
                                    <input type="text" class="form-control" placeholder="Last name" name="lname" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Username</label>
                                    <input type="text" class="form-control" placeholder="Username" name="user" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="email">Email</label>
                                    <input type="text" class="form-control" placeholder="Email" name="email" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="email">Date of birth</label>
                                    <input type="text" class="form-control" placeholder="YYYY-MM-DD" name="dob" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="pass" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign
                                        Up</button>


                                </div>

                                <div>
                                    <?php
                                    include "PHPConnect.php";
                                    include "hash.php";

                                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                        $fname = $_POST['fname'];
                                        $lname = $_POST['lname'];
                                        $user = $_POST['user'];
                                        $email = $_POST['email'];
                                        $dob = $_POST['dob'];
                                        $pass = gen_hash($_POST['pass']);

                                        $query = "INSERT INTO `user` VALUES ('$fname', '$lname', '$dob', '$user', '$email', '$pass')";
                                        try {
                                            $result = $conn->query($query);
                                        } catch (Exception $e) {
                                            echo "<p>User already exists</p>";
                                            exit(0);
                                        }
                                        header("Location: login.php");
                                    }
                                    ?>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">

                                    </div>
                                    <div class="w-50 text-md-right">
                                    </div>
                                </div>
                            </form>
                            <p class="text-center">Already a member? <a href="login.php">Sign In</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    <script>
        if ( window.history.replaceState ) 
            {
                window.history.replaceState( null, null, window.location.href );
            }
    </script>

</body>

</html>
<?php
include("config.php");
?>
<?php
include("header.php");

?>
<main>
    <div class="container-fluid">
        <div class="d-flex justify-content-center d-flex align-items-center" style="height: 200px;">
            <h1>Sign In</h1>
            <?php
            if (isset($_SESSION['login'])) {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }

            if (isset($_SESSION['no-login-message'])) {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
            ?>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">UserName</label>
                        <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="" class="form-text">Enter Username</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input name="userpass" type="password" class="form-control" id="exampleInputPassword1">
                        <div id="" class="form-text">Enter Password</div>

                    </div>
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
</main>
<!-- //Khai báo sử dụng session
session_start();
//Xử lý đăng nhập -->
<?php
session_start();
//CHeck whether the Submit Button is Clicked or NOt
if (isset($_POST['submit'])) {
    //Process for Login
    //1. Get the Data from Login form
    // $username = $_POST['username'];
    // $password = md5($_POST['password']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    // $raw_password = md5($_POST['userpass']);
    $password = mysqli_real_escape_string($conn, $_POST['userpass']);

    //2. SQL to check whether the user with username and password exists or not
    $sql = "SELECT * FROM `db_users` WHERE `user_name` = '$username' and `user_pass` = '$password'";

    //3. Execute the Query
    $res = mysqli_query($conn, $sql);

    //4. COunt rows to check whether the user exists or not
    $count = mysqli_num_rows($res);
    if ($count == 1) {
        //User AVailable and Login Success
        $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
        $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it

        //REdirect to HOme Page/Dashboard
        header("Location:list-user.php");
    } else {
        //User not Available and Login FAil
        $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
        //REdirect to login form
        header("Location:login.php");
    }
}

?>
<?php
include("footer.php");
?>
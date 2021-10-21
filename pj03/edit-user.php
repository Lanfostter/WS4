<?php
ob_start();
include('header.php');
?>
<?php
session_start();
if ($_SESSION["user"] != "admin") {
    header("Location:login.php");
}
?>
<?php
include('config.php');
?>
<div class="main-content">
    <div class="wrapper">
        <h1 style="text-align: center;">Update Admin</h1>

        <br><br>

        <?php
        //1. Get the ID of Selected Admin
        $id = $_GET['id'];
        //2. Create SQL Query to Get the Details
        $sql = "SELECT * FROM db_users WHERE id=$id";
        //Execute the Query
        $res = mysqli_query($conn, $sql);
        //Check whether the query is executed or not
        if ($res == true) {
            // Check whether the data is available or not
            $count = mysqli_num_rows($res);
            //Check whether we have admin data or not
            if ($count == 1) {
                // Get the Details
                //echo "Admin Available";
                $row = mysqli_fetch_assoc($res);
                $user_id = $_POST['u_id'];
                $user_name = $_POST['u_name'];
                $user_emai = $_POST['u_email'];
                $user_pass = $_POST['u_pass'];
                $registration_date = $_POST['u_date'];
                $status = $_POST['u_status'];
                $user_level = $_POST['u_level'];
            } else {
                //Redirect to Manage Admin PAge
                header('location:'.SITEURL.'list-user.php');
            }
        }
        ?>
        <main>
            <main class="container">
                <h2>Sửa thông tin người dùng</h2>
                <form action="" method="post">
                    <div class="form-group row">
                        <label for="u_id" class="col-sm-2 col-form-label">Mã người dùng</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="u_id" name="u_id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="u_name" class="col-sm-2 col-form-label">Têm người dùng</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="u_name" name="u_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="u_email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="u_email" name="u_email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="u_pass" class="col-sm-2 col-form-label">Mật khẩu</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="u_pass" name="u_pass">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="u_date" class="col-sm-2 col-form-label">Ngày đăng ký</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="u_status" name="u_date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="u_status" class="col-sm-2 col-form-label">Trạng thái</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="u_status" name="u_status">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="u_level" class="col-sm-2 col-form-label">Chức vụ</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="u_level" name="u_level">
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </div>
                </form>
            </main>
        </main>
        <?php
        //Check whether the Submit Button is Clicked or not
        if (isset($_POST['submit'])) {
            //echo "Button CLicked";
            //Get all the values from form to update
            $id = $_POST['id'];
            $user_id = $_POST['u_id'];
            $user_name = $_POST['u_name'];
            $user_email = $_POST['u_email'];
            $user_pass = $_POST['u_pass'];
            $registration_date = $_POST['u_date'];
            $status = $_POST['u_status'];
            $user_level = $_POST['u_level'];
            //Create a SQL Query to Update Admin
            $sql = "UPDATE `db_users` 
            SET `user_id`='$user_id',`user_name`='$user_name',`user_email`='$user_email',`user_pass`='$user_pass',`registration_date`='$registration_date',`status`='$status',`user_level`='$user_level' WHERE `user_id` = $id";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            //Check whether the query executed successfully or not
            if ($res == true) {
                //Query Executed and Admin Updated
                $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
                //Redirect to Manage Admin Page
                header('Location:'.SITEURL.'list-user.php');
            } else {
                //Failed to Update Admin
                $_SESSION['update'] = "<div class='error'>Failed to Delete Admin.</div>";
                //Redirect to Manage Admin Page
            }
        }
        ob_end_flush();
        ?>
        <?php
        include('footer.php');
        ?>
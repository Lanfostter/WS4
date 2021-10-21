<?php
$user_id = $_POST['u_id'];
$user_name = $_POST['u_name'];
$user_emai = $_POST['u_email'];
$user_pass = $_POST['u_pass'];
$registration_date = $_POST['u_date'];
$status = $_POST['u_status'];
$user_level = $_POST['u_level'];

include 'config.php';

// Bước 02:
$sql = "INSERT INTO `db_users`(`user_id`, `user_name`, `user_email`, `user_pass`, `registration_date`, `status`, `user_level`)
     VALUES ('$user_id','$user_name','$user_emai','$user_pass','$registration_date','$status','$user_level')";

$result = mysqli_query($conn, $sql);
// Bước 03:
if ($result > 0) {
    header('Location:'.SITEURL.'list-user.php');
} else {
    echo "Lỗi!";
}


//Bước 04: Đóng kết nối
mysqli_close($conn);

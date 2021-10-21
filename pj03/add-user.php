<?php
session_start();
if($_SESSION["user"] != "admin")
{
  header("Location:login.php");
}
?>
<?php
include('header.php');
?>
<main class="container">
        <h2>Thêm thông tin người dùng</h2>
        <form action="process-add-user.php" method="post">
            <div class="form-group row">
                <label for="empName" class="col-sm-2 col-form-label">Mã người dùng</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="u_id" name="u_id" >
                </div>
            </div>
            <div class="form-group row">
                <label for="empPosition" class="col-sm-2 col-form-label">Têm người dùng</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="u_name" name="u_name">
                </div>
            </div>
            <div class="form-group row">
                <label for="empEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                <input type="email" class="form-control" id="u_email" name="u_email">
                </div>
            </div>
            <div class="form-group row">
                <label for="empMobile" class="col-sm-2 col-form-label">Mật khẩu</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="u_pass" name="u_pass">
                </div>
            </div>
            <div class="form-group row">
                <label for="empMobile" class="col-sm-2 col-form-label">Ngày đăng ký</label>
                <div class="col-sm-10">
                <input type="date" class="form-control" id="u_status" name="u_date">
                </div>
            </div>
            <div class="form-group row">
                <label for="empMobile" class="col-sm-2 col-form-label">Trạng thái</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="u_status" name="u_status">
                </div>
            </div>
            <div class="form-group row">
                <label for="empMobile" class="col-sm-2 col-form-label">Chức vụ</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="u_level" name="u_level">
                </div>
            </div>
            <div class="form-group row">
                <label for="empMobile" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-success">Lưu lại</button>
                </div>
            </div>
        </form>
    </main>
<?php
include('footer.php');
?>
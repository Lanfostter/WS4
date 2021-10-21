<?php
include('header.php');
?>
<?php
session_start();
echo "username là: " . $_SESSION['user'];

if (!$_SESSION["user"]) {
  header("Location:login.php");
}
?>
<main>
  <div class="row d-flex align-items-center" style="height: 100px;">
    <div class="col">
      <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
    </div>
    <div class="col">
      <a href="add-user.php"><i class="fa-solid fa-user-plus fa-2xl"></i></a>
    </div>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Password</th>
        <th scope="col">registration_date</th>
        <th scope="col">status</th>
        <th scope="col">level</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (isset($_SESSION['login'])) {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
      }
      ?>
      <?php
      include 'config.php';
      $sql = "Select * from db_users";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
          <tr>
            <th scope="row"><?php echo $row['user_id']; ?> </th>
            <td><?php echo $row['user_name']; ?></td>
            <td><?php echo $row['user_email']; ?></td>
            <td><?php echo $row['user_pass']; ?></td>
            <td><?php echo $row['registration_date']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['user_level']; ?></td>
            <td><a href="edit-user.php?id=<?php echo $row['user_id']; ?>"><i class="fas fa-user-edit"></i></a></td>
            <td><a href="delete-user.php?id=<?php echo $row['user_id']; ?>"><i class="fas fa-user-times"></i></a></td>
          </tr>
      <?php
        }
      }
      ?>
    </tbody>
  </table>
</main>
<?php
include('footer.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    const SITEURL = 'http://localhost/pj03/';
    const Host = 'localhost';
    const User = 'root';
    const Pass = '';
    const DB = 'pj3';
    $conn = mysqli_connect(Host, User, Pass, DB);
    if (!$conn) {
        die('Không thể kết nối');
    } else {
    }
    ?>
    
</body>

</html>
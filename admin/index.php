<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="icon" href="../img/favicon.ico">
</head>
<body style="margin:0 auto;">
<div class="container" style="margin:100px auto;width:300px; height:300px;">
<img  class="media-object" style="width:auto; height:100px;margin:0 auto;" src="img/goto.png">



<?php
echo "<form method=\"post\">";
echo '
    <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input type="username" name="username" class="form-control" id="exampleInputEmail1" placeholder="Username">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <button type="submit" name="signin" class="btn btn-default">Sign in</button>';

echo '</form>';
if (isset($_POST['signin'])){
    require('login.php');
}
?>
</div>
</body>

<!--if ($login==$_POST['username'] and $password==$_POST['password']){
        setcookie('user', $_POST['username'], strtotime('+30 days'));
        exit(header('Location:/nav/admin/news'));
    }
    else{
        print('Неверный логин или пароль');
    }

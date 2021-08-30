<?php
if (isset($_SESSION["session_username"])) {
    header("Location: /login");
    exit;
} else {
    $title = "Вход";
    include("header.php");
    
    if (isset($_POST["login"])) {
        
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            
            $fullname       = mysqli_query($link, "SELECT `username` FROM `usertbl` WHERE `username` LIKE '$username'");
            $fullnameresult = mysqli_fetch_assoc($fullname);
            $fullnameresult = $fullnameresult['username'];
            
            $fullnamename       = mysqli_query($link, "SELECT `full_name` FROM `usertbl` WHERE `username` LIKE '$username'");
            $fullnamenameresult = mysqli_fetch_assoc($fullnamename);
            $fullnamenameresult = $fullnamenameresult['full_name'];
            
            $query   = mysqli_query($link, "SELECT * FROM `usertbl` WHERE `username` LIKE '$username'");
            $numrows = mysqli_num_rows($query);
            
            if ($numrows != 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    $dbusername = $row['username'];
                }
                $hashbd       = mysqli_query($link, "SELECT `password` FROM `usertbl` WHERE `username` LIKE '$username'");
                $hashbdresult = mysqli_fetch_assoc($hashbd);
                $hashbdresult = $hashbdresult['password'];
                $md5password  = md5($password);
                
                if ($md5password === $hashbdresult) {
                    $_SESSION['session_username'] = $fullnameresult;
                    $_SESSION['session_fullname'] = $fullnamenameresult;
                    header("Location: /");
                    exit;
                    exit;
                } else {
                    $message = "Ошибка имени пользователя или пароля!";
                }
            } else {
                $message = "Ошибка имени пользователя или пароля!";
            }
        }
    }
    mysqli_close($link);
?>
   <?php
    if (!empty($message)) {
        echo "<div class='alert alert-danger alert-dismissible fixed-bottom'>
    <button type='button' class='close' data-dismiss='alert'>×</button>
    <strong>Danger!</strong> ", $message, "</div>";
    }
?>

  
  <div class="container block">
  <h1>Вход</h1>
  <form action="" id="loginform" method="post" name="loginform">
    <div class="form-group">
      <label for="user_login">Логин:</label>
      <input type="username" class="form-control" id="username" name="username">
    </div>
    <div class="form-group">
      <label for="password">Пароль:</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" name="login" class="btn btn-purple float-right">Войти</button>
  </form>
</div>

<?php
    include("footer.php");
}
?>
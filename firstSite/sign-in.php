<?php require "./header.php";
?>
<?php
if (isset($_POST['signin'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $mess = "";
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $conn = new mysqli('localhost','root','root','php_task');
    $result = $conn->query("SELECT * FROM `users` WHERE `email`= '$email' AND `password`='$password'");
    
    if ($result->num_rows === 1) {
      $row = $result->fetch_assoc();
      setcookie('user',$row['name'],time()+3600,"/");
      header('Location:./user_profile.php');
      ob_end_flush();
    } else {
      $mess = "Wrong password or email";
    }
  } else {
    $mess = 'Fill in all fields';
  }
}
?>

<style>
  .form {
    width: 35%;
  }
</style>

<div class="container form">
  <h3 class="text-center">Sign IN</h3>
  <form method="post">
    <div class="form-group">
      <label for="exampleInputName">Email</label>
      <input type="email" class="form-control"  name="email" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="password">
    </div>
    <hr>
    <p class="mt-2  text-center text-info"><?php echo $mess; ?></p>
    <button type="submit" name="signin" class="btn btn-info w-100 mt-2">sign in</button>
  </form>
</div>
<?php require "./footer.php"?>

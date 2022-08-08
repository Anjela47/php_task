<?php require "./header.php";
?>
<style>
  .form{
    width:35%;
    margin:0 auto;
  }
</style>
<?php

if (isset($_POST['reg'])) {
  $username = $_POST['user_name'];
  $email = $_POST['user_email'];
  $password = md5($_POST['user_password']);
  
  if (!empty($username) && !empty($password) && !empty($email)) {
    $result = $conn->query("SELECT id FROM `users` WHERE `email`= '$email'");
    if($result->num_rows===0){
      $conn = new mysqli('localhost','root','root','php_task');
      $conn->query("INSERT INTO `users`(`name`,`email`,`password`) VALUES('$username','$email','$password')");
      $mess =  'Registration successful';
      header('Location:./sign-in.php');
      ob_end_flush();
    } else {
      $mess = "Registration is already available";
    }
  }else{
    $mess = 'Fill in all fields';
  }
}

?>
<div class="container">
<div class="form">
  <h3 class="text-center">Registration</h3>
  <form method="post">
      <label for="exampleInputName">User Name</label>
      <input type="text" class="form-control" id="exampleInputName" name="user_name">
      <label for="exampleInputEmail">Email</label>
      <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" name="user_email">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="user_password">
    <hr>
    <p class="text-center text-info"><?php echo $mess; ?></p>
    <button type="submit" name="reg" class="btn btn-info w-100">Register</button>
  </form>
</div>
</div>

<?php require "./footer.php"?>
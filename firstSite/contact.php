<?php require "./header.php"?>
<style>
  .form{
    width:35%;
    margin:0 auto;
  }
</style>
<?php

if (isset($_POST['reg'])) {
  $email = $_POST['user_email'];
  $message = $_POST['message'];
  if (!empty($message) && !empty($email)) {
    $subject = "=?utf-8?B?".base64_encode("You have message")."?";
    $headers = "From:$email\r\nReply-to:$email\r\nContent-type: text/html;charset=utf-8\r\n";
    mail('anjisa2001@mail.ru',$subject,$message,$headers);
    $mess = "Message sended";
  } else {
    $mess = 'Please complete all fields';
  }
}

?>
<div class="container">
<div class="form">
  <h3 class="text-center">Contact with us</h3>
  <form method="post">
    <div class="form-group">
      <label for="exampleInputEmail">Email</label>
      <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter your email" name="user_email">
    </div>
    <div class="form-group">
      <p for="exampleInputPassword1">Message</p>
      <textarea class="form-control" name="message" cols="52" rows="5" placeholder="Enter your message" ></textarea>
    </div>
    <hr>
    <p class="text-center text-info"><?php echo $mess; ?></p>
    <button type="submit" name="reg" class="btn btn-info w-100">Send</button>
  </form>
</div>
</div>

<?php require "./footer.php"?>
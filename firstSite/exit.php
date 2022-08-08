<?php
setcookie('user',$row['name'],time()-3600,"/");
header('Location:/');
ob_end_flush();
?>
<?php
setcookie('login',"",time() -3600 * 24 *30,"/");
unset($_COOKIE['login']);//delete elm cookie
echo true;
 ?>

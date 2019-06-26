<?php
unset($_COOKIE['user_id']);
unset($_COOKIE['username']);
setcookie('user_id', '', -1, '/');
setcookie('username', '', -1, '/');
$home_url = '/index.php?logout=true';
header('Location: ' . $home_url);
?>
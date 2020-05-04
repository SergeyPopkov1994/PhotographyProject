<?php
  unset($_COOKIE['user_id']);
  unset($_COOKIE['email']);
  unset($_COOKIE['first_name']);
  unset($_COOKIE['second_name']);
  unset($_COOKIE['role']);
  setcookie('user_id', '', -1, '/');
  setcookie('email', '', -1, '/');
  setcookie('first_name', '', -1, '/');
  setcookie('second_name', '', -1, '/');
  setcookie('role', '', -1, '/');
  $home_url = 'http://' . $_SERVER['HTTP_HOST'];
  header('Location: ' . $home_url);
?>

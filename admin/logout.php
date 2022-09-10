<?php

// Removes a Cookie
setcookie('user', null, -1, '/');

// Redirect back to login page
header("location:login.php");
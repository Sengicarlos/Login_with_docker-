<?php
session_start();
session_unset();
session_destroy();
header("Location: index.php"); // or login.php if you have it
exit();
?>

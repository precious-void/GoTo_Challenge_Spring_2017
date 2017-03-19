<?php
session_start();
unset($_SESSION["name"]);
echo'<script>window.location.href="../";</script>';
/*setcookie('user','', strtotime('-30 days'));
unset($_COOKIE['user']);
*/
?>

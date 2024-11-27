<?php
session_start();


session_unset();
session_destroy();


header('Location: ../visao/login_usuario.php');
exit;
?>
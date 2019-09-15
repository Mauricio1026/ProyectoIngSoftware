<?php
  session_start();

  session_unset();

  session_destroy();

  header('Location: /Usuario/Public/Index.php');
?>
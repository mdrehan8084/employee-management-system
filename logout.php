<?php
session_start();
session_destroy();   // saara session data clear kar do
header("Location: login.php");
exit;
?>

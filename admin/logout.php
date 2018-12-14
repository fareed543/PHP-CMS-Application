<?php /**/ ?><? session_start();
session_destroy();
header("Location: index.php?e=1");
exit;
?>
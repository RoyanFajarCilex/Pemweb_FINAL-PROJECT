<?php
session_start();
session_unset();
session_destroy();

header("location: 0-masuk.php");
exit;

?>
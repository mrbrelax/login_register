<?php
include("core/init.php");

session_destroy();
header("Location:login.php");
?>
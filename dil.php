<?php
    if (isset($_COOKIE["jetaid"])) setcookie("jetaid",0,time()-36000);
    header("Location: login.php");
?>
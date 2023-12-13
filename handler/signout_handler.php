<?php
if (isset($_GET["type"]) && $_GET["type"] === "admin"){
    unset($_COOKIE['admin_id']);
    unset($_COOKIE['username']);
    echo "200";
    exit();
}
// setcookie("username", "", time() - 3600, "/");
// unset($_COOKIE['username']);
echo "200";
?>
<!DOCTYPE html>

<?php
session_start();

unset($_SESSION["MySessionLogin"]);
header("location: login.php");

?>
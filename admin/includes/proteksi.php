<?php 
// Disertakan di AWAL setiap halaman admin, SEBELUM HTML apa pun dikirim. 
session_start(); 
if (!isset($_SESSION["admin_id"])) { 
header("Location: login.php"); 
exit; 
}
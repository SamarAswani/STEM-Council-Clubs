<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: loginIndex.php"); // Redirecting To Home Page
}
?>

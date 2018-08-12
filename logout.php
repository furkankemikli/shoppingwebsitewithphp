<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: main_page_login.php");
   }
?>
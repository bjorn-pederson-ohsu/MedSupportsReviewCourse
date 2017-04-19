<?php
   session_start();
   require_once("includes/connections.php");
   require_once("includes/functions.php");
   include("includes/header_index.php");

   $output = get_mods(1);
   
   print_r($output);
    
   include("includes/footer.php");
?>

<?php
   session_start();
   require_once("includes/connections.php");
   require_once("includes/functions.php");
   $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
   
   $url = parse_url($url);
   //print_r($url);

   if (!isset($url['query'])){
    include ("sign_up.php");
   }else{
    if(isset($_GET['user'])&&isset($_GET['course'])){
	  $_SESSION['user'] = $_GET['user'];
	  $_SESSION['course'] = $_GET['course'];
      
      include('main.php');
      
    }else{
        parse_str(encrypt_decrypt('decrypt', $url['query']), $entryArray);
        
        if(isset($entryArray['user'])&&isset($entryArray['course'])){
            $_SESSION['user'] = $entryArray['user'];
            $_SESSION['course'] = $entryArray['course'];
            include ('main.php');
        }else{
            include ("sign_up.php");
        }
    }
    
    //redirect_to('main.php?user='.$_SESSION['user'].'&course='.$_SESSION['course']);
   }
   //http://192.168.1.106/Dropbox%20%28RTC%29/FunTimeReview/funtimeReviewHtml/index.php?CIMSH5nbw0UXkcXNjj28AEeXGdnkzOdH9FDFvScu6MU=
?>

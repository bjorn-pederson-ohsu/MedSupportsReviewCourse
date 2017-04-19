<?php
   require_once("includes/connections.php");
   require_once("includes/functions.php");
   if(isset($_GET['user'])&&isset($_GET['course'])){
	  session_start();
	  $_SESSION['user'] = $_GET['user'];
	  $_SESSION['course'] = $_GET['course'];
	  if (check_user($_GET['user'])&&check_course($_GET['course'])){
		 $_SESSION['uid'] = check_user($_GET['user']);
		 include ("courseoverview_html.php");
	  }elseif(check_user($_GET['user'])&&!check_course($_GET['course'])){
		 //echo "need a correct course number";
		//include ("pbloverview_html.php")
	  }elseif(!check_user($_GET['user'])&&check_course($_GET['course'])){
		 add_user_assign_course($_GET['user'],$_GET['course']) ;
		 //include ("courseoverview_html.php")
	  }else{
		 echo "neither the name or course are right";
	  }
	  
   }else{
	  echo "Both the user and the course need to be set.";
   }
?>

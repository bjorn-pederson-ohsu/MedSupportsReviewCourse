<?php
   require_once("includes/connections.php");
   require_once("includes/functions.php");
   if(isset($_SESSION['user'])&&isset($_SESSION['course'])){
      //echo $_SESSION['user']."<br />".$_SESSION['course']."<br />".check_user($_SESSION['user'])."<br />";
	  if (check_user($_SESSION['user'])&&check_course($_SESSION['course'])){
		 //echo $_SESSION['user']."<br />".$_SESSION['course']."<br />";
		 $_SESSION['uid'] = check_user($_SESSION['user']);
		 //echo "Session User ID after running function: ".$_SESSION['uid'];
         include ("courseoverview_html.php");
	  }elseif(check_user($_SESSION['user'])&&!check_course($_SESSION['course'])){
		 //echo "need a correct course number";
		include ("pbloverview_html.php");
	  }elseif(!check_user($_SESSION['user'])&&check_course($_SESSION['course'])){
		 add_user_assign_course($_SESSION['user'],$_SESSION['course']) ;
		 include ("courseoverview_html.php");
         //echo "user added<br/>";
	  }else{
		 include ("sign_up.php");
	  }
	  
   }else{
	  echo "Both the user and the course need to be set.";
   }
?>

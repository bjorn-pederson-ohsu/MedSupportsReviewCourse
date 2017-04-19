<?php
   session_start();
   require_once("includes/connections.php");
   require_once("includes/functions.php");

   $_SESSION['course'] = 1;
   if(isset($_POST['eml'])){
      $user = encrypt_decrypt('encrypt',$_POST['eml']);
   }else{
      echo "false";
   }
      if (check_user($user)===NULL){
         $userid=add_user($user);
         assign_course($userid, $_SESSION['course']);
      }else{
         $userid=check_user($user);
      }
      $to = $user;
      $subject = "Problem Based Learning Personal Link";
      $email = '
      <html>
         <head>
           <title>Problem Based Learning Personal Link</title>
         </head>
         <body>
            <h1>Thank you for your interest in using the Problem Based Learning Environment</h1>
            <p>This environment is a new way of presenting problems and looking for different solutions within an online learning system.</p>
            <p>Your personal link is:</p>
            <a href="http://pblcourse.reflektii.com/?'.encrypt_decrypt('encrypt', 'user='.$user.'&course=1').'" target="_BLANK">http://pblcourse.reflektii.com/?'.encrypt_decrypt('encrypt', 'user='.$user.'&course=1').'</a>
            <p>If you have any questions, please contact Bjorn Pederson (peder534@umn.edu).</p>
         </body>
      </html>
      ';
      $headers   = array();
      $headers[] = "MIME-Version: 1.0";
      $headers[] = "Content-type: text/html; charset=iso-8859-1";
      $headers[] = "From: <email>";
      $headers[] = "Reply-To: <email>";
      $headers[] = "Subject: {$subject}";
      $headers[] = "X-Mailer: PHP/".phpversion();
      if (@mail($to, $subject, $email, implode("\r\n", $headers))){
         echo "true";
      }else{
         echo "false";
      }
   
?>

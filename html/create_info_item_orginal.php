<?php
 session_start();
 $_SESSION['problem'] = 1;
require_once("includes/connections.php")?>
<?php require_once("includes/functions.php")?>
<?php include("includes/header_form.php");?>
<div id="navigationForm" class='navBox'>
<?php
   echo navigation();
?>
</div>
<div id="formArea" class="textBox">
   <fieldset>
	  <legend>Adding Info Pieces</legend>
	  <form action="item_submit.php" method="post">
		 <?php
			$item_set = get_all_info_areas();
			if ($item_set){
			$output = "<select name=\"mydropdown\">";
			foreach($item_set as $is){
			   $output .= "<option value=".$is->infoId.">".$is->infocatagory."</option>";
			}
            $output .= "</select><br/>";
            echo $output;
            }
		 ?>
		 <label for="infoBitTitle">Info Bit Title:</label><br />
		 <input type="text" name='infoBitTitle' id="infoBitTitle"></input><br />
		 <!--<label for="noteContent">Content</label><br />-->
		 <textarea class="tinymce" name='noteContent'id="noteContent"></textarea><br />
		 <input type="submit" value="SUBMIT">
	  </form>
   </fieldset>

</div>
<?php include("includes/footer_form.php");?>
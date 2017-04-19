<?php
 session_start();
 $_SESSION['problem'] = 5;
 $_SESSION['uid'] = 900000;
require_once("includes/connections.php")?>
<?php require_once("includes/functions.php")?>
<?php include("includes/header_test.php");?>
<div id="test_entry">
  <div class='form_area textBox'>
    <?php echo get_test_question_items($_SESSION['problem']);?>
  </div>
</div>
<div id="test_entry">
    <div class="form_area textBox">
        <fieldset>
           <legend>Adding Test Items</legend>
           <form action="test_item_submit.php" method="post">
              <label for='infoBitTitle'>Test Question</label><br />
              <input type='text' name='testquestion' id='testquestion'></input><br />
              <div id="correctItem">
                 <label for="correctAnswer">Which one is correct?</label><br />
                 <input type='radio' name='correctAnswer' id='correctAnswer_1' value='1'><br />
                 <input type='radio' name='correctAnswer' id='correctAnswer_2' value='2'><br />
                 <input type='radio' name='correctAnswer' id='correctAnswer_3' value='3'><br />
                 <input type='radio' name='correctAnswer' id='correctAnswer_4' value='4'><br />
                 <input type='radio' name='correctAnswer' id='correctAnswer_5' value='5'><br />
              </div>
              <div id="questionoptions">
                 <p>Enter the options for the answer here</p>
                 <input type='text' name='questionoption_1' id='questionoption_1'></input><br />
                 <input type='text' name='questionoption_2' id='questionoption_2'></input><br />
                 <input type='text' name='questionoption_3' id='questionoption_3'></input><br />
                 <input type='text' name='questionoption_4' id='questionoption_4'></input><br />
                 <input type='text' name='questionoption_5' id='questionoption_5'></input><br />
              </div>
              <div class="seClear"></div>
              <input type="submit" value="SUBMIT">
           </form>
        </fieldset>
    </div>
</div>
<?php include("includes/footer_form.php");?>
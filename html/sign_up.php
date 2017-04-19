<?php
    require_once("includes/connections.php");
    require_once("includes/functions.php");
    include("includes/header_sign_up.php");
?>
 
<div id="siteHeader">
</div><!---siteHeader End--->
	<div id="courseArea">
		<div id="workSpace" class="sign_up">
		    <h1>Problem-based learning Course Presentation</h1>
					<div class="textBox">
				    
						<p>To have an oportunity to try the environment, please enter your email address in the field below. This information will be used to generate a personal link  for the preview course. The personal link will be sent to you shortly.</p>
						<p>If you need a new copy of your personal link, fill out the form below and a new link will be emailed to you shortly.</p>
						<form>
						    <fieldset id="newSignUp">
						      <legend>Your Email</legend>
						      <label for="emailBody">Enter Your Email Address:</label>
						      <input type="text" id="emailBody" name="emailBody" placeholder="Type your email here" required></input><br />
						      <label for="emailBody2">Re-Enter Your Email Address:</label>
						      <input type="text" id="emailBody2" name="emailBody2" placeholder="Type your email here" required></input><br />
						      <input type="submit" value="Submit Your Email" class="subMenuButton" id="emailButton" />
						    </fieldset>
						</form>
					</div>
        </div>
    </div>
<?php
    include("includes/footer.php"); 
?>
<?php
    require_once("includes/connections.php");
    require_once("includes/functions.php");
    include("includes/header.php");
?>

<div id="toolHolder">
		<div id="toolArea">
			<ul>
				<li><a data-toolcat="info" href="#">My Info</a></li>
				<li><a data-toolcat="helpArea" href="#">Help</a></li>
				<li><a data-toolcat="notesArea" href="#">Notes</a></li>
				<li><a data-toolcat="leave" href="#">Log Out</a></li>
			</ul>
		</div>
            <div id="toolWorkSpace"></div>
            <div id="toolSpace">
                <?php echo get_help_videos();?>
                <div id="notesArea">
                    <div id="notes">
                        <!--put php for written and video notes here-->
                        <!--<ul>-->
                        <!--	<li>Here are some notes</li>-->
                        <!--	<li>here are more notes</li>-->
                        <!--	<li>And a third for good measure</li>-->
                        <!--	<li>Here are some notes</li>-->
                        <!--	<li>here are more notes</li>-->
                        <!--	<li>And a third for good measure</li>-->
                        <!--	<li>Here are some notes</li>-->
                        <!--	<li>here are more notes</li>-->
                        <!--	<li>And a third for good measure</li>-->
                        <!--</ul>-->
                    </div>
                    <div id="noteButtons">
                        <ul>
                            <li><a href="#notemaker">Add a note<img src="icons/notebook-1.png"/></a></li>
                            <li><a href="#videomaker">Add a video<img src="icons/video.png"/></a></li>
                        </ul>
                    </div>
                    <div id="notemaker" class="notemaker" title="Adding a New Note">
                        <form>
                            <fieldset>
                              <legend>Adding a New Note</legend>
                              <label for="noteBody">Notes:</label>
                              <textarea id="noteBody" name="noteBody" placeholder="Add your notes here" required></textarea><br />
                            </fieldset>
                        </form> 
                    </div>
                    <div id="videomaker" class="videomaker" title="Adding a New Video Note">
                        <p>This is some holding text</p>
                    </div>
                </div>
            </div>
        
</div>
<div id="siteHeader">
	    <h1><?php echo get_mod_name();?></h1>
	    <p>Help to figure out this problem by looking at this information and providing a solution for the DSP.</p>
	    
</div>
<div id="courseArea">
		<div id="workSpace"></div>
</div>
<div id="mainMenu">
    <ul>
        <li><a data-maincat="main" href="index.html">main menu</a></li>
        <li><a data-maincat="issue" href="#issueMenu">issue</a></li>
        <li><a data-maincat="information" href="#informationMenu">information</a></li>
        <li><a data-maincat="submission" href="#submissionMenu">submission</a></li>
    </ul>
</div>
<div id="directions">
		<h2>Directions</h2>
		<p>All of the items that explain and define the problem are listed across the top of the module area.</p>
		<p class="centerText">*** Hint: We recommend that you start with the video first. ***</p>
	</div>
<?php
    echo issue_menu();
    echo info_item_catagories();
    echo get_info_items();
?>
<div id="submissionMenu">
    <ul>
        <li><a data-subcat="#solution" href="#">Your Solution</a></li>
        <li><a data-subcat="#test" href="#">Test</a></li>
        <li><a data-subcat="#reflection" href="#">Reflection</a></li>
    </ul>
</div>
<div id="submissionContent">
    <div id="solution">
        <h2>Solution</h2>
        <p>Use the information that you have reviewed in this lesson and consider possible solution for the DSP. You may use the notes function or your own method to organize your thoughts before recording.</p><p>When you are done recording, watch your video and decide if you would like to save your solution or re-record it.</p>
        <button class="subMenuButton">Record Your Solution &#8594;</button>
    </div>
    <?php
        echo get_test_question_items();
        echo reflection_def(1);
    ?>
</div>   
<?php
    include("includes/footer.php");
    
?>
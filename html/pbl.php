<?php
    session_start();
    require_once("includes/connections.php");
    require_once("includes/functions.php");
    
    
    if(isset($_GET['problem'])){
        $_SESSION['problem']=$_GET['problem'];
		date_default_timezone_set("UTC");
		$_SESSION['timestore']=0;
		
    };
    include("includes/header.php");
?>

<div id="toolHolder">
		<div id="toolArea">
			<ul>
				<li><a data-toolcat="helpArea" href="#">Help</a></li>
			</ul>
		</div>
            <div id="toolWorkSpace"></div>
            <div id="toolSpace">
                <?php echo get_help_videos();?>
            </div>
        
</div>
<div id="siteHeader">
	    <h1><?php echo get_mod_name($_SESSION['course'], $_SESSION['problem']);?></h1>
	    <p>Help to figure out this problem by looking at this information and providing a solution for the DSP.</p>
	    
</div>
<div id="courseArea">
		<div id="workSpace"></div>
</div>
<div id="mainMenu">
    <ul>
        <li><a data-maincat="main"<?php echo "href=\"index.php?user=".$_SESSION['user']."&course=".$_SESSION['course']."\"";?>>main menu</a></li>
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
        <div id="solutionDirections" class="solutionDirections">
            <p>Use the information that you have reviewed in this lesson and consider possible solution for the DSP. You may use the notes function or your own method to organize your thoughts before working out your solution.</p><p>When you are done, review your solution and decide if you would like to save your solution or re-do it.</p>
        </div>
        <div id="solutionmaker" class="notemaker" title="Your Solution">
            <?php echo solution_set($_SESSION['problem']); ?>
    </div>
    <?php
        echo get_test_question_items($_SESSION['problem']);
        echo reflection_def($_SESSION['problem']);
    ?>
</div>   
<?php
    include("includes/footer.php");
    
?>
<?php
    require_once("includes/connections.php");
    require_once("includes/functions.php");
    include("includes/header_index.php");
?>

<div id="siteHeader">
	    <?php echo main_heading();?>
	</div><!---siteHeader End--->
	<div id="courseDescription">
	    <div id="courseDescriptionLeft">
		<h2 >Welcome</h2>
		<p><?php echo courseDes()?></p>
	    </div><!--- class left end--->
	    <div id="courseDescriptionRight"> 
		<h2>Modules</h2> 
		<p>Select one of the modules below to begin the review.</p> 
	    </div><!---class right end--->
	    <!--<div id="seClear" />-->
	</div><!---courseDescription--->
    <div id="menuBlock"> 
	    <h3>Orientation <span class="arrow"></span></h3>	    
	    <div id="modOrilist"class="modArea">
		<!--<h3>Orientation <span class="arrow"></span></h3>-->
		    <ul>
		    <li><a href="#orientation"><p>Overview of Module SetUp</p></a></li>
		    <li><a href="#understanding"><p>Understanding the Problem</p></a></li>
		    <li><a href="#work"><p>Your Work and Solution</p></a></li>
		    <li><a href="#reflection"><p>The Reflection</p></a></li>
		    </ul>
	    </div><!---modComp End--->
	    <div id="modOri" class="modContent">
			<div id="orientation" title="Overview of Module SetUp">
			<h1>Overview of Module SetUp</h1>
			    <div class="button">Start</div>
			    <div class="description">
				<h2>Learner Objectives</h2>
				<p>When you have completed this module you will be able to do the following:</p>
				<ol>
				    <li>Understand how this review is set-up.</li>
				    <li>Where to find information in the modules.</li>
				    <li>Locate the support areas.</li> 
				    <li>Understand what is expected of you as a learner.</li>
				</ol>
			    </div>
			    <div class="direction">When you are ready to begin, please click the Start Button to begin. This module will give an overview of the learning environment and how to use the tools.</div>
			</div><!-- Orientaiton area End -->
			<div id="understanding" title="Understanding the Problem">
			<h1>Understanding the Problem</h1>
			     <div class="button">Start</div>
			    <div class="description">
				<h2>Learner Objectives</h2>
				<p>When you have completed this module you will be able to do the following:</p>
				<ol>
				    <li>Undersstand how the problem is presented</li>
				    <li>Where to find the information and resources for the problem.</li>
				</ol>
			    </div>
		    <div class="direction">When you are ready to begin, please click the Start Button to begin. This module will give an overview of the structure of the problem.</div>
		    </div><!-- understanding area End -->
		    <div id="work" title="Your Work and Solution">
			<h1>Your Work and Solution</h1>
			    <div class="button">Start</div>
			    <div class="description">
				<h2>Learner Objectives</h2>
				<p>When you have completed this module you will be able to do the following:</p>
				<ol>
				    <li>Know what tools you have to work with.</li>
				    <li>Understand how to use the tools.</li>
				    <li>Understand how to enter a solution.</li>
				</ol>
			    </div>
		    <div class="direction">When you are ready to begin, please click the Start Button to begin. This module will give an overview of the structure of the problem.</div>
		    </div><!-- work area End -->
		    <div id="reflection" title="The Reflection">
			<h1>The Reflection</h1>
			     <div class="button">Start</div>
			    <div class="description">
				<h2>Learner Objectives</h2>
				<p>When you have completed this module you will be able to do the following:</p>
				<ol>
				    <li>Understand how the reflection process works.</li>
				    <li>Understand your audience.</li>
				    <li>Demostrate how to create a reflection for the modules.</li>
				</ol>
			    </div>
			<div class="direction">When you are ready to begin, please click the Start Button to begin. This module will give an overview of the structure of the problem.</div>
		    </div><!-- reflection area End -->
			<div id="Agreement" title="Allow me to capture your usage of this site">
			<h1>Usage Capture</h1>
			    <div class="textBoxUi">
					<ul>Pilot Administration of the Future Teacher&rsquo;s Technology Use Survey
						<li>You are invited to complete a survey on pre-service teacher&rsquo;s use of various technologies. You were selected as a possible participant simply because you are available at this time. We ask that you read this form and ask any questions you may have before agreeing to complete the survey.</li>
						<li>This pilot study is being conducted by students as part of the requirements for a Survey Research Methods course at the University of Minnesota. This pilot administration of the survey is important for learning about the techniques of using pilot results for the improvement of survey instruments. The results will not be used in any report now or later.</li>
						Background Information:
						<li>The purpose of this survey is to have a better understanding of how students who would like to be teachers currently use computers and cell phones. This information will be used to help shape the content and instructional practices used in the EdHD 5007 course.</li>
						Procedures:
						<li>If you agree to participate, you will be asked to complete a short survey. The survey should take about 10 minutes.</li>
						Risks and Benefits of Being in the Study:
						<li>There are no immediate or expected risks for participating in the survey. The survey is completely anonymous and confidential. Once your responses are entered into an electronic file, the original survey data from you will be destroyed.</li>
						<li>There are also no immediate or expected benefits for you for participating in the survey. Your participation will allow the survey researcher to learn about the conduct of survey research and the use of pilot data for the improvement of survey instruments.</li>
						Confidentiality:
						<li>The records of this study will be kept private. No reports will be published or publicly available.</li>
						Voluntary Nature of the Study:
						<li>Your decision whether or not to participate will not affect your current or future relations with the University. If you decide to participate, you are free to withdraw at any time without affecting those relationships. </li>
						Contacts and Questions:
						<li>The researcher conducting this study is Bjorn Pederson. You may ask any questions you have now. If you have questions later, you may contact them at 651-356-8639 or by email peder534@umn.edu . You may also contact the course instructor, Michael C. Rodriguez, at 612-624-4324.</li>
						<li>If you have any questions or concerns regarding the study and would like to talk to someone other than the researchers, contact Research Subjects&rsquo; Advocate line, D528 Mayo, 420 Delaware Street S.E., Minneapolis, Minnesota 55455; telephone (612) 625-1650.</li>
						You may have a copy of this form to keep for your records.
						IRB #0110s09004</ul>
			    </div>
			<div class="direction">When you are ready to begin, please click the Start Button to begin. This module will give an overview of the structure of the problem.</div>
		    </div>
			<div id="AgreementYes" title="Thank you for your participation">
				<h1>Now What Happens...</h1>
				
				<div class="description">
				<h2>The Process</h2>
				<p>The following activities will be present in the course:</p>
				<ol>
				    <li>a Pre-Course Survey</li>
					<ul>
						<li>This survey asks about your feelings and oppoarches to this course</li>
					</ul>
				    <li>A level of reflection rating scale</li>
					<ul>
						<li>A single rating question will be asked for each of the reflections that you submit</li>
					</ul>
				    <li>A Post-Course Survey</li>
				</ol>
				<p>Click on the button to start the pre-course survey.</p>
			    </div>
				<?php
				$linkOutPut = '<a href="https://umn.qualtrics.com/SE/?SID=SV_6u7UadbQhMWpZ0p&uID=';
				$linkOutPut .= check_user($_SESSION['user']).'">';
				echo $linkOutPut;
				?>
				<div class="button">Start the Pre-Course Survey</div></a>
			</div>
			<div id="AgreementNo" title="Thank you for your consideration">
				<h1>Now What Happens...</h1>
				<div class="description">
				<h2>Nothing</h2>
				<p>Your data will not be used in the study. You are still welcome to use the course environment. Click on the button to start the course.</p>
			    </div>
				
			</div>
	      </div>
         <?php
         echo build_mod_menus($_SESSION['course']);
         echo build_mod_content($_SESSION['course'])
         ?> 
    </div>
<?php
    include("includes/footer.php");
    
?>
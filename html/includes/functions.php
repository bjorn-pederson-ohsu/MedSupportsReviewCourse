<?php
//this is the function storage for basic things.

	
	function redirect_to($location=NULL){
		if ($location != NULL){
		header("Location: {$location}");
        exit;
		}
	}
	
    
    function get_all_info_areas(){
		global $pdo;
		$stmt = $pdo->prepare('SELECT * FROM  informationtable WHERE problemId = :pb ORDER BY informationtable.infoId ASC');
        $stmt->bindParam(':pb', $_SESSION['problem']);
		$stmt->execute();
		//$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$subject_set=$stmt->fetchAll( PDO::FETCH_OBJ );
		if (count($subject_set)){
			return $subject_set;
		}else{
			return NULL;
		}
    }
    
   
	function navigation (){
		$output =  "<ul class=\"items\">";
		$info_set = get_all_info_areas();
		// 4. Use returned data
        if ($info_set){
            foreach($info_set as $i) {
                //print_r($subject);
                $output .="<li ";
                $output .="><a href=\"#\">".$i->infocatagory." ";
                //$specific_items = count_form_database($i->infoId);
                
                $output .=" -- ". count_form_database($i->infoId) ."</a></li>";
                }
        }else{
            $output .='<li>No areas defined yet<li>';
        }
			
			$output .="</ul>";
			
			return $output;
	}
	
	function count_form_database($number){
		global $pdo;
		$stmt = $pdo->prepare('SELECT * FROM informationitems WHERE infoId  = :number');
		$stmt->bindParam(':number', $number, PDO::PARAM_INT);
		$stmt->execute();
		//print_r($stmt);
		$specific_items=$stmt->fetchAll( PDO::FETCH_OBJ );
		return count($specific_items);
		
	}
	
	function add_item($id, $title, $content){
		global $pdo;
		$sql = 'INSERT informationitems SET infoId = :id,itemTitle = :title,itemContent = :content;';
		$stmt = $pdo->prepare($sql);
		$stmt->execute(array(
				':id' => $id,
				':title' => $title,
				':content' => $content
		));
		if ($stmt->rowCount()){
			redirect_to('create_info_item.php');  
		}
	}
	
	function info_item_catagories (){
		$output =  "<div id=\"informationMenu\"><ul>";
		$info_set = get_all_info_areas();
		// 4. Use returned data
		if(!is_null($info_set)){
			foreach($info_set as $i) {
				//print_r($subject);
				$output .='<li><a data-subcat="#infoArea-'.$i->infoId.'"
				href="#infoArea-'.$i->infoId.'">'.$i->infocatagory.'</a></li>';
				}
		}
			$output .="</ul></div>";
			
			return $output;
	}
	
	function item_sets($number){
		global $pdo;
		$stmt = $pdo->prepare('SELECT * FROM  informationitems WHERE infoId = :number ORDER BY infoItemID ASC');
		$stmt->bindParam(':number', $number, PDO::PARAM_INT);
        $stmt->execute();
		//$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$subject_set=$stmt->fetchAll( PDO::FETCH_OBJ );
		if (count($subject_set)){
			return $subject_set;
		}else{
			return NULL;
		}
	
	}
	
	function get_info_items(){
		$output = "<div id=\"informationContent\">";
		$info_set = get_all_info_areas();
		if (!is_null($info_set)){
		foreach ($info_set as $i){
			$output .="<div id=\"infoArea-".$i->infoId."\">";
			$info_piece = item_sets($i->infoId);
			foreach($info_piece as $p){
			$output .="<div class=\"infodiv\"><h2>".$p->itemTitle."</h2>".stripslashes($p->itemContent)."</div>";
			}
			$output .="</div>";
		}
		}
		$output .="</div>";
		
		return $output;
	}
	
	function get_all_test_questions(){
		global $pdo;
		$stmt = $pdo->prepare('SELECT * FROM  testquestionstable WHERE problemId = :pb');
        $stmt->bindParam(':pb', $_SESSION['problem']);
		$stmt->execute();
		//$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$subject_set=$stmt->fetchAll( PDO::FETCH_OBJ );
		if (count($subject_set)){
			return $subject_set;
		}else{
			return NULL;
		}
    }
	
	function test_items($number){
		global $pdo;
		$stmt = $pdo->prepare('SELECT * FROM testanswers WHERE testQuestId = :number ORDER BY testAnswersId ASC');
		$stmt->bindParam(':number', $number, PDO::PARAM_INT);
        $stmt->execute();
		//$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$subject_set=$stmt->fetchAll( PDO::FETCH_OBJ );
		if (count($subject_set)){
			return $subject_set;
		}else{
			return NULL;
		}
	
	}
    
    function test_check(){
		global $pdo;
		$stmt = $pdo->prepare('SELECT * FROM usertestanswers WHERE problemid = :number AND uid = :uid');
		$stmt->bindParam(':number', $_SESSION['problem'], PDO::PARAM_INT);
        $stmt->bindParam(':uid', $_SESSION['uid'], PDO::PARAM_INT);
        $stmt->execute();
		//$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$subject_set=$stmt->fetchAll(PDO::FETCH_OBJ);
		if (count($subject_set)){
			return $subject_set;
		}else{
			return NULL;
        }
	
	}
    
    function solution_check(){
		global $pdo;
		$stmt = $pdo->prepare('SELECT * FROM usersolution WHERE problemid = :number AND uid = :uid');
		$stmt->bindParam(':number', $_SESSION['problem'], PDO::PARAM_INT);
        $stmt->bindParam(':uid', $_SESSION['uid'], PDO::PARAM_INT);
        $stmt->execute();
		//$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$subject_set=$stmt->fetchAll( PDO::FETCH_OBJ );
		if (count($subject_set)){
			return $subject_set;
		}else{
			return NULL;
		}
	
	}
    
    function reflection_check(){
		global $pdo;
		$stmt = $pdo->prepare('SELECT * FROM userreflection WHERE problemid = :number AND uid = :uid');
		$stmt->bindParam(':number', $_SESSION['problem'], PDO::PARAM_INT);
        $stmt->bindParam(':uid', $_SESSION['uid'], PDO::PARAM_INT);
        $stmt->execute();
		//$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$subject_set=$stmt->fetchAll( PDO::FETCH_OBJ );
		if (count($subject_set)){
			return $subject_set;
		}else{
			return NULL;
		}
	
	}
	
    function get_test_question_items($pbnum){
		$answerSet = array();
		$output = '<div id="test"><fieldset><legend><span>End of Module Test</span></legend><form action="" method="post" data-test="'.$pbnum.'"><ul>';
		$test_set = get_all_test_questions();
        $finished = test_check();
		if (isset($finished)){
				$answerarry= explode("&",$finished[0]->answerset);
				foreach($answerarry as $i=>$a){
				   preg_match("/question(\d*)=(.)/", $a, $oa);
				   $answerSet[$oa[1]] = $oa[2];
				}
		}
		foreach ($test_set as $t){
			$output .="<li><div class=\"questions\"><fieldset><legend><span>".$t->testQuestion."</span></legend>";
			$questionAnswer = $t->questionAnswer;
            $idNumber = $t->testQuestId;
			$test_answer_set = test_items($t->testQuestId);
			foreach($test_answer_set as $p){
                $selectedAnswer = $p->value;
                if (isset($finished)){
                    $insert ='disabled="true" ';
                    if ($questionAnswer === $selectedAnswer){
                        $insert .='checked="true" ';
                    }
                    if ($answerSet[$idNumber]== $selectedAnswer){
                        $doneit=" ** My Selection **";
                    }else{
                        $doneit=NULL;
                    }
                }else{
					$insert = NULL;
					$doneit = NULL;
				}
			$output .="<input type=\"radio\" name=\"question".$t->testQuestId."\" value=\"".$p->value."\" id=\"question".$t->testQuestId."-answers-".$p->value."\" ".$insert."><label for=\"question".$t->testQuestId."-answers-".$p->value."\">".$p->multipleChoiceSelections."".$doneit."</label><br />";
			}
			$output .="</fieldset></div></li>";
		}
        if (!$finished){
            $output .="</ul><input type=\"submit\" value=\"Submit\" class=\"subMenuButton\"/></form></fieldset></div>";
		}else{
            $output .="</ul></form></fieldset></div>";
        }
		echo $output;
	}
	
	function get_all_help_videos(){
		global $pdo;
		$stmt = $pdo->prepare('SELECT * FROM  mediatable WHERE moduleId = 5');
        $stmt->execute();
		//$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$subject_set=$stmt->fetchAll( PDO::FETCH_OBJ );
		if (count($subject_set)){
			return $subject_set;
		}else{
			return NULL;
		}	
	}
	
	function get_help_videos(){
	$output ="<div id=\"helpArea\"><ul>";
	$video_set = get_all_help_videos();
	foreach ($video_set as $v){
		$output .="<li><a class=\"helpset\" rel=\"videogallery1\" href=\"#helpVid".$v->mediaId."\" ><img src=\"images/".$v->mediaFileName."thumb.jpg\" /></a></li>";
	}
	$output .="</ul></div>";
	foreach ($video_set as $i){
		$output .="<div id=\"helpVid".$i->mediaId."\" title=\"".$i->mediaTitle."\">";
		$output .="<div class=\"vidHolder\"><video width=\"426\" height=\"320\" controls=\"controls\" preload=\"metadata\">";
		$output .="<source src=\"video/".$i->mediaFileName.".mp4\"  type='video/mp4; codecs=\"avc1.42E01E, mp4a.40.2\"'>
							<source src=\"video/".$i->mediaFileName.".webm\" type='video/webm; codecs=\"vp8, vorbis\"'>
							<source src=\"video/".$i->mediaFileName.".ogg\"  type='video/ogg; codecs=\"theora, vorbis\"'>  
							Your browser does not support the video tag.
						</video> 
					</div>
			</div>";
	
	}
	return $output;
	}
	
	function get_mod_name($ci, $pb){
		global $pdo;
		//cookies will be used for course and problem id
		$stmt = $pdo->prepare('SELECT problemTitle FROM problemtable WHERE courseId = :ci AND problemId = :pb');
        $stmt->bindParam(':ci', $ci, PDO::PARAM_INT);
		$stmt->bindParam(':pb', $pb, PDO::PARAM_INT);
		$stmt->execute();
		//$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$subject_set=$stmt->fetchAll( PDO::FETCH_OBJ );
		if (count($subject_set)){
			foreach($subject_set as $ss){
			return $ss->problemTitle;
			}
		}else{
			return NULL;
		}	
	}
	
	function get_problem_def($number){
		global $pdo;
		//cookies will be used for course and problem id
		$stmt = $pdo->prepare('SELECT sumaryTextLong FROM summarytable WHERE problemId = :number');
        $stmt->bindParam(':number', $number, PDO::PARAM_INT);
		$stmt->execute();
		//$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$subject_set=$stmt->fetchAll( PDO::FETCH_OBJ );
		if (count($subject_set)){
			foreach($subject_set as $ss){
			return $ss->sumaryTextLong;
			}
		}else{
			return NULL;
		}
	}
	
	function problem_def($number){
	$output ="<div id=\"problemSet\"><h2>Problem Overview</h2>";
	$problem_def = get_problem_def($number);
	$output .= $problem_def;
	$output .="</div>";
	return $output;
	}
	
	function get_reflection_def($number){
		global $pdo;
		//cookies will be used for course and problem id
		$stmt = $pdo->prepare('SELECT * FROM reflectionprompttable WHERE problemId = :number');
        $stmt->bindParam(':number', $number, PDO::PARAM_INT);
		$stmt->execute();
		//$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$subject_set=$stmt->fetchAll( PDO::FETCH_OBJ ); 
		if (count($subject_set)){
			foreach($subject_set as $ss){
			return $ss->relfectionPrompt;
			}
		}else{
			return NULL;
		}
	}
    
    function get_reflection_content(){
		global $pdo;
		//cookies will be used for course and problem id
		$stmt = $pdo->prepare('SELECT * FROM reflectionprompttable WHERE problemId = :number');
        $stmt->bindParam(':number', $number, PDO::PARAM_INT);
		$stmt->execute();
		//$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$subject_set=$stmt->fetchAll( PDO::FETCH_OBJ ); 
		if (count($subject_set)){
			foreach($subject_set as $ss){
			return $ss->relfectionPrompt;
			}
		}else{
			return NULL;
		}
	}
    
    function solution_set($number){
    $solution_check=solution_check();
    if ($solution_check){
        foreach($solution_check as $sc){
            $output ='<div class="textBox"><p>Your Solution:</p>'.$sc->solutionText.'</div>';
        }
        }else{
        $output ='<form>
                <fieldset>
                  <legend>Your Solution to the problem</legend>
                  <label for="noteBody">Your Solution:</label>
                  <textarea id="noteBody" class="noteBody tinymce" name="noteBody" placeholder="Type your solution here" required></textarea><br />
                  <input type="submit" value="Submit Your Solution" class="subMenuButton" id="solutionButton" />
                </fieldset>
            </form>';
            }
        $output .='</div><div class="seClear"></div>';
	//$output .="<button class=\"subMenuButton\" id=\"reflectionButton\">Create Your Reflection &#8594;</button></div>";
	return $output;
	}
    
	function reflection_def($number){
	$output ='<div id="reflection"><h2>Reflection</h2><div id="reflectionDirections" class="solutionDirections">';
	$reflection_def = get_reflection_def($number);
    $reflection_check=reflection_check();
	$output .= $reflection_def;
    $output .= '</div><div id="reflectionmaker" class="notemaker" title="Your Reflection">';
    if ($reflection_check){
        foreach($reflection_check as $rc){
            $output .='<div class="textBox"><p>Your Reflection:</p>'.$rc->reflectiontext.'</div>';
        }
        }else{
        $output .='<form>
                <fieldset>
                  <legend>Your Reflection on the problem</legend>
                  <label for="reflectBody">Your Reflection:</label>
                  <textarea id="reflectBody" class="noteBody tinymce" name="reflectBody" placeholder="Type your reflection here" required></textarea><br />
                  <input type="submit" value="Submit Your Reflection" class="subMenuButton" id="reflectButton" />
                </fieldset>
            </form>';
            }
        $output .='</div><div class="seClear"></div>';
	//$output .="<button class=\"subMenuButton\" id=\"reflectionButton\">Create Your Reflection &#8594;</button></div>";
	return $output;
	}
	
	
	function get_all_media(){
		global $pdo;
		//cookies will be used for course and problem id
		$stmt = $pdo->prepare('SELECT * FROM mediatable, mediaareadefs WHERE mediatable.moduleId = mediaareadefs.moduleDefId AND mediatable.problemId = :pb AND mediatable.moduleId<=3 ORDER BY mediatable.moduleId ASC');
        $stmt->bindParam(':pb', $_SESSION['problem']);
		$stmt->execute();
		//$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$subject_set=$stmt->fetchAll( PDO::FETCH_OBJ );
		if (count($subject_set)){
			return $subject_set;
		}else{
			return NULL;
		}	
	}
	
	function issue_menu(){
	$output = "<div id=\"issueMenu\"><ul>";
	$menuName = array();
	$issue_menu = get_all_media();
	if (!is_null($issue_menu)){
		foreach($issue_menu as $m){
			$menuName[]= $m->moduleDef;
		};
	}
	$menuName = array_values(array_unique($menuName));
	for($i=0; $i<count($menuName); $i++){
		$output .="<li><a data-subcat=\"#".strtolower($menuName[$i])."Set\" href=\"#".$menuName[$i]."\">".$menuName[$i]."</a></li>";
	}
	$output .="<li><a data-subcat=\"#problemSet\" href=\"#ProblemOverview\">Problem Overview</a></li></ul></div><div id=\"issueContent\">";
	
		for($i=0; $i<count($menuName); $i++){
			if ($menuName[$i] == "Video"){
					$output .="<div id=\"".strtolower($menuName[$i])."Set\"><h2>";
					$output .=$menuName[$i];
					$output .="</h2>";
					foreach($issue_menu as $a){
						if ($a->moduleDef == $menuName[$i]){
							$output .="<div class=\"vidHolder\"><video width=\"426\" height=\"320\" controls=\"controls\" preload=\"metadata\">";
							$output .="<source src=\"video/".$a->mediaFileName.".mp4\"  type='video/mp4; codecs=\"avc1.42E01E, mp4a.40.2\"'>
												<source src=\"video/".$a->mediaFileName.".webm\" type='video/webm; codecs=\"vp8, vorbis\"'>
												<source src=\"video/".$a->mediaFileName.".ogg\"  type='video/ogg; codecs=\"theora, vorbis\"'>  
												Your browser does not support the video tag.
											</video> 
										</div>
								</div>";
						}
					}
			}
			if ($menuName[$i] == "Images"){
					$output .="<div id=\"".strtolower($menuName[$i])."Set\"><h2>";
					$output .=$menuName[$i];
					$output .="</h2>";
					foreach($issue_menu as $a){
						if ($a->moduleDef == $menuName[$i]){
							$output .="<a class=\"imageset\" rel=\"gallery1\" href=\"images/".$a->mediaFileName.".".$a->mediaFileType."\" title=\"".$a->mediaTitle."\"><img src=\"images/".$a->mediaFileName."thumb.jpg\" ALT=\"".$a->mediaDesc."\"/></a>";
						}
					}
					$output .= "</div>";
			}
			if ($menuName[$i] == "Documents"){
					$output .="<div id=\"".strtolower($menuName[$i])."Set\"><h2>";
					$output .=$menuName[$i];
					$output .="</h2>";
					foreach($issue_menu as $a){
						if ($a->moduleDef == $menuName[$i]){
							$output .="<a href=\"docs/".$a->mediaFileName.".".$a->mediaFileType."\" target=\"_blank\"><div class=\"iconPic\">";
							if ($a->mediaFileType=="pdf") { 
								$output .='<img src="icons/pdficon.gif" ALT="PDF Download"/>';
							}
							if ($a->mediaFileType=="doc" || $a->mediaFileType=="docx") { 
								$output .='<img src="icons/wordicon.gif" ALT="Word Document Download"/>';
							}
							$output .="</div><div class=\"iconDes\"><p>".$a->mediaTitle."</p><p>".$a->mediaFileSize."</p></div><div id=\"seClear\"></div></a>";
						}
					}
					$output .= "</div>";
			}
		}
		
	$output .= problem_def($_SESSION['problem']); //this will be a cookie or session value passed in;
	$output .="</div>";
	return $output;
	}
	
	function check_user($user){
		global $pdo;
		//cookies will be used for course and problem id
		$stmt = $pdo->prepare('SELECT * FROM useridtable WHERE username = :un');
		$stmt->bindParam(':un', $user, PDO::PARAM_STR);
		$stmt->execute();
		//$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$subject_set=$stmt->fetchAll( PDO::FETCH_OBJ );
		if (count($subject_set)){
			foreach ($subject_set as $ss){
				return $ss->id;
			}
		}else{
			return NULL;
		}	
	}
	
	function check_course($number){
		global $pdo;
		//cookies will be used for course and problem id
		$stmt = $pdo->prepare('SELECT * FROM coursetable WHERE id = :n');
		$stmt->bindParam(':n', $number, PDO::PARAM_STR);
		$stmt->execute();
		//$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$subject_set=$stmt->fetchAll( PDO::FETCH_OBJ );
		if (count($subject_set)){
			return $subject_set;
		}else{
			return NULL;
		}	
	
	}
	
	
	function add_user($user){
		global $pdo;
		//cookies will be used for course and problem id
		$stmt = $pdo->prepare('INSERT INTO useridtable SET username = :un');
		$stmt->bindParam(':un', $user, PDO::PARAM_INT);
		$stmt->execute();
		//$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$subject_set=$pdo->lastInsertId();
		if ($subject_set){
			return (int)$subject_set;
		}else{
			return NULL;
		}	
	}
	
	function assign_course($userid, $course){
		global $pdo;
		//cookies will be used for course and problem id
		$stmt = $pdo->prepare('INSERT courseassignment SET username = :un, courseID = :ci');
		$stmt->bindParam(':un', $userid);
		$stmt->bindParam(':ci', $course);
		$stmt->execute();
		if ($stmt->rowCount()){
			return true;
			
		}else{
			return NULL;
		}	
	}
	
	function get_mods($course){
		global $pdo;
		//cookies will be used for course and problem id
		$stmt = $pdo->prepare('SELECT problemId FROM problemTable WHERE courseId = :ci');
		$stmt->bindParam(':ci', $course, PDO::PARAM_INT);
        $stmt->execute();
		//$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$subject_set=$stmt->fetchAll( PDO::FETCH_OBJ );
		if (count($subject_set)){
			foreach($subject_set as $ss){
			$probNums[]=$ss->problemId;
			
			}return $probNums;
		}else{
			return NULL;
		}	
	}
	
	function add_prob_status($userid,$probNums,$course){
		global $pdo;
		//cookies will be used for course and problem id
		$stmt = $pdo->prepare('INSERT problemstatus SET userId = :ui, courseId = :ci, problemId = :pi');
		$stmt->bindParam(':ci', $course, PDO::PARAM_INT);
		$stmt->bindParam(':ui', $userid, PDO::PARAM_INT);
		$stmt->bindParam(':pi', $probNums, PDO::PARAM_INT);
		$stmt->execute();
		//$stmt->setFetchMode(PDO::FETCH_ASSOC);
		if ($stmt->rowCount()){
			return true;
		}else{
			return NULL;
		}	
	
	}
    
    function get_problemStat(){
        global $pdo;
		//cookies will be used for course and problem id
		$stmt = $pdo->prepare('SELECT * FROM problemstatus WHERE userId = :ui AND courseId = :ci AND problemId = :pi');
		$stmt->bindParam(':ci', $_SESSION['course'], PDO::PARAM_INT);
		$stmt->bindParam(':ui', $_SESSION['uid'], PDO::PARAM_INT);
		$stmt->bindParam(':pi', $_SESSION['problem'], PDO::PARAM_INT);
        $stmt->execute();
		$subject_set=$stmt->fetchAll( PDO::FETCH_OBJ );
        //print_r($subject_set);
		if (count($subject_set)===1){
			return $subject_set;
		}else{
			return NULL;
		}	
    }
    
	function update_problemStat(){
        global $pdo;
        $problemStatus = get_problemStat();
         //echo "<br/>";
        //print_r($problemStatus);
        foreach ($problemStatus as $ps){
              $pn=$ps->problemStat;
              $id=$ps->id;
              $pi=$ps->problemId;
        }
         //echo "<br/>".$pn."=problemStat<br/>".$id."=id<br/>".$pi."=problemId<br/>";
         $pn = $pn+1;
          //echo "<br/>".$pn."=new problemStat<br/>";
        $stmt = $pdo->prepare('UPDATE problemstatus SET problemStat = :ps WHERE id=:id AND problemId = :pi');
		$stmt->bindParam(':ps', $pn, PDO::PARAM_INT);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->bindParam(':pi', $pi, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }
    
	function add_user_assign_course($user, $course){
		$userid = add_user($user);
		if (assign_course($userid, $course)){
			$probNums = get_mods($course);
			for($i=0; $i<count($probNums); $i++){
				add_prob_status($userid,$probNums[$i],$course);
			}
		}
	}
	
	function main_heading(){
	$mainhead = check_course($_SESSION['course']);
		foreach ($mainhead as $mh){
			$output = "<h1>".$mh->name."</h1><p>This is a comprehensive review of the ".$mh->reviewref." course</p>";
		}
	return $output;
	}
	
	function courseDes(){
	$mainhead = check_course($_SESSION['course']);
		foreach ($mainhead as $mh){
		return $mh->overview;
		}
	}
	
	function get_mods_full($number){
		global $pdo;
		//cookies will be used for course and problem id
		$stmt = $pdo->prepare('SELECT * FROM problemtable WHERE courseId = :ci');
		$stmt->bindParam(':ci', $number, PDO::PARAM_INT);
        $stmt->execute();
		//$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$subject_set=$stmt->fetchAll( PDO::FETCH_OBJ );
		if (count($subject_set)){
			return $subject_set;
		}else{
			return NULL;
		}
	}
	
	function mod_activity($number){
		global $pdo;
		//cookies will be used for course and problem id
		$stmt = $pdo->prepare('SELECT * FROM  problemstatus WHERE problemId = :pb AND courseId = :ci AND userId = :ui');
		$stmt->bindParam(':ci', $_SESSION['course'], PDO::PARAM_INT);
		$stmt->bindParam(':pb', $number, PDO::PARAM_INT);
		$stmt->bindParam(':ui', $_SESSION['uid'], PDO::PARAM_INT);
        $stmt->execute();
		//$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$subject_set=$stmt->fetchAll( PDO::FETCH_OBJ );
		if (count($subject_set)){
			foreach($subject_set as $ss){
				return $ss->problemStat;
			}
		}else{
			return NULL;
		}
	
	}
	
	function build_mod_menus($number){
		$modinfo = get_mods_full($number);
		$output = "<h3>Modules<span class=\"arrow\"></span></h3><div id=\"modSelections\"class=\"modArea\"><ul>";
		foreach ($modinfo as $mi){
			$output .="<li><a href=\"#mod_".$mi->problemId."\"><p>".$mi->problemTitle;
			if (mod_activity($mi->problemId)>0&&mod_activity($mi->problemId)<3){
			$output .= "<p class=\"startedMod\">Started</p>";
			}
			if (mod_activity($mi->problemId)>=3){
			$output .= "<p class=\"completeMod\">Completed!</p>";
			}
			$output .="</p></a></li>";
		}
		$output .="</ul></div>";
		return $output;
	}
	
	function get_mod_description($number){
		global $pdo;
		//cookies will be used for course and problem id
		$stmt = $pdo->prepare('SELECT * FROM problemtable, summarytable WHERE problemtable.problemId = summarytable.problemId AND problemtable.courseId = :ci');
		$stmt->bindParam(':ci', $number, PDO::PARAM_INT);
        $stmt->execute();
		//$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$subject_set=$stmt->fetchAll( PDO::FETCH_OBJ );
		if (count($subject_set)){
			return $subject_set;
		}else{
			return NULL;
		}
	}
	
	function build_mod_content($number){
		$modcontent = get_mod_description($number);
		$output = "<div id=\"modContent\" class=\"modContent\">";
		foreach ($modcontent as $mc){
			$output .="<div id=\"mod_".$mc->problemId."\" title=\"".$mc->problemTitle."\">";
			$output .="<h1>".$mc->problemTitle."</h1><a href=\"pbl.php?problem=".$mc->problemId."\"><div class=\"button\">Start</div></a>";
			$output .="<div class=\"description\"><h4>Learner Objectives</h4>".$mc->sumaryTextShort;
			$output .="</div><div class=\"direction\">When you are ready to begin, please click the Start Button. This module will give an overview of the structure of the problem.</div></div>";
		}
		$output .="</div>";
		return $output;
	}
	
	function get_notes_full($ui, $pid){
		global $pdo;
		//cookies will be used for course and problem id
		$stmt = $pdo->prepare('SELECT * FROM notestable WHERE userId = :ui AND problemId = :pid');
		$stmt->bindParam(':ui', $ui, PDO::PARAM_INT);
		$stmt->bindParam(':pid', $pid, PDO::PARAM_INT);
        $stmt->execute();
		//$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$subject_set=$stmt->fetchAll( PDO::FETCH_OBJ );
		if (count($subject_set)){
			return $subject_set; 
		}else{
			return NULL;
		}
	}
	
	function build_notes($ui, $pid){
		$notescontent = get_notes_full($ui, $pid);
		$output = "<ul>";
		if($notescontent){
			foreach ($notescontent as $nc){
				//print_r($nc);
				$fullnote = $nc->note;
				$littlenote = trimtext($fullnote);
				$output .= "<li><a href=\"#\" data-noteid=\"".$nc->id."\" data-nc=\"".$fullnote."\">".$littlenote."</a></li>";
			}
		}
		$output .="</ul>";
		return $output;
	}
	
	function trimtext($string){
		if (strlen($string) > 13){
				return substr($string,0,10).'...';
				}else{
				return $string;
				}
	}
	
	function get_all_survey_items(){
		global $pdo;
		$stmt = $pdo->prepare('SELECT * FROM  surveyitems');
		$stmt->execute();
		//$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$subject_set=$stmt->fetchAll( PDO::FETCH_OBJ );
		if (count($subject_set)){
			return $subject_set;
		}else{
			return NULL;
		}
    }
	
	function build_survey(){
		$surveycontent = get_all_survey_items();
		$output = "<ol>";
		if($surveycontent){
			foreach ($surveycontent as $sc){
				//print_r($nc);
				//$output .= "<li><fieldset><legend>".$sc->itemName."</lengend><br/><label for=\"".$sc->id."_1\">Not Like Me</label><input type=\"radio\" name=\"".$sc->id."\" id=\"".$sc->id."_1\" value=\"1\"><input type=\"radio\" name=\"".$sc->id."\" id=\"".$sc->id."_2\" value=\"2\"><input type=\"radio\" name=\"".$sc->id."\" id=\"".$sc->id."_3\" value=\"3\"><input type=\"radio\" name=\"".$sc->id."\" id=\"".$sc->id."_4\" value=\"4\"><input type=\"radio\" name=\"".$sc->id."\" id=\"".$sc->id."_5\" value=\"5\"><input type=\"radio\" name=\"".$sc->id."\" id=\"".$sc->id."_6\" value=\"6\"><input type=\"radio\" name=\"".$sc->id."\" id=\"".$sc->id."_7\" value=\"7\"><label for=\"".$sc->id."\">Most Like Me</label></fieldset></li>";
				$output .= "<li><fieldset><legend>".$sc->itemName."</legend><div class=\"answerArea\"><p>Least Like Me</p>";
				for ($i=1;$i<=7;$i++){
				$output .="<label for=\"".$sc->id."_".$i."\">".$i."<input type=\"radio\" name=\"".$sc->id."\" id=\"".$sc->id."_".$i."\" value=\"".$i."\"></label>";
				}
				$output .="<p>Most Like Me</p></div></fieldset></li>";
			}
		}
		$output .="</ol>";
		return $output;
	}
	
	function time_convert($timeValue){
		$tempNum = $timeValue;
		$minutes = floor($tempNum / 60);
		$seconds = $tempNum % 60;
		if ($seconds < 10)
		{
			if ($seconds > 1){
				$sec = "0".$seconds." seconds";
			}else{
				$sec = "0".$seconds." second";
			}
		} else
		{
			$sec = "".$seconds." seconds";
		}
		if ($minutes < 10)
		{
			if ($minutes>1){
				$min = "0".$minutes." minutes :";
			}else{
				$min = "0".$minutes." minute :";
			}
		} else
		{
			$min = "".$minutes." minutes :";
		}
		if ($minutes==0){
			$min="";
		}
		$currentTimeConverted = $min." ".$sec;
		return $currentTimeConverted;
	}
    
    function encrypt_decrypt($action, $string) {
        $output = false;
     
        $key = 'dy3nOx2D9494pi5IUlo5bAraWi397vst';
     
        // initialization vector 
     
        if( $action == 'encrypt' ) {
            $output = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND));
            $output = strtr(base64_encode($output), '+/=', '-_,');
        }
        else if( $action == 'decrypt' ){
            $output = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode(strtr($string, '-_,', '+/=')), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND));
            $output = trim($output);
        }
        return $output;
    }
	
?>
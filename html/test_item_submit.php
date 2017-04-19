<?php
    session_start();
    require_once('includes/connections.php');
    require_once('includes/functions.php');
    //if (isset($_POST['mydropdown'])){
    //    $itemarea = $_POST['mydropdown'];
    //}
    //if (isset($_POST['infoBitTitle'])){
    //    $itemtitle = $_POST['infoBitTitle'];
    //}
    //if (isset($_POST['noteContent'])){
    //    $itemcontent = $_POST['noteContent'];
    //}
    // 
    //add_item($itemarea,$itemtitle,$itemcontent);
    $testquestion = $_POST['testquestion'];
    $ca = $_POST['correctAnswer'];
    $questiontype = 'multiple choice';
    $answerArray =[];
    for ($i=1;$i<6;$i++){
        if ($_POST['questionoption_'.$i]){
            $answerArray[]= ['value'=>$i,'text'=>$_POST['questionoption_'.$i]];
        }
        if ($i==5){
            //print_r($answerArray);
            add_test_items($answerArray);
        }
    }
    
    function add_question(){
		global $pdo;
		//cookies will be used for course and problem id
		$question = $_POST['testquestion'];
        $questiontype = 'multiple choice';
		$stmt = $pdo->prepare('INSERT testquestionstable SET problemId = :pid, testQuestion = :tQ, questionFormat = :qf, questionAnswer = :qa');
        $stmt->bindParam(':pid',$_SESSION['problem'],PDO::PARAM_INT);
        $stmt->bindParam(':tQ',$question,PDO::PARAM_STR);
        $stmt->bindParam(':qf',$questiontype,PDO::PARAM_STR);
        $stmt->bindParam(':qa',$_POST['correctAnswer'],PDO::PARAM_INT);
		$stmt->execute();
        //$stmt->debugDumpParams();
		//$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$subject_set=$pdo->lastInsertId();
		if ($subject_set){
			return (int)$subject_set;
		}else{
			return NULL;
		}
		
	}
    
    function add_test_items($answerArray){
       global $pdo;
       $testnumber= add_question();
       foreach ($answerArray as $a){
            //print_r($a);
            $text=htmlspecialchars($a['text'], ENT_QUOTES);
            $value=$a['value'];
            $stmt = $pdo->prepare('INSERT testanswers SET testQuestId = :tid, multipleChoiceSelections = :mcs,value = :v');
            $stmt->bindParam(':tid',$testnumber);
            $stmt->bindParam(':mcs',$text);
            $stmt->bindParam(':v',$value);
            $stmt->execute();
            //$stmt->debugDumpParams();
            //$stmt->setFetchMode(PDO::FETCH_ASSOC);
        }
        redirect_to('create_test_item.php');
	}
    //add_test_items();
?>
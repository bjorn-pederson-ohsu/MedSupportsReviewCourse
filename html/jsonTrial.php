<?php
     session_start();
    require_once('includes/connections.php');
    require_once('includes/functions.php');
    $test_answers = get_all_test_questions();
    //print_r($test_answers);
    $answer_set=[];
    if ($test_answers){
        foreach($test_answers as $ta){
            $answer_set["question".$ta->testQuestId.""] = $ta->questionAnswer;
        }
    }
    //print_r($answer_set);
    header('Content-Type: application/json');
    echo json_encode($answer_set, JSON_NUMERIC_CHECK);
    
?>
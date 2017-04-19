<?php
    session_start();
    require_once('includes/connections.php');
    require_once('includes/functions.php');
    if (isset($_POST['uid'])&&isset($_POST['answer'])){
        $uid = $_POST['uid'];
        if ($_POST['answer']== 'yes'){
            $answer = 1; 
        }
        if ($_POST['answer']== 'no'){
            $answer = 0; 
        }
        //echo $content;
    }else{
        echo "false set";
    }
    
    global $pdo;
    $sql = 'INSERT INTO useragreement SET uid = :ui,statement = :st';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':ui', $uid, PDO::PARAM_INT);
    $stmt->bindParam(':st', $answer, PDO::PARAM_INT);
    $stmt->execute();
    $subject_set=$pdo->lastInsertId();
		if ($subject_set){
			echo $answer;
		}else{
			echo NULL;
		}
?>
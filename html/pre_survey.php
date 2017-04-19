<?php
    session_start();
    require_once('includes/connections.php');
    require_once('includes/functions.php');
    if (isset($_GET['uid'])){
        $uid = $_GET['uid'];
        echo "This person took the survey ".$uid;
    }else{
        echo "false set";
    }
    
//    global $pdo;
//    $check = 'yes';
//    $sql = 'INSERT INTO surveycomplete SET uid = :ui,taken = :st';
//    $stmt = $pdo->prepare($sql);
//    $stmt->bindParam(':ui', $uid, PDO::PARAM_INT);
//    $stmt->bindParam(':st', $check, PDO::PARAM_INT);
//    $stmt->execute();
//    $subject_set=$pdo->lastInsertId();
//		if ($subject_set){
//			echo $answer;
//		}else{
//			echo NULL;
//		}
?>
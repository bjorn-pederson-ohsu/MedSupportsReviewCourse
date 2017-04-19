<?php
    session_start();
    require_once('includes/connections.php');
    require_once('includes/functions.php');
    if (isset($_POST['uid'])){
        $uid = $_POST['uid'];
        //echo $content;
    }else{
        echo "false set";
    }
    
    global $pdo;
    $sql = 'SELECT * FROM useragreement WHERE uid = :ui';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':ui', $uid, PDO::PARAM_INT);
    $stmt->execute();
    $subject_set=$stmt->fetchAll( PDO::FETCH_OBJ );
		if (count($subject_set)){
			echo json_encode($subject_set);
		}else{
			echo NULL;
		}
?>
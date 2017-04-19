<?php
    session_start();
    require_once('includes/connections.php');
    require_once('includes/functions.php');
    if (isset($_POST['noteBody'])){
        $content = $_POST['noteBody'];
        //echo $content;
    }else{
        echo "false set";
    }
    
    global $pdo;
    $sql = 'INSERT notestable SET note = :content, userId = :ui, problemId = :pi';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':content', $content, PDO::PARAM_STR);
    $stmt->bindParam(':pi', $_SESSION['problem'], PDO::PARAM_INT);
    $stmt->bindParam(':ui', $_SESSION['uid'], PDO::PARAM_INT);
    $stmt->execute();
    if ($stmt->rowCount()){
        $smallcontent = trimtext($content);
        $output = "<li><a href=\"#\" data-noteid=\"".$pdo->lastInsertId()."\" data-nc=\"".$content."\">".$smallcontent."</a></li>";
           echo $output;
    }else{
        echo "false";
    }
?>
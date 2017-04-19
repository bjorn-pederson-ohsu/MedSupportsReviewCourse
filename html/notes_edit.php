<?php
    session_start();
    require_once('includes/connections.php');
    require_once('includes/functions.php');
    if ( isset($_POST['noteBody']) && isset($_POST['noteId']) ){
        $content = $_POST['noteBody'];
        $noteId  = $_POST['noteId'];
        //echo $content;
        //echo $noteId;
    }else{
        echo "false set";
    }
    
    global $pdo;
    $sql = 'UPDATE notestable SET note = :content WHERE id = :noteid';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':noteid', $noteId);
    $stmt->execute();
    if ($stmt->rowCount()){
        $smallcontent = trimtext($content);
        $output = "<a href=\"#\" data-noteid=\"".$noteId."\" data-nc=\"".$content."\">".$smallcontent."</a>";
           echo $output;
    }else{
        echo "false";
    }
?>
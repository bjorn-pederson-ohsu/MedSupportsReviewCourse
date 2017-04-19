<?php
    session_start();
    require_once('includes/connections.php');
    require_once('includes/functions.php');
    if (isset($_POST['scr'])&&isset($_POST['answerset'])){
             //echo $_SESSION['savedloc'];
            $answerset = $_POST['answerset'];
            $scr = $_POST['scr'];
            send_to_pdo($scr, $answerset);
        
    }else{
        echo "false set";
    }
    function send_to_pdo($scr, $answerset){
        
        global $pdo;
        $timestamp=date("Y-m-d H:i:s O");
        $sql = 'INSERT usertestanswers SET score = :scr, uid = :ui, problemid = :pi, answerset= :as, timestamp= :ti';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':scr', $scr, PDO::PARAM_INT);
        $stmt->bindParam(':as', $answerset, PDO::PARAM_STR);
        $stmt->bindParam(':pi', $_SESSION['problem'], PDO::PARAM_INT);
        $stmt->bindParam(':ui', $_SESSION['uid']  , PDO::PARAM_INT);
        $stmt->bindParam(':ti', $timestamp, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount()){
            //$smallcontent = trimtext($content);
            //$output = "<li><a href=\"#\" data-noteid=\"".$pdo->lastInsertId()."\" data-nc=\"".$content."\">".$smallcontent."</a></li>";
            $returnValue = update_problemStat();
            echo $returnValue;
        }else{
            echo "false";
        }
    }
?>
<?php
    session_start();
    require_once('includes/connections.php');
    require_once('includes/functions.php');
    if (isset($_POST['loc'])&&isset($_POST['timesval'])){
        if ($_SESSION['timestore']===0){
            $timeval = null;
            $_SESSION['timestore'] = $_POST['timesval'];
            $_SESSION['savedloc'] = $_POST['loc'];
            //echo $_SESSION['savedloc'];
            
            return false;
        }else{
             //echo $_SESSION['savedloc'];
            $content = str_replace("#","",$_SESSION['savedloc']);
            $timeval = $_POST['timesval']-$_SESSION['timestore'];
            $_SESSION['savedloc'] = $_POST['loc'];
            $_SESSION['timestore'] = $_POST['timesval'];
            echo $content."<br/>". $timeval."<br/>". $_SESSION['savedloc']."<br/>".$_POST['timesval']."<br/>".$_SESSION['timestore'];
            send_to_pdo($content, $timeval);
        }
    }else{
        echo "false set";
    }
    function send_to_pdo($content, $timeval){
        
        global $pdo;
        $sql = 'INSERT usertimetable SET placement = :loc, uid = :ui, courseid = :pi, timestamp= :tv';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':loc', $content, PDO::PARAM_STR);
        $stmt->bindParam(':tv', $timeval, PDO::PARAM_INT);
        $stmt->bindParam(':pi', $_SESSION['problem'], PDO::PARAM_INT);
        $stmt->bindParam(':ui', $_SESSION['uid'], PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount()){
            //$smallcontent = trimtext($content);
            //$output = "<li><a href=\"#\" data-noteid=\"".$pdo->lastInsertId()."\" data-nc=\"".$content."\">".$smallcontent."</a></li>";
            echo "true";
        }else{
            echo "false";
        }
    }
?>
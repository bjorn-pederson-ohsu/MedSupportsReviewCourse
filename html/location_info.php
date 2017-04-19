<?php
    session_start();
    require_once('includes/connections.php');
    require_once('includes/functions.php');
    global $pdo;
    $sql = 'SELECT * FROM usertimetable WHERE uid = 2 AND courseid = 1';
    $stmt = $pdo->prepare($sql);
    //$stmt->bindParam(':pi', $_SESSION['problem'], PDO::PARAM_INT);
    //$stmt->bindParam(':ui', $_SESSION['uid'], PDO::PARAM_INT);
    $stmt->execute();
    $subject_set=$stmt->fetchAll( PDO::FETCH_OBJ );
		if (count($subject_set)){
            $collection  = array();
			foreach($subject_set as $ss){
                if(array_key_exists($ss->placement, $collection)) {
                    // if the key exists in $result, add the value to the existing value
                    $collection[$ss->placement] += ', ' + $ss->timestamp;
                    } else {
                        // otherwise, just create it
                        $collection[$ss->placement] = $ss->timestamp;
                    }
            }
            $collectionSum = array_sum($collection);
            //$collection['totaltime'] = $collectionSum;
            $output="<ul>";
            foreach ($collection as $key=>$value){
                
                $output .="<li data-width =\"".floor(($value/$collectionSum)*100)."%\">".$key." = ".time_convert($value)."</li>";
            }
            $output .="</ul>";
			$output.='<p>Total Time: '.time_convert($collectionSum).'</p>';
            echo $output;
		}else{
			return false;
		}
?>
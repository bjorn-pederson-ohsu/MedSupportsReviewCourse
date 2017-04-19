<?php
    require_once('includes/connections.php');
    require_once('includes/functions.php');
    
    if (isset($_POST['mydropdown'])){
        $itemarea = $_POST['mydropdown'];
    }
    if (isset($_POST['infoBitTitle'])){
        $itemtitle = $_POST['infoBitTitle'];
    }
    if (isset($_POST['noteContent'])){
        $itemcontent = $_POST['noteContent'];
    }
    
    add_item($itemarea,$itemtitle,$itemcontent);
?>
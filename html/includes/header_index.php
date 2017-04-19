<?php
    require_once("includes/connections.php");
    require_once("includes/functions.php");
	
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Review Main Page</title>
<link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui-1.8.18.custom.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script src="script/jquery-1.7.1.js"></script>
<script src="script/jquery-ui-1.8.18.custom.min.js"></script>
<!--<script src="script/funtimejs.js"></script>-->
<script>
$(function(){
	var modContent = $('.modContent');
	modContent.addClass('hide');
	$('.modArea').on('click', 'ul li a', function(){
        var loc = $(this).attr('href');
        $( loc+":ui-dialog" ).dialog( "destroy" );
		$( loc ).dialog({
			height: 575,
			width: 550,
			modal: true
		});
		$(loc).dialog("open");
		return false;
	});
	//$.ajax({
	//	type: "POST",
	//	url: "agreement_check.php",
	//	data: ({uid: <?php echo check_user($_SESSION['user']);?>}),
	//	dataType: "text",
	//	success:function(data){
	//			setData(data);
	//	}
	//	});
	//function setData(data){
	//	var userAgreement = data;
	//	//console.log(data);
	//	//if (!userAgreement){
	//		$("#Agreement:ui-dialog").dialog("destroy");
	//		$("#Agreement").dialog({
	//			dialogClass: "no-close",
	//			height: 700,
	//			width: 935,
	//			modal: true,
	//			draggable: false,
	//			resizable: false,
	//			open: function(event, ui) {
	//					$('.ui-widget-overlay').hide().fadeIn();
	//					$('.ui-dialog').hide().fadeIn(300);
	//				},
	//			buttons: {
	//				"Yes, I would like to participate in the study.":function () {
	//					//$.ajax({
	//					//		type: "POST",
	//					//		url: "agreement_input.php",
	//					//		data: ({uid: <?php echo check_user($_SESSION['user']);?>, answer: "yes"}),
	//					//		dataType: "text",
	//					//		success:function(data){
	//									$("#Agreement:ui-dialog").dialog("destroy");
	//									agreementSorting(data);
	//							//	}
	//							//});
	//					},
	//				"No, I would not like to participate in the study.": function(){
	//					//$.ajax({
	//					//		type: "POST",
	//					//		url: "agreement_input.php",
	//					//		data: ({uid: <?php echo check_user($_SESSION['user']);?>, answer: "no"}),
	//					//		dataType: "text",
	//					//		success:function(data){
	//									$("#Agreement:ui-dialog").dialog("destroy");
	//									agreementSorting(data);
	//							//	}
	//							//});
	//					},
	//				"Download Study Agreement.":function(){
	//					//console.log("downloading Study Agreement");
	//				}
	//			}
	//		});
	//		$("#Agreement").dialog("open");
	//	//}
	//	
	//}
	//
	//function agreementSorting($da){
	//	//console.log("Data: "+$da);
	//	$da = 1;
	//		if ($da=="1") {
	//			//console.log('they agreed');
	//			$("#AgreementYes:ui-dialog").dialog("destroy");
	//			$("#AgreementYes").dialog({
	//				dialogClass: "no-close",
	//				height: 575,
	//				width: 550,
	//				modal: true,
	//				draggable: false,
	//				resizable: false,
	//				open: function(event, ui) {
	//						$('.ui-widget-overlay').hide().fadeIn();
	//						$('.ui-dialog').hide().fadeIn(300);
	//				}
	//			});
	//			$("#AgreementYes").dialog("open");
	//		}
	//		if ($da=="0") {
	//			//console.log('no go');
	//			$("#AgreementNo:ui-dialog").dialog("destroy");
	//			$("#AgreementNo").dialog({
	//				dialogClass: "no-close",
	//				height: 375,
	//				width: 550,
	//				modal: true,
	//				draggable: false,
	//				resizable: false,
	//				open: function(event, ui) {
	//						$('.ui-widget-overlay').hide().fadeIn();
	//						$('.ui-dialog').hide().fadeIn(300);
	//						},
	//				buttons: {
	//					"Enter the Course":function(){
	//						$("#AgreementNo").dialog("close");
	//					}
	//				}
	//			});
	//			$("#AgreementNo").dialog("open");
	//		}
	//	}
	
});
</script>
	<body>
		<div id="siteContainer">
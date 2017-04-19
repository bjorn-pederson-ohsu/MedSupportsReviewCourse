<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Review Main Page</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui-1.8.18.custom.css" />
<script src="script/jquery-1.7.1.js"></script>
<script src="script/jquery-ui-1.8.18.custom.min.js"></script>
<!--<script src="script/funtimejs.js"></script>-->
<script>
$(function(){
	var $signup = $('.sign_up');
	var $button = $signup.find('#emailButton').hide();
	$signup.find('input[type="text"]').val('');
	$('#newSignUp').on('keyup', function (){
	    var $check  = isValidEmailAddress($('#emailBody').attr('value'));
	    //console.log('email 1 = '+$('#emailBody').attr('value')+' '+$('#emailBody').val().length+' '+$check);
	    //console.log('email 2 = '+$('#emailBody2').attr('value')+' '+$('#emailBody2').val().length);
	    if (isValidEmailAddress($('#emailBody').val())) {
		//code
		if (($('#emailBody').val() === $('#emailBody2').val())&&($('#emailBody2').val().length !== 0)){
		    $button.fadeIn(400);
		}else{
			$button.fadeOut(400);
		}
	    }
	});
	$button.on('click', function(e) {
		e.preventDefault();
		////console.log(e);
		$.ajax({
			type: "POST",
			url: "email_check.php",
			data: ({eml: $('#emailBody').attr('value')}),
			dataType: "html",
			success:function(data){
				////console.log(data);
				mailconfirm($('#emailBody').attr('value'),data);
			},
			error: function() {
			    alert("something went wrong");
			    }
		    });
		//mailconfirm($('#emailBody').attr('value'),'true');
	});
	function mailconfirm(mail, stat) {
		//code
		$button.fadeOut(400);$('#emailBody').val('');$('#emailBody2').val('');
		var $mainbox=$signup.find('.textBox');
		if (stat=='true') {
			//code
			$mainbox.empty();
			$statement ='<p>Thank you for your interest. A link has been sent to '+mail+'.</p><p>Click on the link to start using the environment.</p><p>Save the link to come back to the course.</p><p>If you do not see an email in the inbox, check your spam box.</p><p>If you do not recieve a link, contact Bjorn Pederson (peder534@umn.edu) with the email address you would like to use.</p>'; 
			$mainbox.append($statement);
		}else{
			$statement ='<p>An Error has occured. Please email Bjorn Pederson (peder534@umn.edu) with your email address you would like to use. Thank you and have a good day.</p>'; 
			$mainbox.append($statement);
		}
		
	}
	function isValidEmailAddress(emailAddress) {
	    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
	    return pattern.test(emailAddress);
	    }
});
</script>
	<body>
		<div id="siteContainer">
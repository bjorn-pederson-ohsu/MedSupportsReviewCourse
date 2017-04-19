<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Problem Based Learning</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui-1.8.18.custom.css" />
	<link rel="stylesheet" href="script/fancybox/source/jquery.fancybox.css?v=2.0.6" type="text/css" media="screen" />
	<script src="script/jquery-1.7.1.js"></script>
	<script src="script/jquery-ui-1.8.18.custom.min.js"></script>
	<script type="text/javascript" src="script/fancybox/source/jquery.fancybox.pack.js?v=2.0.6"></script>
	<script src="script/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
	<script type="text/javascript">
        $(function() {
		var itemArray = [$('#directions'),$('#issueMenu'),$('#issueContent'),$('#informationMenu'),$('#informationContent'),$('#submissionMenu'),$('#submissionContent'), $('#toolSpace')];
		var detachArray = [];
		var $toolset = $('#toolArea');
		var $subMenu = $('#issueMenu');
		var issueMenuWidth = 0;
		var $directions = $('#directions');
		var $mainMenu = $('#mainMenu');
		var $workspace = $('#workSpace');
		var $toolworkspace = $('#toolWorkSpace').hide();
		var dialogOn = false;
		var testSelections = [];
		var $testAnswers; var $userAnswers=[];var testtakes=0;
		var starttime = Math.floor(Date.now() / 1000);
		
		//initial page setup
		function init() {
				var iAlen= itemArray.length;
				for (var i = 0; i <iAlen; i++) {
				detachArray[i]=itemArray[i].detach();
				}
				itemArray=[];
				//console.log(itemArray);
				itemArray = detachArray;
				//console.log(itemArray);
				$toolset.find('ul').addClass('toolAreaList');
				$toolset.find('li a').addClass('toolMenuButton');
				$toolset.addClass('toolArea');
				//console.log("From tools: "+$toolset.attr('id'));
				$toolset.on('click','a',toolSwitch);
				$toolworkspace.on('click', 'button', function (){
						var $toolsapceCheck= $('#toolWorkSpace > div');
						$toolworkspace.slideUp(300, function(){
							if ($toolsapceCheck.length>0){
									$('button').remove('.toolCloseButton');
									itemArray[7].append($toolworkspace.html());
								}
								$toolworkspace.empty();
						});
					});
				$toolworkspace.on('toolSpaceDown', function () {
						$toolworkspace.delay(50).slideDown(200);
					});
				$subMenu.find('ul').addClass('subMenuList');
				$subMenu.find('li a').addClass('subMenuButton');
				$subMenu.addClass('subMenu');
				$subMenu.prependTo('#courseArea');
				$subMenu.find('li a')
					.each(function(index) {
						issueMenuWidth+=$(this).outerWidth(true);
						//console.log($(this).text,$(this).outerWidth(true), issueMenuWidth );
						});
					//console.log("issueMenuWidth: "+issueMenuWidth);
					if (issueMenuWidth > 935) {
						issueMenuWidth = 935;
						$subMenu.find('li a').css('font-size', '.75em');
					}else{
						$subMenu.css('top', '-1.6em');
					}
				$subMenu.css('width', issueMenuWidth+1);
			
				$directions.addClass('textBox');
				$directions.appendTo($workspace);
				//console.log("From init: "+$workspace.children().attr('id'));
				$mainMenu.find('ul').addClass('mainMenuList');
				$mainMenu.find('li a').addClass('mainMenuButton').each(function(){
					if ($(this).attr("data-maincat")=="issue"){
					$(this).addClass('intiButton');
					}
				});
				$mainMenu.addClass('mainMenu');
				$mainMenu.on('click','a',mainMenuSwitch);
				$subMenu.on('click','a',subMenuSwitch);
		}
				
		init();
				
		function subMenuBuild() {
			issueMenuWidth=10;
			$subMenu.find('ul').addClass('subMenuList');
			$subMenu.find('li a').addClass('subMenuButton');
			$subMenu.addClass('subMenu');
			$subMenu.prependTo('#courseArea');
			$subMenu.find('li a')
				.each(function(index) {
					issueMenuWidth+=$(this).outerWidth(true);
					//console.log($(this).text,$(this).outerWidth(true), issueMenuWidth );
				});
				//console.log("issueMenuWidth: "+issueMenuWidth);
				if (issueMenuWidth > 935) {
					issueMenuWidth = 935; 
					$subMenu.find('li a').css('font-size', '.75em');
				}else{
					$subMenu.css('top', '-1.6em');
				}
			$subMenu.css('width', issueMenuWidth+1);
			$subMenu.fadeIn(300);
			$subMenu.on('click','a',subMenuSwitch); 
		}
		
		function toolSwitch(event){
			//$toolworkspace.empty();
			var $toolsapceCheck= $('#toolWorkSpace > div');
			//console.log("button clicked: "+$(this).data('toolcat'));
			var section  = $(this).data('toolcat');
			//console.log($toolsapceCheck.length === 0);
			//console.log("block: "+$toolsapceCheck.length);
			////console.log("hidden: "+$toolworkspace.is('div'));
			if ($toolsapceCheck.length===0){
				//console.log("block false");
				$toolworkspace.empty();
				filltoolSpace(section);
			}else{
				$toolworkspace.slideUp(300, function (){
				//itemArray[7].append()
				$('button').remove('.toolCloseButton');
				//console.log($toolworkspace.html());
				itemArray[7].append($toolworkspace.html());
				$toolworkspace.empty();
				filltoolSpace(section);
				});
			}
			//if (!$toolworkspace.is('display','none')){
			//	//console.log("hidden true")
			//	$toolworkspace.empty();
			//	filltoolSpace(section)
			//}
			return false; 
		}
				
		function filltoolSpace(section){
			//console.log("button clicked filltoolSpace: "+section);
			itemArray[7].find('div').each(function(){
				var searchFind= $(this);
				//console.log(searchFind.attr('id'));
				if (searchFind.attr('id')===section){
					searchFind.find('div').each(function(){
					if(($(this).attr('id')==='notemaker') || ($(this).attr('id')==='videomaker')||($(this).attr('id')==='noteedit')){
							$(this).hide();
						}
					});
					$toolworkspace.append(searchFind);
					$toolworkspace.append('<button class="toolCloseButton">close</button>')
							.trigger('toolSpaceDown');
				}
			});
//					$('.solutionBox').on('click.newNote', 'input[type="submit"]', function(evt){
//							
//                            //evt.preventDefault();
//							//if (dialogOn){
//							//		//console.log("dialog is on");
//							//		return false;
//							//}
//							////console.log($(this).attr('href'));
//							//var loca = $(this).attr('href');
//							//
//							//if (loca === '#notemaker'){
//							//dialogHandler(loca, false);
//							//}
//							//if (loca === '#videomaker'){
//							//dialogHandler(loca, true);
//							//}
//					});
			
			
			$('#helpArea').on('click', 'ul li a', function(){
				//console.log($(this).attr('href'));
				var loca = $(this).attr('href');
				loc  = loca.replace('#', '');
				//console.log('loc value: '+loc);
				itemArray[7].find('div').each(function(){
					var searchFind = $(this);
					//console.log(searchFind.attr('id'));
					if (searchFind.attr('id')===loc){
						//console.log("search matched");
						var locMatched=searchFind.clone();
						//var locMatched=searchFind.html()
						$(locMatched+":ui-dialog" ).dialog( "destroy" ); 
						$(locMatched).dialog({
							height: 420,
							width: 476,
							modal: true,
							open: function(event, ui) {
								$('.ui-widget-overlay').hide().fadeIn();
								$('.ui-dialog').hide().fadeIn(300);
							},
							close: function(event, ui) {
								$(locMatched+":ui-dialog").dialog( "destroy" );
							}
						});
						$(locMatched).dialog("open");
						return false; 
					}
				});
				});
		}
		function dialogHandler (loca, modalSetting){
			//console.log("start of dialogHandler: "+dialogOn);
			var $arrayOfLines = loca.text.match(/[^\r\n]+/g);
			var $texthtml="";
			for(var $c=0; $c < $arrayOfLines.length; $c++){
				$texthtml +=('<p>'+$arrayOfLines[$c]+'</p>');
			}
			var diaBox;
			if (loca.place==="solutionmaker") {
			   diaBox = $('<div id="solutionReview" title="Review Your Solution"><p>Review your solution. To further edit, click on the "Return to Edit" button. To save, click on the "Save" button.</p> <div class="textBoxUi">'+$texthtml+'</div></div>') ;
			}
			if (loca.place==="reflectionmaker") {
				diaBox = $('<div id="reflectionReview" title="Review Your Reflection"><p>Review your reflection. To further edit, click on the "Return to Edit" button. To save, click on the "Save" button.</p> <div class="textBoxUi">'+$texthtml+'</div></div>');
			}
			//$('#noteButtons').fadeOut(500);
			$(diaBox+":ui-dialog" ).dialog( "destroy" ); 
			diaBox.dialog({
					height: 576,
					width: 935,
					modal: modalSetting,
					//title: $(loca).attr('title'),
					open: function(event, ui) {
						$('.ui-widget-overlay').hide().fadeIn();
						$('.ui-dialog').hide().fadeIn(300);
					},
					buttons:{
						"Save Note": function () {
										var sentText = $texthtml;
										//console.log($texthtml);
										if(sentText.length){
											//console.log(itemArray[6].html());
											$('#notes ul').append('<li>'+sentText+'</li>');
											$("#noteBody").val('');
											$.ajax({
														type: "POST",
														url: loca.place+"_save.php",
														data: ({noteBody: sentText}),
														dataType: "html",
														success:function(data){
																if (loca.place==="solutionmaker"){
																	$('#solutionButton','#solution').remove();
																	$('#solutionmaker','#solution').empty().append('<div class="textBox"><p>Your Solution:</p>'+$texthtml+'</div>');
																	//$('#solutionButton',itemArray[6]).remove();
																	$('#solutionmaker',itemArray[6]).empty().append('<div class="textBox"><p>Your Solution:</p>'+$texthtml+'</div>');
																	
																}
																if (loca.place==="reflectionmaker"){
																	$('#reflectionButton','#reflection').remove();
																	$('#reflectionmaker','#reflection').empty().append('<div class="textBox"><p>Your Reflection:</p>'+$texthtml+'</div>');
																	//$('#solutionButton',itemArray[6]).remove();
																	$('#reflectionmaker',itemArray[6]).empty().append('<div class="textBox"><p>Your Reflection:</p>'+$texthtml+'</div>');
																	reflectionRating($texthtml);
																	
																}
																diaBox.dialog( "close" );
																},
														error: function() {
															alert("something went wrong");
															}
											});
											}else{
												alert("Please write a something before saving.");
											}
										},
						"Return to Edit": function() {
							//$("#noteBody").val('');
							$(this).dialog( "close" );
						}
					},
					close: function(event, ui)
					{
						$('#noteButtons').fadeIn(300);
						$(this).dialog("destroy");
						dialogOn=false;
						//console.log('dialog destroyed on close');
					}
						
				})
					.dialog("open");
					return false;
		}
				
				
		function mainMenuSwitch(event) {
			//console.log("button clicked: "+$(this).attr('href'));
			var $eventSelection=$(this).attr('href');
			var iAlen= itemArray.length;
			for (var i = 0; i <iAlen; i++) {
			//console.log("form itemArray cycle through: "+itemArray[i].attr('id'));
				if ($(this).attr('href')=='#'+itemArray[i].attr('id')){
					$eventSelection=$(itemArray[i]);
					//console.log($eventSelection,itemArray[i].html());
					break;
				}
			}
			var eventMainData = $(this).data('maincat');
			$mainMenu.find('li a').removeClass('intiButton')
				.each(function(){
					if ($(this).attr("data-maincat")==eventMainData){
					$(this).addClass('intiButton');
					}
				});
			if (('#workSpace > div').length>=1){
				$('#workSpace > div').fadeOut(300, function() {
				$workspace.empty();
				});
			}
			$subMenu.fadeOut(300, function() {
				////console.log(event.target)
				$subMenu.find('li a').removeClass('intiButton');
				$subMenu.find('ul').removeClass('subMenuList');
				$subMenu.find('li a').removeClass('subMenuButton');
				$subMenu.find('li a').css('font-size', '1em');
				$subMenu.removeClass('subMenu');
				$subMenu.addClass('hide');
				$subMenu.removeAttr("style");
				$subMenu.remove();
				$subMenu = $eventSelection;
				$subMenu.removeAttr("style");
				if ($subMenu.has('.hide')){
					$subMenu.removeClass('hide');
				}
				//$subMenu.find('li a').each(function (){
				//	//console.log($(this).attr('data-subcat'));
				//	if ($(this).attr('data-subcat')==$('#'+eventMainData+'Menu ul li a').attr('data-subcat')){
				//	$(this).addClass('intiButton');
				//	}
				//});
				////console.log($('#'+eventMainData+'Menu ul li a[data-subcat]'))
				//console.log("form submenu fade out: "+$('#'+eventMainData+'Menu ul li:first-child a').data('subcat'));
				subMenuBuild();
				addSubArea($('#'+eventMainData+'Menu ul li a').data('subcat'));
				});
			//return false;
		}
				
		function subMenuSwitch(event) {
			//console.log("button clicked: "+$(this).data('subcat'));
			var eventSubData = $(this).data('subcat');
			$subMenu.find('li a')
				.removeClass('intiButton')
				.each(function(){
					if ($(this).attr("data-subcat")==eventSubData){
					$(this).addClass('intiButton');
					}
				});
			//console.log($('#workSpace > div').attr('id'));
			//console.log("div to be removed "+$('#workSpace > div').attr('id'));
			$workspace.fadeOut(500, function() {
				//$('#workSpace  > div').removeClass('textBox');
				//$('#workSpace  > div').addClass('hide');
				$workspace.empty();
				//console.log("From subMenuSwitch: "+$workspace.children().attr('id'), eventSubData);
				addSubArea(eventSubData);
				});
			
			
			return false;
		}
				
		function addSubArea(label){
			//var $areaAdd = $(label).clone();
			var iAlen= itemArray.length;
			for (var i = 0; i <iAlen; i++) {
			//console.log(itemArray[i].find(label).attr('id'));
				if('#'+itemArray[i].find(label).attr('id') === label){
					//console.log("matched: "+(itemArray[i].find(label)));
					$areaAdd = $(itemArray[i].find(label)).clone();
					break;
				}
			}
			//var $areaAdd = $(label)
			//$areaAdd.show()
			//console.log("addSubArea add "+label, $areaAdd);
			//$areaAdd.addClass('textBox');
			////console.log("added textBox");
			$areaAdd.appendTo($workspace);
			$areaAdd.show();
			workSpaceCheck(label);
			//console.log("appened to $workspace");
			$workspace.fadeIn(500, function (){
				$(this).removeAttr('style');
				//workSpaceCheck(label)
				//console.log("new div in workspace: "+$workspace.children().attr('id'));
			});
		}
				
		function workSpaceCheck(label){
				var timeset = Math.floor(Date.now() / 1000);
				if (label==='#videoSet'){
					////console.log("video width: "+$('#videoSet').width());
					//var vidPos = (($(label).width()*.5)-($('#videoSet video').width()*.5))*-1
					////console.log("video width: "+$('#videoSet').width(), vidPos);
					//$('#videoSet video').css('left', vidPos)
				}
				if (label==="#documentsSet"){
					$workspace.children().addClass('textBox');
					$workspace.children().addClass('documentsSet');
				}
				//console.log("looking for the charator in label: "+label.substring(0,9));
				if (label==="#imagesSet"){
					$workspace.children().addClass('textBox');
					$('#imagesSet').on('click','a',fancyClick);
				}
				
				if (label==="#problemSet"){
					$workspace.children().addClass('textBox');
				}
				if (label.substring(0,9)==="#infoArea"){
					var $infoBuild = $('<div id="infoIconsCollection"/><div id="infoTextDisplay"/>');
					$infoBuild.prependTo($workspace);
					//$workspace.children().removeClass('textBox');
					//$workspace.find('#infoTextDisplay').addClass('infoDisplay');
					$workspace.find(label).addClass('hide');
					//$workspace.find(label).addClass('infoIconsCollection');
					$workspace.find(label).find('.infodiv h2').each(function(){
						var title = $(this).html();
						$('<li><a href="#"><div class="infoBit">'+title+'</div><img src="icons/infoicon2.gif"/></a></li>').appendTo('#infoIconsCollection');
					});
					$workspace.find('#infoIconsCollection').find('li').wrapAll('<ul></ul>');
					var infoText= $workspace.find(label).find('.infodiv:first').html();
					//console.log(infoText);
					$workspace.find('#infoTextDisplay').append(infoText);
					$('#infoIconsCollection').on('click','a',infoSwitch); 
					
				}
				
				if (label==="#solution"){
					$workspace.children().addClass('solutionBox');
					//location = 
					$('#solutionButton','#solution').on('click.SolutionReview',function(evt){
						$this = $(this);
						if ($this.parent().find("textarea").val().length>3) {
							//code
						evt.preventDefault();
						//console.log($this.parent().parent().parent());
						var loca={place:$this.parent().parent().parent().attr('id'),text:$this.parent().find("textarea").val()};
						//console.log(loca);
						dialogHandler(loca, true);
						}
					});
				}
				if (label==="#test"){
					$workspace.children().addClass('solutionBox');                    
					$.ajax({
							url: "jsonTrial.php",
							dataType: "json",
							success:function(data){
									////console.log(data);
									$testAnswer=data;
									},
							error: function() {
								alert("something went wrong");
								}
						});
					if (testSelections != null){
						for (var prop in testSelections) {
								$('form','#test').find('input[type="radio"]').each(function(i){
										$this=$(this);
											if ($this.attr('name')== prop && $this.val()==testSelections[prop]){
												$this.prop( "checked", true );
											}
										});
						}
					}
					
				}
				if (label==="#reflection"){
					$workspace.children().addClass('solutionBox');
					$('#reflectButton','#reflection').on('click.ReflectionReview',function(evt){
						$this = $(this);
						if ($this.parent().find("textarea").val().length>3) {
							//code
						evt.preventDefault();
						//console.log($this.parent().parent().parent());
						var loca={place:$this.parent().parent().parent().attr('id'),text:$this.parent().find("textarea").val()};
						//console.log(loca);
						dialogHandler(loca, true);
						}
					});
				}
				
				$('#test').on('click.QUESTIONS','li .questions input[type="radio"]',function(evt){
						$this = $(this);
						//console.log($this);
						$questionAnswer = ($this.attr('name'));
						$questionValue = ($this.attr('value'))
						//console.log('answer id: '+$questionAnswer+' answer value: '+$questionValue);
						$('form','#test').find('input[type="radio"]:checked').each(function(i){
								testSelections[$(this).attr('name')]=parseInt($(this).val(),10);
						});
				});
				
				$('#test').on('click.SUBMIT','input[type="submit"]',function(evt){
					evt.preventDefault();
					//console.log("test button clicked");
					//testtakes++;
					$this=$(this);
					$('form','#test').find('input[type="radio"]:checked').each(function(i){
					   $userAnswers[$(this).attr('name')]=parseInt($(this).val(),10);
					});
					$('form li.testwarning','#test').remove();
					if ($('form input[type="radio"]:checked','#test').length === $('form li div.questions','#test ').length) {
						//code
						testtakes++;
						$('div.checking','#test').remove();
						for (var prop in $userAnswers) {
							//console.log("Comparing element: " + prop);
							if($userAnswers[prop] != $testAnswer[prop])
							{
								//diff[prop] = origArrayGroups[prop];
								//console.log("Result: " + $userAnswers[prop] + "!=" + $testAnswer[prop]);
								$('form','#test').find('input[type="radio"]:checked').each(function(i){
									$this=$(this);
									////console.log($this.next('label').html());
									if ($this.attr('name')== prop && $this.val() ==$userAnswers[prop]){
										$this.next('label').append('<div class="checking wrong_check">&#215;</div>');
									}
								});
							}else{
								$('form','#test').find('input[type="radio"]:checked').each(function(i){
									$this=$(this);
									////console.log($this.next('label').html());
									if ($this.attr('name')== prop && $this.val() ==$userAnswers[prop]){
										$this.next('label').append('<div class="checking right_check">&#10003;</div>');
									}
								});
							}
						}
						if (testtakes==1) {
							var score = $('form','#test').find('.right_check').length;
							var answersSelected = $('form','#test').serialize();
							var pbnum = $('form','#test').data('test');
							$.ajax({
									type: "POST",
									url: "test_save.php",
									data: ({scr: score, answerset: answersSelected, problemnum: pbnum}),
									dataType: "html",
									success://console.log("test info saved" +score, answersSelected ),
									error: function() {
										alert("something went wrong");
										}
								});
						}
					}else{
							alert('Please answer all of the questions before clicking "Submit"');
					}
					
				});
				$.ajax({
						type: "POST",
						url: "location_save.php",
						data: ({loc: label, timesval: timeset}),
						dataType: "html",
						success://console.log("location info saved" +timeset, starttime ),
						error: function() {
							alert("something went wrong");
							}
					});
		}
				
		function infoSwitch(event){
			//console.log("button clicked: "+$(this).text());
			var infoBit=$(this).text();
			$infoTextDisplay = $('#infoTextDisplay');
			//console.log($infoTextDisplay);
			//console.log($infoTextDisplay.find('h2').text());
			if ($infoTextDisplay.find('h2').text()!==infoBit){
				$infoTextDisplay.fadeOut(500, function() {
						$infoTextDisplay.empty();
						//console.log(itemArray[4]);
						$workspace.find('.infodiv h2').each(function(){
							//console.log($(this).text());
							if ($(this).text()==infoBit){
								////console.log($(this).parent().html());
								$infoTextDisplay.append($(this).parent().html());
								$infoTextDisplay.fadeIn(500);
								return false;
							}
							
						});
					});
				}
		}
		
		function reflectionRating($ht){
				
		}
				
		function fancyClick(event){
			var picID = "."+$(this).attr('class');
			//console.log("from fancyClick: "+picID);
			$(picID).fancybox({
				openSpeed	: 'slow',
				openEffect	: 'fade',
				closeSpeed	: 300,
				closeEffect	: 'fade',
				helpers : {
					title : {
					type : 'inside'
					},
					overlay	: {
					opacity : 0.7,
						css : {
							'background-color' : '#000'
						}
					},
					thumbs	: {
						width	: 50,
						height	: 50
					}
				}
			
			});
		}
                
		function solutionmaker(event){
			//console.log($workspace.html());
		}
                
                
				
				tinyMCE.init({
							mode : "textareas",
							//elements : 'relurls',
                            plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

							theme : "advanced",
							theme_advanced_buttons1 : "bold,italic,underline,separator,strikethrough,justifyleft,justifycenter,justifyright,justifyfull,bullist,numlist,undo,redo",
							theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,outdent,indent,blockquote,|,cleanup,help,code",
							theme_advanced_buttons3 : "",
							theme_advanced_toolbar_location : "top",
							theme_advanced_toolbar_align : "left",

							relative_urls : true // Default value
				});

        });
</script>

	</head>
	<body>
		<div id="siteContainer">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>FunTimeReview Basic Set-up</title>
		<link rel="stylesheet" type="text/css" href="css/style_form.css" media="all"/>
		<script src="script/jquery-1.7.1.js"></script>
		<script src="script/jquery-ui-1.8.18.custom.min.js"></script>
		<script src="script/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
		<script type="text/javascript">
        $(function() {
//                $('textarea.tinymce').tinymce({
//                        // Location of TinyMCE script
//                        script_url : './script/tinymce/jscripts/tiny_mce/tiny_mce.js',
//
//                        // General options
//                          theme : "advanced",
//                          plugins : 'advlink,advimage',
//
//                });
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
		<div id="header">
			<h1>FuntimeReview Basic Entry</h1>
		</div>
		<div id="main">
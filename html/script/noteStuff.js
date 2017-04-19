$('#noteButtons').on('click.newNote', 'ul li a', function(evt){
        evt.preventDefault();
        if (dialogOn){
                console.log("dialog is on");
                return false;
        }
        console.log($(this).attr('href'));
        var loca = $(this).attr('href');
        
        if (loca === '#notemaker'){
        dialogHandler(loca, false);
        }
        if (loca === '#videomaker'){
        dialogHandler(loca, true);
        }
});
$('#notes').on('click.viewEditNote', 'ul li a', function(evt){
    evt.preventDefault();
    console.log($(this).attr('data-noteid'),$(this).attr('data-nc'));
    var noteNumber = $(this).attr('data-noteid');
    var $noteview = $('<div id="noteview" class="notemaker"><p></p></div>');
    console.log($noteview);
    $noteview.find('p', $noteview).empty().append($(this).attr('data-nc'));
    $($noteview+".ui-dialog" ).dialog( "destroy" ).remove();
    //$( '#noteview' ).dialog({
    $noteview.dialog({
                height: 375,
                width: 550,
                modal: false,
                close: function(event, ui) {
                    $(this).dialog( "destroy" ).remove();
                },
                buttons:{
                    "Edit Note" : function(){
                            var textforNote = $('#noteview p').html();
                            var $noteedit = $('<div id="notewriter" class="notemaker"></div>');
                            $noteedit.append($('#noteedit').html());
                            $noteedit.find('textarea').val(textforNote);
                            $($noteedit+':ui-dialog' ).dialog( "destroy" ).remove();
                            $noteedit.dialog({
                                        height: 375,
                                        width: 550,
                                        modal: true,
                                        close: function(event, ui) {
                                            $(this).dialog( "destroy" ).remove();
                                            },
                                        buttons:{
                                            "Entered Value": function(){
                                                var sentText = $(this).find('textarea').val();
                                                var messCheck = (sentText===textforNote);
                                                console.log(sentText,textforNote, messCheck);
                                                },
                                            "Save Note": function () {
                                                    var sentText = $(this).find('textarea').val();
                                                    console.log(sentText);
                                                    //var messCheck = (sentText===textforNote);
                                                    if(sentText !== textforNote){
                                                    //$("#noteeditnoteBody").val('');
                                                        $.ajax({
                                                                    type: "POST",
                                                                    url: "notes_edit.php",
                                                                    data: ({noteBody: sentText, noteId: noteNumber}),
                                                                    dataType: "html",
                                                                    success:function(data){
                                                                        $('#notes ul li').find('a').each(function(){
                                                                            if ($(this).attr('data-noteid')===noteNumber){
                                                                                console.log($(this).html(), data);//$(this).parent().empty();
                                                                                //$(this).parent().append(data);
                                                                                $(this).replaceWith(data);
                                                                                console.log($(this).html()+" replaced html");
                                                                            }
                                                                        });
                                                                        sentText = null;
                                                                        $noteedit.dialog( "close" );
                                                                        },
                                                                    error: function() {
                                                                        alert("something went wrong");
                                                                        }
                                                        });
                                                    }else{
                                                        alert("Please make a change to the note before saving.");
                                                    }
                                                },	
                                                            
                                            "Canel" : function(){
                                                    $(this).dialog( "close" );
                                                    }
                                        }
                                            
                                    });
                    }
                }
    });
    $noteview.dialog("open");
    console.log($noteview);
});
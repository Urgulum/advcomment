$("document").ready(function() {
    
    //Der neuer Kommentar Dialog
    $( "#newcommentdia" ).dialog({
      autoOpen: false,
      modal: true
    });
    //Der erfolg dialog
    $( "#newcomsucess" ).dialog({
      autoOpen: false,
      modal: true,
      buttons: {
           'Okay': function() {
            $( this ).dialog( "close" );
            }
      }
    });
    
    //Der Button der diesen öffnet
    $( "#advcom-open" ).button({
        icons: {
        primary: "ui-icon-comment"
        }
    })
    .click(function( event ) {
        $( "#newcommentdia" ).dialog( "open" );
    });
    
    //Die Form
    var form = $('#conform');
    
    form.on('submit', function(e) {
        e.preventDefault();
        //Senden des Kommentars
        $.ajax({
			url: '../advcomment/save',
			type: 'POST',
			cache: false,
			data: form.serialize(),
			beforeSend: function(){
			},
			success: function(data){
				$( "#newcommentdia" ).dialog( "close" );
				$( "#newcomsucess" ).dialog( "open" );
				form.trigger('reset');
				//submit.val('Submit Comment').removeAttr('disabled');
			},
			error: function(e){
				alert(e);
			}
		});
		
    });
});

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>IIT tirupati Chat</title>
    
    <link rel="stylesheet" href="style.css" type="text/css" />
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="chat.js"></script>
    <script type="text/javascript">
    
        // ask user for name with popup prompt    
        var name = prompt("Enter your chat name:", "Guest");
        var room = prompt("Enter Chat Room: #", "common");
        // default name is 'Guest'
    	if (!name || name === ' ') {
    	   name = "Guest";	
    	}
        if(!room || room===''){
            room = "#common"
        }
    	
    	// strip tags
        name = name.replace(/(<([^>]+)>)/ig,"");
        room = room.replace(/(<([^>]+)>)/ig,"");
    	console.log("Welcome "+name);
    	// display name on page
    	// $("#name-area").html("You are: <span>" + name + "</span>");
    	// kick off chat
        var chat =  new Chat();
    	$(function() {
    	    
    		 chat.init(name,room); 
    		 chat.send(name + " Joined","");
    		 // watch textarea for key presses
             $("#sendie").keydown(function(event) {  
             
                 var key = event.which;  
           
                 //all keys including return.  
                 if (key >= 33) {
                   
                     var maxLength = $(this).attr("maxlength");  
                     var length = this.value.length;  
                     
                     // don't allow new content if length is maxed out
                     if (length >= maxLength) {  
                         event.preventDefault();  
                     }  
                  }  
    		 																																																});
    		 // watch textarea for release of key press
    		 $('#sendie').keyup(function(e) {	
    		 					 
    			  if (e.keyCode == 13) { 
    			  
                    var text = $(this).val();
    				var maxLength = $(this).attr("maxlength");  
                    var length = text.length; 
                     
                    // send 
                    if (length <= maxLength + 1) { 
                     
    			        chat.send(text,name);	
    			        $(this).val("");
    			        
                    } else {
                    
    					$(this).val(text.substring(0, maxLength));
    					
    				}	
    				
    				
    			  }
             });
            
    	});
    </script>

</head>

<body onload="console.log('working'); setInterval('chat.update()', 1000)">

    <div id="page-wrap">
    
        <h2>AWESOME CHAT</h2>
        
        <p id="name-area"></p>
        
        <div id="chat-wrap"><div id="chat-area"><p><span > Welcome to # COMMON </span> </p></div></div>
        
        <div id="send_area">
            <form id="send-message-area">
                
                <textarea id="sendie" width='100%' maxlength = '100' ></textarea>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $("#name-area").html("You are: <span>" + name + "</span>");
    </script>
</body>

</html>
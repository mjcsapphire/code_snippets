var messages_page = document.getElementById('messages_page');
if (messages_page !== null) {
  var refresh_chat = setInterval(function () {
    $contact_id = localStorage.getItem('contact'); 
    renderChat(contact_id);
  }, 30000);
  var refresh_chat = setInterval(function () {
    $.ajax({
      url: 'scripts/messages.php',
      type: "POST",
      dataType:"json",
      data:{"action":'get_message_chats', "offset": 0},
      success: function(data){        
        document.getElementById("message_contacts").innerHTML = data.ui;
        localStorage.setItem('offset', 0);              
        localStorage.setItem('page', 1);                           
        document.getElementById('previous_page').style.visibility = "hidden";
        document.getElementById('page_number2').innerHTML = 'Page '+localStorage.getItem('page');
        $offset = localStorage.getItem('offset');              
        if($offset < (data.max - 7)){
          document.getElementById('next_page').style.visibility = "visible";  
        }else{
          document.getElementById('next_page').style.visibility = "hidden";
        }
        if(data.ui == '<p>No messages</p>'){
          document.getElementById('page_number2').style.visibility = "hidden";
        }else{
          make_chats_clickable();
        }
      }
    });
  }, 60000);
  document.getElementById('the_message').addEventListener("keydown", function(event) {
    if (event.keyCode === 13 && !event.shiftKey){
      event.preventDefault();
      document.getElementById("send_message").click();
    }
  });
  document.getElementById('send_message').addEventListener('click',function ()
  {
    contact_id = this.name.replace(/\D/g,'');
    message = document.getElementById("the_message").value.replace(/[&\/\\#,+()$~%'":*?<>{}]/g, '');
    if(message == '' || message == ' '){
      message = '';
    }
    if(message == '') {
      swal({   
        title: "Oops!",   
        text: 'Please enter a message',   
        type: "warning",   
        showCancelButton: false,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "OK!",   
        closeOnConfirm: true 
      }, function(){   
      });
    }else{
      $.ajax({
        url: 'scripts/messages.php',
        type: "POST",
        dataType:"json",
        data:{"action":'send_message', "contact":contact_id, "message":message},
        success: function(data){        
          renderChat(contact_id);
          document.getElementById("the_message").value = '';
        }
      });
    }
  });
  function renderChat(contact){
    limit = localStorage.getItem('limit'); 
    localStorage.setItem('contact', contact); 
    $.ajax({
      url: 'scripts/messages.php',
      type: "POST",
      dataType:"json",
      data:{"action":'render_chat', "limit": limit, "contact":contact},
      success: function(data){        
        document.getElementById("chat_content").innerHTML = data.ui;
        var chat_area = document.getElementById("chat_area");
        chat_area.scrollTop = chat_area.scrollHeight;
        document.getElementById('message_area').style.visibility = "visible";
        document.getElementById("send_message").name = data.contact;
        make_deletes_clickable();
        make_loadmore_clickable();
      }
    });
  }
  function make_chats_clickable(){
    var chats = document.getElementsByClassName("message-single");
    var i;
    for (i = 0; i < chats.length; i++) {
      document.getElementById(chats[i].id).addEventListener('click',function ()
      {
        localStorage.setItem('limit', 20); 
        contact_id = this.id.replace(/\D/g,''); 
        renderChat(contact_id);
      });
    }
  }
  function make_loadmore_clickable(){
    var load_more = document.getElementsByClassName("load_more");
    var i;
    for (i = 0; i < load_more.length; i++) {
      document.getElementById(load_more[i].id).addEventListener('click',function ()
      {
        contact = this.id.replace(/\D/g,''); 
        localStorage.setItem('limit', +localStorage.getItem('limit') +20);  
        renderChat(contact);
      });
    }
  }
  function make_deletes_clickable(){
    var messages = document.getElementsByClassName("delete_message");
    var i;
    for (i = 0; i < messages.length; i++) {
      document.getElementById(messages[i].id).addEventListener('click',function ()
      {
        message_id = this.id.replace(/\D/g,''); 
        $.ajax({
          url: 'scripts/messages.php',
          type: "POST",
          dataType:"json",
          data:{"action":'delete_message',"message_id":message_id},
          success: function(data){        
            renderChat(data.contact);         
          }
        });
      });
    }
  }
  var myElemmessage_contacts = document.getElementById('message_contacts');
  if (myElemmessage_contacts !== null) {
    $(document).ready(function(){
      localStorage.setItem('offset', 0);
      localStorage.setItem('page', 1);
      localStorage.setItem('limit', 20);
      document.getElementById('previous_page').style.visibility = "hidden";
      document.getElementById('next_page').style.visibility = "hidden";
      document.getElementById('page_number2').style.visibility = "hidden";
      document.getElementById('message_area').style.visibility = "hidden";
      $("#the_message").alphanum({
        allow      : "£-.,!?%",
        allowUpper : true
      });
      $.ajax({
        url: 'scripts/messages.php',
        type: "POST",
        dataType:"json",
        data:{"action":'get_message_chats', "offset": 0},
        success: function(data){        
          document.getElementById("message_contacts").innerHTML = data.ui;
          localStorage.setItem('offset', 0);              
          localStorage.setItem('page', 1);                           
          document.getElementById('previous_page').style.visibility = "hidden";
          document.getElementById('page_number2').innerHTML = 'Page '+localStorage.getItem('page');
          $offset = localStorage.getItem('offset');              
          if($offset < (data.max - 7)){
            document.getElementById('next_page').style.visibility = "visible";  
          }else{
            document.getElementById('next_page').style.visibility = "hidden";
          }
          if(data.ui == '<p>No messages</p>'){
            document.getElementById('page_number2').style.visibility = "hidden";
          }else{
            make_chats_clickable();
          }
        }
      });
    });
    document.getElementById("next_page").addEventListener('click',function ()
    {
      offset = +localStorage.getItem('offset') + 8;
      $.ajax({
        url: 'scripts/messages.php',
        type: "POST",
        dataType:"json",
        data:{"action":'get_message_chats', "offset":offset},
        success: function(data){        
          document.getElementById("message_contacts").innerHTML = data.ui;
          localStorage.setItem('offset', +localStorage.getItem('offset') + 8);              
          localStorage.setItem('page', +localStorage.getItem('page') + 1);
          document.getElementById('page_number2').innerHTML = 'Page '+localStorage.getItem('page');              
          document.getElementById('previous_page').style.visibility = "visible";
          $offset = localStorage.getItem('offset');              
          if($offset < (data.max - 7)){
            document.getElementById('next_page').style.visibility = "visible";
          }else{
            document.getElementById('next_page').style.visibility = "hidden";
          }
          if(data.ui == '<p>No messages</p>'){
            document.getElementById('page_number2').style.visibility = "hidden";
          }else{
            make_chats_clickable();
          }
        }
      });
    });
    document.getElementById("previous_page").addEventListener('click',function ()
    {
      offset = +localStorage.getItem('offset') - 8;
      $.ajax({
        url: 'scripts/messages.php',
        type: "POST",
        dataType:"json",
        data:{"action":'get_message_chats', "offset":offset},
        success: function(data){        
          document.getElementById("message_contacts").innerHTML = data.ui;
          localStorage.setItem('offset', +localStorage.getItem('offset') - 8);             
          localStorage.setItem('page', +localStorage.getItem('page') - 1);
          document.getElementById('page_number2').innerHTML = 'Page '+localStorage.getItem('page');
          $offset = localStorage.getItem('offset');              
          if($offset == 0){
            document.getElementById('previous_page').style.visibility = "hidden";
          }else{
            document.getElementById('previous_page').style.visibility = "visible";
          }
          if($offset < (data.max - 7)){
            document.getElementById('next_page').style.visibility = "visible";
          }else{
            document.getElementById('next_page').style.visibility = "hidden";
          }
          if(data.ui == '<p>No messages</p>'){
            document.getElementById('page_number2').style.visibility = "hidden";
          }else{
            make_chats_clickable();
          }
        }
      });
    });
  }
}
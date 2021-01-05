(function() {
  var stillAlive = setInterval(function () {
    $.ajax({
      url: 'scripts/still_alive.php',
      type: "POST",
      dataType:"json",
      data:{"action":'keep_online'},
      success: function(data){ 
      }
    });
  }, 60000);
  var stillAlive = setInterval(function () {
    $.ajax({
      url: 'scripts/profile.php',
      type: "POST",
      dataType:"json",
      data:{"action":'get_outstanding_notifications'},
      success: function(data){ 
        document.getElementById("notifications_count").innerHTML = ' '+data.count;
        var messages_count = document.getElementById('messages_count');
        if (messages_count !== null) {
          if(data.count2 > 0){
            document.getElementById("messages_count").innerHTML = ' ('+data.count2+')';
          }else{
            document.getElementById("messages_count").innerHTML = '';
          }
        }
        if(data.notification != ''){
          notifyMe(data.type, data.notification, data.id);
        }
      }
    });
  }, 60000);
  document.addEventListener('DOMContentLoaded', function () {
    if (Notification.permission !== "granted"){
      Notification.requestPermission();
    }
    $.ajax({
      url: 'scripts/profile.php',
      type: "POST",
      dataType:"json",
      data:{"action":'get_outstanding_notifications'},
      success: function(data){ 
        document.getElementById("notifications_count").innerHTML = ' '+data.count;
        var messages_count = document.getElementById('messages_count');
        if (messages_count !== null) {
          if(data.count2 > 0){
            document.getElementById("messages_count").innerHTML = ' ('+data.count2+')';
          }else{
            document.getElementById("messages_count").innerHTML = '';
          }
        }
      }
    });
  });
  function notifyMe(type, notification, id) {
    if (Notification.permission !== "granted")
      Notification.requestPermission();
    else {
      var notification = new Notification('Directly Sourced', {
        icon: 'https://www.directly-sourced.com/img/logosmall.png',
        body: notification
      });
      notification.onclick = function () {
        $.ajax({
          url: 'scripts/profile.php',
          type: "POST",
          dataType:"json",
          data:{"action":'set_to_seen', "id":id},
          success: function(data){ 
            if(type == 2){
              try { window.location("messages"); }       
              catch(e) { window.location = "messages"; }   
            }else{
              try { window.location("dash"); }       
              catch(e) { window.location = "dash"; } 
            }
          }
        });
      };
    }
  }
})();
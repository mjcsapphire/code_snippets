<?php
include_once('../header.php');
if(!isset($_SESSION))
{ 
  session_set_cookie_params(time() + 43200000, '/', 'www.directly-sourced.com', isset($_SERVER["HTTPS"]), true);
  ini_set('session.gc_maxlifetime', 43200000);
  session_start(); 
} 
function time_ago($time)
{
  $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
  $lengths = array("60","60","24","7","4.35","12","10");
  $now = time();
  $difference     = $now - $time;
  $tense         = "ago";
  for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
    $difference /= $lengths[$j];
  }
  $difference = round($difference);
  if($difference != 1) {
    $periods[$j].= "s";
  }
  return "$difference $periods[$j] ago ";
}
if (isset($_POST['action'])) {
  if($_POST['action'] == 'get_message_chats'){
    $user =  get_user_from_kv($_SESSION['userID']);
    $chat_contacts_id = get_message_chats($user[0]['id'], $_POST['offset']);
    $chat_contacts = array();
    foreach ($chat_contacts_id as $id) {
      if($id['recipient'] == $user[0]['id']){
        $contact = $id['sender'];
      }else{
        $contact = $id['recipient'];
      }
      $user_row = get_user_from_id($contact);
      $chat_contacts[] = $user_row[0];
    }
    $count = get_all_message_chats($user[0]['id']);
    if(empty($chat_contacts)){
      $response = '<p>No messages</p>';
    }else{
      $response = '';
      foreach ($chat_contacts as $contact) { 
        $messages = get_latest_message($user[0]['id'], $contact['id']);
        $unread = count_unread_messages($user[0]['id'], $contact['id']);
        if($messages[0]['deleted'] == 0){
          $message = $messages[0]['message'];
        }else{
          $message = ' ';
        }
        $response .='  <a id="chat_'.$contact['id'].'" class="message-single';
        if($contact['is_online']){
          $response .=' online">';
        }else{
          $response .='">';
        }
        $response .='<div>
        <img src="'.$contact['profile_pic'].'" class="img-fluid chat-img" alt="">
        </div>
        <div class="body">
        <h6 class="username">'.$contact['firstname'] . ' '. $contact['surname'].'</h6>
        <span class="last-text">';
        if(strlen($message) > 20){ 
          $response .= substr($message,0,20) . '...';
        }else{
          $response .= $message;
        } 
        $response .=' </span>';
        if($unread > 0){ 
          $response .=' <span class="text-number">'.$unread.'</span>';
        }
        $response .='  </div>
        </a>
        ';
      }
    }
    $output =  array(
      'ui'     =>     $response,
      'max' => sizeof($count)
    );
    echo json_encode($output);
  }
  if($_POST['action'] == 'render_chat'){
    $user =  get_user_from_kv($_SESSION['userID']);
    $messages = get_messages($user[0]['id'], $_POST['contact'], $_POST['limit']);
    $contact = get_user_from_id($_POST['contact']);
    $count = count_all_messages($user[0]['id'], $_POST['contact']);
    set_messages_to_seen($user[0]['id'], $_POST['contact']);
    if($count > $_POST['limit']){
      $showloadmore = true;
    }else{
      $showloadmore = false;
    }
    if(empty($messages)){
      $response = '<p>No messages</p>';
    }else{
      $response = '';
      $response .=' <div id="chat_content" class="message-box">';
      if($contact[0]['is_online']){
        $response .='  <div class="message-box-header online">';
      }else{
        $response .=' <div class="message-box-header">';
      }
      $response .='<div class="thumb">
      <img width="50px" src="'.$contact[0]['profile_pic'].'" alt="">
      </div>
      <div class="body">
      <h5>'.$contact[0]['firstname'] . ' '. $contact[0]['surname'].'</h5>';
      if($contact[0]['is_online']){
        $response .='  <p>Online</p>';
      }else{
        $timestamp = strtotime($contact[0]['last_online']);
        $timeago = time_ago($timestamp);
        $response .=' <p>'.$timeago.'</p>';
      }
      $response .=' </div>
      </div>';
      if($showloadmore){
        $response .=' <a id="loadmore_'.$contact[0]['id'].'" class="load_more"><small>Load previous messages</small></a>';
      }
      $response .='  <ul id="chat_area" class="dashboard-conversation chat-area">';
      foreach (array_reverse($messages) as $message) {
        if($message['sender'] == $user[0]['id']){
          $response .=' <li class="conversation out">
          <div class="message">
          <span class="text">';
          if($message['deleted'] == 0){
            $response .= nl2br($message['message']);
            $response .='</span>
            <span class="send-time">';$fdate = date('d F Y h:i:s A', strtotime($message['date_added'])); $response .= $fdate.' - <a id="delete_message_'.$message['id'].'" class="delete_message"><i class="fas fa-trash"></i></a></span>';
            if(isset($message['property'])){$response .='<span> - <a target="_new" href="property?id='.$message['property'].'"><small>Click to view property</small></a></span>';}
          }else{
            $response .= '(This message has been removed)</span>';
          }
          $response .='</div>
          </li>';
        }else{
          $response .='<li class="conversation in">
          <div class="avater">
          <img src="'.$contact[0]['profile_pic'].'" class="img-fluid" alt="">
          </div>
          <div class="message">
          <span class="text">';
          if($message['deleted'] == 0){
            $response .= $message['message'];
            $response .='</span>
            <span class="send-time">';$fdate = date('d F Y h:i:s A', strtotime($message['date_added'])); $response .= $fdate.'</span>';
            if(isset($message['property'])){$response .='<span> - <a target="_new" href="property?id='.$message['property'].'"><small>Click to view property</small></a></span>';}
          }else{
            $response .= '(This message has been removed)</span>';
          }
          $response .= '</div>
          </li>';
        }
      }
      $response .=' </ul>
      ';
    }
    $output =  array(
      'ui'     =>     $response,
      'contact' => $contact[0]['id'],
      'loadmore'  =>  $showloadmore
    );
    echo json_encode($output);
  }
  if($_POST["action"] == 'send_message'){
    $user =  get_user_from_kv($_SESSION['userID']);
    $recipient = get_user_from_id($_POST['contact']);
    $message = $_POST['message'];
    add_message($user[0]['id'], $recipient[0]['id'], $message);
    $output = array(  
      'success'     =>     'success'
    );  
    echo json_encode($output); 
  }
  if($_POST["action"] == 'delete_message'){
    $user =  get_user_from_kv($_SESSION['userID']);
    $message = get_message($_POST['message_id']);
    $recipient = delete_message($_POST['message_id']);
    $output = array(  
      'success'     =>     'success',
      'contact'  =>  $message[0]['recipient']
    );  
    echo json_encode($output); 
  }
}
?>
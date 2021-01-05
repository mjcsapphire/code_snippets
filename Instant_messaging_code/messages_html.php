<?php
include_once('headernav.php');
if(!isset($_SESSION['userID'])){
  echo "<script type='text/javascript'>  window.location='/' </script>";
  exit(); 
}else{
}
include_once('headerprofile.php');
$chat_contacts_id = get_message_chats($user[0]['id'], 0);
$chat_contacts = array();
if(!$user[0]['verified'] || !$user[0]['subscribed'] || !$user[0]['compliant']){
  echo "<script type='text/javascript'>  window.location='dash' </script>";
  exit(); 
}
foreach ($chat_contacts_id as $id) {
  if($id['recipient'] == $user[0]['id']){
    $contact = $id['sender'];
  }else{
    $contact = $id['recipient'];
  }
  $user_row = get_user_from_id($contact);
  $chat_contacts[] = $user_row[0];
}
?>
<div class="col-lg-9 order-lg-2">
  <div class="dashboard-section dashboard-message">
    <div class="dashboard-section-title">
      <h5 id="messages_page">Messages</h5>
      <!-- <span class="ti-comments"></span> -->
    </div>
    <div class="dashboard-section-body">
      <div id="message_row" class="dash-message">
        <div id="message_contacts" class="message-lists col-lg-5 col-sm-12 order-lg-1">
          <?php
          foreach ($chat_contacts as $contact) {
            $messages = get_latest_message($user[0]['id'], $contact['id']);
            $unread = count_unread_messages($user[0]['id'], $contact['id']);
            if($messages[0]['deleted'] == 0){
              $message = $messages[0]['message'];
            }else{
              $message = ' ';
            }
            ?>
            <a id="chat_<?php echo $contact['id']; ?>" class="message-single online">
              <div class="thumb">
                <img src="<?php echo $contact['profile_pic']; ?>" class="img-fluid" alt="">
              </div>
              <div class="body">
                <h6 class="username"><?php echo $contact['firstname'] . ' '. $contact['surname']; ?></h6>
                <span class="last-text">
                  <?php
                  if(strlen($message) > 20){ 
                    echo substr($message,0,20) . '...';
                  }else{
                    echo $message;
                  } 
                  ?>
                </span>
                <?php if($unread > 0){ ?>
                  <span class="text-number"><?php echo $unread; ?></span>
                  <?php
                }
                ?>
              </div>
            </a>
            <?php
          }
          ?>
        </div>
        <div id="chat_content" class="message-box col-lg-7 col-sm-12 order-lg-2">
        </div>
      </div> 
      <div id="message_area" class="conversation-write-wrap">
        <form>
          <div class="author-thumb">
            <img src="<?php echo $user[0]['profile_pic']; ?>" class="img-fluid" alt="">
          </div>
          <textarea id="the_message" placeholder="Type a message"></textarea>
          <a id="send_message" name="" class="send-message">Send</a>
        </form>
      </div>
      <nav class="navigation pagination text-center mar-30">
        <div class="nav-links">
          <a class="prev page-numbers" id="previous_page"><i class="fas fa-angle-left"></i></a><span id="page_number2">Page 1</span>
          <a class="next page-numbers" id="next_page"><i class="fas fa-angle-right"></i></a>
        </div>
      </nav>
    </div>
  </div>
</div>
</div>
</div>
</div>
<?php
include_once('footer.php');
?>
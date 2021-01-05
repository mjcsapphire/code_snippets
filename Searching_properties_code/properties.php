<?php
include_once('../header.php');
if(!isset($_SESSION))
{ 
  session_set_cookie_params(time() + 43200000, '/', 'www.directly-sourced.com', isset($_SERVER["HTTPS"]), true);
  ini_set('session.gc_maxlifetime', 43200000);
  session_start(); 
} 
if (isset($_POST['action'])) {
  if($_POST['action'] == 'filtered_search'){
    $properties = get_properties_via_filter(8, $_POST['offset'], $_POST['property'], $_POST['investment'], $_POST['joint_venture'],$_POST['min_price'],$_POST['max_price'],$_POST['min_bmv'], $_POST['max_bmv'],$_POST['min_roi'],$_POST['max_roi'],$_POST['min_rpm'],$_POST['max_rpm'],$_POST['min_roce'],$_POST['max_roce'],$_POST['min_yield'],$_POST['max_yield'],$_POST['min_sourcing'],$_POST['max_sourcing'],$_POST['keyword'], $_POST['sort'],$_POST['min_land'],$_POST['max_land']);
    $count = 0;
    if(empty($properties)){
      $response = '<p>No properties found</p>';
    }else{
      $response = '';
      $count = count_all_properties_via_filter($_POST['property'], $_POST['investment'], $_POST['joint_venture'],$_POST['min_price'],$_POST['max_price'],$_POST['min_bmv'], $_POST['max_bmv'],$_POST['min_roi'],$_POST['max_roi'],$_POST['min_rpm'],$_POST['max_rpm'],$_POST['min_roce'],$_POST['max_roce'],$_POST['min_yield'],$_POST['max_yield'],$_POST['min_sourcing'],$_POST['max_sourcing'],$_POST['keyword'],$_POST['min_land'],$_POST['max_land']);
      foreach ($properties as $property) { 
        $response .='  <div class="col-md-6 result-item">
        <div class="lrn-listing-wrap">
        <div class="listing-thumb">
        <a href="property?id='.$property['id'].'"><img src="./properties/images/medium/'.$property['photo1'].'" class="img-fluid" alt=""></a>
        </div>
        <div class="listing-body">
        <div class="meta">
        <a href="property?id='.$property['id'].'" class="avater">
        <img src="images/listing/avater-3.jpg" class="img-fluid" alt="">
        </a>
        </div>
        <h3><a href="property?id='.$property['id'].'">'; 
        if(strlen($property['title']) > 35){ 
          $response .= substr($property['title'],0,32) . '...';
        }else{
          $response .= $property['title'];
        } 
        $response .='</a></h3><br>
        <div class="listing-bottom">
        <span>'.$property['city'].'</span>
        </div>
        <div class="listing-bottom">
        <span>Investment Type: ';
        $investment_type = get_investment_type($property['investment_type']); 
        $response .= $investment_type;
        $response .='</span>
        </div>
        <div class="listing-bottom">
        <span>Property Type: ';
        if(!empty($property['property_type'])){                           
          $property_type = get_property_type($property['property_type']); 
          $response .= $property_type;
        }else{ 
          $response .='N/A';
        }
        $response .='</span>
        </div>                         
        <div class="listing-bottom">
        <span>Price: ';
        setlocale(LC_MONETARY, 'en_GB.UTF-8'); 
        if($property['price'] == ''){
          $response .= money_format("%n", $property['rent_to_landlord']) . ' p/m';
        }else{
          $response .= money_format("%n", $property['price']);
        }
        $response .='</span>';
        if(!empty($property['roce'])){                              
          $response .=' <span>ROCE: '.$property['roce'].'%</span>';
        }else{                             
          $response .=' <span>ROCE: N/A</span>';
        }
        $response .='</div>
        <div class="listing-bottom">';
        if(!empty($property['sourcing_fee'])){                              
          $response .=' <span>Sourcing fee: ';
          setlocale(LC_MONETARY, 'en_GB.UTF-8'); 
          $response .= money_format("%n", $property['sourcing_fee']);
          $response .='</span>';
        }else{                             
          $response .=' <span>Sourcing fee: N/A</span>';
        }
        if(!empty($property['roi'])){                              
          $response .=' <span>ROI: '.$property['roi'].'%</span>';
        }else{                             
          $response .=' <span>ROI: N/A</span>';
        }
        $response .='</div>
        <div class="listing-bottom">';
        if(!empty($property['rental_yield'])){                              
          $response .=' <span>Yield: '.$property['rental_yield'].'%</span>';
        }else{                             
          $response .=' <span>Yield: N/A</span>';
        }
        if(!empty($property['bmv_percentage'])){                              
          $response .=' <span>BMV: '.$property['bmv_percentage'].'%</span>';
        }else{                             
          $response .=' <span>BMV: N/A</span>';
        }
        $response .='</div>
        </div>
        </div>
        </div>';
      }
    }
// echo $response;
    $output =  array(
      'ui'     =>     $response,
      'max' => $count
    );
    echo json_encode($output);
  }
  if($_POST['action'] == 'search_saved_properties'){
    $user =  get_user_from_kv($_SESSION['userID']);
    $properties = get_saved_properties(8, $_POST['offset'], $user[0]['id']);
    $count = 0;
    if(empty($properties)){
      $response = '<p>No saved properties</p>';
    }else{
      $response = '';
      $count = count_saved_properties($user[0]['id']);
      foreach ($properties as $property) { 
        $response .=' <div class="bookmarked-listing">
        <div class="thumb">
        <a href="property?id='.$property['id'].'">
        <img src="./properties/images/small/'.$property['photo1'].'" class="img-fluid" alt="">
        </a>
        </div>
        <div class="body">
        <div class="content">
        <h4><a href="property?id='.$property['id'].'">';
        if(strlen($property['title']) > 35){ 
          $response .= substr($property['title'],0,32) . '...';
        }else{
          $response .= $property['title'];
        } 
        $response .='</a></h4>
        <p class="listing-address">'.$property['city'].'</p>
        <p class="listing-meta"><span class="review">Price: ';
        setlocale(LC_MONETARY, 'en_GB.UTF-8'); 
        if($property['price'] == ''){
          $response .= money_format("%n", $property['rent_to_landlord']) . ' p/m';
        }else{
          $response .= money_format("%n", $property['price']);
        }
        $response .='</span>';
        if(!empty($property['roce'])){                              
          $response .=' <span class="view">ROCE: '.$property['roce'].'%</span>';
        }else{                             
          $response .=' <span>ROCE: N/A</span>';
        }
        if(!empty($property['bmv_percentage'])){                              
          $response .=' <span class="favroute">BMV: '.$property['bmv_percentage'].'%</span>';
        }else{                             
          $response .=' <span>BMV: N/A</span>';
        }
        $response .=' </p>
        </div>
        <div class="controller">
        <a href="property?id='.$property['id'].'" class="view"><i class="fas fa-eye"></i></a>
        <!-- <a href="#" class="remove"><i class="fas fa-trash-alt"></i></a> -->
        </div>
        </div>
        </div>
        ';
      }
    }
// echo $response;
    $output =  array(
      'ui'     =>     $response,
      'max' => $count
    );
    echo json_encode($output);
  }
  if($_POST['action'] == 'search_profile_properties'){
    $properties = get_published_properties(8, $_POST['offset'], $_POST['id']);
    $count = 0;
    if(empty($properties)){
      $response = '<p>No published properties</p>';
    }else{
      $response = '';
      $count = count_published_properties($_POST['id']);
      foreach ($properties as $property) { 
        $response .='<div class="bookmarked-listing">
        <div class="thumb">
        <a href="property?id='.$property['id'].'">
        <img src="./properties/images/small/'.$property['photo1'].'" class="img-fluid" alt="">
        </a>
        </div>
        <div class="body">
        <div class="content">
        <h4><a href="property?id='.$property['id'].'">';
        if(strlen($property['title']) > 35){ 
          $response .= substr($property['title'],0,32) . '...';
        }else{
          $response .= $property['title'];
        } 
        $response .='</a></h4>
        <p class="listing-address">'.$property['city'].'</p>
        <p class="listing-meta"><span class="review">Price: ';
        setlocale(LC_MONETARY, 'en_GB.UTF-8'); 
        if($property['price'] == ''){
          $response .= money_format("%n", $property['rent_to_landlord']) . ' p/m';
        }else{
          $response .= money_format("%n", $property['price']);
        }
        $response .='</span>';
        if(!empty($property['roce'])){                              
          $response .=' <span class="view">ROCE: '.$property['roce'].'%</span>';
        }else{                             
          $response .=' <span>ROCE: N/A</span>';
        }
        if(!empty($property['bmv_percentage'])){                              
          $response .=' <span class="favroute">BMV: '.$property['bmv_percentage'].'%</span>';
        }else{                             
          $response .=' <span>BMV: N/A</span>';
        }
        $response .=' </p>
        </div>
        <div class="controller">
        <a href="property?id='.$property['id'].'" class="view"><i class="fas fa-eye"></i></a>
        <!-- <a href="#" class="remove"><i class="fas fa-trash-alt"></i></a> -->
        </div>
        </div>
        </div>
        ';
      }
    }
// echo $response;
    $output =  array(
      'ui'     =>     $response,
      'max' => $count
    );
    echo json_encode($output);
  }
  if($_POST['action'] == 'search_published_properties'){
    $user =  get_user_from_kv($_SESSION['userID']);
    $properties = get_published_properties(8, $_POST['offset'], $user[0]['id']);
    $count = 0;
    if(empty($properties)){
      $response = '<p>No published properties</p>';
    }else{
      $response = '';
      $count = count_published_properties($user[0]['id']);
      foreach ($properties as $property) { 
        $response .=' <div class="bookmarked-listing">
        <div class="thumb">
        <a href="property?id='.$property['id'].'">
        <img src="./properties/images/small/'.$property['photo1'].'" class="img-fluid" alt="">
        </a>
        </div>
        <div class="body">
        <div class="content">
        <h4><a href="property?id='.$property['id'].'">';
        if(strlen($property['title']) > 35){ 
          $response .= substr($property['title'],0,32) . '...';
        }else{
          $response .= $property['title'];
        } 
        $response .='</a></h4>
        <p class="listing-address">'.$property['city'].'</p>
        <p class="listing-meta"><span class="review">Price: ';
        setlocale(LC_MONETARY, 'en_GB.UTF-8'); 
        if($property['price'] == ''){
          $response .= money_format("%n", $property['rent_to_landlord']) . ' p/m';
        }else{
          $response .= money_format("%n", $property['price']);
        }
        $response .='</span>';
        if(!empty($property['roce'])){                              
          $response .=' <span class="view">ROCE: '.$property['roce'].'%</span>';
        }else{                             
          $response .=' <span>ROCE: N/A</span>';
        }
        if(!empty($property['bmv_percentage'])){                              
          $response .=' <span class="favroute">BMV: '.$property['bmv_percentage'].'%</span>';
        }else{                             
          $response .=' <span>BMV: N/A</span>';
        }
        $response .=' </p>
        </div>
        <div class="controller">
        <a href="property?id='.$property['id'].'" class="view"><i class="fas fa-eye"></i></a>
        <!-- <a href="#" class="remove"><i class="fas fa-trash-alt"></i></a> -->
        </div>
        </div>
        </div>
        ';
      }
    }
// echo $response;
    $output =  array(
      'ui'     =>     $response,
      'max' => $count
    );
    echo json_encode($output);
  }
  if($_POST['action'] == 'search_unfinished_properties'){
    $user =  get_user_from_kv($_SESSION['userID']);
    $properties = get_unfinished_properties(8, $_POST['offset'], $user[0]['id']);
    $count = 0;
    if(empty($properties)){
      $response = '<p>No unfinished properties</p>';
    }else{
      $response = '';
      $count = count_unfinished_properties($user[0]['id']);
      foreach ($properties as $property) { 
        $response .=' <div class="bookmarked-listing">
        <div class="thumb">
        <a href="property?id='.$property['id'].'">
        <img src="./properties/images/small/'.$property['photo1'].'" class="img-fluid" alt="">
        </a>
        </div>
        <div class="body">
        <div class="content">
        <h4><a href="property?id='.$property['id'].'">';
        if(strlen($property['title']) > 35){ 
          $response .= substr($property['title'],0,32) . '...';
        }else{
          $response .= $property['title'];
        } 
        $response .='</a></h4>
        <p class="listing-address">'.$property['city'].'</p>
        <p class="listing-meta"><span class="review">Price: ';
        setlocale(LC_MONETARY, 'en_GB.UTF-8'); 
        if($property['price'] == ''){
          $response .= money_format("%n", $property['rent_to_landlord']) . ' p/m';
        }else{
          $response .= money_format("%n", $property['price']);
        }
        $response .='</span>';
        if(!empty($property['roce'])){                              
          $response .=' <span class="view">ROCE: '.$property['roce'].'%</span>';
        }else{                             
          $response .=' <span>ROCE: N/A</span>';
        }
        if(!empty($property['bmv_percentage'])){                              
          $response .=' <span class="favroute">BMV: '.$property['bmv_percentage'].'%</span>';
        }else{                             
          $response .=' <span>BMV: N/A</span>';
        }
        $response .=' </p>
        </div>
        <div class="controller">
        <a href="property?id='.$property['id'].'" class="view"><i class="fas fa-eye"></i></a>
        <!-- <a href="#" class="remove"><i class="fas fa-trash-alt"></i></a> -->
        </div>
        </div>
        </div>
        ';
      }
    }
// echo $response;
    $output =  array(
      'ui'     =>     $response,
      'max' => $count
    );
    echo json_encode($output);
  }
  if($_POST['action'] == 'search_pending_properties'){
    $user =  get_user_from_kv($_SESSION['userID']);
    $properties = get_pending_properties(8, $_POST['offset'], $user[0]['id']);
    $count = 0;
    if(empty($properties)){
      $response = '<p>No pending properties</p>';
    }else{
      $response = '';
      $count = count_pending_properties($user[0]['id']);
      foreach ($properties as $property) { 
        $response .=' <div class="bookmarked-listing">
        <div class="thumb">
        <a href="property?id='.$property['id'].'">
        <img src="./properties/images/small/'.$property['photo1'].'" class="img-fluid" alt="">
        </a>
        </div>
        <div class="body">
        <div class="content">
        <h4><a href="property?id='.$property['id'].'">';
        if(strlen($property['title']) > 35){ 
          $response .= substr($property['title'],0,32) . '...';
        }else{
          $response .= $property['title'];
        } 
        $response .='</a></h4>
        <p class="listing-address">'.$property['city'].'</p>
        <p class="listing-meta"><span class="review">Price: ';
        setlocale(LC_MONETARY, 'en_GB.UTF-8'); 
        if($property['price'] == ''){
          $response .= money_format("%n", $property['rent_to_landlord']) . ' p/m';
        }else{
          $response .= money_format("%n", $property['price']);
        }
        $response .='</span>';
        if(!empty($property['roce'])){                              
          $response .=' <span class="view">ROCE: '.$property['roce'].'%</span>';
        }else{                             
          $response .=' <span>ROCE: N/A</span>';
        }
        if(!empty($property['bmv_percentage'])){                              
          $response .=' <span class="favroute">BMV: '.$property['bmv_percentage'].'%</span>';
        }else{                             
          $response .=' <span>BMV: N/A</span>';
        }
        $response .=' </p>
        </div>
        <div class="controller">
        <a href="property?id='.$property['id'].'" class="view"><i class="fas fa-eye"></i></a>
        <!-- <a href="#" class="remove"><i class="fas fa-trash-alt"></i></a> -->
        </div>
        </div>
        </div>
        ';
      }
    }
// echo $response;
    $output =  array(
      'ui'     =>     $response,
      'max' => $count
    );
    echo json_encode($output);
  }
  if($_POST['action'] == 'search_hidden_properties'){
    $user =  get_user_from_kv($_SESSION['userID']);
    $properties = get_hidden_properties(8, $_POST['offset'], $user[0]['id']);
    $count = 0;
    if(empty($properties)){
      $response = '<p>No hidden properties</p>';
    }else{
      $response = '';
      $count = count_hidden_properties($user[0]['id']);
      foreach ($properties as $property) { 
        $response .=' <div class="bookmarked-listing">
        <div class="thumb">
        <a href="property?id='.$property['id'].'">
        <img src="./properties/images/small/'.$property['photo1'].'" class="img-fluid" alt="">
        </a>
        </div>
        <div class="body">
        <div class="content">
        <h4><a href="property?id='.$property['id'].'">';
        if(strlen($property['title']) > 35){ 
          $response .= substr($property['title'],0,32) . '...';
        }else{
          $response .= $property['title'];
        } 
        $response .='</a></h4>
        <p class="listing-address">'.$property['city'].'</p>
        <p class="listing-meta"><span class="review">Price: ';
        setlocale(LC_MONETARY, 'en_GB.UTF-8'); 
        if($property['price'] == ''){
          $response .= money_format("%n", $property['rent_to_landlord']) . ' p/m';
        }else{
          $response .= money_format("%n", $property['price']);
        }
        $response .='</span>';
        if(!empty($property['roce'])){                              
          $response .=' <span class="view">ROCE: '.$property['roce'].'%</span>';
        }else{                             
          $response .=' <span>ROCE: N/A</span>';
        }
        if(!empty($property['bmv_percentage'])){                              
          $response .=' <span class="favroute">BMV: '.$property['bmv_percentage'].'%</span>';
        }else{                             
          $response .=' <span>BMV: N/A</span>';
        }
        $response .=' </p>
        </div>
        <div class="controller">
        <a href="property?id='.$property['id'].'" class="view"><i class="fas fa-eye"></i></a>
        <!-- <a href="#" class="remove"><i class="fas fa-trash-alt"></i></a> -->
        </div>
        </div>
        </div>
        ';
      }
    }
// echo $response;
    $output =  array(
      'ui'     =>     $response,
      'max' => $count
    );
    echo json_encode($output);
  }
  if($_POST['action'] == 'search_sold_properties'){
    $user =  get_user_from_kv($_SESSION['userID']);
    $properties = get_sold_properties(8, $_POST['offset'], $user[0]['id']);
    $count = 0;
    if(empty($properties)){
      $response = '<p>No sold properties</p>';
    }else{
      $response = '';
      $count = count_sold_properties($user[0]['id']);
      foreach ($properties as $property) { 
        $response .=' <div class="bookmarked-listing">
        <div class="thumb">
        <a href="property?id='.$property['id'].'">
        <img src="./properties/images/small/'.$property['photo1'].'" class="img-fluid" alt="">
        </a>
        </div>
        <div class="body">
        <div class="content">
        <h4><a href="property?id='.$property['id'].'">';
        if(strlen($property['title']) > 35){ 
          $response .= substr($property['title'],0,32) . '...';
        }else{
          $response .= $property['title'];
        } 
        $response .='</a></h4>
        <p class="listing-address">'.$property['city'].'</p>
        <p class="listing-meta"><span class="review">Price: ';
        setlocale(LC_MONETARY, 'en_GB.UTF-8'); 
        if($property['price'] == ''){
          $response .= money_format("%n", $property['rent_to_landlord']) . ' p/m';
        }else{
          $response .= money_format("%n", $property['price']);
        }
        $response .='</span>';
        if(!empty($property['roce'])){                              
          $response .=' <span class="view">ROCE: '.$property['roce'].'%</span>';
        }else{                             
          $response .=' <span>ROCE: N/A</span>';
        }
        if(!empty($property['bmv_percentage'])){                              
          $response .=' <span class="favroute">BMV: '.$property['bmv_percentage'].'%</span>';
        }else{                             
          $response .=' <span>BMV: N/A</span>';
        }
        $response .=' </p>
        </div>
        <div class="controller">
        <a href="property?id='.$property['id'].'" class="view"><i class="fas fa-eye"></i></a>
        <!-- <a href="#" class="remove"><i class="fas fa-trash-alt"></i></a> -->
        </div>
        </div>
        </div>
        ';
      }
    }
// echo $response;
    $output =  array(
      'ui'     =>     $response,
      'max' => $count
    );
    echo json_encode($output);
  }
}
?>
<?php
include_once('headernav.php');
if(!isset($_SESSION['userID'])){
  echo "<script type='text/javascript'>  window.location='/' </script>";
  exit(); 
}else{
}
include_once('headerprofile.php');
if(!$user[0]['verified'] || !$user[0]['subscribed'] || !$user[0]['compliant']){
  echo "<script type='text/javascript'>  window.location='dash' </script>";
  exit(); 
}
?>
<div class="col-lg-9 order-lg-2">
  <div class="dashboard-section dashboard-bookmarked-listing">
    <div class="dashboard-section-title">
      <h5>Saved Properties</h5>
    </div>
    <div class="dashboard-section-body">
      <div class="bookmarked-listing-wrapper">
        <div id="search_area_saved">            
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
</div>
<?php
include_once('footer.php');
?>
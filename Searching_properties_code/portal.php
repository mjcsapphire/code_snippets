<?php
include_once('header.php');
if(!isset($_SESSION['userID']) && !isset($_SESSION['staffID'])){
  echo "<script type='text/javascript'>  window.location='/' </script>";
  exit(); 
}else{
  $properties = get_properties_no_filter();
}
if(isset($_SESSION['userID'])){
  $is_logged_in = true; 
}else{
  $is_logged_in = false; 
}
if($is_logged_in){
  $user =  get_user_from_kv($_SESSION['userID']);
  if(!$user[0]['subscribed'] && !$user[0]['verified'] && !$user[0]['compliant']){
    delete_stripe_account();
  }
}
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta name="description" content="A safe advertising and networking platform for property investors and agents. We enable investors to not only browse deals, but also to network on one platform.">
  <title>Directly Sourced | A safe and professional platform for property investing </title>
  <meta name="keywords" content="property, property investors, investors, sources, agents, property investment, data">
  <meta name="author" content="Sapphire Arts Limited" />
  <!-- Facebook and Twitter integration -->
  <meta property="og:title" content="Directly Sourced"/>
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://www.directly-sourced.com" />
  <meta property="og:image" content="img/logosmall.png"/>
  <meta property="og:description" content="A safe advertising and networking platform for property investors and agents. We enable investors to not only browse deals, but also to network on one platform."/>
  <meta property="og:site_name" content="Directly Sourced" />
  <meta property="fb:admins" content="" />
  <meta name="twitter:title" content="Directly Sourced" />
  <meta name="twitter:image" content="img/logosmall.png" />
  <meta name="twitter:url" content="https://www.directly-sourced.com" />
  <meta name="twitter:card" content="" />
  <link rel="icon" href="img/logosmall.png">
  <link rel="icon" type="image/png" href="img/logosmall.png">
  <link rel="image_src" href="img/logosmall.png"/>
  <link rel="shortcut icon" href="img/logosmall.png" type="image/png">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <!-- External Css -->
  <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="assets/css/themify-icons.css" />
  <link rel="stylesheet" href="assets/css/et-line.css" />
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
  <link rel="stylesheet" href="assets/css/slick.css" />
  <link rel="stylesheet" href="assets/css/plyr.css" />
  <link rel="stylesheet" href="assets/css/jquery.timepicker.min.css" />
  <link rel="stylesheet" href="assets/css/jquery.nstSlider.min.css" />
  <link rel="stylesheet" href="assets/css/datepicker.min.css" />
  <link rel="stylesheet" href="assets/css/select2.min.css" />
  <link rel="stylesheet" href="assets/css/wickedpicker.min.css" />
  <link rel="stylesheet" href="assets/css/select2-bootstrap.min.css" />
  <!-- leaflet -->
  <link rel="stylesheet" href="assets/leaflet/css/leaflet.css">
  <link rel="stylesheet" href="assets/leaflet/css/MarkerCluster.css">
  <link rel="stylesheet" href="assets/leaflet/css/MarkerCluster.Default.css">
  <!-- Custom Css --> 
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Rubik:400,500%7CSignika:400,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;400;500&display=swap" rel="stylesheet">
  <!-- Favicon -->
  <link rel="icon" href="images/favicon.png">
  <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="images/icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="images/icon-114x114.png">
  <link href="css/nouislider.css" rel="stylesheet">
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-175160126-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-175160126-1');
  </script>
  <!-- Facebook Pixel Code -->
  <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '917015912107628');
      fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=917015912107628&ev=PageView&noscript=1"
      /></noscript>
      <!-- End Facebook Pixel Code -->
    </head>
    <body>
      <div class="preloader">
        <div class='pin'></div>
        <div class='pulse'></div>
      </div>
      <header class="header-bg-1">
        <div class="cp-nav nav-2 nav-absolute nav-light">
          <div class="container">
            <div class="row">
              <div class="col">
                <nav class="navbar navbar-expand-xl">
                  <a class="navbar-brand" href="portal">
                    <img src="img/logofullsmallwhite2b.png" class="img-fluid" alt="">
                  </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="ti-menu"></span>
                  </button>
                  <div class="nav-extra">
                    <div class="user">
                      <a href="profile"><span class="ti-user"></span></a>
                    </div>
                    <div class="user">
                      <a href="dash"><span class="ti-bell"></span><span id="notifications_count" class="text-number"></span></a>
                    </div>
                    <div class="nav-listing notinmobile">
                      <a href="add_property"><span class="ti-plus"></span><span class="text">Upload</span></a>
                    </div>
                  </div>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mr-auto">
                      <li class="menu-item dropdown">
                        <a title="" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Property Types</a>
                        <ul class="dropdown-menu">
                          <?php                                           
                          foreach (get_property_types() as $types) {
                            ?>
                            <li class="menu-item"><a href="search_properties?property=<?php echo $types['id']; ?>#results"><?php echo $types['name']; ?></a></li>
                            <?php
# code...
                          }
                          ?>
                          <li class="menu-item"><a href="search_properties?jv=1#results">Joint Venture</a></li>
                          <li class="menu-item"><a href="search_properties?type=2#results">Development / Land</a></li>
                        </ul>
                      </li>
                      <li class="menu-item ">
                        <a title="" href="search_properties" >Properties</a>
                      </li>
                      <li class="menu-item ">
                        <a title="" href="search_members" >Find Agents</a>
<!--   </li><li class="menu-item ">
<a title="" href="search_members?type=1#results" >Investors</a>
</li> -->
</ul>
</div>
</nav>
</div>
</div>
</div>
</div>
<div class="header-banner header-banner-padding-alt text-center">
  <div class="container">
    <div class="row">
      <div class="col portal_top">
        <h1><span>Find</span> Your Property Investment</h1>
        <div class="listing-wrap">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="listing-search-block">
                  <form>
                    <div class="listing-filter-block">  
                      <div class="row">
                        <div class="col-lg-3">
                          <div class="category">
                            <br><label>Sort by</label><br>
                            <select id="sortVar" class="selectme select-category">
                              <option value="1">Most Recent</option>
                              <option value="2">Price (High to Low)</option>
                              <option value="3">Price (Low to High)</option>
                              <option value="4">BMV (High to Low)</option>
                              <option value="5">BMV (Low to High)</option>
                              <option value="6">ROI (High to Low)</option>
                              <option value="7">ROI (Low to High)</option>
                              <option value="8">ROCE (High to Low)</option>
                              <option value="9">ROCE (Low to High)</option>
                              <option value="10">Yield (High to Low)</option>
                              <option value="11">Yield (Low to High)</option>
                              <option value="12">Sourcing Fee (High to Low)</option>
                              <option value="13">Sourcing Fee (Low to High)</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="category">
                            <br><label>Investment Type</label><br>
                            <select id="investmentVar" class="selectme select-category">
                              <option value="%"> Any</option>
                              <?php                                           
                              foreach (get_investment_types() as $types) {
                                ?>
                                <option value="<?php echo $types['id']; ?>"<?php if(isset($_GET['type'])){if($_GET['type'] == $types['id']){echo 'selected';}} ?>> <?php echo $types['name']; ?></option>
                                <?php
# code...
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="category">
                            <br><label>Property Type</label><br>
                            <select id="propertyVar" class="selectme select-category">
                              <option value="%"> Any</option>
                              <?php                                           
                              foreach (get_property_types() as $types) {
                                ?>
                                <option value="<?php echo $types['id']; ?>"> <?php echo $types['name']; ?></option>
                                <?php
# code...
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="category">
                            <br> <label>Investor Joint Venture</label><br>
                            <select id="joint_venture" class="selectme select-category">
                              <option value="%"> Either</option>
                              <option value="0"> No</option>
                              <option value="1"<?php if(isset($_GET['jv'])){if($_GET['jv'] == 1){echo 'selected';}} ?>> Yes</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="category">
                            <br> <label>Price</label><br>
                            <select id="price" class="selectme select-category">
                              <option value="%"<?php if(isset($_GET['price'])){if($_GET['price'] == 0){echo 'selected';}} ?>> Any</option>
                              <option value="1"<?php if(isset($_GET['price'])){if($_GET['price'] == 1){echo 'selected';}} ?>> 30k - 70k</option>
                              <option value="2"<?php if(isset($_GET['price'])){if($_GET['price'] == 2){echo 'selected';}} ?>> 70k - 110k</option>
                              <option value="3"<?php if(isset($_GET['price'])){if($_GET['price'] == 3){echo 'selected';}} ?>> 110k - 150k</option>
                              <option value="4"<?php if(isset($_GET['price'])){if($_GET['price'] == 4){echo 'selected';}} ?>> 150k - 190k</option>
                              <option value="5"<?php if(isset($_GET['price'])){if($_GET['price'] == 5){echo 'selected';}} ?>> 190k - 230k</option>
                              <option value="6"<?php if(isset($_GET['price'])){if($_GET['price'] == 6){echo 'selected';}} ?>> 230k - 270k</option>
                              <option value="7"<?php if(isset($_GET['price'])){if($_GET['price'] == 7){echo 'selected';}} ?>> 270k - 310k</option>
                              <option value="8"<?php if(isset($_GET['price'])){if($_GET['price'] == 8){echo 'selected';}} ?>> 310k+</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-3 portal_slider">
                          <label>BMV</label>
                          <div id="slider_bmv"></div>
                          <span><small id="bmv-min">0%</small> - <small id="bmv-max">40%</small></span>
                        </div>
                        <div class="col-lg-3 portal_slider">
                          <label>ROI</label>
                          <div id="slider_roi"></div>
                          <span><small id="roi-min">0%</small> - <small id="roi-max">150% +</small></span>
                        </div>
                        <div class="col-lg-3 portal_slider">
                          <label>ROCE</label>
                          <div id="slider_roce"></div>
                          <span><small id="roce-min">0%</small> - <small id="roce-max">150% +</small></span>
                        </div>
                        <div class="col-lg-3 portal_slider">
                          <label>Yield</label>
                          <div id="slider_yield"></div>
                          <span><small id="yield-min">0%</small> - <small id="yield-max">30% +</small></span>
                        </div>
                        <div class="col-lg-3 portal_slider">
                          <label>Sourcing Fee</label>
                          <div id="slider_sourcing"></div>
                          <span><small id="sourcing-min">£0</small> - <small id="sourcing-max">£100 +</small></span>
                        </div>
                        <div class="col-lg-3 portal_slider">
                          <label>Rent to landlord</label>
                          <div id="slider_land"></div>
                          <span><small id="land-min">£0</small> - <small id="land-max">£3000 +</small></span>
                        </div>
                        <div class="col-lg-3 portal_slider">
                          <label>Rent per month</label>
                          <div id="slider_rpm"></div>
                          <span><small id="rpm-min">£0</small> - <small id="rpm-max">£1500 +</small></span>
                        </div>
                        <div class="col-lg-12 portal_slider">
                          <input id="keyword_properties" type="text" width="100%" class="form-control portal_input" placeholder="Search keyword (road name, city, etc)">
                          <a id="search_properties_portal" class="btn button"><i class="fas fa-search"></i>  Search</a>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="header-category-slider">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="header-category-slider-wrap owl-carousel">
          <a href="dash" class="category-item">
            <i class="fas fa-bolt fa-2x"></i><br><br>
            <span>Dashboard</span>
          </a>
          <a href="search_properties" class="category-item">
            <i class="fas fa-home fa-2x"></i><br><br>
            <span>Properties</span>
          </a>
          <a href="search_members" class="category-item">
            <i class="fas fa-user fa-2x"></i><br><br>
            <span>Agents</span>
          </a>
          <a href="search_members?type=1" class="category-item">
            <i class="fas fa-user fa-2x"></i><br><br>
            <span>Investors</span>
          </a>
          <a href="blogposts" class="category-item">
            <i class="fa fa-microphone fa-2x"></i><br><br>
            <span>Interviews, News &amp; Tips</span>
          </a>
          <a href="about" class="category-item">
            <i class="fa fa-info-circle fa-2x"></i><br><br>
            <span>About Us</span>
          </a>
          <a href="contact" class="category-item">
            <i class="fa fa-envelope fa-2x"></i><br><br>
            <span>Contact Us</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
</header>
<!--    <div id="alert">
<a class="alert" href="embedding_phase">Property Embedding Phase</a>
</div> -->
<?php
if(sizeof($properties) > 3){ 
  ?>
  <!-- Listing -->
  <div class="section-padding padding-bottom-90 grey-bg section-border-top section-border-bottom listing-slider-wrap">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="section-header">
            <h2>Latest Properties</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="row listing-slider">
            <?php
            foreach ($properties as $property) { 
              ?>
              <div class="col-lg-4">
                <div class="lrn-listing-wrap">
                  <div class="listing-thumb">
                    <a href="property?id=<?php echo $property['id']; ?>"><img src="./properties/images/large/<?php echo $property['photo1']; ?>" alt="" height="250px"></a>
                  </div>
                  <div class="listing-body">
                    <div class="meta">
                      <a href="property?id=<?php echo $property['id']; ?>" class="avater">
                        <img src="images/listing/avater-3.jpg" class="img-fluid" alt="">
                      </a>
                    </div>
                    <h3><a href="property?id=<?php echo $property['id']; ?>">
                      <?php
                      if(strlen($property['title']) > 30){ 
                        echo substr($property['title'],0,30) . '...';
                      }else{
                        echo $property['title'];
                      } 
                      ?>
                    </a></h3><br>
                    <div class="listing-bottom">
                      <span><?php echo $property['city']; ?></span>
                    </div>
                    <div class="listing-bottom">
                      <span>Investment Type: <?php 
                      $investment_type = get_investment_type($property['investment_type']); 
                      echo $investment_type;
                      ?>
                    </span>
                  </div>
                  <div class="listing-bottom">
                    <span>Property Type: <?php
                    if(!empty($property['property_type'])){                           
                      $property_type = get_property_type($property['property_type']); 
                      echo $property_type;
                    }else{ 
                      echo 'N/A';
                    }
                    ?>
                  </span>
                </div>
                <div class="listing-bottom">
                  <span>Price: <?php 
                  if(!empty($property['price'])){                           
                    setlocale(LC_MONETARY, 'en_GB.UTF-8'); 
                    echo money_format("%n", $property['price']);
                  }else{ 
                    setlocale(LC_MONETARY, 'en_GB.UTF-8'); 
                    echo money_format("%n", $property['rent_to_landlord']);
                  }
                  ?>
                </span>
                <span>ROCE: <?php 
                if(!empty($property['roce'])){                           
                  echo $property['roce'] . '%'; 
                }else{ 
                  echo 'N/A';
                }
                ?></span>
              </div>
              <div class="listing-bottom">
                <span>Sourcing fee: <?php 
                if(!empty($property['sourcing_fee'])){                           
                  setlocale(LC_MONETARY, 'en_GB.UTF-8'); 
                  echo money_format("%n", $property['sourcing_fee']);
                }else{ 
                  echo 'N/A';
                }
                ?>
              </span>
              <span>ROI: <?php 
              if(!empty($property['roi'])){                           
                echo $property['roi'] . '%'; 
              }else{ 
                echo 'N/A';
              }
              ?></span>
            </div>
            <div class="listing-bottom">
              <span>Yield: <?php 
              if(!empty($property['rental_yield'])){                           
                echo $property['rental_yield'] . '%'; 
              }else{ 
                echo 'N/A';
              }
              ?></span>
              <span>BMV: <?php 
              if(!empty($property['bmv_percentage'])){                           
                echo $property['bmv_percentage'] . '%'; 
              }else{ 
                echo 'N/A';
              }
              ?></span>
            </div>
          </div>
        </div>
      </div>
      <?php
    }
    ?>
  </div>
</div>
</div>
</div>
</div>
<!-- Listing End -->
<?php
}
?>
<!-- Blog -->
<div class="section-padding padding-bottom-90">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="section-header">
          <h2>Property Investment Interviews, News & Tips</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <?php
      $latest_posts = get_latest_blog_posts();
      foreach ($latest_posts as $post) {
        ?>
        <div class="col-lg-4 col-md-6">
          <article class="post-grid">
            <div class="post-thumb">
              <img src="./blog/img/<?php echo $post['image_name']; ?>" class="img-fluid" alt="">
              <div class="overlay">
                <a href="/blogpost?id=<?php echo $post['id']; ?>"><span class="ti-plus"></span></a>
              </div>
            </div>
            <div class="post-body">
              <h3><a href="/blogpost?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h3>
              <p><?php echo $post['sub_title']; ?></p>
              <div class="post-meta">
                <span class="date"><?php $fdate = date('d F Y', strtotime($post['date_posted'])); echo $fdate; ?></span>
              </div>
            </div>
          </article>
        </div>
        <?php
      }
      ?>
    </div> 
  </div>
</div>
<!-- Blog End -->
<?php
include_once('footer.php');
?>
<?php
include_once('header.php');
if(isset($_SESSION['userID'])){

  $is_logged_in = true; 
}else{
  $is_logged_in = false; 
}
include_once('headernav.php');

if(isset($_GET['tid'])){
  delete_stripe_account();
}else if($is_logged_in){
  $user =  get_user_from_kv($_SESSION['userID']);
  if(!$user[0]['subscribed'] && !$user[0]['verified'] && !$user[0]['compliant']){
    delete_stripe_account();
  }
}
?>

<div class="modal fade" id="subscribePopupInvestorEmbedding" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <a href="#" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close"></span></a>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="Embedding-tab" data-toggle="tab" href="#Embedding" role="tab" aria-controls="Embedding" aria-selected="true"><span class="ti-user"></span>Free Account</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent"> 
          <div class="tab-pane fade show active" id="Embedding" role="tabpanel" aria-labelledby="Embedding-tab">
            <div class="access-form">

              <div class="form-group">
                <input id="firstnameInvestorEmbedding" type="test" placeholder="Firstname" class="form-control">
              </div>
              <div class="form-group">
                <input id="surnameInvestorEmbedding" type="text" placeholder="Surname" class="form-control">
              </div>
              <div class="form-group">
                <input id="usernameInvestorEmbedding" type="email" placeholder="Email Address" class="form-control">
              </div>
              <div class="form-group">
                <input id="username2InvestorEmbedding" type="text" placeholder="Re-enter Email Address" class="form-control" autocomplete="off" readonly>
              </div> 
              <div class="form-group">
                <input id="passwordInvestorEmbedding" type="password" placeholder="Password" class="form-control">
              </div>
              <div class="form-group">
                <input id="passwordInvestor2Embedding" type="password" placeholder="Re-enter Password" class="form-control">
              </div>
              <div class="form-group">
                <ul class="helper-textEmbedding">
                  <li class="lengthEmbedding">Must be at least 8 characters long.</li>
                  <li class="lowercaseEmbedding">Must contain a lowercase letter.</li>
                  <li class="uppercaseEmbedding">Must contain an uppercase letter.</li>
                  <li class="specialEmbedding">Must contain a number or special character.</li>
                </ul>
              </div>
              <br>
              <hr>
              <br>
              <p>What type of investor are you?</p>
              <div class="form-group">
                <input type="radio" id="rad1" name="age" value="5">
                <a class="property_popup" id="popupRad1">?</a>
                <label for="rad1">Sophisticated Investor (Certified)</label><br>
                <input type="radio" id="rad2" name="age" value="4">
                <a class="property_popup" id="popupRad2">?</a>
                <label for="rad2">Sophisticated Investor (Self-Certified)</label><br>  
                <input type="radio" id="rad3" name="age" value="3">
                <a class="property_popup" id="popupRad3">?</a>
                <label for="rad3">High Net Worth Individual</label><br>
                <input type="radio" id="rad4" name="age" value="2">
                <a class="property_popup" id="popupRad4">?</a>
                <label for="rad4">Investment Professional</label><br>
                <input type="radio" id="rad5" name="age" value="1">
                <a class="property_popup" id="popupRad5">?</a>
                <label for="rad5">Property investor</label><br>
                <input type="radio" id="rad6" name="age" value="0">
                <label for="rad6">None of the above</label><br>
              </div>
              <div class="more-option">
                <div id="termsDivInvestorEmbedding" class="mt-0 terms">
                  <br><input class="custom-radio" type="checkbox" id="acknowledgementInvestorEmbedding" name="termsandcondition">I have read and acknowledged the <a target="_new" href="termsandconditionsinvestor"><b>terms &amp; conditions</b></a> and <a target="_new" href="privacy_policy"><b>privacy policy</b> of this platform.</a>
                </div>
              </div>
              <button id="investorEmbeddingButton" role="link" class="button btn-block">Create Account</button>
              <div id="errorMessage"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="preregPopupInvestor" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <a href="#" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close"></span></a>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="prereg-tab" data-toggle="tab" href="#prereg" role="tab" aria-controls="prereg" aria-selected="true"><span class="ti-user"></span>Investor Pre-Registration</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent"> 
          <div class="tab-pane fade show active" id="prereg" role="tabpanel" aria-labelledby="prereg-tab">
            <div class="access-form">

              <div class="form-group">
                <input id="firstnameInvestorPre" type="test" placeholder="Firstname" class="form-control">
              </div>
              <div class="form-group">
                <input id="surnameInvestorPre" type="text" placeholder="Surname" class="form-control">
              </div>
              <div class="form-group">
                <input id="usernameInvestorPre" type="email" placeholder="Email Address" class="form-control">
              </div>
              <button id="pre-register" role="link" class="button btn-block">Pre-Register</button>
              <div id="errorMessage"></div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="subscribePopupInvestor" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <a href="#" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close"></span></a>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="loginaccount-tab" data-toggle="tab" href="#loginaccount" role="tab" aria-controls="loginaccount" aria-selected="true"><span class="ti-user"></span>Investor Monthly Subscription</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent"> 
          <div class="tab-pane fade show active" id="loginaccount" role="tabpanel" aria-labelledby="loginaccount-tab">
            <div class="access-form">
              <p>All payments are handled by the leading online payment processing platform; <a target="_new" href="https://stripe.com">Stripe</a>. We do not store any card details. <br><br>You will be required to provide valid UK bank card details upon signing up as part of Stripe's verification check, however you will <strong>not</strong> be charged until the trial period has expired.</p>

              <div class="form-group">
                <input id="firstnameInvestor" type="test" placeholder="Firstname" class="form-control">
              </div>
              <div class="form-group">
                <input id="surnameInvestor" type="text" placeholder="Surname" class="form-control">
              </div>
              <div class="form-group">
                <input id="usernameInvestor" type="email" placeholder="Email Address" class="form-control">
              </div>
              <div class="form-group">
                <input id="passwordInvestor" type="password" placeholder="Password" class="form-control">
              </div>
              <div class="form-group">
                <input id="passwordInvestor2" type="password" placeholder="Re-enter Password" class="form-control">
              </div>
              <div class="form-group">
                <ul class="helper-text">
                  <li class="length">Must be at least 8 characters long.</li>
                  <li class="lowercase">Must contain a lowercase letter.</li>
                  <li class="uppercase">Must contain an uppercase letter.</li>
                  <li class="special">Must contain a number or special character.</li>
                </ul>
              </div>

              <div class="more-option">
                <div id="termsDivInvestor" class="mt-0 terms">
                  <br><input class="custom-radio" type="checkbox" id="acknowledgementInvestor" name="termsandcondition">I have read and acknowledged the <a target="_new" href="termsandconditionsinvestor"><b>terms &amp; conditions</b></a> and <a target="_new" href="privacy_policy"><b>privacy policy</b> of this platform.</a>
                </div>
              </div>
              <button id="checkout-button-investorsubscriptionplan" role="link" class="button btn-block">Subscribe</button>
              <div id="errorMessage"></div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="subscribePopupInvestorAnnual" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <a href="#" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close"></span></a>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="loginaccount-tab" data-toggle="tab" href="#loginaccount" role="tab" aria-controls="loginaccount" aria-selected="true"><span class="ti-user"></span>Investor Annual Subscription</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent"> 
          <div class="tab-pane fade show active" id="loginaccount" role="tabpanel" aria-labelledby="loginaccount-tab">
            <div class="access-form">
              <p>All payments are handled by the leading online payment processing platform; <a target="_new" href="https://stripe.com">Stripe</a>. We do not store any card details. <br><br>You will be required to provide valid UK bank card details upon signing up as part of Stripe's verification check, however you will <strong>not</strong> be charged until the trial period has expired.</p>

              <div class="form-group">
                <input id="firstnameInvestorAnnual" type="test" placeholder="Firstname" class="form-control">
              </div>
              <div class="form-group">
                <input id="surnameInvestorAnnual" type="text" placeholder="Surname" class="form-control">
              </div>
              <div class="form-group">
                <input id="usernameInvestorAnnual" type="email" placeholder="Email Address" class="form-control">
              </div>
              <div class="form-group">
                <input id="passwordInvestorAnnual" type="password" placeholder="Password" class="form-control">
              </div>
              <div class="form-group">
                <input id="passwordInvestorAnnual2" type="password" placeholder="Re-enter Password" class="form-control">
              </div>
              <div class="form-group">
                <ul class="helper-textAnnual">
                  <li class="lengthAnnual">Must be at least 8 characters long.</li>
                  <li class="lowercaseAnnual">Must contain a lowercase letter.</li>
                  <li class="uppercaseAnnual">Must contain an uppercase letter.</li>
                  <li class="specialAnnual">Must contain a number or special character.</li>
                </ul>
              </div>

              <div class="more-option">
                <div id="termsDivInvestorAnnual" class="mt-0 terms">
                  <br><input class="custom-radio" type="checkbox" id="acknowledgementInvestorAnnual" name="termsandcondition">I have read and acknowledged the <a target="_new" href="termsandconditionsinvestor"><b>terms &amp; conditions</b></a> and <a target="_new" href="privacy_policy"><b>privacy policy</b> of this platform.</a>
                </div>
              </div>
              <button id="checkout-button-investorsubscriptionplanannual" role="link" class="button btn-block">Subscribe</button>
              <div id="errorMessage"></div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section-padding-100 call-to-action-bg">
  <div class="container">
    <div class="call-to-action-wrap">
      <div class="call-to-action-content">
        <h3>Property Investors</h3>
        <p>Find your next property investment and network with other verified property professionals.</p>
      </div>
      <div class="call-to-action-button">
        <a href="#membership"><span class="ti-user"></span>Free Membership</a>
      </div>
    </div>
  </div>
</div>
<div class="padding-top-100">
  <div class="container">
    <div class="row padding-bottom-60">
      <div class="col">
        <div class="section-header">
          <h2>Key Features</h2>
        </div>
      </div>
    </div>
    <div class="row padding-bottom-40">

      <div class="col-xl-6 col-lg-6 order-lg-1 padding-bottom-40">
        <div class="featured-content">
          <h3>Property Search</h3>
          <p class="index-para">Tired of manually sifting through properties on other portals to find your next investment opportunity? Directly Sourced search functions allow you to view pre-vetted and secured properties based on a variety of variables and filters including location, property type, purchase price, R.O.C.E and much more. All helping to simplify the searching process.</p>           


        </div>
      </div>
      <div class="col-xl-5 offset-xl-1 col-lg-6 order-lg-2">

        <img src="img/invpic1.png" width="95%">
      </div>
    </div>
    <div class="row padding-top-60 padding-bottom-40">

      <div class="col-xl-5 offset-xl-1 col-lg-6 order-lg-2 padding-bottom-40">
        <div class="featured-content">
          <h3>Find Agents</h3>
          <p class="index-para">We know it's often hard to find reputable property sourcers and estate agents. We’ve created a collaborative and safe environment where you can find agents to work with across the country filtered by their location. Whether it's an agent to help source your next development project, or an agent to manage your property. We've got you covered.</p>           


        </div>
      </div>
      <div class="col-xl-6 col-lg-6 order-lg-1">

        <img src="img/invpic7.png" width="95%">
      </div>
    </div>
    <div class="row padding-top-60 padding-bottom-40">

      <div class="col-xl-6 col-lg-6 order-lg-1 padding-bottom-40">
        <div class="featured-content">
          <h3>Your Dashboard</h3>
          <p class="index-para">Take control of your property business with your own custom dashboard. Here you can manage a range of items including your notifications and saved properties. This is where you’re also able to upload your own joint venture opportunities to the site too. You can easily manage your membership from your dashboard as well.</p>           


        </div>
      </div>
      <div class="col-xl-5 offset-xl-1 col-lg-6 order-lg-2">

        <img src="img/invpic3.png" width="95%">
      </div>
    </div>
    <div class="row padding-top-60 padding-bottom-40">

      <div class="col-xl-5 offset-xl-1 col-lg-6 order-lg-2 padding-bottom-40">
        <div class="featured-content">
          <h3>Secure Messaging</h3>
          <p class="index-para">All the communication is done through our secure messaging service, making it safer, more transparent and convenient for you. With everything stored in one place, there’s no more losing that one vital message.</p>    


        </div>
      </div>
      <div class="col-xl-6 col-lg-6 order-lg-1">

        <img src="img/invpic4.png" width="95%">
      </div>
    </div>
    <div class="row padding-top-60 padding-bottom-40">

      <div class="col-xl-6 col-lg-6 order-lg-1 padding-bottom-40">
        <div class="featured-content">
          <h3>Free to feel safe</h3>
          <p class="index-para">All members on the site are verified before having full access, creating a safe and secure platform for everyone. Property sourcers and other agents using the site are required to present proof of compliance and to be registered with the necessary regulatory bodies including The Property Ombudsman (TPO) or Property Redress Scheme (PRS).</p>           


        </div>
      </div>
      <div class="col-xl-5 offset-xl-1 col-lg-6 order-lg-2">
        <img src="img/invpic5.png" width="95%">

      </div>
    </div>
  </div>
</div>
<hr>
<div class="section-padding padding-bottom-90">
  <div class="container">
    <div class="row padding-bottom-60">
      <div class="col">
        <div class="section-header">
          <h2>How it works</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-4">
        <div class="start-setps text-center">
          <div class="icon">
            <i class="fa fa-user-plus fa-2x"></i>
          </div>
          <h3>Step 1: Login/Sign Up</h3>
          <p>Create profile & configure account personal to you.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="start-setps text-center">
          <div class="icon">
            <i class="fa fa-search fa-2x"></i>
          </div>
          <h3>Step 2: Find a property</h3>
          <p>Search and filter through investments by location, price, strategy, yield ,etc.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="start-setps text-center">
          <div class="icon">
            <i class="fa fa-check fa-2x"></i>
          </div>
          <h3>Step 3: Secure</h3>
          <p>Message the property sourcer using our inbuilt messaging service to find out more or reserve the property.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="membership" class="padding-top-100 padding-bottom-70 grey-bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6">
        <div class="pricing-plan featured-plan">
          <div class="plan-header">
            <h4>Free Membership</h4><small>Directly Sourced is free for everyone until further notice *</small>
          </div>
          <div class="plan-body">
            <ul class="plan-feature">                  
              <li>Browse through potential investment properties</li>
              <li>Highly secure and trusted marketplace</li>
              <li>Network with verified investors and agents</li>
              <li>Custom profile and personalised dashboard</li>
            </ul>
            <a href="#" data-toggle="modal" data-target="#subscribePopupInvestorEmbedding" class="button">Create Account</a>

          </div>
        </div>
      </div>
    <p><b>* Directly Sourced is free for everyone until further notice:</b> While we are building up our initial user base and creating a fair pricing model for our users, the platform is completely free to use. Our main priority will always be value, so we are making sure we provide you with that before anything else.</p>
    </div>
  </div>
</div>

<?php
include_once('footer.php');
?>


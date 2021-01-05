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
$property = get_property($_GET['id']);
if($user[0]['id'] != $property[0]['publisher']){
  echo "<script type='text/javascript'>  window.location='profile' </script>";
  exit(); 
}
?>
<div class="modal fade" id="popupPrice" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <a href="#" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close"></span></a>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="prereg-tab" data-toggle="tab" href="#prereg" role="tab" aria-controls="prereg" aria-selected="true">Price</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent"> 
          <div class="tab-pane fade show active" id="prereg" role="tabpanel" aria-labelledby="prereg-tab">
            <div class="access-form">
              <p>This is the total purchase price of the property. If possible, please include a mortgage example in the “Other financial information” section.<br><br>
                Mortgage Example:<br><br>
                Price = £53,000<br>
                Deposit (25%) = £13,250<br>
                Stamp duty (3%) + Legals (£1500) = £3090<br>
                Total money in (does not include refurb etc) = £16,340<br><br>
              Interest only mortgage (3.5%) = £83 p/m</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="popupRoce" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <a href="#" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close"></span></a>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="prereg-tab" data-toggle="tab" href="#prereg" role="tab" aria-controls="prereg" aria-selected="true">ROCE</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent"> 
          <div class="tab-pane fade show active" id="prereg" role="tabpanel" aria-labelledby="prereg-tab">
            <div class="access-form">
              <p>ROCE or Return on capital employed, otherwise known as ROI or ROC, is the annual profit (income minus costs) generated by an asset, divided by the cash put in.<br><br>
                Example:<br><br>
                Annual rent = £5,000<br>
                Annual costs (Mortgage, maintenance (15% of rent per month) etc) = £2,000<br>
                Annual Profit = £3,000<br><br>
                Purchase price = £100,000<br>
                Deposit = 25,000 <br>
                Stamp duty (3%) + Legals (£1500) = £4500<br>
                Total money in (does not include refurb etc) = £29,500<br><br>
                ROCE = (Annual Profit / Total money in) x 100<br>
              ROCE = (3,000 / 29,500) x 100 = 10.17%</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="popupRoi" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <a href="#" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close"></span></a>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="prereg-tab" data-toggle="tab" href="#prereg" role="tab" aria-controls="prereg" aria-selected="true">ROI</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent"> 
          <div class="tab-pane fade show active" id="prereg" role="tabpanel" aria-labelledby="prereg-tab">
            <div class="access-form">
              <p>ROI or Return on investment, otherwise known as ROCE or ROC, is the annual profit (income minus costs) generated by an asset, divided by the cash put in.<br><br>
              Use the same calculation as ROCE.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="popupYield" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <a href="#" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close"></span></a>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="prereg-tab" data-toggle="tab" href="#prereg" role="tab" aria-controls="prereg" aria-selected="true">Yield</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent"> 
          <div class="tab-pane fade show active" id="prereg" role="tabpanel" aria-labelledby="prereg-tab">
            <div class="access-form">
              <p>Gross yield is the annual income generated by an asset, divided by its price. This is before any costs have been incurred.<br><br>
                Annual rent: £5,000<br>
                Purchase price: £100,000<br>
                Gross yield = (Annual rent / Purchase price) x 100<br>
                Gross yield = (5,000 / 100,000) x 100<br>
              Gross yield = 5%</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="popupBmv" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <a href="#" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close"></span></a>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="prereg-tab" data-toggle="tab" href="#prereg" role="tab" aria-controls="prereg" aria-selected="true">BMV Percentage</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent"> 
          <div class="tab-pane fade show active" id="prereg" role="tabpanel" aria-labelledby="prereg-tab">
            <div class="access-form">
              <p>If the property is below market value, this is the percentage in which is below market value.<br><br>
                Example:<br><br>
                Market Value = £100,000<br>
                Purchase price = £85,000<br>
              BMV Percentage = 15%</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-lg-9 order-lg-2">
  <div class="dashboard-section dashboard-add-listing">
    <div class="dashboard-section-body">
      <div class="post-listing">
        <div class="form-field basic-field">
          <h4>Property Visuals &amp; Media</h4>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <span class="label-cover">Image 1 
                  <?php
                  if($property[0]['photo1'] != ''){
                    ?>
                    <img src="./properties/images/small/<?php echo $property[0]['photo1']; ?>" width="100" height="100" alt="">
                    <div class="button-area">
                      <button id="rotate1" class="button">Rotate Image</button>
                    </div>
                    <?php
                  }
                  ?>
                </span>
                <br>
                <div
                class="dropzone"
                id="dropzone1"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <span class="label-cover">Image 2 
                  <?php
                  if($property[0]['photo2'] != ''){
                    ?>
                    <img src="./properties/images/small/<?php echo $property[0]['photo2']; ?>" width="100" height="100" alt="">
                    <div class="button-area">
                      <button id="rotate2" class="button">Rotate Image</button>
                    </div>
                    <?php
                  }
                  ?>
                </span>
                <br>
                <div
                class="dropzone"
                id="dropzone2"></div>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <span class="label-cover">Image 3 
                  <?php
                  if($property[0]['photo3'] != ''){
                    ?>
                    <img src="./properties/images/small/<?php echo $property[0]['photo3']; ?>" width="100" height="100" alt="">
                    <div class="button-area">
                      <button id="rotate3" class="button">Rotate Image</button>
                    </div>
                    <?php
                  }
                  ?>
                </span>
                <br>
                <div
                class="dropzone"
                id="dropzone3"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <span class="label-cover">Image 4 
                  <?php
                  if($property[0]['photo4'] != ''){
                    ?>
                    <img src="./properties/images/small/<?php echo $property[0]['photo4']; ?>" width="100" height="100" alt="">
                    <div class="button-area">
                      <button id="rotate4" class="button">Rotate Image</button>
                    </div>
                    <?php
                  }
                  ?>
                </span>
                <br>
                <div
                class="dropzone"
                id="dropzone4"></div>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <span class="label-cover">Image 5 
                  <?php
                  if($property[0]['photo5'] != ''){
                    ?>
                    <img src="./properties/images/small/<?php echo $property[0]['photo5']; ?>" width="100" height="100" alt="">
                    <div class="button-area">
                      <button id="rotate5" class="button">Rotate Image</button>
                    </div>
                    <?php
                  }
                  ?>
                </span>
                <br>
                <div
                class="dropzone"
                id="dropzone5"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <span class="label-cover">Image 6 
                  <?php
                  if($property[0]['photo6'] != ''){
                    ?>
                    <img src="./properties/images/small/<?php echo $property[0]['photo6']; ?>" width="100" height="100" alt="">
                    <div class="button-area">
                      <button id="rotate6" class="button">Rotate Image</button>
                    </div>
                    <?php
                  }
                  ?>
                </span>
                <br>
                <div
                class="dropzone"
                id="dropzone6"></div>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <span class="label-cover">Property PDF (optional)</span>
                <div
                class="dropzone"
                id="dropzone8"></div>
              </div> 
            </div><div class="col-md-6">
              <div class="form-group">
                <label>Youtube Video (optional)</label>
                <p>1. Open video in Youtube</p>
                <p>2. Click "Share" and copy the link</p>
                <p>3. Paste the link below:</p>
                <input id="property_video" type="text" class="form-control" placeholder="Youtube Video URL" value="<?php echo $property[0]['video']; ?>">
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <span class="label-cover">Floor Plan (optional) 
                  <?php
                  if($property[0]['floor_plan'] != ''){
                    ?>
                    <img src="./properties/images/small/<?php echo $property[0]['floor_plan']; ?>" width="100" height="100" alt="">
                    <?php
                  }
                  ?>
                </span>
                <br>
                <div
                class="dropzone"
                id="dropzone7"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <form class="post-listing">
        <div class="form-field basic-field">
          <h4>Property Details</h4>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label>Property ID</label>
                <input id="theid" type="text" disabled class="form-control" placeholder="" value="<?php echo $property[0]['id']; ?>">
              </div>
              <div class="form-group">
                <label>Listing Title (70 character limit)</label>
                <input id="property_title" type="text" maxlength="70" class="form-control" placeholder="" value="<?php echo $property[0]['title']; ?>">
              </div>
              <div class="form-group">
                <label>Investment Type</label>
                <select id="property_investment_type" class="form-control select-category" id="select-category">
                  <?php                                           
                  foreach (get_investment_types() as $types) {
                    $selected = ( $types['id'] == $property[0]['investment_type']) ? 'selected' : '';
                    ?>
                    <option value="<?php echo $types['id']; ?>" <?php echo $selected; ?>> <?php echo $types['name']; ?></option>
                    <?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>Property Type</label>
                <select id="property_type" class="form-control select-category" id="select-category">
                  <option value="0" > N/A</option>
                  <?php                                           
                  foreach (get_property_types() as $types) {
                    $selected = ( $types['id'] == $property[0]['property_type']) ? 'selected' : '';
                    ?>
                    <option value="<?php echo $types['id']; ?>" <?php echo $selected; ?>> <?php echo $types['name']; ?></option>
                    <?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>Joint Venture?</label>
                <?php                                           
                if($user[0]['user_type'] == 1){
                  ?>
                  <select id="joint_venture" disabled class="selectme select-category" id="select-category">
                    <option value="1"> Yes</option>
                  </select>
                  <?php                                           
                }else if($user[0]['user_type'] == 2){
                  ?>
                  <select id="joint_venture" disabled class="selectme select-category" id="select-category">
                    <option value="0"> No</option>
                  </select>
                  <?php
                }else{
                  ?>
                  <select id="joint_venture" class="selectme select-category" id="select-category">
                    <?php                                           
                    foreach (get_yesno() as $values) {
                      $selected = ( $values['id'] == $property[0]['joint_venture']) ? 'selected' : '';
                      ?>
                      <option value="<?php echo $values['id']; ?>" <?php echo $selected; ?>> <?php echo $values['name']; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                  <?php
                }
                ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Property Description &amp; Details</label>
                <textarea id="property_details" class="form-control"><?php echo $property[0]['property_details']; ?></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="form-field basic-field">
          <h4>Location Infomation</h4>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label>Property Number (optional)</label>
                <input id="property_address1" type="text" class="form-control" placeholder="" value="<?php echo $property[0]['address1']; ?>">
              </div>
              <div class="form-group">
                <label>Road Name (optional)</label>
                <input id="property_address2" type="text" class="form-control" placeholder="" value="<?php echo $property[0]['address2']; ?>">
              </div>
              <div class="form-group">
                <label>Address Line 3 (optional)</label>
                <input id="property_address3" type="text" class="form-control" placeholder="" value="<?php echo $property[0]['address3']; ?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>City</label>
                <input id="property_city" type="text" class="form-control" placeholder="" value="<?php echo $property[0]['city']; ?>">
              </div>
              <div class="form-group">
                <label>County</label>
                <input id="property_county" type="text" class="form-control" placeholder="" value="<?php echo $property[0]['county']; ?>">
              </div>
              <div class="form-group">
                <label>Postcode (optional, will not be displayed to users)</label>
                <input id="property_postcode" type="text" class="form-control" placeholder="" value="<?php echo $property[0]['postcode']; ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Other Location Information (optional)</label>
                <textarea id="property_location_info" class="form-control"><?php echo $property[0]['location_info']; ?></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="form-field basic-field">
          <h4>Financial Information (Please enter gross financial values)</h4>
          <p>Please note these values, with the exception price, are not compulsory, but advised where possible.</p><br>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label>Price</label>                          
                <a class="property_popup" href="#" data-toggle="modal" data-target="#popupPrice">?</a>
                <input id="property_price" type="text" class="form-control" placeholder="" value="<?php echo $property[0]['price']; ?>">
              </div>
              <div class="form-group">
                <label>Yield (optional)</label>
                <a class="property_popup" href="#" data-toggle="modal" data-target="#popupYield">?</a>
                <input id="property_yield" type="text" class="form-control" placeholder="" value="<?php echo $property[0]['rental_yield']; ?>">
              </div>
              <div class="form-group">
                <label>ROI (optional)</label>
                <a class="property_popup" href="#" data-toggle="modal" data-target="#popupRoi">?</a>
                <input id="property_roi" type="text" class="form-control" placeholder="" value="<?php echo $property[0]['roi']; ?>">
              </div>
              <div class="form-group">
                <label>Rent to landlord (optional)</label>
                <input id="rent_to_landlord" type="text" class="form-control" placeholder="" value="<?php echo $property[0]['rent_to_landlord']; ?>">
              </div>                        
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>ROCE (optional)</label>
                <a class="property_popup" href="#" data-toggle="modal" data-target="#popupRoce">?</a>
                <input id="property_roce" type="text" class="form-control" placeholder="" value="<?php echo $property[0]['roce']; ?>">
              </div>
              <div class="form-group">
                <label>Sourcing Fee (optional)</label>
                <input id="property_sourcing_fee" type="text" class="form-control" placeholder="" value="<?php echo $property[0]['sourcing_fee']; ?>">
              </div>
              <div class="form-group">
                <label>BMV Percentage (optional)</label>
                <a class="property_popup" href="#" data-toggle="modal" data-target="#popupBmv">?</a>
                <input id="property_bmv_percentage" type="text" class="form-control" placeholder="" value="<?php echo $property[0]['bmv_percentage']; ?>">
              </div>
              <div class="form-group">
                <label>Rent per month (optional)</label>
                <input id="rent_per_month" type="text" class="form-control" placeholder="" value="<?php echo $property[0]['rent_per_month']; ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Other Financial Information (optional)</label>
                <textarea id="property_financial_info" class="form-control"><?php echo $property[0]['financial_info']; ?></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="button-area">
          <a id="submit_property" class="button">Submit</a>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
</div>
<?php
include_once('footer.php');
?>
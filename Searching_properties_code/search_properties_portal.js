var search_properties_portal = document.getElementById('search_properties_portal');
if (search_properties_portal !== null) {
  var slider_land = document.getElementById('slider_land');
  noUiSlider.create(slider_land, {
    start: [0, 3000],
    connect: true,
    margin: 100,
    step: 100,
    range: {
      'min': 0,
      'max': 3000
    }
  });
  var minLand = document.getElementById('land-min'),
  maxLand = document.getElementById('land-max');
  slider_land.noUiSlider.on('update', function (values, handle) {
    if (handle) {
      maxLand.innerHTML = '£'+values[handle].substring(0, values[handle].length - 3);if(maxLand.innerHTML == '£3000'){maxLand.innerHTML = maxLand.innerHTML+' +';}
    } else {
      minLand.innerHTML = '£'+values[handle].substring(0, values[handle].length - 3);
    }
  });
  var slider_sourcing = document.getElementById('slider_sourcing');
  noUiSlider.create(slider_sourcing, {
    start: [0, 5000],
    connect: true,
    margin: 100,
    step: 100,
    range: {
      'min': 0,
      'max': 5000
    }
  });
  var minSourcing = document.getElementById('sourcing-min'),
  maxSourcing = document.getElementById('sourcing-max');
  slider_sourcing.noUiSlider.on('update', function (values, handle) {
    if (handle) {
      maxSourcing.innerHTML = '£'+values[handle].substring(0, values[handle].length - 3);if(maxSourcing.innerHTML == '£5000'){maxSourcing.innerHTML = maxSourcing.innerHTML+' +';}
    } else {
      minSourcing.innerHTML = '£'+values[handle].substring(0, values[handle].length - 3);
    }
  });
  var slider_roce = document.getElementById('slider_roce');
  noUiSlider.create(slider_roce, {
    start: [0, 150],
    connect: true,
    margin: 10,
    step: 10,
    range: {
      'min': 0,
      'max': 150
    }
  });
  var minRoce = document.getElementById('roce-min'),
  maxRoce = document.getElementById('roce-max');
  slider_roce.noUiSlider.on('update', function (values, handle) {
    if (handle) {
      maxRoce.innerHTML = values[handle].substring(0, values[handle].length - 3) + '%';if(maxRoce.innerHTML == '150%'){maxRoce.innerHTML = maxRoce.innerHTML+' +';}
    } else {
      minRoce.innerHTML = values[handle].substring(0, values[handle].length - 3) + '%';
    }
  });
  var slider_roi = document.getElementById('slider_roi');
  noUiSlider.create(slider_roi, {
    start: [0, 150],
    connect: true,
    margin: 10,
    step: 10,
    range: {
      'min': 0,
      'max': 150
    }
  });
  var minRoi = document.getElementById('roi-min'),
  maxRoi = document.getElementById('roi-max');
  slider_roi.noUiSlider.on('update', function (values, handle) {
    if (handle) {
      maxRoi.innerHTML = values[handle].substring(0, values[handle].length - 3) + '%';if(maxRoi.innerHTML == '150%'){maxRoi.innerHTML = maxRoi.innerHTML+' +';}
    } else {
      minRoi.innerHTML = values[handle].substring(0, values[handle].length - 3) + '%';
    }
  });
  var slider_bmv = document.getElementById('slider_bmv');
  noUiSlider.create(slider_bmv, {
    start: [0, 40],
    connect: true,
    margin: 0,
    step: 5,
    range: {
      'min': 0,
      'max': 40
    }
  });
  var minBmv = document.getElementById('bmv-min'),
  maxBmv = document.getElementById('bmv-max');
  slider_bmv.noUiSlider.on('update', function (values, handle) {
    if (handle) {
      maxBmv.innerHTML = values[handle].substring(0, values[handle].length - 3) + '%';
    } else {
      minBmv.innerHTML = values[handle].substring(0, values[handle].length - 3) + '%';
    }
  });
  var slider_yield = document.getElementById('slider_yield');
  noUiSlider.create(slider_yield, {
    start: [0, 30],
    connect: true,
    margin: 0,
    step: 5,
    range: {
      'min': 0,
      'max': 30
    }
  });
  var minYield = document.getElementById('yield-min'),
  maxYield = document.getElementById('yield-max');
  slider_yield.noUiSlider.on('update', function (values, handle) {
    if (handle) {
      maxYield.innerHTML = values[handle].substring(0, values[handle].length - 3) + '%';if(maxYield.innerHTML == '30%'){maxYield.innerHTML = maxYield.innerHTML+' +';}
    } else {
      minYield.innerHTML = values[handle].substring(0, values[handle].length - 3) + '%';
    }
  });
  var slider_rpm = document.getElementById('slider_rpm');
  noUiSlider.create(slider_rpm, {
    start: [0, 1500],
    connect: true,
    margin: 10,
    step: 10,
    range: {
      'min': 0,
      'max': 1500
    }
  });
  var minRpm = document.getElementById('rpm-min'),
  maxRpm = document.getElementById('rpm-max');
  slider_rpm.noUiSlider.on('update', function (values, handle) {
    if (handle) {
      maxRpm.innerHTML = '£'+values[handle].substring(0, values[handle].length - 3);if(maxRpm.innerHTML == '£1500'){maxRpm.innerHTML = maxRpm.innerHTML+' +';}
    } else {
      minRpm.innerHTML = '£'+values[handle].substring(0, values[handle].length - 3);
    }
  });
  document.getElementById("search_properties_portal").addEventListener('click',function ()
  {
    property = document.getElementById('propertyVar').value;
    investment = document.getElementById('investmentVar').value;
    joint_venture = document.getElementById('joint_venture').value; 
    price = document.getElementById('price').value;
    min_land = document.getElementById('land-min').innerHTML.replace(/\D/g,'');
    max_land = document.getElementById('land-max').innerHTML.replace(/\D/g,'');
    min_bmv = document.getElementById('bmv-min').innerHTML.replace(/\D/g,'');
    max_bmv = document.getElementById('bmv-max').innerHTML.replace(/\D/g,'');
    min_roi = document.getElementById('roi-min').innerHTML.replace(/\D/g,'');
    max_roi = document.getElementById('roi-max').innerHTML.replace(/\D/g,'');
    min_roce = document.getElementById('roce-min').innerHTML.replace(/\D/g,'');
    max_roce = document.getElementById('roce-max').innerHTML.replace(/\D/g,'');
    min_yield = document.getElementById('yield-min').innerHTML.replace(/\D/g,'');
    max_yield = document.getElementById('yield-max').innerHTML.replace(/\D/g,'');
    min_sourcing = document.getElementById('sourcing-min').innerHTML.replace(/\D/g,'');
    max_sourcing = document.getElementById('sourcing-max').innerHTML.replace(/\D/g,'');      
    min_rpm = document.getElementById('rpm-min').innerHTML.replace(/\D/g,'');
    max_rpm = document.getElementById('rpm-max').innerHTML.replace(/\D/g,'');
    keyword = document.getElementById('keyword_properties').value.replace(/[&\/\\#,+()$~%'":*?<>{}]/g, '');
    sort = document.getElementById('sortVar').value;
    if(keyword == '' || keyword == ' '){
      keyword = '';
    }
    if(joint_venture == '%'){
      joint_venture = 0;
    }
    var searchParams = {'type':investment,'property':property,'joint_venture':joint_venture,'min_land':min_land,'max_land':max_land,'min_bmv':min_bmv,'max_bmv':max_bmv,'min_roi':min_roi,'max_roi':max_roi,'min_roce':min_roce,'max_roce':max_roce,'min_yield':min_yield,'max_yield':max_yield,'min_sourcing':min_sourcing,'max_sourcing':max_sourcing,'min_rpm':min_rpm,'max_rpm':max_rpm,'keyword':keyword,'sort':sort};
    window.localStorage.setItem("searchParams",JSON.stringify(searchParams)); 
    try { window.location("search_properties?type="+investment+"&property="+property+"&jv="+joint_venture+"&search="+keyword+"&price="+price+"&sort="+sort+"#results"); } 
    catch(e) { window.location = "search_properties?type="+investment+"&property="+property+"&jv="+joint_venture+"&search="+keyword+"&price="+price+"&sort="+sort+"#results"; }
  });
}
var myElemSearch = document.getElementById('search_properties');
if (myElemSearch !== null) {
  var searchParams = JSON.parse(window.localStorage.getItem('searchParams')); 
  if(searchParams == null){
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
  }else{
    var slider_land = document.getElementById('slider_land');
    noUiSlider.create(slider_land, {
      start: [searchParams.min_land, searchParams.max_land],
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
      start: [searchParams.min_sourcing, searchParams.max_sourcing],
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
      start: [searchParams.min_roce, searchParams.max_roce],
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
      start: [searchParams.min_roi, searchParams.max_roi],
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
      start: [searchParams.min_bmv, searchParams.max_bmv],
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
      start: [searchParams.min_yield, searchParams.max_yield],
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
      start: [searchParams.min_rpm, searchParams.max_rpm],
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
  }
  $(document).ready(function(){
    localStorage.setItem('offset', 0);
    localStorage.setItem('page', 1);
    document.getElementById('previous_page').style.visibility = "hidden";
    document.getElementById('next_page').style.visibility = "hidden";
    document.getElementById('page_number').style.visibility = "hidden";
    document.getElementById('page_number2').style.visibility = "hidden";
    property = document.getElementById('propertyVar').value;
    investment = document.getElementById('investmentVar').value;
    joint_venture = document.getElementById('joint_venture').value;
    price = document.getElementById('price').value;
    if(price == '%'){
      min_price = 0; max_price = 1000000000;
    }else if(price == 1){
      min_price = 30000; max_price = 70000;
    }else if(price == 2){
      min_price = 70000; max_price = 110000;
    }else if(price == 3){
      min_price = 110000; max_price = 150000;
    }else if(price == 4){
      min_price = 150000; max_price = 190000;
    }else if(price == 5){
      min_price = 190000; max_price = 230000;
    }else if(price == 6){
      min_price = 230000; max_price = 270000;
    }else if(price == 7){
      min_price = 270000; max_price = 310000;
    }else if(price == 8){
      min_price = 310000; max_price = 1000000000;
    }
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
    if(keyword != '' || property != '%' || joint_venture != '%' || searchParams != null || investment != null){
      if(keyword == '' || keyword == ' '){
        keyword = '';
      }
      $.ajax({
        url: 'scripts/properties.php',
        type: "POST",
        dataType:"json",
        data:{"action":'filtered_search',"property":property,"investment":investment,"joint_venture":joint_venture,"min_price":min_price,"max_price":max_price,"min_bmv":min_bmv,"max_bmv":max_bmv,
        "min_roi":min_roi,"max_roi":max_roi,"min_roce":min_roce,"max_roce":max_roce,"min_yield":min_yield,"max_yield":max_yield,"min_land":min_land,"max_land":max_land,
        "min_sourcing":min_sourcing,"max_sourcing":max_sourcing,"min_rpm":min_rpm,"max_rpm":max_rpm,"keyword":keyword,"sort":sort, "offset": 0},
        success: function(data){        
          document.getElementById("search_area").innerHTML = data.ui;
          localStorage.setItem('offset', 0);              
          localStorage.setItem('page', 1);               
          document.getElementById('page_number').style.visibility = "visible";               
          document.getElementById('previous_page').style.visibility = "hidden";
          document.getElementById('page_number').innerHTML = 'Page '+localStorage.getItem('page')+' - '+data.max+' properties found in total';
          document.getElementById('page_number2').innerHTML = 'Page '+localStorage.getItem('page');
          $offset = localStorage.getItem('offset');              
          if($offset < (data.max - 7)){
            document.getElementById('next_page').style.visibility = "visible";  
          }else{
            document.getElementById('next_page').style.visibility = "hidden";
          }
          if(data.ui == '<p>No properties found</p>'){
            document.getElementById('page_number2').style.visibility = "hidden";
          }else{
            document.getElementById('page_number2').style.visibility = "visible";
          }
          window.localStorage.setItem("searchParams",null); 
        }
      });
    }
  });
document.getElementById("search_properties").addEventListener('click',function ()
{
  property = document.getElementById('propertyVar').value;
  investment = document.getElementById('investmentVar').value;
  joint_venture = document.getElementById('joint_venture').value;
  price = document.getElementById('price').value;
  if(price == '%'){
    min_price = 0; max_price = 1000000000;
  }else if(price == 1){
    min_price = 30000; max_price = 70000;
  }else if(price == 2){
    min_price = 70000; max_price = 110000;
  }else if(price == 3){
    min_price = 110000; max_price = 150000;
  }else if(price == 4){
    min_price = 150000; max_price = 190000;
  }else if(price == 5){
    min_price = 190000; max_price = 230000;
  }else if(price == 6){
    min_price = 230000; max_price = 270000;
  }else if(price == 7){
    min_price = 270000; max_price = 310000;
  }else if(price == 8){
    min_price = 310000; max_price = 1000000000;
  }
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
  $.ajax({
    url: 'scripts/properties.php',
    type: "POST",
    dataType:"json",
    data:{"action":'filtered_search',"property":property,"investment":investment,"joint_venture":joint_venture,"min_price":min_price,"max_price":max_price,"min_bmv":min_bmv,"max_bmv":max_bmv,
    "min_roi":min_roi,"max_roi":max_roi,"min_roce":min_roce,"max_roce":max_roce,"min_yield":min_yield,"max_yield":max_yield,"min_land":min_land,"max_land":max_land,
    "min_sourcing":min_sourcing,"max_sourcing":max_sourcing,"min_rpm":min_rpm,"max_rpm":max_rpm,"keyword":keyword,"sort":sort, "offset": 0},
    success: function(data){        
      document.getElementById("search_area").innerHTML = data.ui;
      localStorage.setItem('offset', 0);              
      localStorage.setItem('page', 1);               
      document.getElementById('page_number').style.visibility = "visible";               
      document.getElementById('previous_page').style.visibility = "hidden";
      document.getElementById('page_number').innerHTML = 'Page '+localStorage.getItem('page')+' - '+data.max+' properties found in total';
      document.getElementById('page_number2').innerHTML = 'Page '+localStorage.getItem('page');
      $offset = localStorage.getItem('offset');              
      if($offset < (data.max - 7)){
        document.getElementById('next_page').style.visibility = "visible";  
      }else{
        document.getElementById('next_page').style.visibility = "hidden";
      }
      if(data.ui == '<p>No properties found</p>'){
        document.getElementById('page_number2').style.visibility = "hidden";
      }else{
        document.getElementById('page_number2').style.visibility = "visible";
      }
    }
  });
});
document.getElementById("next_page").addEventListener('click',function ()
{
  property = document.getElementById('propertyVar').value;
  investment = document.getElementById('investmentVar').value;
  joint_venture = document.getElementById('joint_venture').value;
  price = document.getElementById('price').value;
  if(price == '%'){
    min_price = 0; max_price = 1000000000;
  }else if(price == 1){
    min_price = 30000; max_price = 70000;
  }else if(price == 2){
    min_price = 70000; max_price = 110000;
  }else if(price == 3){
    min_price = 110000; max_price = 150000;
  }else if(price == 4){
    min_price = 150000; max_price = 190000;
  }else if(price == 5){
    min_price = 190000; max_price = 230000;
  }else if(price == 6){
    min_price = 230000; max_price = 270000;
  }else if(price == 7){
    min_price = 270000; max_price = 310000;
  }else if(price == 8){
    min_price = 310000; max_price = 1000000000;
  }
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
  offset = +localStorage.getItem('offset') + 8;
  if(keyword == '' || keyword == ' '){
    keyword = '';
  }
  $.ajax({
    url: 'scripts/properties.php',
    type: "POST",
    dataType:"json",
    data:{"action":'filtered_search',"property":property,"investment":investment,"joint_venture":joint_venture,"min_price":min_price,"max_price":max_price,"min_bmv":min_bmv,"max_bmv":max_bmv,
    "min_roi":min_roi,"max_roi":max_roi,"min_roce":min_roce,"max_roce":max_roce,"min_yield":min_yield,"max_yield":max_yield,"min_land":min_land,"max_land":max_land,
    "min_sourcing":min_sourcing,"max_sourcing":max_sourcing,"min_rpm":min_rpm,"max_rpm":max_rpm,"keyword":keyword,"sort":sort, "offset":offset},
    success: function(data){        
      document.getElementById("search_area").innerHTML = data.ui;
      localStorage.setItem('offset', +localStorage.getItem('offset') + 8);              
      localStorage.setItem('page', +localStorage.getItem('page') + 1);
      document.getElementById('page_number').style.visibility = "visible";
      document.getElementById('page_number').innerHTML = 'Page '+localStorage.getItem('page')+' - '+data.max+' properties found in total';
      document.getElementById('page_number2').innerHTML = 'Page '+localStorage.getItem('page');              
      document.getElementById('previous_page').style.visibility = "visible";
      $offset = localStorage.getItem('offset');              
      if($offset < (data.max - 7)){
        document.getElementById('next_page').style.visibility = "visible";
      }else{
        document.getElementById('next_page').style.visibility = "hidden";
      }
      if(data.ui == '<p>No properties found</p>'){
        document.getElementById('page_number2').style.visibility = "hidden";
      }else{
        document.getElementById('page_number2').style.visibility = "visible";
      }
    }
  });
});
document.getElementById("previous_page").addEventListener('click',function ()
{
  property = document.getElementById('propertyVar').value;
  investment = document.getElementById('investmentVar').value;
  joint_venture = document.getElementById('joint_venture').value;
  price = document.getElementById('price').value;
  if(price == 1){
    min_price = 0; max_price = 1000000000;
  }else if(price == 2){
    min_price = 30000; max_price = 70000;
  }else if(price == 3){
    min_price = 70000; max_price = 110000;
  }else if(price == 3){
    min_price = 110000; max_price = 150000;
  }else if(price == 3){
    min_price = 150000; max_price = 190000;
  }else if(price == 3){
    min_price = 190000; max_price = 230000;
  }else if(price == 3){
    min_price = 230000; max_price = 270000;
  }else if(price == 3){
    min_price = 270000; max_price = 310000;
  }else if(price == 3){
    min_price = 310000; max_price = 1000000000;
  }
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
  offset = +localStorage.getItem('offset') - 8;
  if(keyword == '' || keyword == ' '){
    keyword = '';
  }
  $.ajax({
    url: 'scripts/properties.php',
    type: "POST",
    dataType:"json",
    data:{"action":'filtered_search',"property":property,"investment":investment,"joint_venture":joint_venture,"min_price":min_price,"max_price":max_price,"min_bmv":min_bmv,"max_bmv":max_bmv,
    "min_roi":min_roi,"max_roi":max_roi,"min_roce":min_roce,"max_roce":max_roce,"min_yield":min_yield,"max_yield":max_yield,"min_land":min_land,"max_land":max_land,
    "min_sourcing":min_sourcing,"max_sourcing":max_sourcing,"min_rpm":min_rpm,"max_rpm":max_rpm,"keyword":keyword,"sort":sort, "offset":offset},
    success: function(data){        
      document.getElementById("search_area").innerHTML = data.ui;
      localStorage.setItem('offset', +localStorage.getItem('offset') - 8);             
      localStorage.setItem('page', +localStorage.getItem('page') - 1);
      document.getElementById('page_number').style.visibility = "visible";
      document.getElementById('page_number').innerHTML = 'Page '+localStorage.getItem('page')+' - '+data.max+' properties found in total';
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
      if(data.ui == '<p>No properties found</p>'){
        document.getElementById('page_number2').style.visibility = "hidden";
      }else{
        document.getElementById('page_number2').style.visibility = "visible";
      }
    }
  });
});
}
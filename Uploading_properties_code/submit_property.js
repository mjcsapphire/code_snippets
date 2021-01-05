(function() {
  var submit_property = document.getElementById('submit_property');
  if (submit_property !== null) {
    var id = document.getElementById('theid').value; 
    var myDropzone1 = new Dropzone("div#dropzone1", { 
      url: "scripts/property_image_upload.php?id="+id+"&number=1",
      addRemoveLinks: true,
      maxFiles: 1,
      acceptedFiles: ".jpg,.jpeg,.png",
      removedfile: function(file) {
        var name = file.name; 
        $.ajax({
          type: 'POST',
          url: 'scripts/property_image_upload.php?id='+id,
          data: {name: name,request: 2},
          sucess: function(data){
            console.log('success: ' + data);
          }
        });
        var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
      }
    });
    myDropzone1.on("maxfilesexceeded", function(file)
    {
      this.removeFile(file);
    });
    var myDropzone2 = new Dropzone("div#dropzone2", { 
      url: "scripts/property_image_upload.php?id="+id+"&number=2",
      addRemoveLinks: true,
      maxFiles: 1,
      acceptedFiles: ".jpg,.jpeg,.png",
      removedfile: function(file) {
        var name = file.name; 
        $.ajax({
          type: 'POST',
          url: 'scripts/property_image_upload.php?id='+id,
          data: {name: name,request: 2},
          sucess: function(data){
            console.log('success: ' + data);
          }
        });
        var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
      }
    });
    myDropzone2.on("maxfilesexceeded", function(file)
    {
      this.removeFile(file);
    });
    var myDropzone3 = new Dropzone("div#dropzone3", { 
      url: "scripts/property_image_upload.php?id="+id+"&number=3",
      addRemoveLinks: true,
      maxFiles: 1,
      acceptedFiles: ".jpg,.jpeg,.png",
      removedfile: function(file) {
        var name = file.name; 
        $.ajax({
          type: 'POST',
          url: 'scripts/property_image_upload.php?id='+id,
          data: {name: name,request: 2},
          sucess: function(data){
            console.log('success: ' + data);
          }
        });
        var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
      }
    });
    myDropzone3.on("maxfilesexceeded", function(file)
    {
      this.removeFile(file);
    });
    var myDropzone4 = new Dropzone("div#dropzone4", { 
      url: "scripts/property_image_upload.php?id="+id+"&number=4",
      addRemoveLinks: true,
      maxFiles: 1,
      acceptedFiles: ".jpg,.jpeg,.png",
      removedfile: function(file) {
        var name = file.name; 
        $.ajax({
          type: 'POST',
          url: 'scripts/property_image_upload.php?id='+id,
          data: {name: name,request: 2},
          sucess: function(data){
            console.log('success: ' + data);
          }
        });
        var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
      }
    });
    myDropzone4.on("maxfilesexceeded", function(file)
    {
      this.removeFile(file);
    });
    var myDropzone5 = new Dropzone("div#dropzone5", { 
      url: "scripts/property_image_upload.php?id="+id+"&number=5",
      addRemoveLinks: true,
      maxFiles: 1,
      acceptedFiles: ".jpg,.jpeg,.png",
      removedfile: function(file) {
        var name = file.name; 
        $.ajax({
          type: 'POST',
          url: 'scripts/property_image_upload.php?id='+id,
          data: {name: name,request: 2},
          sucess: function(data){
            console.log('success: ' + data);
          }
        });
        var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
      }
    });
    myDropzone5.on("maxfilesexceeded", function(file)
    {
      this.removeFile(file);
    });
    var myDropzone6 = new Dropzone("div#dropzone6", { 
      url: "scripts/property_image_upload.php?id="+id+"&number=6",
      addRemoveLinks: true,
      maxFiles: 1,
      acceptedFiles: ".jpg,.jpeg,.png",
      removedfile: function(file) {
        var name = file.name; 
        $.ajax({
          type: 'POST',
          url: 'scripts/property_image_upload.php?id='+id,
          data: {name: name,request: 2},
          sucess: function(data){
            console.log('success: ' + data);
          }
        });
        var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
      }
    });
    myDropzone6.on("maxfilesexceeded", function(file)
    {
      this.removeFile(file);
    });
    var myDropzone7 = new Dropzone("div#dropzone7", { 
      url: "scripts/property_image_upload.php?id="+id+"&number=7",
      addRemoveLinks: true,
      maxFiles: 1,
      acceptedFiles: ".jpg,.jpeg,.png,.pdf",
      removedfile: function(file) {
        var name = file.name; 
        $.ajax({
          type: 'POST',
          url: 'scripts/property_image_upload.php?id='+id,
          data: {name: name,request: 2},
          sucess: function(data){
            console.log('success: ' + data);
          }
        });
        var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
      }
    });
    myDropzone7.on("maxfilesexceeded", function(file)
    {
      this.removeFile(file);
    });
    var myDropzone8 = new Dropzone("div#dropzone8", { 
      url: "scripts/property_image_upload.php?id="+id+"&number=8",
      addRemoveLinks: true,
      maxFiles: 1,
      acceptedFiles: ".pdf",
      removedfile: function(file) {
        var name = file.name; 
        $.ajax({
          type: 'POST',
          url: 'scripts/property_image_upload.php?id='+id,
          data: {name: name,request: 2},
          sucess: function(data){
            console.log('success: ' + data);
          }
        });
        var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
      }
    });
    myDropzone8.on("maxfilesexceeded", function(file)
    {
      this.removeFile(file);
    });
    submit_property.addEventListener('click', function () {
      var id = document.getElementById('theid').value; 
      var title = document.getElementById("property_title").value.replace(/[&\/\\#,+()$~%'":*?<>{}]/g, '');      
      var property_type = document.getElementById("property_type").value;            
      var investment_type = document.getElementById("property_investment_type").value;  
      var joint_venture = document.getElementById("joint_venture").value; 
      var property_details = document.getElementById("property_details").value.replace(/[\$~%'"<>{}]/g, ''); 
      var address1 = document.getElementById("property_address1").value.replace(/[&\/\\#,+()$~%'":*?<>{}]/g, '');  
      var address2 = document.getElementById("property_address2").value.replace(/[&\/\\#,+()$~%'":*?<>{}]/g, '');  
      var address3 = document.getElementById("property_address3").value.replace(/[&\/\\#,+()$~%'":*?<>{}]/g, '');  
      var city = document.getElementById("property_city").value.replace(/[&\/\\#,+()$~%'":*?<>{}]/g, '');  
      var county = document.getElementById("property_county").value.replace(/[&\/\\#,+()$~%'":*?<>{}]/g, '');  
      var postcode = document.getElementById("property_postcode").value.replace(/[&\/\\#,+()$~%'":*?<>{}]/g, ''); 
      var location_info = document.getElementById("property_location_info").value.replace(/[\$~%'"<>{}]/g, ''); 
      var price = document.getElementById("property_price").value.replace(/[&\/\\#,+()$~%'":£*?<>{}]/g, ''); 
      var rental_yield = document.getElementById("property_yield").value.replace(/[&\/\\#,+()$~%'£":*?<>{}]/g, ''); 
      var roi = document.getElementById("property_roi").value.replace(/[&\/\\#,+()$~%'":*?£<>{}]/g, ''); 
      var roce = document.getElementById("property_roce").value.replace(/[&\/\\#,+()$~%'":£*?<>{}]/g, ''); 
      var sourcing_fee = document.getElementById("property_sourcing_fee").value.replace(/[&\/\\#,+()$~%'£":*?<>{}]/g, ''); 
      var bmv_percentage = document.getElementById("property_bmv_percentage").value.replace(/[&\/\\#,+()$~%'":*?£<>{}]/g, ''); 
      var financial_info = document.getElementById("property_financial_info").value.replace(/[&\/\\#,+()$~%'":*?£<>{}]/g, ''); 
      var video = document.getElementById("property_video").value.replace(/[\$~%'"<>{}]/g, '');  
      var rent_per_month = document.getElementById("rent_per_month").value.replace(/[&\/\\#,+()$~%'":*?£<>{}]/g, ''); 
      var rent_to_landlord = document.getElementById("rent_to_landlord").value.replace(/[&\/\\#,+()$~%'":*?£<>{}]/g, ''); 
      if(investment_type == 2){
        property_type = 0;
      }
      if(title == ''){
        swal({   
          title: "Oops",   
          text: 'Please enter a title',   
          type: "warning",   
          showCancelButton: false,   
          confirmButtonColor: "#DD6B55",   
          confirmButtonText: "OK!",   
          closeOnConfirm: true 
        }, function(){   
        });
      }else if(property_details == ''){
        swal({   
          title: "Oops",   
          text: 'Please enter some property details',   
          type: "warning",   
          showCancelButton: false,   
          confirmButtonColor: "#DD6B55",   
          confirmButtonText: "OK!",   
          closeOnConfirm: true 
        }, function(){   
        });
      }else if(city == ''){
        swal({   
          title: "Oops",   
          text: 'Please enter a city',   
          type: "warning",   
          showCancelButton: false,   
          confirmButtonColor: "#DD6B55",   
          confirmButtonText: "OK!",   
          closeOnConfirm: true 
        }, function(){   
        });
      }else if(price == ''){
        swal({   
          title: "Oops",   
          text: 'Please enter a price',   
          type: "warning",   
          showCancelButton: false,   
          confirmButtonColor: "#DD6B55",   
          confirmButtonText: "OK!",   
          closeOnConfirm: true 
        }, function(){   
        });
      }else{
        $.ajax({
          url: 'scripts/property.php',
          type: 'POST',
          dataType: "json",
          data: { "id": id, "title": title, "property_type": property_type, "investment_type": investment_type,"property_details": property_details,
          "address1": address1,"address2": address2,"address3": address3, "city": city,"county": county,"postcode": postcode,"location_info": location_info,
          "price": price,"rental_yield": rental_yield,"roi": roi, "roce": roce,"bmv_percentage": bmv_percentage,"rent_per_month": rent_per_month,"rent_to_landlord": rent_to_landlord,"sourcing_fee": sourcing_fee,"financial_info": financial_info,
          "video": video,"action": 'submit_property'},
          success: function(data) {
            if(data.error == null){
              swal({   
                title: "Success",   
                text: 'Property successfully submitted for approval',   
                type: "success",
                timer: 2000,
                showConfirmButton: false
              }).then(() => {
                try { window.location("property?id="+data.id); } 
                catch(e) { window.location = "property?id="+data.id; }
              }); 
            }else{
              swal({   
                title: "Oops!",   
                text: data.error,   
                type: "warning",   
                showCancelButton: false,   
                confirmButtonColor: "#DD6B55",   
                confirmButtonText: "OK!",   
                closeOnConfirm: true 
              }, function(){   
              });
            }
          }     
        });
      }
    });
}
})();
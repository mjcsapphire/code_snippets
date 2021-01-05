(function() {
    var save_new_property = document.getElementById('save_new_property');
    if (save_new_property !== null) {
        save_new_property.addEventListener('click', function () {
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
            var rent_per_month = document.getElementById("rent_per_month").value.replace(/[&\/\\#,+()$~%'":*?£<>{}]/g, ''); 
            var rent_to_landlord = document.getElementById("rent_to_landlord").value.replace(/[&\/\\#,+()$~%'":*?£<>{}]/g, ''); 
            var financial_info = document.getElementById("property_financial_info").value.replace(/[&\/\\#,+()$~%'":*?£<>{}]/g, ''); 
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
                    data: { "title": title, "property_type": property_type, "investment_type": investment_type,"joint_venture": joint_venture,"property_details": property_details,
                    "address1": address1,"address2": address2,"address3": address3, "city": city,"county": county,"postcode": postcode,"location_info": location_info,
                    "price": price,"rental_yield": rental_yield,"roi": roi, "roce": roce,"bmv_percentage": bmv_percentage,"rent_per_month": rent_per_month,"rent_to_landlord": rent_to_landlord,"sourcing_fee": sourcing_fee,"financial_info": financial_info,
                    "action": 'save_new_property'},
                    success: function(data) {
                        if(data.error == null){
                            swal({   
                                title: "Success",   
                                text: 'Property successfully created and ready for submission',   
                                type: "success",
                                timer: 2000,
                                showConfirmButton: false
                            }).then(() => {
                                try { window.location("submit_property?id="+data.id); } 
                                catch(e) { window.location = "submit_property?id="+data.id; }
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
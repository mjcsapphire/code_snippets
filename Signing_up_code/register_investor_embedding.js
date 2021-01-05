
function validateEmail(email) 
{
  var re = /\S+@\S+\.\S+/;
  return re.test(email);
}

(function() {

  const pasteBox = document.getElementById("username2InvestorEmbedding");
  pasteBox.onpaste = e => {
    e.preventDefault();
    return false;
  };
  pasteBox.addEventListener('focus', function(){
    this.removeAttribute('readonly');

  });

  var investorEmbeddingButton = document.getElementById('investorEmbeddingButton');
  investorEmbeddingButton.addEventListener('click', function () {

    var firstname = document.getElementById("firstnameInvestorEmbedding").value.replace(/[&\/\\#,+()$~%.'":*?<>{}]/g, '');
    var surname = document.getElementById("surnameInvestorEmbedding").value.replace(/[&\/\\#,+()$~%.'":*?<>{}]/g, '');
    var email = document.getElementById("usernameInvestorEmbedding").value.replace(/[&\/\\#,+()$~%'":*?<>{}]/g, '');  
    var email2 = document.getElementById("username2InvestorEmbedding").value.replace(/[&\/\\#,+()$~%'":*?<>{}]/g, '');     
    var password = document.getElementById("passwordInvestorEmbedding").value;            
    var password2 = document.getElementById("passwordInvestor2Embedding").value;         
    var terms = document.getElementById("acknowledgementInvestorEmbedding").value;
    var s_i = document.getElementById("rad1").checked;
    var s_i2 = document.getElementById("rad2").checked;
    var h_n = document.getElementById("rad3").checked;
    var i_p = document.getElementById("rad4").checked;
    var p_i = document.getElementById("rad5").checked;
    var n_o = document.getElementById("rad6").checked;

    if(firstname == ''){
      swal({   
        title: "Oops",   
        text: 'Please enter a firstname',   
        type: "warning",   
        showCancelButton: false,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "OK!",   
        closeOnConfirm: true 
      }, function(){   

      });
    }else if(surname == ''){
      swal({   
        title: "Oops",   
        text: 'Please enter a surname',   
        type: "warning",   
        showCancelButton: false,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "OK!",   
        closeOnConfirm: true 
      }, function(){   

      });
    }else if(email == ''){
      swal({   
        title: "Oops",   
        text: 'Please enter an email',   
        type: "warning",   
        showCancelButton: false,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "OK!",   
        closeOnConfirm: true 
      }, function(){   

      });
    }else if(!validateEmail(email)){
      swal({   
        title: "Oops",   
        text: 'Please enter a valid email',   
        type: "warning",   
        showCancelButton: false,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "OK!",   
        closeOnConfirm: true 
      }, function(){   

      });

    }else if(email != email2){
      swal({   
        title: "Oops!",   
        text: 'Email addresses must match',   
        type: "warning",   
        showCancelButton: false,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "OK!",   
        closeOnConfirm: true 
      }, function(){   

      });

    }else if(password2 != password){
      swal({   
        title: "Oops!",   
        text: 'Passwords must match',   
        type: "warning",   
        showCancelButton: false,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "OK!",   
        closeOnConfirm: true 
      }, function(){   

      });

    }else if(s_i == false && s_i2 == false && h_n == false && i_p == false && p_i == false && n_o == false){
      swal({   
        title: "Oops!",   
        text: 'Please select an investor type',   
        type: "warning",   
        showCancelButton: false,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "OK!",   
        closeOnConfirm: true 
      }, function(){   

      });
    }
    else{
      var investor_type = 0;
      if(s_i == true){
        investor_type = document.getElementById("rad1").value;
      }else if(s_i2 == true){
        investor_type = document.getElementById("rad2").value;
      }else if(h_n == true){
        investor_type = document.getElementById("rad3").value;
      }else if(i_p == true){
        investor_type = document.getElementById("rad4").value;
      }else if(p_i == true){
        investor_type = document.getElementById("rad5").value;
      }else if(n_o == true){
        investor_type = document.getElementById("rad6").value;
      }
      $.ajax({
        url: 'scripts/subscription_embedding_investors.php',
        type: 'POST',
        dataType: "json",
        data: { "firstname": firstname, "surname": surname, "email": email, "password": password, "type":'Investor', "user_type":1, "action": 'embedding_subscription', "investor_type":investor_type},
        success: function(data) {
          if(data.error == null){
            try {
              window.location("dash");
            } catch (e) {
              window.location = "dash";
            }
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
})();


document.getElementById("passwordInvestorEmbedding").value = '';
var passwordInvestorEmbedding = document.getElementById("passwordInvestorEmbedding");

var helperTextEmbedding = {
  charLengthEmbedding: document.querySelector('.helper-textEmbedding .lengthEmbedding'),
  lowercaseEmbedding: document.querySelector('.helper-textEmbedding .lowercaseEmbedding'),
  uppercaseEmbedding: document.querySelector('.helper-textEmbedding .uppercaseEmbedding'),
  specialEmbedding: document.querySelector('.helper-textEmbedding .specialEmbedding')
};

var patternEmbedding = {
  charLength: function() {
    if( passwordInvestorEmbedding.value.length >= 8 ) {
      return true;
    }
  },
  lowercase: function() {
var regex = /^(?=.*[a-z]).+$/; // Lowercase character pattern

if( regex.test(passwordInvestorEmbedding.value) ) {
  return true;
}
},
uppercase: function() {
var regex = /^(?=.*[A-Z]).+$/; // Uppercase character pattern

if( regex.test(passwordInvestorEmbedding.value) ) {
  return true;
}
},
special: function() {
var regex = /^(?=.*[0-9_\W]).+$/; // Special character or number pattern

if( regex.test(passwordInvestorEmbedding.value) ) {
  return true;
}
}   
};

// Listen for keyup action on password field
passwordInvestorEmbedding.addEventListener('keyup', function (){


  document.getElementById('investorEmbeddingButton').style.visibility = "hidden";
  document.getElementById("acknowledgementInvestorEmbedding").checked = false;

// Check that password is a minimum of 8 characters
patternTest( patternEmbedding.charLength(), helperTextEmbedding.charLengthEmbedding );

// Check that password contains a lowercase letter      
patternTest( patternEmbedding.lowercase(), helperTextEmbedding.lowercaseEmbedding );

// Check that password contains an uppercase letter
patternTest( patternEmbedding.uppercase(), helperTextEmbedding.uppercaseEmbedding );

// Check that password contains a number or special character
patternTest( patternEmbedding.special(), helperTextEmbedding.specialEmbedding );

// Check that all requirements are fulfilled
if( hasClass(helperTextEmbedding.charLengthEmbedding, 'valid') &&
  hasClass(helperTextEmbedding.lowercaseEmbedding, 'valid') && 
  hasClass(helperTextEmbedding.uppercaseEmbedding, 'valid') && 
  hasClass(helperTextEmbedding.specialEmbedding, 'valid')
  ) {
  addClass(passwordInvestorEmbedding.parentElement, 'valid');
document.getElementById('passwordInvestor2Embedding').value = '';
document.getElementById('termsDivInvestorEmbedding').style.visibility = "visible";
}
else {
  removeClass(passwordInvestorEmbedding.parentElement, 'valid');
  document.getElementById('passwordInvestor2Embedding').value = '';
  document.getElementById('termsDivInvestorEmbedding').style.visibility = "hidden";
}
});

function patternTest(pattern, response) {
  if(pattern) {
    addClass(response, 'valid');
  }
  else {
    removeClass(response, 'valid');

  }
}

function addClass(el, className) {
  if (el.classList) {
    el.classList.add(className);
  }
  else {
    el.className += ' ' + className;
  }
}

function removeClass(el, className) {
  if (el.classList)
    el.classList.remove(className);
  else
    el.className = el.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
}

function hasClass(el, className) {
  if (el.classList) {
    return el.classList.contains(className);    
  }
  else {
    new RegExp('(^| )' + className + '( |$)', 'gi').test(el.className); 
  }
}


$(document).ready(function(){

  document.getElementById('investorEmbeddingButton').style.visibility = "hidden";  
  document.getElementById('termsDivInvestorEmbedding').style.visibility = "hidden";
});


var check = document.getElementById("acknowledgementInvestorEmbedding");
check.addEventListener( 'change', function() {
  if (check.checked == true){
    document.getElementById('investorEmbeddingButton').style.visibility = "visible";
  } else {
    document.getElementById('investorEmbeddingButton').style.visibility = "hidden";
  }
});


var popupRad1 = document.getElementById("popupRad1");
popupRad1.addEventListener( 'click', function() {
  swal({   
    title: "Certified Sophisticated Investor",   
    html: `<div style="text-align:left"><p>I declare that I have a current certificate in writing 
    or other legible form signed by an authorised person to the effect 
    that I am sufficiently knowledgeable to understand the risks associated with investing in unregulated financial products and activities.<br><br>
    I hereby state that I am able to receive promotions exempt from the restrictions on financial promotion in the Financial Services and Markets Act 2000. 
    The exemption relates to certified sophisticated investors and I declare that I qualify as such in relation to investments including (but not limited to) the following:<br><br>
    • Corporate bonds<br>
    • Loans<br>
    • Debentures<br><br>
    I accept that the contents of promotions and other material that I receive may not have been approved by an authorised person and that their 
    content may not therefore be subject to controls which would apply if the promotion were made or approved by an authorised person.<br><br>
    I am aware that it is open to me to seek advice from someone who specialises in advising on investments.<br><br>
    By signing up you agree that the above constitutes a true reflection of your status as a potential investor.</p></div>`,   
    type: "info",   
    showCancelButton: false,   
    confirmButtonColor: "#DD6B55",   
    confirmButtonText: "OK",   
    closeOnConfirm: true 
  }, function(){   

  });
});

var popupRad2 = document.getElementById("popupRad2");
popupRad2.addEventListener( 'click', function() {
  swal({   
    title: "Self-Certified Sophisticated Investor",   
    html: `<div style="text-align:left"><p>I declare that I am a self-certified sophisticated investor for the 
    purposes of the Financial Services and Markets Act (Financial Promotion) Order 2005. I understand that this means:<br><br>
    • I can receive financial promotions that may not have been approved by a person authorised by the Financial Services Authority;<br>
    • The content of such financial promotions may not conform to rules issued by the Financial Services Authority;<br>
    • By signing this statement I may lose significant rights;<br>
    • I may have no right to complain to either the FCA or the Financial Ombudsman Service and I may have no right to seek compensation from the FSCS<br><br>
    I am a self-certified sophisticated investor because at least one of the following applies:<br>
    • I am a member of a network or syndicate of business angels and have been so for at least the last six months prior to the date below;<br>
    • I have made more than one investment in an unlisted company in the two years prior to the date below;<br>
    • I am working, or have worked in the two years prior to the date below, in a professional capacity in the private equity sector, or in the provision of finance for small and medium enterprises;<br>
    • I am currently, or have been in the two years prior to the date below, a director of a company with an annual turnover of at least £l million.<br><br>
    I accept that there are risks associated with making investment decisions based on financial promotions. I am aware that it is open to me to seek advice from someone who specialises in 
    advising on investments.<br><br>
    By signing up you agree that the above constitutes a true reflection of your status as a potential investor.</p></div>`,   
    type: "info",   
    showCancelButton: false,   
    confirmButtonColor: "#DD6B55",   
    confirmButtonText: "OK",   
    closeOnConfirm: true 
  }, function(){   

  });
});

var popupRad3 = document.getElementById("popupRad3");
popupRad3.addEventListener( 'click', function() {
  swal({   
    title: "High Net Worth Individual",   
    html: `<div style="text-align:left"><p>I make this statement so that I can receive promotional communications, 
    which are exempt from the restrictions under the terms of The Financial Services and Markets Act 2000 (Financial Promotion) Order 2005. 
    The exemption relates to certified high net worth investors.<br><br>
    I declare that I qualify as such because at least one of the following two statements applies to me:<br>
    • I had, throughout the financial year immediately preceding today’s date, an annual income to the value of £100,000 or more<br>
    • I held, throughout the financial year immediately preceding today’s date, net assets to the value of £250,000 or more.<br><br>
    Net assets for these purposes do not include:<br>
    • the property which is my primary residence or any money raised through a loan secured on that property;<br>
    • any rights of mine under a qualifying contract of insurance; or<br>
    • any benefits (in the form of pensions or otherwise) which are payable on the termination of my service or on my death 
    or retirement and to which I am (or my dependents are), or may be, entitled.<br><br>
    I accept that the investments to which the promotions will relate may expose me to a significant risk of losing all of the money or other property invested. 
    I am aware that it is open to me to seek advice from an authorised person who specialises in advising on investments.<br><br>
    By signing up you agree that the above constitutes a true reflection of your status as a potential investor.</p></div>`,   
    type: "info",   
    showCancelButton: false,   
    confirmButtonColor: "#DD6B55",   
    confirmButtonText: "OK",   
    closeOnConfirm: true 
  }, function(){   

  });
});

var popupRad4 = document.getElementById("popupRad4");
popupRad4.addEventListener( 'click', function() {
  swal({   
    title: "Investment Professional / Professional Lender",   
    html: `<div style="text-align:left"><p>I make this statement so that I can receive promotional communications, 
    which are exempt from the restrictions under the terms of The Financial Services and Markets Act 2000 (Financial Promotion) Order 2005. 
    The exemption relates to investment professionals.<br><br>
    I declare that I qualify as such because at least one of the following two statements applies to me:<br>
    (a) I am a person authorised by the Financial Conduct Authority;<br>
    (b) I am a person —<br>
    (i) whose ordinary activities involve me in carrying on a business consisting wholly or to a significant extent of lending money; or<br>
    (ii) who it is reasonable to expect will carry on such activity for the purposes of a business carried on by me;<br>
    (c) I represent a government, local authority (whether in the United Kingdom or elsewhere) or an international organisation;<br>
    (d) I am a director, officer or employee of a person falling within any of sub-paragraphs (a) to (c) above, where my responsibilities 
    whilst acting in that capacity involve me in the carrying on by that person of controlled financial activities.<br><br>
    By signing up you agree that the above constitutes a true reflection of your status as a potential investor.</p></div>`,   
    type: "info",   
    showCancelButton: false,   
    confirmButtonColor: "#DD6B55",   
    confirmButtonText: "OK",   
    closeOnConfirm: true 
  }, function(){   

  });
});

var popupRad5 = document.getElementById("popupRad5");
popupRad5.addEventListener( 'click', function() {
  swal({   
    title: "Property investor",   
    html: `<div style="text-align:left"><p>I am only interested in everyday property investment opportunities.<br><br>
    I make this statement so that I can receive promotional communications, which are exempt from the restrictions under 
    the terms of The Financial Services and Markets Act 2000 (Financial Promotion) Order 2005.<br><br>

    I accept that the investments to which the promotions will relate may expose me to a significant risk of losing all of the money or other property invested. 
    I am aware that it is open to me to seek advice from an authorised person who specialises in advising on investments.<br><br>
    By signing up you agree that the above constitutes a true reflection of your status as a potential investor.</p></div>`,   
    type: "info",   
    showCancelButton: false,   
    confirmButtonColor: "#DD6B55",   
    confirmButtonText: "OK",   
    closeOnConfirm: true 
  }, function(){   

  });
});


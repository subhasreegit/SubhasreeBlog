function validation() { 
    var letters = /^[A-Za-z]+$/;
    var number = /^[0-9]{10}$/;
    var email = /^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,5})([\.a-z]{2,5})?$/;
    
    var fname = document.getElementById("FirstName").value;
    var lname = document.getElementById("LastName").value;
    var phonenumber = document.getElementById("PhoneNumber").value;
    var emailaddress = document.getElementById("Email").value;
    
    if(!fname.match(letters))
    {
      alert('Please input alphabet characters only in first name');
    }
    else if(!lname.match(letters))
    {
      alert('Please input alphabet characters only in the last name');
    }
    else if(!phonenumber.match(number))
    {
      alert('Please input valid phone number');
    }
    else if(!emailaddress.match(email))
    {
      alert('Please input valid email address');
    }
    else {
      return true;
    }
    
  }

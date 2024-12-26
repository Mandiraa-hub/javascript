function validation()
{
    var name = document.getElementById("name").value;
    var password = document.getElementById("password").value;
    var cpassword = document.getElementById("cpassword").value;
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email").value;
    var month = document.getElementById("month").value;
    var year = document.getElementById("year").value;
    var day = document.getElementById("day").value;
    var country = document.getElementById("country").value;
    //var faculty = document.getElementById("faculty").value;
    //var gender = document.getElementById("gender").value;
    var message='';


    //Name Validation
    if(name.trim() == "")
    {
        document.getElementById("name").style.borderColor = "red";
        document.getElementById("name").focus();
       // document.getElementById('er_username').innerText = "Name is required";
        return false;
    }
    else{
    if (name.length < 8)
    {
        
       message += "Name must be 8 characters\n";
         document.getElementById("name").style.borderColor = "red";
         document.getElementById("name").focus();
         return false;
    }
    else{
        document.getElementById("name").style.borderColor = "green";
        message += "Name is " + name + "\n";
    }
    }

//Password Validation
if(password.trim() == "")
{
    message += "Password is required\n";
    document.getElementById("password").style.borderColor = "red";
    document.getElementById("password").focus();
    return false;
}
else{
    if(password.length < 8)
    {
        message += "Password must be 8 characters\n";
        document.getElementById("password").style.borderColor = "red";
        document.getElementById("password").focus();
        return false;
    }
    else{
        document.getElementById("password").style.borderColor = "green";
        message += "Password is " + password + "\n";
    }
}

//Confirm Password Validation
if(cpassword.trim() == "")
{
    message += "Confirm Password is required\n";
    document.getElementById("cpassword").style.borderColor = "red";
    document.getElementById("cpassword").focus();
    return false;
}
if(password != cpassword)
{
    message += "Password and Confirm Password must be same\n";
    document.getElementById("cpassword").style.borderColor = "red";
    document.getElementById("cpassword").focus();
    return false;
}
//Phone Validation
if(phone.trim() == "")
{
    alert("Phone is required");
    document.getElementById("phone").style.borderColor = "red";
    document.getElementById("phone").focus();
    return false;
}
else{
    if(phone.length < 10)
    {
        message += "Phone must be 10 digits\n";
        document.getElementById("phone").style.borderColor = "red";
        document.getElementById("phone").focus();
        return false;
    }
    else{
        document.getElementById("phone").style.borderColor = "green";
        message += "Phone is " + phone + "\n";
    }
}
//Email Validation
var emailpattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
if(email.trim() == "")
{
    message += "Email is required\n";
    document.getElementById("email").style.borderColor = "red";
    document.getElementById("email").focus();
    return false;
}
else{
    if(!emailpattern.test(email))
    {
        message += "Email must be valid\n";
        document.getElementById("email").style.borderColor = "red";
        document.getElementById("email").focus();
        return false;
    }
    else{
        document.getElementById("email").style.borderColor = "green";
        message += "Email is " + email + "\n";
    }
}

//Date of Birth Validation
var yearpattern = /^[0-9]{4}$/;
var monthDaypattern = /^[0-9]{2}$/;
    if(year.trim() == "" || month.trim() == "" || day.trim() == "")
    {
        message += "Full DOB is required\n";
        document.getElementById("year").style.borderColor = "red";
        document.getElementById("year").focus();
        return false;
    }
    else if(!yearpattern.test(year))
    {
        message += "Year must be 4 digits\n";
        document.getElementById("year").style.borderColor = "red";
        document.getElementById("year").focus();
        return false;
    }

    else if(!monthDaypattern.test(month))
    {
        message += "Month must be 2 digits\n";
        document.getElementById("month").style.borderColor = "red";
        document.getElementById("month").focus();
        return false;
    }
    else if(!monthDaypattern.test(day))
    {
        message += "Day must be 2 digits\n";
        document.getElementById("day").style.borderColor = "red";
        document.getElementById("day").focus();
        return false;
    }
    else{
        document.getElementById("year").style.borderColor = "green";
        document.getElementById("month").style.borderColor = "green";
        document.getElementById("day").style.borderColor = "green";
        message += "DOB is " + year + "-" + month + "-" + day + "\n";
    }
//Country Validation
if(document.getElementById("country").selectedIndex ==0)
{
  message += "Country is required\n";
    document.getElementById("country").focus();
    return false;
    }
    else{
        document.getElementById("country").style.borderColor = "green";
        message += "Country is " + country + "\n";
    }
console.log(document.form.gender[0]);
// //gender Validation
if(document.form.gender[0].checked == false && 
    document.form.gender[1].checked == false && document.form.gender[2].checked == false) 
{
    message +="Gender is required\n";
    return false;

}
else{
    message += "Gender is " + gender + "\n";
}

// //Terms validation
if(document.form.terms.checked == false)
{
    message += "Terms and Conditions is required\n";
    return false;
}

document.write(message);

}
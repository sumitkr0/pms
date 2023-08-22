
function validation() {
    let name = document.getElementById('username').value;
    let email = document.getElementById('useremail').value;
    let password = document.getElementById('userpswrd').value;
    let male = document.getElementById('male').checked;
    let female = document.getElementById('female').checked;
    // user name 
    if (name != "") {
        document.getElementById('username').style.border = "1px solid green";
        document.getElementById('usererr').innerHTML = "";
    }
    else {
        document.getElementById('usererr').innerHTML = "Required field";
        document.getElementById('username').style.border = "1px solid red";
        return false;
    }
    //  user email
    if (email != "") {
        document.getElementById('useremail').style.border = "1px solid green";
        document.getElementById('emailerr').innerHTML = "";
    }
    else {
        document.getElementById('emailerr').innerHTML = "Required field";
        document.getElementById('useremail').style.border = "1px solid red";
        return false;
    }
    // user password
    if (password != "") {
        document.getElementById('userpswrd').style.border = "1px solid green";
        document.getElementById('pswrderr').innerHTML = "";
    }
    else {
        document.getElementById('pswrderr').innerHTML = "Required field";
        document.getElementById('userpswrd').style.border = "1px solid red";
        return false; 
    }
    // user gender
    if (!male && !female) {
        document.getElementById('err_gender').innerHTML = "Please select gender";
        return false; 
    }
    else{
        document.getElementById('err_gender').innerHTML = "";
    }
    
}



function validateForm(){
    let usernameCtrl = document.UserFrm.username;
    let phoneCtrl = document.UserFrm.phone;
    let error=0;

    if(usernameCtrl.value.trim() == ''){
        usernameCtrl.focus();
        usernameCtrl.style.border ='1px solid red';
        document.getElementById('er_username').innerText = 'Username is required';
        error++;
    }
    if(phoneCtrl.value.trim() == ''){
        phoneCtrl.focus();
        phoneCtrl.style.border ='1px solid red';
        document.getElementById('er_phone').innerText = 'Phone is required';
        error++;
    }
}
var password = document.getElementById("password")
    , password_confirm = document.getElementById("password_confirm");

function validatePassword(){
    if(password.value != password_confirm.value) {
        password_confirm.setCustomValidity("Passwords Don't Match");
    } else {
        password_confirm.setCustomValidity('');
    }
}

password.onchange = validatePassword;
password_confirm.onkeyup = validatePassword;

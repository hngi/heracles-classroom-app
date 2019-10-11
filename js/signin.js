function formValidation() {
  var email = document.getElementById('email');
  var password = document.getElementById('password');

  var emailLen = email.value.length;
  var passwordLen = password.value.length;
  
  if (emailLen == 0 || atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= emailLen) {
    alert("Please enter a valid email address");
  email.focus();
  return false;
} 
          else if (passwordLen < 5) {
            alert("Password should be at least 5 charcaters long");
            password.focus();
            return false;
          }
  else {
    return true;
  }
}

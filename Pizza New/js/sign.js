function formValidation() {
  var fname = document.getElementsByName("fname");
  var lname = document.getElementsByName("lname");
  var id = document.getElementsByName("email").value;
  var pass = document.getElementsByName("password");
  var cpass = document.getElementsByName("cpass");

  var regX = /^([a-z 0-9\.-]+)@([a-z0-9-]+).([a-z{2,8}])(.[a-z]{2,8})?$/;
  if (regX.test(id)) {
    document.getElementsByName("email").innerHTML = "valid";
    document.getElementsByName("email").style.visibility = "visible";
    document.getElementsByName("email").style.color = "green";
  } else {
    document.getElementsByName("email").innerHTML = "invalid";
    document.getElementsByName("email").style.visibility = "visible";
    document.getElementsByName("email").style.color = "red";
    alert("Enter correct email id");
  }

  if (fname.value == "" || lname.value == "") {
    alert("The firstname and lastname must be filled");
    return false;
  }

  if (id.value == "") {
    alert("Email should not be blank!");
    return false;
  }

  if (pass.value == "") {
    alert("The Password field should not be blank!");
    return false;
  }

  if (cpass.value == "") {
    alert("The  Confirm Password field should not be blank!");
    return false;
  }

  if (cpass.value !== pass.value) {
    alert("The password entered and confirm password does not match! ");
  }
}

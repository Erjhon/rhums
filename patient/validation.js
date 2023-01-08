
var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('cpassword').value) {
    document.getElementById('cpw').innerHTML = '<p class="text-success"><b>Password matched</p>';
} else {
  document.getElementById('cpw').innerHTML = '<p class="text-danger"><b>Password not matched</p>';
}
}

function validation(){

  var firstname = document.getElementById('firstname').value;
  var middleInitial = document.getElementById('middleInitial').value;
  var lastname = document.getElementById('lastname').value;
  var username = document.getElementById('username').value;
  var email = document.getElementById('email').value;
  var contact = document.getElementById('contact').value;
  var gender = document.getElementById('gender').value;
  var dob = document.getElementById('dob').value;
  var address = document.getElementById('address').value;
  var password = document.getElementById('password').value;
  var cpassword = document.getElementById('cpassword').value;

  if(firstname == ""){
    document.getElementById('fn').innerHTML ="<b> ** Please fill the firstname field.";
  }
  if(middleInitial == ""){
    document.getElementById('mI').innerHTML ="<b> ** Please fill the middle initial field."; 
  }
  if(lastname == ""){
    document.getElementById('ln').innerHTML ="<b> ** Please fill the lastname field.";
  }

  if((username.length <= 4) || (username.length > 20)) {
    document.getElementById('un').innerHTML ="<b> ** Username length must be between 5 and 20.";
  }
  if(!isNaN(username)){
    document.getElementById('un').innerHTML ="<b> ** A combination of letters and numbers are only allowed.";
  }
  if(username == ""){
    document.getElementById('un').innerHTML ="<b> ** Please fill the username field.";
  }
  if (email.indexOf('@') <= 0) {
    document.getElementById("em").innerHTML = "<b> ** Email id not valid, @ position is wrong"; 
  }
  if ((email.charAt(email.length-4)!='.') && (email.charAt(email.length-3)!='.')) {
    document.getElementById("em").innerHTML = "<b> ** Email id not valid, . position is wrong"; 
  }
  if (email == "") {
    document.getElementById("em").innerHTML = "<b> ** Please fill the email address field.";
  }
  if(contact=="/(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})/"){
    document.getElementById('cn').innerHTML ="<b> ** Mobile Number must be valid.";
  }
  if(contact.length!=11){
    document.getElementById('cn').innerHTML ="<b> ** Mobile Number must be consist of 11 digits only.";
  }
  if(contact == ""){
    document.getElementById('cn').innerHTML ="<b> ** Please fill the contact number field.";
  }
  if(gender == ""){
    document.getElementById('g').innerHTML ="<b> ** Please select in gender field.";
  }
  if(dob == ""){
    document.getElementById('db').innerHTML ="<b> ** Please fill the date of birth field.";
  }
  if(address == ""){
    document.getElementById('ad').innerHTML ="<b> ** Please select in the address field."; 
  }
  else if(!isNaN(address)){
    document.getElementById('ad').innerHTML ="<b> ** Only characters are allowed.";

  }
  if(password == "") {  
    document.getElementById("pw").innerHTML = "<b>**Fill the password field!";
  } if(cpassword == "") {  
    document.getElementById("cpw").innerHTML = '<b>**Fill the confirm password field!';  
    return false;  
  } if(password != cpassword) {  
    document.getElementById("cpw").innerHTML = '<b>**Confirm password not matched!';  
    return false;  
  }  
//minimum password length validation  
  if(password.length < 5) {  
    document.getElementById("pw").innerHTML = "<b>**Password length must be atleast 5 characters and up";  
    return false;  
  }  
//maximum length of password validation  
  if(password.length > 15) {  
    document.getElementById("pw").innerHTML = "<b>**Password length must not exceed 15 characters";  
    return false;  
  } else {  
    if(firstname == ""){
      document.getElementById('fn').innerHTML ="<b>** Please fill the firstname field.";
      return false;
    } if(middleInitial == ""){
      document.getElementById('mI').innerHTML ="<b> ** Please fill the middle initial field."; 
      return false;
    }if(lastname == ""){
      document.getElementById('ln').innerHTML ="<b> ** Please fill the lastname field."; 
      return false;
    }
    if((username.length <= 4) || (username.length > 20)) {
      document.getElementById('un').innerHTML ="<b> ** Username length must be between 5 and 20."; 
      return false;
    }
    if(!isNaN(username)){
      document.getElementById('un').innerHTML ="<b> ** A combination of letters and numbers are only allowed."; 
      return false;
    }
    if(username == ""){
      document.getElementById('un').innerHTML ="<b> ** Please fill the username field."; 
      return false;
    }
    if (email.indexOf('@') <= 0) {
      document.getElementById("em").innerHTML = "<b> ** Email id not valid, @ position is wrong";  
      return false;
    }
    if ((email.charAt(email.length-4)!='.') && (email.charAt(email.length-3)!='.')) {
      document.getElementById("em").innerHTML = "<b> ** Email id not valid, . position is wrong";  
      return false;
    }
    if (email == "") {
      document.getElementById("em").innerHTML = "<b> ** Please fill the email address field."; 
      return false;
    }if(contact=="/(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})/"){
      document.getElementById('cn').innerHTML ="<b> ** Mobile Number must be valid."; 
      return false;
    }
    if(contact.length!=11){
      document.getElementById('cn').innerHTML ="<b> ** Mobile Number must be consist of 11 digits only."; 
      return false;
    }
    if(contact == ""){
      document.getElementById('cn').innerHTML ="<b> ** Please fill the contact number field."; 
      return false;
    }
    if(gender == ""){
      document.getElementById('g').innerHTML ="<b> ** Please select in gender field."; 
      return false;
    }
    if(dob == ""){
      document.getElementById('db').innerHTML ="<b> ** Please fill the date of birth field."; 
      return false;
    }
    if(address == ""){
      document.getElementById('ad').innerHTML ="<b> ** Please select in the address field.";  
      return false;
    }
    else if(!isNaN(address)){
      document.getElementById('ad').innerHTML ="<b> ** Only characters are allowed."; 
      return false;
    }
  }
}

function validate(id){
  var input_id = document.getElementById(''+id).value;

  if(id == 'firstname' ){
    if(input_id == ""){
      document.getElementById('fn').innerHTML ="<b>** Please fill the firstname field."; 
    }else {
      document.getElementById('fn').innerHTML = ""; 
    }
  }
  else if(id == 'middleInitial'){
    if(middleInitial == ""){
      document.getElementById('mI').innerHTML ="<b> ** Please fill the middle initial field.";
    }else {
      document.getElementById('mI').innerHTML = "";
    }
  }
  else if(id == 'lastname'){
    if(lastname == ""){
      document.getElementById('ln').innerHTML ="<b> ** Please fill the lastname field.";
    }else {
      document.getElementById('ln').innerHTML = "";
    }
  }
  else if(id == 'username'){
    if(username == ""){
      document.getElementById('un').innerHTML ="<b> ** Please fill the username field.";
    }else {
      document.getElementById('un').innerHTML = "";
    }
  }
  else if(id == 'email'){
    if(email == ""){
      document.getElementById('em').innerHTML ="<b> ** Please fill the email address field.";
    }else {
      document.getElementById('em').innerHTML = "";
    }
  }
  else if(id == 'email'){
    if(email == ""){
      document.getElementById('em').innerHTML ="<b> ** Please fill the email address field.";
    }else {
      document.getElementById('em').innerHTML = "";
    }
  }
  else if(id == 'email'){
    if(email == ""){
      document.getElementById('em').innerHTML ="<b> ** Please fill the email address field.";
    }else {
      document.getElementById('em').innerHTML = "";
    }
  }
  else if(id == 'contact'){
    if(contact == ""){
      document.getElementById('cn').innerHTML ="<b> ** Please fill the contact number field.";
    }else {
      document.getElementById('cn').innerHTML = "";
    }
  }
  else if(id == 'gender'){
    if(gender == ""){
      document.getElementById('g').innerHTML ="<b> ** Please fill the gender field.";
    }else {
      document.getElementById('g').innerHTML = "";
    }
  }
  else if(id == 'dob'){
    if(dob == ""){
      document.getElementById('db').innerHTML ="<b> ** Please fill the date of birth field.";
    }else {
      document.getElementById('db').innerHTML = "";
    }
  }
  else if(id == 'address'){
    if(address == ""){
      document.getElementById('ad').innerHTML ="<b> ** Please fill the address field.";
    }else {
      document.getElementById('ad').innerHTML = "";
    }
  }
  else if(id == 'password'){
    if(password == ""){
      document.getElementById('pw').innerHTML ="<b> ** Please fill the password field.";
    }else {
      document.getElementById('pw').innerHTML = "";
    }
  }
  else if(id == 'cpassword'){
    if(cpassword == ""){
      document.getElementById('cpw').innerHTML ="<b> ** Please fill the confirm password field.";
    }else {
      document.getElementById('cpw').innerHTML = "";
    }
  }return false;
}



// <!-- Checks Form validation -->
// <script type="text/javascript">



// </script>


// <script>


// <!-- show password -->
var state = false;
function toggle1(){
  if (state){
    document.getElementById("password").setAttribute("type", "password");
    state = false;
  } else{
    document.getElementById("password").setAttribute("type", "text");
    state = true;
  }
}
// </script>
// <script>
var state = false;
function toggle2(){
  if (state){
    document.getElementById("cpassword").setAttribute("type", "password");
    state = false;
  } else{
    document.getElementById("cpassword").setAttribute("type", "text");
    state = true;
  }
}
// </script>

// <script>
function validateFirstname() {
  $("#loaderIcon").show();
  jQuery.ajax({
    url: "check_availability.php",
    data:'firstname='+$("#firstname").val(),
    type: "POST",
    success:function(data){
      $("#validatefirstname1").html(data);
      $("#loaderIcon").hide();
    },
    error:function (){}
  });
}

function validateMI() {
  $("#loaderIcon").show();
  jQuery.ajax({
    url: "check_availability.php",
    data:'middleInitial='+$("#middleInitial").val(),
    type: "POST",
    success:function(data){
      $("#validateMI1").html(data);
      $("#loaderIcon").hide();
    },
    error:function (){}
  });
}

function validateLN() {
  $("#loaderIcon").show();
  jQuery.ajax({
    url: "check_availability.php",
    data:'lastname='+$("#lastname").val(),
    type: "POST",
    success:function(data){
      $("#validateLN1").html(data);
      $("#loaderIcon").hide();
    },
    error:function (){}
  });
}

function userAvailability() {
  $("#loaderIcon").show();
  jQuery.ajax({
    url: "check_availability.php",
    data:'username='+$("#username").val(),
    type: "POST",
    success:function(data){
      $("#user-availability-status1").html(data);
      $("#loaderIcon").hide();
    },
    error:function (){}
  });
}

function userAvailability2() {
  $("#loaderIcon").show();
  jQuery.ajax({
    url: "check_availability.php",
    data:'email='+$("#email").val(),
    type: "POST",
    success:function(data){
      $("#user-availability-status2").html(data);
      $("#loaderIcon").hide();
    },
    error:function (){}
  });
}

function validateContact() {
  $("#loaderIcon").show();
  jQuery.ajax({
    url: "check_availability.php",
    data:'contact='+$("#contact").val(),
    type: "POST",
    success:function(data){
      $("#validateContact1").html(data);
      $("#loaderIcon").hide();
    },
    error:function (){}
  });
}
// </script>

// 
// <script>

// </script>
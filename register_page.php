<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!DOCTYPE html>
<html>
<style>
/* Full-width input fields */
* {	
    background-color: #F7D358;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
}

.header {
	padding: 15px;
    horizontal allignment: center;
    border: 1px solid gray;
    border-radius:6px;     
    background-color: #FE642E;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn,.signupbtn {
    float: left;
    width: 100%;
}

/* Add padding to container elements */
.container {
    padding: 16px;
    margin-top: 2px;
    border: 1px solid gray;
    border-radius:6px;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}

.button1 {
		  border-radius: 12px;

</style>
<body>

<div class="header">
  <form style="display: inline; background-color: #FE642E" name= "register_form_home" method="post" action="main_page_login.php">
  <button class="button button1" style="font-size:12px"><i class="fa fa-angle-left"></i> HOME</button>
  </form>
  <form style="display: inline; background-color: #FE642E" name= "register_form_login" method="post" action="login_form.php">
  <button class="button button1" style="float: right;font-size:12px"><i class="fa fa-angle-left"></i> LOGIN</button>
  </form>
  <h1 align="center" style="background-color: #FE642E">SHOPNOW MARKET</h1>
</div>

<h2 align="center">Register</h2>

<form  name="insertionForm" method="post" action="register_page_insert.php" style="border:1px solid #ccc">
  <div class="container">
    
    <label><b>First Name</b></label>
    <input style="background-color: #FAFAFA" type="text" placeholder="Enter First Name" name="firstname" required>
    <br>
	
    <label><b>Last Name</b></label>
    <input style="background-color: #FAFAFA" type="text" placeholder="Enter Last Name" name="lastname" required>
    <br>
	
  	<label><b>Username</b></label>
    <input style="background-color: #FAFAFA" type="text" placeholder="Enter Username" name="uname" required>
    <br>
	
    <label><b>Email</b></label>
    <input style="background-color: #FAFAFA" type="text" placeholder="Enter Email" name="email" required>
	<br>
	
    <label><b>Password</b></label>
    <input style="background-color: #FAFAFA" onChange="Validate()" type="password" placeholder="Enter Password" id="psw" name="psw" required>
	<br>
	
    <label><b>Repeat Password</b></label>
    <input style="background-color: #FAFAFA" onChange="Validate()" type="password" placeholder="Repeat Password" id="psw-repeat" name="psw-repeat" required>
    <br>
	
    <label><b>Location</b></label>
    <input style="background-color: #FAFAFA" type="text" placeholder="Enter Location" name="location">
	<br>
	
    <label><b>Date of Birth</b></label><br />
    <input style="background-color: #FAFAFA" type="date" name="bday">
  	<br>

    <div>
    <label><b>Sex</b></label>
  <input type="radio" name="gender" value="male" checked> Male
  
  <input type="radio" name="gender" value="female"> Female
	</div>

    <div class="clearfix">
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>

<script type="text/javascript">
function Validate(){
var fistInput = document.getElementById('psw').value;
var secondInput = document.getElementById('psw-repeat').value;
 if(fistInput == secondInput) { return true; }
    alert("Warning!! passcodes must match!!!");
    return false;
}
</script>

</body>
</html>

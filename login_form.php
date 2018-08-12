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
.loginbtn {
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
    .cancelbtn, .loginbtn {
       width: 100%;
    }
}

.button1 {
		  border-radius: 12px;

</style>
<body>

<div class="header">
  <form style="display: inline; background-color: #FE642E" name= "login_form_home" method="post" action="main_page_login.php">
  <button class="button button1" style="font-size:12px"><i class="fa fa-angle-left"></i> HOME</button>
  </form>
  <form style="display: inline; background-color: #FE642E" name= "login_form_register" method="post" action="register_page.php">
  <button class="button button1" style="float: right;font-size:12px"><i class="fa fa-angle-left"></i> REGISTER</button>
  </form>
  <h1 align="center" style="background-color: #FE642E">SHOPNOW MARKET</h1>
</div>

<h2 align="center">Login Form</h2>

<form  name="loginForm" method="post" action="login_page_compare.php" style="border:1px solid #ccc">
  <div class="container">
    
    <label><b>Username</b></label>
    <input style="background-color: #FAFAFA" type="text" placeholder="Enter First Name" name="username" required>
    <br>
	
    <label><b>Password</b></label>
    <input style="background-color: #FAFAFA" type="password" placeholder="Enter Password" name="password" required>
	<br>
	
    <div class="clearfix">
      <button type="submit" class="loginbtn">Login</button>
    </div>
	
  </div>
</form>

</body>
</html>

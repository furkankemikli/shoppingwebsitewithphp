<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!DOCTYPE html>
<html>
<head>
<style>

* {
    box-sizing: border-box;
    background-color: #F7D358;
}

.header {
    padding: 15px;
    horizontal allignment: center;
    border: 1px solid gray;
    border-radius:6px;     
    background-color: #FE642E;
}

.main {
    width: 100%;
    float: right;
    padding: 15px;
    margin-top: 2px;
    border-radius:6px;
}

.navbar {
  overflow: hidden;
  background-color: #333;
  top: 0;
  width: 100%;
  margin-top: 2px;
  border: 1px solid gray;
  border-radius:6px;
}

.navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

.button1 {border-radius: 12px;

</style>
</head>
<body>

<div class="header">
  <form style="display: inline; background-color: #FE642E" name= "register_form_login" method="post" action="login_form.php">
  <button class="button button1" style="float: right;font-size:12px"><i class="fa fa-angle-left"></i> LOGIN</button>
  </form><br><br>
  <h1 align="center"style="background-color: #FE642E">SHOPNOW MARKET</h1>
</div>

<div style="background-color: #848484" class="navbar">
  <a style="background-color: #848484" href="main_page_login.php">Home</a>
  <a style="background-color: #848484" href="login_form.php">My Account</a>
  <a style="background-color: #848484" href="register_page.php">Register</a>
  <a style="background-color: #848484" href="about.php">About</a>
</div>

<div class="main">
<font size="4" align="center" style="font-family:Comic Sans MS, cursive, sans-serif;">Web Programming Course Project<br>by Furkan Kemikli</font>
</div>

</body>
</html>

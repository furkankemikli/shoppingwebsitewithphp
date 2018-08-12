<?php
   include('session.php');
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
.cancelbtn,.sendbtn {
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

select.hidden{
	visibility:hidden	
}

.button1 {
		  border-radius: 12px;

</style>
</head>
<body>

<div class="header">
  <form style="display: inline; background-color: #FE642E" name= "message_home" method="post" action="main_page_logout.php">
  <button class="button button1" style="font-size:12px">HOME</button>
  </form>
  <form style="display: inline; background-color: #FE642E" name= "message_logout" method="post" action="logout.php">
  <button class="button button1" style="background-color: #ff0000; float: right;font-size:12px">LOG OUT</button><br>
</form>
  <h1 align="center" style="background-color: #FE642E">SHOPNOW MARKET</h1>
</div>

<form>
  <div class="container">
    
    <label><b>Message</b></label>
    <input style="background-color: #FAFAFA" type="text" placeholder="Enter Message" id= "message" name="message" required>
    <br>
    <div class="clearfix">
      <button type="submit" class="sendbtn use-address">Send</button>
    </div>
  </div>
</form>
<script>
$(".use-address").click(function() {
    var message = document.getElementById("message").value;
	var id = <?php echo $_GET['orderid'];?>;
    
    //alert(id);//for the test
	$.ajax({
    data: 'orderid=' + id+ '&message=' + message,
    url: 'message_send.php',
    method: 'POST',
    success: function(data) {
		alert("Message successfully send to the add owner.");
		},
		error : function(data) {
		alert("Message couldn't send to the add owner.");
		}
	});
});
</script>

</body>
</html>

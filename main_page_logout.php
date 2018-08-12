<?php
   include('session.php');
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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

.menu {
    width: 25%;
    float: left;
    padding: 15px;
    background-color: #FAFAFA;
    margin-top: 2px;
    border: 1px solid gray;
    border-radius:6px;
}

.main {
    width: 75%;
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


table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
	border: 1px solid #ddd;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 5px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

img {
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
    width: 150px;
}

img:hover {
    box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
    /*shadow wehen mouse is on it*/
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
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

.button1 {background-color: #ff0000;
		  border-radius: 12px;

</style>
</head>
<body>

<div class="header">
<form style="background-color: #FE642E" name= "main_page_logout" method="post" action="logout.php">
  <button class="button button1" style="float: right;font-size:12px"><i class="fa fa-angle-left"></i> LOG OUT</button><br>
</form>
  <h1 align="center" style="background-color: #FE642E">SHOPNOW MARKET</h1>
</div>

<div style="background-color: #848484" class="navbar">
  <a style="background-color: #848484" href="main_page_logout.php">Home</a>
  <a style="background-color: #848484" href="person_page.php">My Account</a>
  <a style="background-color: #848484" href="json_logout.php">JSON Page</a>  
  <a style="background-color: #848484" href="rss_logout.php">RSS Feed</a>
  <a style="background-color: #848484" href="about_logout.php">About</a>
</div>

<div class="menu">
<input style="background-color: #FAFAFA" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search" title="Type in a name">

<form style="background-color: #FAFAFA" name="FilterForm" id="filterForm" action="" method="">

	<input style="background-color: #FAFAFA" type="checkbox" name="filterStatus" value="sports"/>
	<label style="background-color: #FAFAFA" for="filter_1">Sports</label>
	<br>
	
	<input style="background-color: #FAFAFA" type="checkbox" name="filterStatus" value="hobby"/>
	<label style="background-color: #FAFAFA" for="filter_2">Hobby</label>
	<br>
	
	<input style="background-color: #FAFAFA" type="checkbox" name="filterStatus" value="clothes"/>
	<label style="background-color: #FAFAFA" for="filter_3">Clothes</label>
	<br>
	
	<input style="background-color: #FAFAFA" type="checkbox" name="filterStatus" value="electronics"/>
	<label style="background-color: #FAFAFA" for="filter_4">Electronics</label>
	<br>
</form>
</div>

<div class="main">
<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'shopnow';

$db = new mysqli($servername, $username, $password, $dbname) or die("Unable to connect");

$sql = "SELECT id,image, title, category, price, release_date FROM adds ORDER BY release_date  DESC";

$mysqli_result = mysqli_query($db, $sql);


$count = mysqli_num_rows($mysqli_result);
if ($count > 0) {
     echo "<table border='1' id='StatusTable'>
			<tr class='sports electronics hobby clothes'> 
				<th style='display:none;'>ID</th>
				<th>Image </th>
				<th>Title</th>
				<th>Category</th>
				<th>Price</th>
				<th>Release Date</th>
				<th>Details</th>
			</tr>";
     // output data of each row
     while($row = mysqli_fetch_assoc($mysqli_result)) {
		 $image = $row['image'];
         echo '
			<tbody>
			<tr class='.$row['category'].'>
				<td class="id" style="display:none;">'.$row['id'].'</td>
				<td ><a target="_blank" href="data:image/jpeg;base64,' .base64_encode($row['image']).'">
				<img style="width:150px" src="data:image/jpeg;base64,' .base64_encode($row['image']).'"/>
				</a></td>
				<td>'
					  . $row['title']. "</td><td class=".$row['category'].">" 
					  . $row['category']. "</td><td>"
					  . $row['price']. "</td><td>"
					  . $row['release_date']. "</td>
					  <td><button type='button' class='button button1 use-address' style='background-color: #4CAF50'/>Details</td>
			</tr>
			</tbody>"
		;
	 }
	 	 
     echo "</table>";
}

mysqli_close($db);
?>
</div>

<script>
$("input[name='filterStatus'], select.filter").change(function() {
  var classes = [];
  var stateClass = ""

  $("input[name='filterStatus']").each(function() {
    if ($(this).is(":checked")) {
      classes.push('.' + $(this).val());
	  //takes checked item and adds to the array
    }
  });

  if (classes == "" && stateClass == "") {
    // if no filters selected, show all items
    $("#StatusTable tbody tr").show();
  } else {
    // otherwise, hide everything...
    $("#StatusTable tbody tr").hide();

    // then show only the matching items
    rows = $("#StatusTable tr" + stateClass).filter(classes.length ? classes.join(',') : '*');
    if (rows.size() > 0) {
      rows.show();
    }
  }

});

function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("StatusTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

$(".use-address").click(function() {
    var $row = $(this).closest("tr");    // Find the row
    var id = $row.find(".id").text(); // Find the text
    
    //alert(id);//for the test
	$.ajax({
    data: 'orderid=' + id,
    url: 'add_page_logout.php',
    method: 'POST',
    success: function(msg) {
		window.location.replace('add_page_logout.php?orderid='+id);
		//document.write(msg);
        //var newWindow = window.open("", "new window", "width=100%, height=100%");
       //write the data to the document of the newWindow
       //newWindow.document.write(msg);
		}
	});
});
</script>

</body>
</html>

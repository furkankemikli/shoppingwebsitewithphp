<?php
include('session.php');

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'shopnow';

//take username and use it to take adds of it from database
//click olayını otomatik yaptır
$db = new mysqli($servername, $username, $password, $dbname) or die("Unable to connect");

$id = $_SESSION['username'];
//add owner will be get from session
$sql = "SELECT * FROM adds WHERE username = '$id' ORDER BY release_date  DESC";

$mysqli_result = mysqli_query($db, $sql);


$count = mysqli_num_rows($mysqli_result);
if ($count > 0) {
     echo "<table>
			<tr> 
				<th>Image </th>
				<th>Title</th>
				<th>Category</th>
				<th>Price</th>
				<th>Release Date</th>
				<th>Viewers</th>
				<th>Edit/Delete</th>
			</tr>";
     // output data of each row
     while($row = mysqli_fetch_assoc($mysqli_result)) {
		 $image = $row['image'];
         echo '
			<tr><a target="_blank" href="data:image/jpeg;base64,' .base64_encode($row['image']).'">
				<td> 
				<img style="width:150px" src="data:image/jpeg;base64,' .base64_encode($row['image']).'"/>
				</a></td>
				<td>'
					  . $row['title']. "</td><td>" 
					  . $row['category']. "</td><td>"
					  . $row['price']. "</td><td>"
					  . $row['release_date']. "</td>
					<td><button class="button button2">Viewers</button></td>    
					<th><button class="button button2">Edit</button><button class="button button3">Delete</button></th>
			</tr>"
		;
	 }
	 	 
     echo "</table>";
}

mysqli_close($db);
?>
<?php
include('session.php');

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'shopnow';

// Create connection
//TODO: Take receiver name and show his messages to him
$db = new mysqli($servername, $username, $password, $dbname) or die("Unable to connect");

$id = $_SESSION['username'];

$sql = "SELECT * FROM messages WHERE receiver = '$id' ";

$mysqli_result = mysqli_query($db, $sql);


$count = mysqli_num_rows($mysqli_result);
if ($count > 0) {
     echo "<table>
			<tr> 
				<th>Sender</th>
				<th>Message </th>
				<th>Date</th>
				<th>Add Link</th>
			</tr>";
     // output data of each row
     while($row = mysqli_fetch_assoc($mysqli_result)) {
         echo '
			<tr>
				<td>'
					  . $row['sender']. "</td><td>" 
					  . $row['message']. "</td><td>"
					  . $row['senddate']. "</td><td>"
					  . $row['link']. "</td>
			</tr>"
		;
	 }
	 	 
     echo "</table>";
}

mysqli_close($db);
?>
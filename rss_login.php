<?xml version="1.0" encoding="ISO-8859-1"?>
<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'shopnow';

$db = new mysqli($servername, $username, $password, $dbname) or die("Unable to connect");
header('Content-type: text/xml; charset=ISO-8859-1');
?>

<rss version="2.0">

<channel>

<title>ShopNow</title> 

<description>You can see last 10 active ad in the website</description>

<link>http://localhost/project/main_page_login.php</link>

<?php
$sql = "SELECT * FROM adds WHERE expiredate >= CURDATE() ORDER BY release_date  DESC limit 0,10";

$mysqli_result = mysqli_query($db, $sql);

while($row = mysqli_fetch_assoc($mysqli_result)){
	$id = $row['id'];
	$title = $row['title'];
	$description = $row['description'];
	$price  = $row['price'];
	$expiredate = $row['expiredate'];
	$image = $row['image'];
	?>
<item>

    <title><?php echo $title?></title>
	
	<description><?php echo $description?></description>
	
	<price><?php echo $price?></price>	
	
    <link>http://localhost/project/rss_add_page_login.php?orderid=<?php echo $id;?></link>
		
	<expiredate><?php echo $expiredate?></expiredate>

</item>

<?php }?>

</channel>
</rss>
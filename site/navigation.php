<?php
$dblink=db_connect("cms");
$sql="Select * from `menu` where `status`='active'";
$results=$dblink->query($sql) or
	die("Something went wrong with $sql<br>".$dblink->error);
while ($data=$results->fetch_array(MYSQLI_ASSOC)){
	if ($data['location']==$page)
		echo'<li class="fh5co-active"><a href="index.php?page='.$data['location'].'">'.$data['title'].'</a></li>';
	else
		echo'<li><a href="index.php?page='.$data['location'].'">'.$data['title'].'</a></li>';
}
?>









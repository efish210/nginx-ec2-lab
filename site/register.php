<?php
echo '<h1 class="fh5co-heading-colored">Register For An Account</h1>'; 
echo '<div class="panel-body">';
if (!isset($_POST['submit'])){
	echo '<h2>Please fill out the following form:</h2><form method="post" action="">';
		if(isset($_GET['error']) && strstr($_GET['error'],"unNull")) {
			echo '<div class="form-group has-error">
			<label class="control-label" for="inputSuccess1">Create a Username:</label>
			<input type="text" class="form-control" name="username" aria-describedby="helpBlock2"
			value="'.$_SESSION['username'].'">
			<span id="UNfeedback" class="help-block">Username cannot be blank!</span>
			</div>';
		} else {
			if(isset($_SESSION['username']) && $_SESSION['username']!=""){
				echo '<div class="form-group has-success">
				<label class="control-label" for="inputSuccess1">Create a Username:</label>
				<input type="text" class="form-control" name="username" aria-describedby="helpBlock2"
				value="'.$_SESSION['username'].'">
				<span id="UNfeedback" class="help-block"></span>
				</div>';
			} else {
			echo '<div class="form-group">
				<label class="control-label" for="inputSuccess1">Create a Username:</label>
				<input type="text" class="form-control" name="username" aria-describedby="helpBlock2">
				<span id="UNfeedback" class="help-block"></span>
				</div>';
			}
		}
		if(isset($_GET['error']) && strstr($_GET['error'],"passNull")) {
			echo '<div class="form-group has-error">
			<label class="control-label" for="inputSuccess1">Create a Password:</label>
			<input type="text" class="form-control" name="password" aria-describedby="helpBlock2"
			value="'.$_SESSION['password'].'">
			<span id="UNfeedback" class="help-block">Password cannot be blank!</span>
			</div>';
		} else {
			if (isset($_SESSION['password']) && $_SESSION['password']!=""){
				echo '<div class="form-group has-success">
				<label class="control-label" for="inputSuccess1">Create a Password:</label>
				<input type="text" class="form-control" name="password" aria-describedby="helpBlock2"
				value="'.$_SESSION['password'].'">
				<span id="UNfeedback" class="help-block"></span>
				</div>';
		} else{
				echo '<div class="form-group">
				<label class="control-label" for="inputSuccess1">Create a Password:</label>
				<input type="text" class="form-control" name="password" aria-describedby="helpBlock2">
				<span id="UNfeedback" class="help-block"></span>
				</div>';
			}
		}
		echo '<input class="btn btn-success" type="submit" name="submit" value="submit" />';
		echo '</form>';
	
} else{
	$username=addslashes($_POST['username']);
	$dblink=db_connect("admin");
	$sql="Select `auto_id` from `accounts` where `username`='$username'";
	$result=$dblink->query($sql) or
		die("Something went wrong with $sql".$dblink->error);
	if($result->num_rows>0)
		redirect("index.php?page=login&errMsg=accountExists");
	else{
		$password=$_POST['password'];
		$salt="CS4413SP26";
		$hash=hash('sha256', $password.$salt);
		$sql="Insert into `accounts` (`username`,`logon`) values ('$username','$hash')";
		$dblink->query($sql) or
			die("Something went wrong with $sql".$dblink->error);
		redirect("index.php?page=login&msg=AccountCreated");
	}
	
}
echo '</div>';
?>
<?php
echo '<h1 class="fh5co-heading-colored">Login To Your Account</h1>'; 
echo '<div class="panel-body">';
if (!isset($_POST['submit'])){
	echo '<h2>Please fill out the following form:</h2><form method="post" action="">';
		if(isset($_GET['error']) && strstr($_GET['error'],"unNull")) {
			echo '<div class="form-group has-error">
			<label class="control-label" for="inputSuccess1">Username:</label>
			<input type="text" class="form-control" name="username" aria-describedby="helpBlock2"
			value="'.$_SESSION['username'].'">
			<span id="UNfeedback" class="help-block">Username cannot be blank!</span>
			</div>';
		} else {
			if(isset($_SESSION['username']) && $_SESSION['username']!=""){
				echo '<div class="form-group has-success">
				<label class="control-label" for="inputSuccess1">Username:</label>
				<input type="text" class="form-control" name="username" aria-describedby="helpBlock2"
				value="'.$_SESSION['username'].'">
				<span id="UNfeedback" class="help-block"></span>
				</div>';
			} else {
			echo '<div class="form-group">
				<label class="control-label" for="inputSuccess1">Username:</label>
				<input type="text" class="form-control" name="username" aria-describedby="helpBlock2">
				<span id="UNfeedback" class="help-block"></span>
				</div>';
			}
		}
		if(isset($_GET['error']) && strstr($_GET['error'],"passNull")) {
			echo '<div class="form-group has-error">
			<label class="control-label" for="inputSuccess1">Password:</label>
			<input type="text" class="form-control" name="password" aria-describedby="helpBlock2"
			value="'.$_SESSION['password'].'">
			<span id="UNfeedback" class="help-block">Password cannot be blank!</span>
			</div>';
		} else {
			if (isset($_SESSION['password']) && $_SESSION['password']!=""){
				echo '<div class="form-group has-success">
				<label class="control-label" for="inputSuccess1">Password:</label>
				<input type="text" class="form-control" name="password" aria-describedby="helpBlock2"
				value="'.$_SESSION['password'].'">
				<span id="UNfeedback" class="help-block"></span>
				</div>';
		} else{
				echo '<div class="form-group">
				<label class="control-label" for="inputSuccess1">Password:</label>
				<input type="text" class="form-control" name="password" aria-describedby="helpBlock2">
				<span id="UNfeedback" class="help-block"></span>
				</div>';
			}
		}
		echo '<input class="btn btn-success" type="submit" name="submit" value="submit" />';
		echo '</form>';
	
} else{
	$username=addslashes($_POST['username']);
	$password=$_POST['password'];
	$errors="";
	if($username=="") $errors.="unNull";
	if($password=="") $errors.="passNull";
	if($errors!="")
		redirect("index.php?page=login&error=$errors");
	$salt="CS4413SP26";
	$hash=hash('sha256', $password.$salt);
	$sql="Select `auto_id` from `accounts` where `logon`='$hash' and `username`='$username'";
	$dblink=db_connect("admin");
	$result=$dblink->query($sql) or
		die("Something went wrong with $sql".$dblink->error);
	if($result->num_rows<=0)
		redirect("index.php?page=login&errMsg=InvalidAcctInfo");
	else{
		$salt=microtime();
		$sid=hash('sha256',$salt.$password);
		$sql="Update `accounts` set `sid`='$sid' where `logon`='$hash' and `username`='$username'";
		$dblink->query($sql) or
			die("Something went wrong with $sql".$dblink->error);
		redirect("index.php?page=results&sid=$sid");
	}
	
}
echo '</div>';
?>
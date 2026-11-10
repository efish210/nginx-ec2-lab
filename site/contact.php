<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'GET' && !isset($_GET['error'])) {
	unset($_SESSION['firstname']);
	unset($_SESSION['lastname']);
	unset($_SESSION['email']);
	unset($_SESSION['phone']);
	unset($_SESSION['username']);
	unset($_SESSION['password']);
	unset($_SESSION['comments']);
	}
?>

						<h1 class="fh5co-heading-colored">Contact Form</h1>
						<div class="panel-body">
						<?php
							if (!isset ($_POST['submit'])){
								echo '<h2>Please fill out the following form:</h2><form method="post" action="">';
									if (isset($_GET['error']) && strstr($_GET['error'],"fnNull")) {
										echo '<div class="form-group has-error">
										<label class="control-label" for="inputSuccess1">First Name:</label>
										<input type="text" class="form-control" name="firstname" aria-describedby="helpBlock2"
										value="'.$_SESSION['firstname'].'">
										<span id="UNfeedback" class="help-block">First name cannot be blank!</span>
										</div>';
									}
									else if(isset($_GET['error']) && strstr($_GET['error'],"fnInvalid")) {
										echo '<div class="form-group has-error">
										<label class="control-label" for="inputSuccess1">First Name:</label>
										<input type="text" class="form-control" name="firstname" aria-describedby="helpBlock2"
										value="'.$_SESSION['firstname'].'">
										<span id="UNfeedback" class="help-block">First name contains invalid characters!</span>
										</div>';
									}
									
							 	else {
									
									if(isset($_SESSION['firstname']) && $_SESSION['firstname']!=""){
										echo '<div class="form-group has-success">
										<label class="control-label" for="inputSuccess1">First Name:</label>
										<input type="text" class="form-control" name="firstname" aria-describedby="helpBlock2"
										value="'.$_SESSION['firstname'].'">
										<span id="UNfeedback" class="help-block"></span>
										</div>';	
										
									}
									else{ //default init state
										echo '<div class="form-group">
										<label class="control-label" for="inputSuccess1">First Name:</label>
										<input type="text" class="form-control" name="firstname" aria-describedby="helpBlock2">
										<span id="UNfeedback" class="help-block"></span>
										</div>';
									}
								}
								
								if(isset($_GET['error']) && strstr($_GET['error'],"lnNull")) {
									echo '<div class="form-group has-error">
									<label class="control-label" for="inputSuccess1">Last Name:</label>
									<input type="text" class="form-control" name="lastname" aria-describedby="helpBlock2"
									value="'.$_SESSION['lastname'].'">
									<span id="UNfeedback" class="help-block">Last name cannot be blank!</span>
									</div>';
								} else if (isset($_GET['error']) && strstr($_GET['error'],"lnInvalid")){
									echo '<div class="form-group has-error">
									<label class="control-label" for="inputSuccess1">Last Name:</label>
									<input type="text" class="form-control" name="lastname" aria-describedby="helpBlock2"
									value="'.$_SESSION['lastname'].'">
									<span id="UNfeedback" class="help-block">Last name contains invalid characters!</span>
									</div>';
								} else{
									if(isset($_SESSION['lastname']) && $_SESSION['lastname']!=""){
										echo '<div class="form-group has-success">
										<label class="control-label" for="inputSuccess1">Last Name:</label>
										<input type="text" class="form-control" name="lastname" aria-describedby="helpBlock2"
										value="'.$_SESSION['lastname'].'">
										<span id="UNfeedback" class="help-block"></span>
										</div>';
									}
									else{
										echo '<div class="form-group">
										<label class="control-label" for="inputSuccess1">Last Name:</label>
										<input type="text" class="form-control" name="lastname" aria-describedby="helpBlock2">
										<span id="UNfeedback" class="help-block"></span>
										</div>';
									}
								}
								
								if(isset($_GET['error']) && strstr($_GET['error'],"emailNull")) {
									echo '<div class="form-group has-error">
									<label class="control-label" for="inputSuccess1">Email:</label>
									<input type="text" class="form-control" name="email" aria-describedby="helpBlock2"
									value="'.$_SESSION['email'].'">
									<span id="UNfeedback" class="help-block">Email cannot be blank!</span>
									</div>';
								} else if(isset($_GET['error']) && strstr($_GET['error'],"emailInvalid")) {
									echo '<div class="form-group has-error">
									<label class="control-label" for="inputSuccess1">Email:</label>
									<input type="text" class="form-control" name="email" aria-describedby="helpBlock2"
									value="'.$_SESSION['email'].'">
									<span id="UNfeedback" class="help-block">Must be in valid email address format!</span>
									</div>';
								}
								else{
									if(isset($_SESSION['email']) && $_SESSION['email']!=""){
										echo '<div class="form-group has-success">
										<label class="control-label" for="inputSuccess1">Email:</label>
										<input type="text" class="form-control" name="email" aria-describedby="helpBlock2"
										value="'.$_SESSION['email'].'">
										<span id="UNfeedback" class="help-block"></span>
										</div>';
									}
									else{
										echo '<div class="form-group">
										<label class="control-label" for="inputSuccess1">Email:</label>
										<input type="text" class="form-control" name="email" aria-describedby="helpBlock2">
										<span id="UNfeedback" class="help-block"></span>
										</div>';
									}
								}
							 		
								if (isset($_GET['error']) && strstr($_GET['error'],"phoneNull")) {
									echo '<div class="form-group has-error">
									<label class="control-label" for="inputSuccess1">Phone Number:</label>
									<input type="text" class="form-control" name="phone" aria-describedby="helpBlock2"
									value="'.$_SESSION['phone'].'">
									<span id="UNfeedback" class="help-block">Phone number cannot be blank!</span>
									</div>';
								}
								else if (isset($_GET['error']) && strstr($_GET['error'],"phoneInvalid")) {
									echo '<div class="form-group has-error">
									<label class="control-label" for="inputSuccess1">Phone Number:</label>
									<input type="text" class="form-control" name="phone" aria-describedby="helpBlock2"
									value="'.$_SESSION['phone'].'">
									<span id="UNfeedback" class="help-block">Phone number can only contain digits!</span>
									</div>';
								}
								else {
									if(isset($_SESSION['phone']) && $_SESSION['phone']!=""){
										echo '<div class="form-group has-success">
										<label class="control-label" for="inputSuccess1">Phone Number:</label>
										<input type="text" class="form-control" name="phone" aria-describedby="helpBlock2"
										value="'.$_SESSION['phone'].'">
										<span id="UNfeedback" class="help-block"></span>
										</div>';
									}
									else{
										echo '<div class="form-group">
										<label class="control-label" for="inputSuccess1">Phone Number:</label>
										<input type="text" class="form-control" name="phone" aria-describedby="helpBlock2">
										<span id="UNfeedback" class="help-block"></span>
										</div>';
									}
								}
								
								
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
							
								if(isset($_GET['error']) && strstr($_GET['error'],"commentsNull")){
									echo '<div class="form-group has-error">
										<label class="control-label" for="inputSuccess1">Comments:</label>
										<input type="text" class="form-control" name="comments" aria-describedby="helpBlock2"
										value="'.$_SESSION['password'].'">
										<span id="UNfeedback" class="help-block">Comments cannot be blank!</span>
										</div>';
								}
								else{
									if(isset($_SESSION['comments']) && $_SESSION['comments']!=""){
										echo '<div class="form-group has-success">
										<label class="control-label" for="inputSuccess1">Comments:</label>
										<input type="text" class="form-control" name="comments" aria-describedby="helpBlock2"
										value="'.$_SESSION['comments'].'">
										<span id="UNfeedback" class="help-block"></span>
										</div>';
									}
									else{
										echo '<div class="form-group">
										<label class="control-label" for="inputSuccess1">Comments:</label>
										<input type="text" class="form-control" name="comments" aria-describedby="helpBlock2">
										<span id="UNfeedback" class="help-block"></span>
										</div>';
									}
								}
							
								
		
						echo '<input class="btn btn-success" type="submit" name="submit" value="submit" />
						</form></div>';
							}
					else{
						$errors="";
						$firstName=$_POST['firstname'];
						$_SESSION['firstname']=$_POST['firstname'];
						if ($firstName=="") //if first name blank then notify user
							$errors.="fnNull";
						else if(!preg_match("/^[A-Za-z'-]+$/", ($firstName)))
							$errors.="fnInvalid";
						
						
						$lastName=$_POST['lastname'];
						$_SESSION['lastname']=$_POST['lastname'];
						if ($lastName=="") 
								$errors.="lnNull";
						else if(!preg_match("/^[A-Za-z'-]+$/", ($lastName)))
							$errors.="lnInvalid";
						
						$email=$_POST['email'];
						$_SESSION['email']=$_POST['email'];
						if ($email=="")
							$errors.="emailNull";
						else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
							$errors.="emailInvalid";
						
						$phone=$_POST['phone'];
						$_SESSION['phone']=$_POST['phone'];
						if ($phone=="")
							$errors.="phoneNull";
						else if(!ctype_digit($phone))
							$errors.="phoneInvalid";

						$username=$_POST['username'];
						$_SESSION['username']=$_POST['username'];
						if ($username=="")
							$errors.="unNull";
						
						
						$password=$_POST['password'];
						$_SESSION['password']=$_POST['password'];
						if ($password=="")
							$errors.="passNull";
						
						$comments=$_POST['comments'];
						$_SESSION['comments']=$_POST['comments']; 
						if ($comments=="")
							$errors.="commentsNull";
						
						if($errors!="") //an error was found
							redirect("index.php?page=contact&error=$errors");
						else{
							
							$firstName=addslashes($firstName);
							$lastName=addslashes($lastName);
							$comments=addslashes($comments);
							//ini_set('display_errors',1);
							//ini_set('display_startup_errors',1);
							//error_reporting(E_ALL);
						
							$dblink=db_connect("contact_data");
							$sql="Insert into `contact_info` (`first_name`, `last_name`, `email`, `password`, `username`, `phone`, `comments`)
							values ('$firstName', '$lastName', '$email', '$password', '$username', '$phone', '$comments')";
							$dblink->query($sql) or
								die("<h2>Something went wrong with: $sql</h2><p>".$dblink->error.'</p>');
							echo '<h2>Data successfully sent to database!</h2>';
						
						}
					}
						?>
							 </div>
					</div>
		
		
	
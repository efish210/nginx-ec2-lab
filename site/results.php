<?php
if(!isset($_GET['sid']))
	redirect("index.php?page=login&errMsg=InvalidSid");
else{
	$sid=$_GET['sid'];
	$dblink=db_connect("admin");
	$sql="Select `auto_id` from `accounts` where `sid`='$sid'";
	$result=$dblink->query($sql) or 
		die("Something went wrong with $sql".$dblink->error);
	if($result->num_rows<=0)
		redirect("index.php?page=login&errMsg=InvalidSid");
	else{
	
?>

<head>
	<script src="assets/js/jquery-3.5.1.js"></script>
</head>

<div class="panel-default">
	<div class="panel-heading">Database Entries</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>Comments</th>

					</tr>

				</thead>
				<tbody id="results">

				</tbody>





			</table>






		</div>

		</div>
	</div>
<script>
	function refresh_data(){
		$.ajax({
			type: 'get',
			url: 'query_contacts.php',
			success: function(data){
				$('#results').html(data); //document.getElementById('results').innerHTML=data;
			
			}
		});
		
	}
	setInterval(function(){refresh_data();},500);
</script>

<?php
	}
}
?>



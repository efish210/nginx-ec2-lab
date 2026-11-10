<?php 

function redirect($url) {
?>
	<script type="text/javascript">
		document.location.href="<?php echo $url;?>";
	</script>
<?php
 die;
}

function db_connect($db) {
	// Credentials live in config.php, which is NOT committed (see config.example.php)
	require __DIR__ . '/config.php';
	$dblink=new mysqli($db_host, $db_user, $db_pass, $db);
	return $dblink;
}
?>
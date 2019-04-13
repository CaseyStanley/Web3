<div class="jumbotron text-center" id="jumbotron">
	<h1 class="display-3" id="trekocon">Trekocon</h1>
    <p class="lead" id="trekocon">Find out where your nearest comic con is!</p>
    <a class="btn btn-primary btn-lg" role="button" type="button" id="button">Search Location</a>
</div>
<div id="holder"></div>
<?php
	//require '../includes/connect.php';

	$array = array();
	$stmt = $pdo->query('SELECT event_id, lat, longi FROM event');
	
	while($row = $stmt->fetch())
	{
		$array[] = array($row['event_id'], $row['lat'], $row['longi'], $row['name']);
	}

	$temp_array=json_encode($array);
	echo"<script>var locationArray=".$temp_array."</script>";
?>
<script src="../javascript/locGeo.js"></script>
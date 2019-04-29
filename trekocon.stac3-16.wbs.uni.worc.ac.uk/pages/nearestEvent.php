<div class="jumbotron text-center" id="jumbotron">
	<h1 class="display-3" id="trekocon">Trekocon</h1>
    <p class="lead" id="trekocon">Find out where your nearest comic con is!</p>
    <a class="btn btn-primary btn-lg" role="button" type="button" id="button">Search Location</a>
</div>
<div id="holder">
<?php 
//	if(isset($_POST['id'])){$id=$_POST['id'];}
//	else{$id=0;}
	$id=2;
	$query = "SELECT * FROM event WHERE event_id = :event_id";
	$result = $pdo->prepare($query);
	$result->bindParam(':event_id', $_POST['id']);
	$result->execute();
	while($row = $result->fetch())
	{
/*?>
<div class="card text-center">
	<img class="card-img-top" src="../img/ComicCon.jpg" height="300" alt="Robots at Comic Con">
	<div class="card-body">
    	<h5 class="card-title"><?php*/ echo $row['event_name'];/* ?></h5>
       	<p class="card-text">Worcester Comic Con is bigger and better than ever! Come and join them again this summer!</p>
        <a href="index.php?p=events" class="btn btn-primary">Find out more!</a>
    </div>
</div>
<?php	*/
	}
?>
</div>
<?php
	//require '../includes/connect.php';
	$array = array();
	$stmt = $pdo->query('SELECT event_id, lat, longi FROM event');
	
	while($row = $stmt->fetch())
	{
		$array[] = array($row['event_id'], $row['lat'], $row['longi']);
	}

	$temp_array=json_encode($array);
	echo"<script>var locationArray=".$temp_array."</script>";
?>
<script src="../javascript/locGeo.js"></script>

Events
<!--Search Bar-->
<!--<form class="form-inline my-2 my-lg-0">
	<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>-->

<div class="card container mt-5">
	<div class="card-body">
		<p>Search your nearest comic con:</p>
		<form class="form-inline" action="" method="post">
			<div class="form-group">
				<label for="name">Search Comic Cons</label>
				<input type="text" class="form-control" id="search" name="search">
			</div>
			<button type="submit" class="btn btn-default">Search</button>
		</form>
		<ul>
			<?php
				if(isset($_POST['search']))
				{
					$search = '%'.$_POST['search'].'%';
					$query = "SELECT * FROM event WHERE searchCon LIKE :search";
					$result = $pdo->prepare($query);
					$result->bindParam(':search', $search);
					$result->execute();
				}
				else
				{
					$query = "SELECT * FROM event";
					$result = $pdo->prepare($query);
					$result->execute();
				}
				
				while($row = $result->fetch(PDO::FETCH_ASSOC))
				{
					echo '<li><a href="index.php?p=list&id='.$row['event_id'].'">'.$row['name'].'</a></li>';
				}
			?>
		</ul>
	</div>
</div>
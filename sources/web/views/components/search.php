<?php
  require_once '../modele/api.php';
  ?>
<h1>Search Page</h1>

<div class="activity-container">
	<?php
if (isset($_POST["submit-search"])){
	$search = mysqli_real_escape_string($conn,$_POST['search']); //prevents SQL injections
	$sql = 'SELECT id FROM hobbyactivity WHERE city LIKE "%$search%" OR cover LIKE "%$search%" OR description "%$search%" OR label LIKE "%$search%" OR zip_code LIKE "%$search%" OR web_site LIKE "%$search%"';
	$result = Database::getInstance()->query($sql, $params);
	$queryResult = mysqli_num_rows($result);
	echo "There are ".$queryResult." Results!";
	if ($queryResult > 0){
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<a href=''
			<div class='activity-box'>
			<h3>".$row['id']."</h3>
			</div>";
		}
	}else{
		echo "there is no result matching your query";
	}

}
	?>
</div>

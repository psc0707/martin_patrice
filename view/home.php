<div class="headHome">
	<form id="searchForm" action="catalog.php">
		<input id="searchPanel" method="get" class="form-control" type="text" name="s" id="search_movies" placeholder="Search">
		<!-- <input type="hidden" name="search_form" value="1"> --><br>
		<button id="searchButton" class="btn btn-success" type="submit" name="submit_form">Search for movies</button>
	</form>
</div>

<form id="category" action="index.php" method="POST" onchange="getData(this);"/>
	<select name="selection" id="selection" class="form-control" onchange="this.form.submit()"/>
		<option value="4">4</option>
		<option value="10">10</option>
		<option value="20">20</option>
		<option value="50">50</option>
		<option value="255">All</option>
	</select>
</form>

<?php foreach ($displayArray as $key => $value) {
	echo $displayArray[$key];
}?><br>
<? endforeach?>

<br>
<div class="panel panel-primary">
	<div class="panel-heading"><h3 class="panel-title">Newest Additions</h3></div><br>
	<!-- Table -->
	<div class="row">
		<div class="col-sm-4 col-md-4">
	    	<div class="thumbnail">
		      <img src=" <?php echo $movie1['mov_poster']; ?> " alt=" <?php echo $movie1['mov_title']; ?> ">
		      <div class="caption">
		        <h3 class="center"><?php echo $movie1['mov_title']; ?></h3>
		        <p><?php echo $movie1['mov_synopsis']; ?></p>
		        <p><a href="details.php?movId=<?= $movie1['mov_id']; ?>" class="center btn btn-success" role="button">See movie</a></p>
		      </div>
	    	</div>
		</div>

		<div class="col-sm-4 col-md-4">
	    	<div class="thumbnail">
		      <img src="<?php echo $movie2['mov_poster']; ?>" alt="<?php echo $movie1['mov_title']; ?>">
		      <div class="caption">
		        <h3 class="center"><?php echo $movie2['mov_title']; ?></h3>
		        <p><?php echo $movie2['mov_synopsis']; ?></p>
		        <p><a href="details.php?movId=<?= $movie2['mov_id']; ?>" class="center btn btn-success" role="button">See movie</a></p>
		      </div>
	    	</div>
		</div>

		<div class="col-sm-4 col-md-4">
	    	<div class="thumbnail">
		      <img src="<?php echo $movie2['mov_poster']; ?>" alt="<?php echo $movie1['mov_title']; ?>">
		      <div class="caption">
		        <h3 class="center"><?php echo $movie3['mov_title']; ?></h3>
		        <p><?php echo $movie3['mov_synopsis']; ?></p>
		        <p><a href="details.php?movId=<?= $movie3['mov_id']; ?>" class="center btn btn-success" role="button">See movie</a></p>
		      </div>
	    	</div>
		</div>
	</div>

<!-- 	<table class="table" id="recentMovies">
		<thead>
		</thead>
	</table> -->
</div>

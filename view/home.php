<div class="panel panel-primary">
  <div class="panel-heading"><h3 class="panel-title">Introduction</h3></div>
	<!-- Table -->
	<label>This Project has been created by Patrice, Martin and Richard. The Webpage uses the OMDb API via CRUD in order to receive further Details</label>
</div>

<form>
	<input type="text" name="search" id="search_movies" placeholder="Search">
	<input type="hidden" name="search_form" value="1">
	<input type="submit" name="submit_form" value="Search">
</form><br>

<div class="panel panel-primary">
	<div class="panel-heading"><h3 class="panel-title">Newest Additions</h3></div>
	<!-- Table -->
	<table class="table" id="recentMovies">
		<thead>
		</thead>
	</table>
</div>
<script type="text/javascript" src="js/getpost.js"></script>
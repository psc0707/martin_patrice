<!DOCTYPE html>
<html>
<head>
	<title>Movies Matrin.Patrice&Co</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	
	<!-- jQuery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

	<style type="text/css">
		body { padding-top: 70px; }
		#helloId{float: right; color: #3175AF;}
	</style>
</head>
<body>

	<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Matrin.Patrice&Co</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
            <li><a href="index.php"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Acceuil</a></li>
            <li><a href="catalog.php"><span class="glyphicon glyphicon-education" aria-hidden="true"></span> Catégories</a></li>
            <li><a href="add-movie.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter un film</a></li>            
          </ul>
	        <form action="catalog.php" class="navbar-form navbar-right" method="get">
				<div class="form-group">
					<input type="text" name="s" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-success btn-sm">Rechercher</button>
			</form>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index.php">Acceuil</a></li>
			
		</ol>
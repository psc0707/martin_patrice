<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">
    <?php if (!empty($movieDetails['mov_id'])) : ?>
    	Modification de <?= $movieDetails['mov_title'] ?>
    <?php else : ?>
    	Add Movies
    <?php endif; ?>
    </h3>
  </div>
  <div class="panel-body">

	<form id="imdb" action="" class="navbar-form navbar-left" method="get">
		<div class="form-group">
			<input type="text" name="searchImdb" class="form-control" placeholder="Search">
		</div>
		<button type="submit" class="btn btn-success btn-sm">Add from Imdb</button>
	</form>

  	<?php if (!empty($errorList)) : ?>
		<div class="alert alert-danger" role="alert">
		  <?php foreach ($errorList as $currentErrorText) : ?>
		  	<?= $currentErrorText ?><br>
		  <?php endforeach; ?>
		</div>
  	<?php endif; ?>
	<form id="crudForm" action="" method="post">
  		<div class="row">
	  		<div class="col-md-12 col-sm-12 col-xs-12">
	  		
				<div class="form-group">
					<label>Genre</label>
					<input type="text" class="form-control" name="cat_name" value="<?= $movieDetails['cat_name'] ?>" placeholder="Genre" />
				</div>
				
				<div class="form-group">
					<label>Title</label>
					<input type="text" class="form-control" name="mov_title" value="<?= $movieDetails['mov_title'] ?>" placeholder="Title" />
				</div>

				<div class="form-group">
					<label>Annee</label>
					<input type="text" class="form-control" name="mov_released" value="<?= $movieDetails['mov_released'] ?>" placeholder="" />
				</div>

				<div class="form-group">
					<label>Langue</label>
					<input type="text" class="form-control" name="mov_language" value="<?= $movieDetails['mov_language'] ?>" placeholder="" />
				</div>

				<div class="form-group">
					<label>Acteurs</label>
					<input type="text" class="form-control" name="mov_actors" value="<?= $movieDetails['mov_actors'] ?>" placeholder="" />
				</div>

				<div class="form-group">
					<label>Synopsis</label>
					<textarea name="mov_synopsis" class="form-control" rows="4">	
						<?= $movieDetails['mov_synopsis'] ?>					
					</textarea>					
				</div>

				<div class="form-group">
					<label>Poster</label>
					<input type="text" class="form-control" name="mov_poster" value="<?= $movieDetails['mov_poster'] ?>" placeholder="" />
				</div>

				<div class="form-group">
					<label>Link</label>
					<input type="text" class="form-control" name="mov_link" value="<?= $movieDetails['mov_link'] ?>" placeholder="" />
				</div>
				
				<div class="form-group">
					<label>Support</label>
  					<input type="text" class="form-control" name="mov_support" value="<?= $movieDetails['mov_support'] ?>" placeholder="" />  					
  				</div>							

				<?php if (!empty($movieDetails['mov_id'])) : ?>
					<input type="submit" class="btn btn-success btn-block" value="Modifier" />
		    	<?php else : ?>
					<input type="submit" class="btn btn-success btn-block" value="Ajouter" />
				<?php endif; ?>

			</div>
		

		</div>		
	</form>
  </div>
</div>

<!-- Appel Ajax pour le CRUD -->
<script type="text/javascript" src="./js/crud.js"></script>

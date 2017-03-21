<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Ajout d'une catégorie</h3>
  </div>
  <div>
  	<select class="lenght form-control">
		<option>choisissez une catégorie</option>
		<?php foreach ($resultList as $key => $value) : ?>
		<option <?= $resultList['cat_name']; ?> </option> <?php
		endforeach; ?>
	</select>
  </div>
  <div  class="panel-body headHome">
  	<form id="middle" class="form-inline" action="" method="post">
  		<div class="center form-group">
  			<input id="catCreate" class="form-control" type="text" name="newCategory" placeholder="Catégorie"><button type="submit" class="btn btn-success">Créer catégorie</button>
  		</div>
	</form>
  </div>
</div>








<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Adding Category</h3>
  </div>
  <div>
  	<form id="modifyCategory" action="" method="get" class="form-inline">
	  	<select name="modifyCategory" class="selectCategory lenght form-control">
			<option>Please Select</option>
			<?php foreach ($resultList as $key => $value) : ?>
			<option value="<?= $value['cat_id']; ?>"> <?= $value['cat_name']; ?> </option> <?php
			endforeach; ?>
		</select>
		<input type="submit" value="Select" class="selectCategory btn btn-success">
	</form>
  </div>
  <div  class="panel-body headHome">
  	<form id="newCategory" class="form-inline" action="" method="post">
  		<div class="center form-group">
        <input type="hidden" name="catOriginalId" value="<?php echo $modCatId ?>">
  			<input value="<?php if(isset($movieDetails)){echo $movieDetails['0']['cat_name'];} ?>" class="form-control" type="text" name="newCategory" placeholder="Category"><button id="createcat" type="submit" class="btn btn-success">Create/Modify Category</button>
  		</div>
	</form>
  </div>
</div>
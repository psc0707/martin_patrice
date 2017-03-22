<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Catalogue</div>
  <div class="panel-body">
  	<?php if ($searchWord != '') : ?>
		  <?= $nbResults ?> résultat(s) pour la recherche "<?= $searchWord ?>"
	  <?php else : ?>
      <!-- Choix de la Pagination -->
    <form id="pageForm" action="" method="get" class="form-inline">
      <select name="paginationSelected" class="lenght form-control">
        <option value="0">Pagination</option>
        <?php foreach ($paginationTable as $key => $value) : ?>
          <option value="<?= $key; ?>"> <?= $value; ?> </option> <?php
        endforeach; ?>
      </select>  
      <br>    
      <br>    
    </form>

	    <?php if ($pageNo>1) : ?>
	   		<a href="catalog.php?page=<?= $pageNo-1 ?>&sesId=<?= $sessionId ?>" class="btn btn-xs btn-success">précédent</a>
		  <?php endif; ?>
      <span><strong>Page : <?= $pageNo ?></strong></span>
      <?php if ($nbResults>0) : ?>
	     <a href="catalog.php?page=<?= $pageNo+1 ?>&sesId=<?= $sessionId ?>" class="btn btn-xs btn-success">suivant</a>
      <?php endif; ?>
  	<?php endif; ?>
  </div>

  <!-- Table -->
  <table class="table">  
  <tbody>    
    <?php foreach ($moviesList as $currentMovie) : ?>      
      <tr>
        <td><img src="<?= $currentMovie['mov_poster']; ?>" alt="img"></td>
        <td>#<strong><?= $currentMovie['mov_id']; ?></strong></td>
        <td><strong><?= $currentMovie['mov_title']; ?></strong></td>
        <td class="well"><?= $currentMovie['mov_synopsis']; ?></td>
        <td>
            <a class="btn btn-xs btn-success" href="details.php?movId=<?= $currentMovie['mov_id']; ?>">Détails..</a>
            <br>
            <br>
            <a class="btn btn-xs btn-success" href="add-movie.php?movId=<?= $currentMovie['mov_id']; ?>">Modifier</a>            
        </td>        
        
      </tr>
    <?php endforeach; ?>
    
  </tbody>
  </table>
</div>

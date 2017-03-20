<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Liste des films</div>
  <div class="panel-body">
  	<?php if (!empty($_GET['deleted'])) : ?>
		<div class="alert alert-success" role="alert">
			&Eacute;lément supprimé
		</div>
  	<?php endif; ?>
  	<?php if ($searchWord != '') : ?>
		<?= $nbResults ?> résultat(s) pour la recherche "<?= $searchWord ?>"
	<?php else : ?>
	    <?php if ($pageNo>1) : ?>
	   		<a href="list.php?page=<?= $pageNo-1 ?>&sesId=<?= $sessionId ?>" class="btn btn-xs btn-success">précédent</a>
		<?php endif; ?>
	    <a href="list.php?page=<?= $pageNo+1 ?>&sesId=<?= $sessionId ?>" class="btn btn-xs btn-success">suivant</a>
  	<?php endif; ?>
  </div>

  <!-- Table -->
  <table class="table">
 <!--  <thead>
  	<tr>
		<th>ID</th>
		<th>Nom</th>
		<th>Prénom</th>
		<th>Email</th>
		<th>Date de naissance</th>
		<th></th>
  	</tr>
  </thead> -->
  <tbody id="itemMovies">

  </tbody>
  </table>
</div>
<script type="text/javascript" src="js/getpost.js"></script>
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Liste des étudiants</div>
  <div class="panel-heading">Liste des films</div>
  <div class="panel-body">
      <?php if (!empty($_GET['deleted'])) : ?>
        <div class="alert alert-success" role="alert">

  <!-- Table -->
  <table class="table">
  <thead>
          <div class="btn-group">
                <button type="button" class="btn btn-danger btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="student.php?deleteId=<?= $currentStudent['stu_id']; ?>">Oui, je veux supprimer</a></li>
                    <li><a href="#">Annuler</a></li>
                </ul>
            </div>
        </td>
    </tr>
  <?php endforeach; ?>
  </thead> -->
  <tbody id="itemMovies">

  </tbody>
  </table>
</div>
 No newline at end of file
</div>
<script type="text/javascript" src="js/getpost.js"></script>
 No newline at end of file

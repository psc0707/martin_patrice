<div class="row">

  <div id="posterDetailsMovies" style=" background-image: url( <?php echo $movieDetails['0']['mov_poster']; ?> )" class="col-md-4">
  </div>
  <div class="col-md-1"></div>
  <div class="col-md-7">
    <div class="row">
      <div class="col-md-8">
        <h1> <?= $movieDetails['0']['mov_title']; ?></h1>
      </div>
      <div class="col-md-4">
        <h2 id="catName"> <?php echo $movieDetails['0']['cat_name'] ?> </h2>
      </div>
    </div><br><br>
      <p><strong>Synopsis : </strong> <?php echo $movieDetails['0']['mov_synopsis'] ?> </p>
      <p><strong>Director : </strong><?php echo $movieDetails['0']['mov_director'] ?></p>
      <p><strong>Actors : </strong><?php echo $movieDetails['0']['mov_actors'] ?></p>
      <p><strong>Runtime : </strong><?php echo $movieDetails['0']['mov_runtime'] ?></p>
      <p><strong>Ratings : </strong><?php echo $movieDetails['0']['mov_rating'] ?> /10 on IMDB</p>
      <p><strong>Released on : </strong><?php echo $movieDetails['0']['mov_released']; ?></p>
      <p><strong>Support : </strong> <?php echo $movieDetails['0']['mov_support']; ?></p>
      <p><strong>Link to movie : </strong><a href="<?php echo $movieDetails['0']['mov_link']; ?>">  </a></p>
    </div>
</div>












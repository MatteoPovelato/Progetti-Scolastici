<?php
    session_start();
  ?>
<link rel="stylesheet" href="../css/stileStelline.css" type="text/css" media="all" />
<div class="row">
<div class="col-sm-4">
    <!-- Spazio vuoto -->
</div>

<div class="col-sm-4">
<form action="../actionpages/recensione.php" method="post"> 
<div class="mb-3 mt-3">
    <label for="nomeOpera" class="form-label">Nome opera:</label>
    <input type="text" class="form-control" id="nomeOpera" placeholder="Inserisci nome del film o serie TV" name="nomeOpera">
    <label for="recensione" class="form-label">Scrivi la tua recensione:</label>
         <input type="text" class="form-control" id="recensione" placeholder="Scrivi la recensione (minimo 100 caratteri)" name="recensione" style="height:100px">
</div>

<div class="rate">
    Dai un voto:<br>
    <input type="radio" id="star5" name="rate" value="5" />
    <label for="star5">5 stars</label>
    <input type="radio" id="star4" name="rate" value="4" />
    <label for="star4">4 stars</label>
    <input type="radio" id="star3" name="rate" value="3" />
    <label for="star3">3 stars</label>
    <input type="radio" id="star2" name="rate" value="2" />
    <label for="star2">2 stars</label>
    <input type="radio" id="star1" name="rate" value="1" />
    <label for="star1">1 star</label>
  </div>
  <br><br><br>
  <button  class="btn btn-dark" style="display: block; margin: 0 auto; ">Pubblica la recensione</button>
</div>


</form>

</div>

<script>


</script>
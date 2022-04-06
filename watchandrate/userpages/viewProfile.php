<?php
    session_start();
    require_once('../include/DBHandler.php');
    require_once('../include/DBHandler.php');
    $res= Model::getInstance()->viewProfile(($_SESSION['idUtente']));
    $rows = $res->fetchAll();
  ?>
  
  <link rel="stylesheet" href="../css/stileLink.css" type="text/css" media="all" />
<div class="row">
<div class="col-sm-4">
<!-- Spazio vuoto -->
</div>
<div class="col-sm-4">
  <div class="mb-3 mt-3">
      <?php
      echo '<b><p class="text-dark">Nome utente: '.$rows[0]['username'].'</p></b>'
      ?>
  </div>

<br>
<br>
</div> 
</div> 
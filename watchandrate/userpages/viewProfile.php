<?php
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
      $x=0;
      $lun= strlen($_SESSION['password']);
      echo '<b><p class="text-dark">Nome utente: '.$rows[0]['username'].'</p></b>';
      echo '<b><p class="text-dark" id="password">Password: ';
      if($x==0){
      for($i=0;$i<$lun;$i++){
        echo '•';
      }
      }else{
       $_SESSION['password'];
      }
      echo''.'</b></p>';
     echo ' <input type="checkbox" onclick="mostraPassword()"> Mostra password<br>';
     echo '<b><p class="text-dark">Data di nascita: '.$rows[0]['dob'].'</p></b><br>';
      ?>
      <script>
        function mostraPassword() {
        var x = document.getElementById("password");
        if (x == 0) {
          x == 1;
        } else {
         x == 0;
       }
      }
    </script>
  </div>

<br>
<br>
</div> 
</div> 


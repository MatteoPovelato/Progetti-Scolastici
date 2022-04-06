<?php
session_start();
?>
<link rel="stylesheet" href="../css/stileLink.css" type="text/css" media="all" />
<div class="row">
<div class="col-sm-4">
    <!-- Spazio vuoto -->
</div>
<div class="col-sm-4">
    <form action="../actionpages/registration.php" method="POST">
    <h1><a href="homepage.php" style="text-decoration: none;" class="link">Watch and Rate</a></h1>
    <h3>Registrati</h3>
    <div class="mb-3 mt-3">
    <label for="nomeUtente" class="form-label">Nome Utente*:</label>
    <input type="text" class="form-control" id="nomeUtente" placeholder="Inserisci un nome utente" name="nomeUtente" onkeyup="showHint(str)">
    </div>
    <div class="mb-3 mt-3">
    <label for="password" class="form-label">Password*:</label>
    <input type="password" class="form-control" id="password" placeholder="Inserisci almeno 6 caratteri" name="password" onkeyup="controlPassword()">
    <input type="checkbox" onclick="mostraPassword(true)"> Mostra password
    </div>
    <div class="mb-3 mt-3">
    <label for="password2" class="form-label">Ripeti la password*:</label>
    <input type="password" class="form-control" id="password2"  name="password2" onkeyup="controlPassword()">
    <input type="checkbox" onclick="mostraPassword(false)"> Mostra password
    <b><div id="testo" name="testo" class="text-danger"></div></b>
    </div>
    <div class="mb-3 mt-3">
    <label for="email" class="form-label">Email*:</label>
    <input type="email" class="form-control" id="email" placeholder="Inserisci un email" name="email">
    </div>
    <div class="mb-3 mt-3">
    <label for="dob" class="form-label">Data di nascita*:</label>
    <input type="date" class="form-control" id="dob" name="dob">
    </div>
    <button type="submit" class="btn btn-dark" name="invio" id="invio" disabled>Registrati</button> 
    
    <b><div id="problema" name="problema" class="text-danger"></div></b>
    <br>
  
    </form>
</div>

</div>
<footer class="d-flex aligns-items-center justify-content-center">Se sei già registrato,&nbsp; <b><a href="loginPage.php" class="text-dark" style="text-decoration: none"> Accedi</b></a>.</footer>
<script>
function mostraPassword(who) {
  let x = document.getElementById("password");
  let y = document.getElementById("password2");
  if(who===true){
    if (x.type === "password") {
     x.type = "text";
    } else {
      x.type = "password";
    }
  }else{
    if (y.type === "password") {
     y.type = "text";
    } else {
      y.type = "password";
    }
  }
}

function controlPassword(){
  let pass = document.getElementById("password").value; 
  let pass2 = document.getElementById("password2").value; 
  if(pass2.length<6){
    document.getElementById("problema").innerHTML = "Inserisci almeno 6 caratteri";
    document.getElementById("invio").disabled = true;
  }else{
    document.getElementById("problema").innerHTML = "";
   if(pass!=pass2){
     document.getElementById("testo").innerHTML = "Le password non sono uguali";
     document.getElementById("invio").disabled = true;
   }else{
    document.getElementById("testo").innerHTML = "";
     document.getElementById("invio").disabled = false;
   }
   }
}

window.onload= function(){
document.getElementById("txtHint").innerText="Prova questo nome utente ".Session['nomeUtente'];
}
</script>
</body>
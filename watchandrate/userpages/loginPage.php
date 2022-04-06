<link rel="stylesheet" href="../css/stileLink.css" type="text/css" media="all" />
<div class="row">
<div class="col-sm-4">
<!-- Spazio vuoto -->
</div>
<div class="col-sm-4">

<h1><a href="homepage.php" style="text-decoration: none;" class="link">Watch and Rate</a></h1>
<h3>Accesso</h3>
<form action="../actionpages/login.php" method="POST"> 
  <div class="mb-3 mt-3">
    <label for="nomeUtente" class="form-label">Nome utente:</label>
    <input type="text" class="form-control" id="nomeUtente" placeholder="Inserisci nome utente" name="nomeUtente">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password:</label>
    <input type="password" class="form-control" id="password" placeholder="Inserisci la password" name="password">
    <input type="checkbox" onclick="mostraPassword()"> Mostra password
  </div>
  <div class="form-check mb-3">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox" name="remember">Ricordami
    </label>
  </div>
  <input type="submit" class="btn btn-dark" placeholder="Invia">
</form>
<br>
<br>
</div> 
</div> 
<div class="d-flex aligns-items-center justify-content-center">Se non sei registrato, &nbsp;<b><a href="registrationPage.php" class="text-dark" style="text-decoration: none">Registrati</b></a>.</div>

<script>
function mostraPassword() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>
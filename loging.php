 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <link REL="stylesheet" TYPE="text/css" HREF="css/loging.css">

<?php
if (!isset($_SESSION)) {
    session_start();
}
session_destroy();

?>



<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
<div class="header">
  <div class="text-vertical-center pullDown">
    <h1>Objetivos</h1>
    <div class="row form-signin">
      <div class="panel panel-default">
        <div class="panel-body">
          <form accept-charset="UTF-8" method="post" role="form" action="controllers/comprobarUsuario.php">
            <div class="form-group">
              <input class="form-control" placeholder="Usuario" name="usuario" type="text" required="" autofocus="">
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Password" name="clave" type="password" value="" required="">
            </div>
            <input name="signin" class="btn btn-lg btn-success btn-block" type="submit" value="Sign In" id="loging">
          </form>
        </div>
      </div>
      <a href="/signup"></a>
    </div>
  </div>
</div>


<script type="text/javascript">


//loging







</script>
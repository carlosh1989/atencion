<div id="panel" class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title text-muted"><i class="fa fa-plus-square fa-2x"></i> VISTA DEL MODULO operador<b></b>
    </h3>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-lg-12">
        <form action="<?php echo baseUrl ?>operador/Principal" method="POST">
          <?php echo Token::field() ?>
          <input class="form-control" type="text" name="nombre" placeholder="NOMBRE">
          <br>
          <input class="form-control" type="text" name="apellido" placeholder="APELLIDO">
          <br>
          <button class="btn btn-primary" type="submit">ENVIAR</button>
        </form>
      </div>
    </div>
  </div>
</div>

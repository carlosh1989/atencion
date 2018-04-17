<style>
table {
border-collapse: collapse;
}
table, th, td {
border: 1px solid black;
}
th {
    text-align: left;
    background-color: #D8D8D8;
}

b{
  font-size: 0.8em;
}
</style>
<h5>
<?php if (isset($tipo_seleccion) and $tipo_seleccion): ?>
<?php echo $tipo_seleccion->nombre ?>
<?php else: ?>
<h3>SOLICITUDES</h3>

<b>EN ESTUDIO:</b> <?php echo $solicitudes->where('estatus',1)->count(); ?><br>
<b>APROBADAS:</b> <?php echo $solicitudes->where('estatus',2)->count(); ?><br>
<b>RECHAZADAS:</b> <?php echo $solicitudes->where('estatus',3)->count(); ?><br>
<b>ENTREGADAS:</b> <?php echo $solicitudes->where('estatus',4)->count(); ?><br>
-------------------------- <br>
<b>TOTAL:</b> <?php echo $solicitudes->count(); ?><br>
<br>  
<?php endif ?>
</h5>
<table>
  <thead>
    <tr>
      <th width="2%">Solicitud</th>
      <th width="2%">Fecha</th>
      <th width="5%">Cédula</th>
      <th width="10%">Solicitante</th>
      <th width="5%">Telefono n°1</th>
      <th width="5%">Telefono n°2</th>
      <th width="5%">Estatus</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach (Paginator($solicitudes) as $c): ?>
    <?php
    $fecha = $c->fecha_hora_asignado_consignado;
    list($date,$hora) = explode(' ', $fecha);
    list($ano,$mes,$dia)= explode('-', $date);
    ?>
    <tr id="tr<?php echo $c->id ?>">
      <td><?php echo $c->cod ?></td>
      <td>
        <?php
        $fecha = $c->fecha_hora_asignado_consignado;
        list($date,$hora) = explode(' ', $fecha);
        list($ano,$mes,$dia)= explode('-', $date);
        echo $dia.'/'.$mes.'/'.$ano;
        ?>
      </td>
      <td><?php echo $c->solicitante->cedula ?></td>
      <td><?php echo $c->solicitante->nombre_apellido ?></td>
      <td><?php echo $c->solicitante->telefono1 ?></td>
      <td><?php echo $c->solicitante->telefono2 ?></td>
      <td>
        <?php if ($c->estatus == 1): ?>
          EN ESTUDIO
        <?php endif ?>
        <?php if ($c->estatus == 2): ?>
          APROBADA
        <?php endif ?>
        <?php if ($c->estatus == 3): ?>
          RECHAZADA
        <?php endif ?>
        <?php if ($c->estatus == 4): ?>
          ENTREGADA
        <?php endif ?>
      </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
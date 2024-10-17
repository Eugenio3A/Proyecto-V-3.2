
<div class="container">
  <div class="row">
    <div class="col-md-12">

      <h2>Agregar estudiante</h2>

      <?php echo form_open_multipart('estudiante/inscribirbd'); ?>

      <select name="id_vehiculo" class="form-control form-select form-select-lg" required>
        <option value="" disabled selected>Seleccione un Movil</option>
        <?php
        foreach ($infocarreras->result() as $row) {
          ?>
        <option value="<?php echo $row->id_vehiculo?>"><?php echo $row->numMovil?></option>
          <?php
        }
        ?>
      </select>

      <input type="text" class="form-control" name="nombre" placeholder="Escribe nombre" required>
      <input type="text" class="form-control" name="familia" placeholder="Escribe familia" minlength="3" maxlength="250" required>
      <input type="text" class="form-control" name="direccion" placeholder="Escribe direccion" required>
      <input type="number" min="1000000" max="99999999" class="form-control" name="telefono" placeholder="Escribe telefono" required>
    
      <button type="submit" class="btn btn-primary">INSERTAR RESERVA</button>

      <?php form_close(); ?>
      
    </div>
  </div>
</div>
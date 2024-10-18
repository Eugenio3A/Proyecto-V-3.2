<div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="<?php echo base_url(); ?>img/bootstrap-logo.svg" alt="" width="72" height="57">
      <h2>Panel de invitados</h2>
    </div>


    <?php echo form_open_multipart('usuarios/logout'); ?>
        <button type="submit" name="buton2" class="btn btn-danger">CERRAR SESIÓN</button>
      <?php echo form_close(); ?>

      <h2>Bienvenido <?php echo $this->session->userdata('cuenta'); ?></h2>


  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017–2021 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>
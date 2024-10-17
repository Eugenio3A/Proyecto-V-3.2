<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
      data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#"></a>
      <form class="d-flex align-items-center">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" style="width: 200px;">
        <button class="btn btn-outline-light" type="submit">Buscar</button>
      </form>
    </div>
  </nav>

  <div class="collapse" id="sidebarMenu">
    <div class="bg-dark p-4">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="<?php echo base_url(); ?>index.php/vehiculo/curso">Salir</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="<?php echo base_url(); ?>index.php/estudiante/curso">administrador</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="<?php echo base_url(); ?>index.php/Reservas/curso">Reservas</a>
        </li>
      </ul>
    </div>
  </div>
</header>

<style>
  body {
    padding-top: 56px; /* Ajusta este valor si el tamaño de la navbar cambia */
  }
  
  .navbar-toggler {
    position: fixed;
    top: 15px;
    left: 15px;
    z-index: 1030;
  }
  
  #sidebarMenu {
    position: fixed;
    top: 0;
    left: 0;
    width: 250px;
    height: 100%;
    z-index: 1040;
    background-color: #343a40; /* Mismo color de la barra superior */
    transition: transform 0.3s ease-in-out;
  }
</style>

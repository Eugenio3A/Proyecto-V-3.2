<div class="sidebar">
				<div class="scrollbar-inner sidebar-wrapper">
					<div class="user">
						<div class="photo">
							<img src="<?php echo base_url(); ?>aseetsHtml/assets/img/profile.jpg">
						</div>
						<div class="info">
							<a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
								<h2><?php echo $this->session->userdata('login'); ?></h2>
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample" aria-expanded="true" style="">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>


					<ul class="nav">
					<li class="nav-item ">
							<a href="<?php echo base_url();?>index.php/cliente/listaSolic">
								<i class="la la-home"></i>
								<p>Dashboard</p>
								<span class="badge badge-count">5</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url();?>index.php/cliente/listaClientes">
								<i class="la la-user"></i>
								<p> Lista Cliente</p>
								<span class="badge badge-count">14</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url();?>index.php/conductor/listaConductores">
								<i class="la la-taxi"></i>
								<p> Lista Conductores</p>
								<span class="badge badge-count">14</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url();?>index.php/reservas/movil">
								<i class="la la-calendar"></i>
								<p> Reservas</p>
								<span class="badge badge-count">50</span>
							</a>
						</li>
						<li class="nav-item">
							
							<a href="<?php echo base_url(); ?>index.php/pagos/agregar">
								<i class="la la-money"></i>
								<p> Pagos</p>
								<span class="badge badge-count">6</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>aseetsHtml/notifications.html">
								<i class="la la-bell"></i>
								<p> Reclamos</p>
								<span class="badge badge-success">3</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>aseetsHtml/typography.html">
								<i class="la la-edit"></i>
								<p> Reportes</p>
								<span class="badge badge-danger">25</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>aseetsHtml/typography.html">
								<i class="la la-map"></i>
								<p>Seguimiento</p>
								<span class="badge badge-danger">25</span>
							</a>
						</li>

						<li class="nav-item">
							<a href="<?php echo base_url(); ?>aseetsHtml/aseetsHtml/icons.html">
								<i class="la la-bullhorn"></i>
								<p> Publicidad</p>
							</a>
						</li>
						<li class="nav-item update-pro">
						    <a href="<?php echo base_url(); ?>index.php/usuarios/logout">
							<button  type="button" class="btn btn-primary">
								<i class="la la-hand-pointer-o"></i>
								<p>Serrar Secion</p>
							</button>
							</a>	

						</li>
					</ul>
				</div>
			</div>
			<div class="main-panel">
				
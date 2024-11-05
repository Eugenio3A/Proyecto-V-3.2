<h1>LISTA DE USUARIOS</h1>

<br>

<a href="<?php echo base_url(); ?>index.php/cliente/listaCliente">
<button type="button" class="btn btn-warning">VER HABILITADOS</button>
</a>


<table class="table">
	<thead>
		<th>No.</th>
		<th>Nombre</th>
		<th>Telefono</th>
		<th>Direccion</th>
		
	</thead>
	<tbody>
		<?php
		$contador=1;
		foreach($persona->result() as $row)
		{
		?>
		<tr>
			<td><?php echo $contador; ?></td>
			<td><?php echo $row->nombre; ?></td>
			<td><?php echo $row->telefono; ?></td>
			<td><?php echo $row->direccion; ?></td>
			<td>
<?php
echo form_open_multipart("cliente/habilitarbd");
?>
<input type="hidden" name="idCliente" value="<?php echo $row->idCliente; ?>">
<button type="submit" class="btn btn-warning">Habilitar</button>
<?php
echo form_close();
?>
			</td>
		</tr>
		<?php
		$contador++;
		}
		?>
	</tbody>
</table>

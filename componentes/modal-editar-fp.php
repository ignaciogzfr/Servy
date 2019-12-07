<div class="modal fade" id="modal-editar-fp" aria-hidden='true'>
  <div class="modal-dialog modal-lg rounded-0">
    <div class="modal-content">
		<form id="form-cambiar-fp" method="POST">

	      <div class="modal-header text-white main-color" >
	        Editar Foto de perfil
	      </div>


	      <div class="modal-body text-center">

			<div class="div-cambio-fp">
			<img src="img/placeholder-person.jpg" width="150" height="150" class="rounded-circle" id="fp-cambio-preview">
			</div>

			<div class="custom-file mt-3 col-md-6">
				<input type="file" class="custom-file-input fp-registro" id="fp-cambiar-imagen" lang="es" name="fp" accept="image/x-png,image/jpeg" value="img/placeholder.png">
				<label class="custom-file-label" for="fp-cambiar-imagen">Seleccionar Imagen</label>
			</div>


			<hr class="featurette-divider">


			<div>
			<?php 
	echo '<img src="'.$_SESSION['fp'].'" width="150" height="150" class="rounded-circle">';
	echo '<input type="hidden" value="'.$_SESSION['fp'].'" name="fp-actual">';
	?>
			</div>
	      </div>

	      <hr class="featurette-divider">


	      <div class="modal-footer float-right">
	      	<div>
	      		<button class="btn btn-md btn-success btn-cambiar-fp" type="submit">Guardar</button>
	      		<button class="btn btn-md btn-danger" type="button" data-toggle='modal' data-target='#modal-editar-fp'>Cancelar</button>
	      	</div>
	      </div>
	      <input type="hidden" value="editarPerfilFP" name="op">
	<?php echo '<input type="hidden" value="'.$_SESSION['id'].'" name="id">'; ?>
      	</form>
      </div>
    </div>
  </div>
</div>
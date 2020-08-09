<div class="modal fade" id="modal-ingresar-grua">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header text-white main-color">
				Ingresa un nuevo servicio de gruas
				<button class="close text-white" data-toggle="modal" data-target="#modal-ingresar-grua" aria-hidden="true">x</button>
			</div>
				<div class="modal-body text-center">
				<form method="POST" id="form-ingresar-grua">
					<div class="form-group">
					<label for="nombre-grua">Nombre servicio grua</label><br>
					<input type="text" name="nombre-grua">
					</div>

					<input type="hidden" name="tipo-usuario" value="grua">
					<input type="hidden" name="op" value="registrargrua">
				</div>
				<div class="modal-footer text-center">
					<button type="submit" class="btn-md btn btn-secondary mx-auto">
						ingresar nueva grua
					</button>
				
				</form>
				</div>
			
		</div>
	</div>
</div>
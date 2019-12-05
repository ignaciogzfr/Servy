<div class="modal fade" id="modal-denuncias-u">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header text-white main-color">
				Realizar una denuncia
				<button class="close text-white" data-toggle="modal" data-target="#modal-denuncias-p" aria-hidden="true">x</button>
			</div>
				<div class="modal-body text-center">
				<form method="POST" id="form-denunciar-u">
					<div class="form-group">
					<label for="tipo-denuncia-p">Eliga el Tipo de Denuncia</label>
					<select name="tipo_denuncia" id="tipo-denuncia-p" class="form-control">
						<?php require_once 'modelos/modelo-usuarios.php';
						$tipos = Usuarios::getTiposDenunciaU();
						for ($i=0; $i < count($tipos) ; $i++) { 
						 echo '<option value="'.$tipos[$i]['id_tipo_denuncia'].'">'.$tipos[$i]['tipo_denuncia'].'</option>';
						 } ?>
					</select>
					</div>
					<div class="form-group">
						<label for="detalle-denuncia-p">Escribe detalles al respecto(Opcional)</label>
						<textarea name="detalle" id="detalle-denuncia-p" rows="5" class="form-control"></textarea>
					</div>
					<input type="hidden" name="denunciado" value=<?php echo $_GET['id']; ?>>
					<input type="hidden" name="op" value="denunciarUsuario">
				
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn-md btn btn-secondary">
						ENVIAR
					</button>
					<button type="button" class="btn-md btn btn-danger" data-toggle="modal" data-target="#modal-denuncias-u">
						CERRAR
					</button>
				</form>
				</div>
			
		</div>
	</div>
</div>
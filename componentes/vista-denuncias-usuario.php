<?php 
$denuncias = Usuarios::getDenunciasUsuario($_GET["id"]);

echo('<hr class="featurette-divider">
<h3 class="text-center"> Denuncias <i class="fas fa-bullhorn"></i> </h3>
<hr class="featurette-divider">');
if (count($denuncias)== 0) {
echo ('<h6 class=" text-center alert-success w-100 py-2">Este usuario no cuenta con denuncias.</h6>');
 }else{
echo ('
 <div class=" mt-4 mb-5 ">
  <table class="table table-hover table-borderer">
  <thead class=" mdb-color text-white">
    <tr>
      <th scope="col">Denunciante</th>
      <th scope="col">Tipo denuncia</th>
      <th scope="col">Descripcion</th> 
    </tr>
  </thead>
  <tbody>
  ');
for($i=0;$i<count($denuncias);$i++){

echo('
<tr>
  <td>'.$denuncias[$i]["nombre_usuario"].'</td>
  <td>'.$denuncias[$i]["tipo_denuncia"].'</td>
  <td>'.$denuncias[$i]["comentarios_denuncia"].'</td>
</tr>

');
           }
            echo ('</tbody>
                </table></div>')
            ;}
         ?>
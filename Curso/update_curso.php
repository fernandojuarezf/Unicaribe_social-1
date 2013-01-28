
<?php
require('functions.php');

	if(isset($_GET['id'])){
		
		require('curso.class.php');
		$objCurso=new Curso();
		$consulta = $objCurso->ObtenerCurso($_GET['id']);
		$upComunidad = pg_fetch_array($consulta);
	?>
	<form id="frmUpComunidad" name="frmClienteActualizar" method="post" action="save_comunidad.php" >
    	<input type="hidden" name="cliente_id" id="id_comunidad" value="<?php echo $upComunidad['id_comunidad']?>" />
       
      <div id="messageBox"><label id="message"/></div>  

<table >
	<tr>
		<td>
			<label>Nombre</label>
		</td>
		<td>
			<input type="text" name="nombre"  value="<?php echo $upComunidad['nombre']?>" >
		</td>
		<td>
			<label>Fotografía</label>
		</td>
		<td>
			<input type="text" name="foto"> 
		</td>
	</tr>	
	
	<tr>
		<td>
			<label>Apellido Paterno: </label>
		</td>
		<td>
			<input type="text" name="apaterno"  value="<?php echo $upComunidad['apellido_paterno']?>" /> 
		</td>
		<td>
			<label>Apellido Paterno: </label> 
		</td>
		<td>
			<input type="text" name="amaterno"  value="<?php echo $upComunidad['apellido_materno']?>" />
		</td>
	</tr>
	
	<tr>
		<td>
			<label>Fecha de Nacimiento: </label>
		</td>
		<td>
			<input type="text" id="birth" name="fnacimiento"  value="<?php echo date('d/m/Y', strtotime($upComunidad['fecha_nacimiento'])) ?>" >
		</td>
		<td>
			<label>Tutor: </label>
		</td>
		<td>
			<input type="text" name="tutor"  value="<?php echo $upComunidad['tutor']?>" >  
		</td>
	</tr>
	
	<tr>
		<td>
			<label>Pariente:  </label> 
		</td>
		<td>
			<input type="text" name="pariente"  value="<?php echo $upComunidad['pariente']?>" >
		</td>
		<td>
			<label>Ubicacion: </label> 
		</td>
		<td>
			<input type="text" name="ubicacion"  value="<?php echo $upComunidad['ubicacion']?>" > 
		</td>
	</tr>
	
	<!-- <tr>
		<td>
			<label>Manzana: </label>
		</td>
		<td>
			<input type="text" name="manzana"  />  
		</td>
		<td>
			<label>Lote:  </label>
		</td>
		<td>
			<input type="text" name="lote"> 
		</td>
	</tr> -->
	<tr>
		<td>
			<label>Calle: </label>
		</td>
		<td>
			<input type="text" name="calle"  value="<?php echo $upComunidad['calle']?>" >
		</td>
		<td>
			<label>No. de Casa: </label>
		</td>
		<td>
			<input type="text" name="NoCasa" > 
		</td>
	</tr>
	
	<tr>
		<td>
			<label>Tel. de Casa: </label>
		</td>
		<td>
			<input type="text" name="tel_casa"  value="<?php echo $upComunidad['tel_casa']?>" >
		</td>
		<td>
			<label>Telefono particular:  </label>
		</td>
		<td>
			<input type="text" name="te_part"  value="<?php echo $upComunidad['tel_personal']?>" >
		</td>
	</tr>
	
	<tr>
		<td>
			<label>Telefono tutor:  </label> 
		</td>
		<td>
			<input type="text" name="tel_tuto"  value="<?php echo $upComunidad['tel_tutor']?>" >
		</td>
		<td>
			<label>Correo electronico: </label> 
		</td>
		<td>
			<input type="text" name="correo"  value="<?php echo $upComunidad['correo']?>" >
		</td>
	</tr>
	
	<tr>
		<td>
			<label>Escolaridad: </label>
		</td>
		<td>
			<input type="text" name="escolaridad"  value="<?php echo $upComunidad['escolaridad']?>" > 
		</td>
		<td>
			<label>Sexo: </label>
		</td>
		<td>
		<select class="m-wrap" name="sexo" >
		<option value="1" <?php if ($upComunidad['sexo'] == '1') echo ' selected="selected"'; ?>>Masculino</option>
		<option value="0" <?php if ($upComunidad['sexo'] == '0') echo ' selected="selected"'; ?>>Femenino</option>
		</select>
			
		</td>
	</tr>
	<tr>
		<td>
			 <label>Observaciones:
				</label>
		</td>
		<td colspan="3">
			<textarea rows="5" cols="20" name="note"  ><?php echo $upComunidad['observaciones'] ?></textarea> 
		</td>
		
	</tr>
	<tr>
		<td>
			<input type="submit" name="submit" id="button" value="Enviar"  class="m-btn blue rnd"/>
		</td>
		<td>
			 <input type="button" class="m-btn red rnd" name="cancelar" id="cancelar" value="Cancelar" onclick="Cancelar()" />
		</td>
		<td>
		
		</td>
		<td>
			
		</td>
	</tr>
	</table>


	</form>
	<?php
	}


?>
<script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
 <script type="text/javascript">
$(document).ready(function(){

    $('#frmUpComunidad').submit( function() {

        $.ajax({
            url     : $(this).attr('action'),
            type    : $(this).attr('method'),
            dataType: 'json',
            data    : $(this).serialize(),
            success : function( data ) {

            			if(data.success == true)
            			{
                         $('#message').text('Se ha actualizado correctamente el registro'); 
                         $('#messageBox').removeClass().addClass('success');
                         $('#messageBox').show();
					}
                      
                         },
                         
                     
            error   : function(data){
            	if(data.success == true)
            			{
                         $('#message').text('Se ha actualizado correctamente el registro'); 
                         $('#messageBox').removeClass().addClass('success');
                         $('#messageBox').show();
					}
					else{
                         $('#message').html(data.responseText); 
                         $('#messageBox').removeClass().addClass('error');
                        $('#messageBox').show();
                       
					}                     
				 }
        });

        return false;
    });

    $("#birth").mask("99/99/9999");

});
</script>
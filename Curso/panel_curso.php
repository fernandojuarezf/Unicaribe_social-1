
<!DOCTYPE HTML>
<html >
<head>
<link href="../css/m-icons.min.css" rel="stylesheet"> 
<link href="../css/m-buttons.min.css" rel="stylesheet"> 
<link href="../css/styles.css" rel="stylesheet"> 
</head>
<body>


<?php

include "curso.class.php";
$objCurso=new Curso;
$consulta=$objCurso->ObtenerCurso();

?>


<span id="nuevo"><a href="new_comunidad.php" class="m-btn"><i class="icon-plus"></i>Nuevo</a></span>
	<table>
   		<tr class="HeaderStyle">
            <th>ID</th>
   			<th>Nombre</th>
    		<th>Edad</th>
    		<th>Nivel </th>
    		<th>Cupo Maximo</th>           
            <th></th>
            <th></th>
        </tr>
        
<?php
if($consulta) {
	while( $cliente = pg_fetch_array($consulta) ){
?>
	
		  <tr id="<?php echo $cliente['id_curso'] ?>" class="GridStyle">
              <td><?php echo $cliente['id_curso'] ?></td>
			  <td><?php echo $cliente['curso'] ?></td>
			  <td><?php echo $cliente['edad'] ?></td>
			  <td><?php echo $cliente['nivel'] ?></td>
			  <td><?php echo $cliente['cupo_max'] ?></td>			  
			  <td><span class="modi">
              <a href="update_curso.php?id=<?php echo $cliente['id_curso'] ?>"><img src="../img/database_edit.png" title="Editar" 
              	alt="Editar" />      </a></span></td>
			  <td><a onClick="EliminarDato(<?php echo $cliente['id_curso'] ?>); return false" href="eliminar.php?id=<?php echo $cliente['id_curso'] ?>"class="m-btn mini red"><i class="icon-trash"></i> Eliminar</a></td>
		  </tr>
	<?php
	}
}
?>

    </table>

    <script type="text/javascript">

$(document).ready(function(){
	// mostrar formulario de actualizar datos 
	$("table tr .modi a").click(function(){
		$('#tabla').hide();
		$("#formulario").show();
		$.ajax({
			url: this.href,
			type: "GET",
			success: function(datos){
				$("#formulario").html(datos);
			}
		});
		return false;
	});
	
	// llamar a formulario nuevo
	$("#nuevo a").click(function(){
		$("#formulario").show();
		$("#tabla").hide();
		$.ajax({
			type: "GET",
			url: 'new_curso.php',
			success: function(datos){
				$("#formulario").html(datos);
			}
		});
		return false;
	});
});

</script>
</body>
</html>
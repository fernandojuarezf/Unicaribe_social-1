<?php include 'comunidad.class.php' ?>
<?php 
try
{

	
	$Comunidad = new Comunidad();
	$Comunidad->setValues($_POST['nombre'], $_POST['foto'],$_POST['apaterno'], $_POST['amaterno'], $_POST['fnacimiento'],
							$_POST['tutor'], $_POST['pariente'], $_POST['ubicacion'], $_POST['calle'], 
							$_POST['tel_casa'], $_POST['tel_tuto'], $_POST['te_part'], $_POST['escolaridad'] ,
							 $_POST['sexo'], $_POST['note'], $_POST['correo'], 'adress');


	if(!isset($_POST['cliente_id'])){
		$Comunidad->InsertComunidad();
		echo json_encode(array('success'=>'true'));
	}

	else
	{
		$Comunidad->setID($_POST['cliente_id']);
		$Comunidad->actualizar();
		echo json_encode(array('success'=>'true'));
		 
	}

} catch (Exception $e) {
    echo json_encode($e->getMessage()) ;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Validar formulario</title>
	<style>
		body{background-color: #264673; box-sizing: border-box; font-family: Arial;}

		form{
			background-color: white;
			padding: 10px;
			margin: 100px auto;
			width: 400px;
		}

		input[type=text], input[type=password]{
			padding: 10px;
			width: 380px;
		}
		input[type="submit"]{
			border: 0;
			background-color: #ED8824;
			padding: 10px 20px;
		}

		.error{
			background-color: #FF9185;
			font-size: 12px;
			padding: 10px;
		}
		.correcto{
			background-color: #A0DEA7;
			font-size: 12px;
			padding: 10px;
		}
	</style>
</head>
<body>
	<form action="validatingForms.php" method="POST">
		<?php
			//isset(retorna true si la variable existe)
			if(isset($_POST['nombre'])){
				$nombre = $_POST['nombre'];
				$password = $_POST['password'];
				$email = $_POST['email'];
                $prueba = "sfsfd@";
                echo strpos($prueba,"@")=== false;
            //Creo un arreglo vacio donde voy a insertar los datos que quiera mostrar.
				$campos = array();

            //Si no hay nombre, inserto en campos la cadena
				if($nombre == ""){
					array_push($campos, "El campo Nombre no pude estar vacío");
				}
            //Si no hay passwor, o este es menos a 6 caracteres, inserto en campos la cadena

				if($password == "" || strlen($password) < 6){
					array_push($campos, "El campo Password no puede estar vacío, ni tener menos de 6 caracteres.");
				}
            //Si email esta vacio o no tiene @.
				if($email == "" || strpos($email, "@") === false){
					array_push($campos, "Ingresa un correo electrónico válido.");
				}
            //Si $campos tiene elementos, entonces es porqe hubo un error y lo imprimo
				if(count($campos) > 0){
					echo "<div class='error'>";
					for($i = 0; $i < count($campos); $i++){
						echo "<li>".$campos[$i]."</li>";
					}
            //Si $campos no tiene elementos,no hubo errores.
				}else{
					echo "<div class='correcto'>
							Datos correctos";
				}
				echo "</div>";
			}
		?>
		<p>
		Nombre:<br/>
		<input type="text" name="nombre">
		</p>

		<p>
		Password:<br/>
		<input type="password" name="password">
		</p>

		<p>
		correo electrónico:<br/>
		<input type="text" name="email">
		</p>

		<p><input type="submit" value="enviar datos"></p> 
	</form>
</body>
</html>
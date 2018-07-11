<!DOCTYPE html>
    <html lang="en" class="no-js"> 
        <meta charset="UTF-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    </head>
    <body>
		<?php
		@session_start();

		$conexion = mysqli_connect("localhost", "root", "", "cultura");

		if (!$conexion) {
		    echo "Error: No se pudo conectar a MySQL." ;
		}else{
			$correo = $_POST["correo"];
			$password = $_POST["password"];
			
			$_SESSION["k_username"] = "";
			$_SESSION["k_nombre"] = "";
			$_SESSION["k_id_usuario"] = "";

			if($correo != " " && $password != " "){					 
				#$result = mysqli_query($conexion,'SELECT id_usuario, password, usuario, nombre FROM usuarios WHERE usuario="' . $usuario . '"');
				if (!mysqli_multi_query($conexion,"CALL consultar_correo('" . $correo . "')")) {
			    	echo "Falló CALL: ";
				} else {
					if($resultado = mysqli_store_result($conexion)){
						$row = mysqli_fetch_array($resultado);
						if($correo == "soyla@admin.com"){
							if($password == "123"){
								@session_start();
								$_SESSION["k_username"] = "Admin";
								$_SESSION["k_nombre"] = "Admin";
								$_SESSION["k_id_usuario"] = "Admin";
							?>	
								<script language="javascript">
								location.href = "admin.php";
								</script>
							<?php

							}else{
							?>			
								<script language="javascript">
								alert('Contraseña incorrecta, intentelo nuevamente');
								location.href = "ingresar.html";
								</script>
							<?php
							}

						}
						else if($row["CORREO"] == $correo){
							if($row["PASSWORD"] == $password){
								$_SESSION["k_username"] = $row['NOM_U'];
								$_SESSION["k_nombre"] = $row['NOM_U'];
								$_SESSION["k_id_usuario"] = $row['ID_U'];
								$_SESSION["k_password"] = $row['PASSWORD'];
								$_SESSION["k_correo"] = $row['CORREO'];
								$_SESSION["k_notif"] = $row['NOTIF'];
							?>			
								<script language="javascript">
								location.href = "clasificacion.php";
								</script>
							<?php
							}else{
							?>			
								<script language="javascript">
								alert('Contraseña incorrecta, intentelo nuevamente');
								location.href = "ingresar.html";
								</script>
							<?php
							}
						}else{
						?>			
							<script language="javascript">
							alert('Correo no existe, intentelo nuevamente');
							location.href = "ingresar.html";
							</script>
						<?php
						}
					}else{
					?>			
						<script language="javascript">
						alert('No se realizó el query');
						location.href = "ingresar.html";
						</script>
					<?php
					}
				}					
			} else {
			?>			
				<script language="javascript">
				alert('Debe especificar un usuario y password');
				</script>
			<?php
			}
		}
		mysqli_close($conexion);
		?>
	</body>

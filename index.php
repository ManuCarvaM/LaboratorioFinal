<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UFT-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Formulario de Registro CRUD</title>
        <link rel="stylesheet" href="registro.css" type="text/css">
    </head>
    <body>

        <div class="titulo"><h2>¡Regístrate para no perderte nuestras novedades!</h2></div>
        <form action="" method="POST">
            
            <div class="formulario">
            <label for="nombre">Nombre:</label> <br> 
            <label><input type="text" name="nombre" placeholder="Introduzca su nombre" size="50" required/ ></label> <br> 

            <label for="apellido">Primer apellido:</label> <br> 
            <label><input type="text" name="primer_apellido" placeholder="Introduzca su primer apellido" size="50" required/ ></label> <br> 

            <label for="apellido">Segundo apellido:</label> <br> 
            <label><input type="text" name="segundo_apellido" placeholder="Introduzca su segundo apellido" size="50" required/ ></label> <br> 

            <label for="email">Email:</label> <br> 
            <label><input type="email" name="email" placeholder="ejemplo@ejemplo.com"  size="50" required/ ></label> <br>

            <label for="login">Login:</label> <br>
            <label><input type="text" name="login" placeholder="Nombre de usuario" size="50" required/></label> <br>

            <label for="password">Password:</label> <br>
            <label><input type="password" minlength="4" maxlength="8" size="50" name="clave" placeholder="Clave" required></label> <br> <br>
            </div>

            <div class="botones">
            <input type="submit" name="submit" value="Enviar" />
            <input type="reset" name="reset" value="Reset"/>
            </div>

            <?php
    if(isset($_POST['nombre'])) {

        $nombre = $_POST['nombre'];
        $primerapellido = $_POST['primer_apellido'];
        $segundoapellido = $_POST['segundo_apellido'];
        $email =  $_POST['email'];
        $login = $_POST['login'];
        $clave = $_POST['clave'];

        $campos = array();

        if($nombre == ""){
            array_push($campos, "Debes introducir tu nombre");
        }

        if($primerapellido == ""){
            array_push($campos, "Debes introducir tu primer apellido");
        }

        if($segundoapellido == ""){
            array_push($campos, "Debes introducir tu segubdo apellido");
        }

        if($email == "" || strpos($email, "@") === false){
            array_push($campos, "Debes introducir un correo electrónico válido");

        }

        if($login == ""){
            array_push($campos, "Debes crear un nombre de usuario");
        }

        if($clave == "" || strlen($clave) < 4 && strlen($clave) > 8 ){
            array_push($campos, "Debes introducir una contraseña entre 4 y 8 caracteres");
        }

        if(count($campos) > 0){
            echo "Por favor, rellena los campos";
            for($i = 0; $i < count($campos); $i++){
                echo "<li>" .$campos[$i]."</li>";
            }
        } else {
             //conexión bbdd  
             $servername = "localhost";
             $username = "root";
             $password = "";
             $dbname = "servidorcursosql";
          
             //crear conexion base datos
             $conexion = new mysqli($servername, $username, $password, $dbname);        
 
             if ($conexion->connect_error) {
                 die("Conexión fallida: ". $conexion->connect_error); 
             }
 
             $sql = "INSERT INTO usuarios (NOMBRE, PRIMER_APELLIDO, SEGUNDO_APELLIDO, EMAIL, LOGIN, PASSWORD)
             VALUES ('$nombre', '$primerapellido', '$segundoapellido','$email', '$login', '$clave')";
 
 
             if ($conexion->query($sql) === TRUE) {
                 echo '<script language="Javascript"> alert (" tu registro se ha realizado de forma satisfactoria.") </script>';
             } else {
                 echo "Error: " . $sql . "<br>" . $conexion->error;
             }
 
             $conexion->close();
     
        }
    }

           
?>
            
        </form>  

        <div class="boton1">
        <a href="index2.php"><input type="submit" name="consulta" value="Consulta" /></a>
        
        </div>    
    </body>
</html>  

        
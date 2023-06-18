<!DOCTYPE html>
<html>
<body>
<?php 

$nombre = 'nombre';
$primerapellido = 'primer_apellido';
$segundoapellido = 'segundo_apellido';
$email =  'email';
$login = 'login';
$clave = 'clave'; 
$query = "SELECT * FROM usuarios";

             //conexión bbdd  
             $servername = "localhost";
             $username = "root";
             $password = "";
             $dbname = "servidorcursosql";
          
             //crear conexion base datos
             $mysqli = new mysqli($servername, $username, $password, $dbname); 

echo '<table border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <font face="Arial">Nombre</font> </td> 
          <td> <font face="Arial">Primer Apellido</font> </td> 
          <td> <font face="Arial">Segundo Apellido</font> </td> 
          <td> <font face="Arial">Email</font> </td> 
          <td> <font face="Arial">Login</font> </td> 
      </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $nombre = `nombre`;
        $primerapellido = `primer_apellido`;
        $segundoapellido = `segundo_apellido`;
        $email = `email`;
        $login = `login`;

        echo '<tr> 
                  <td>'.$nombre.'</td> 
                  <td>'.$primerapellido.'</td> 
                  <td>'.$segundoapellido.'</td> 
                  <td>'.$email.'</td> 
                  <td>'.$login.'</td> 
              </tr>';
    }
    $result->free();
} 
?>
</body>
</html>
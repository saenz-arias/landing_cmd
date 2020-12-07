<?php

// INSERTAR DATOS POR MSQLI
// $conexion = mysqli_connect("www.aula-ec.com", "aulaec_aulaec", "pasajero47", "aulaec_atomo");
// //Recibir datos y almacenar en variables
// $name = $_POST["name"];
// $phone = $_POST["phone"];
// $email_address = $_POST["email"];

// //Consulta para insertar
// $insertar = "INSERT INTO clientes(name, phone, email_address) VALUES ('$name', '$phone',  '$email_address')";
// //Ejecutar consulta
// $resultado = mysqli_query($conexion, $insertar);
// if (!$resultado) {
//         echo "Usuario no registrado";
  
// }else { 
//          header ("Location:index.html");
//    }
//    //Cierre e conexion
//    mysqli_close($conexion);




   // PDO DB CONNECT
   
   $servername = "www.aula-ec.com";
   $dbname = "aulaec_atomo";
   $username = "aulaec_aulaec";
   $password = "pasajero47";

  //  define( $servername, 'http://example.com' );

   try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $insert = $conn->prepare("INSERT INTO landing(name, email, web)
            VALUES (:name, :email, :web)");
  
    $insert->bindParam(':name', $name);
    $insert->bindParam(':email', $email);
    $insert->bindParam(':web', $web);
  
    $name = $_POST["name"];
    $email = $_POST["email"];
    $web = $_POST["web"];
  
    $insert->execute();
    
    echo "New record created successfully";
  } catch(PDOException $e) {
    echo $insert . "<br>" . $e->getMessage();
    // echo $sql . "<br>" . $e->getMessage();
  }


  $conn = null;





?>
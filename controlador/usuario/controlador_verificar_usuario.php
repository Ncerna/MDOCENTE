<?php

    use Nullix\CryptoJsAes\CryptoJsAes;
    
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require "../../Login/src/CryptoJsAes.php";
    require '../../modelo/modelo_usuario.php';
    $MU = new Modelo_Usuario();
    $usuario = htmlspecialchars($_POST['usuario'],ENT_QUOTES,'UTF-8');
    $contra = htmlspecialchars($_POST['contracena'],ENT_QUOTES,'UTF-8');
    $tokenGui = htmlspecialchars($_POST['token'],ENT_QUOTES,'UTF-8');
    //GENERANDO TOKEN
    $clave='KEY_PRIVATE-SHA256';
    $token = CryptoJsAes::encrypt(date('Y-m-d H:i:s').$clave, $clave);
    
    //QUITAR CARACTERES
     $usuario= limpiar_cadena($usuario);

     //CONSULTA USUARIO Y CONTRASEÑA
     $consulta = $MU->VerificarUsuario($usuario,$contra);

     //CONTRASEÑAS COIDEDEN?
    if($consulta !=403 ){
            
            //CONTRASEÑAS COICIDE PERO USUSRIO NO?
            if(count($consulta, COUNT_RECURSIVE)>0){
            //GUARDANDO EL TOQUEN
             $MU->Genera_token_Seccion($consulta[0]['usu_id'],$token);
             //QUITAR LA CONTRASEÑA DE LA CONSULTA
             unset($consulta['usu_contrasena']);

            //ADD TOQUEN HEADER CONSULTA
              $consulta[]=array("token"=>$token);
      
              //ENCRYT ID USUARIO CON EL algoritmo_AES
              $ID = CryptoJsAes::encrypt('Y-m-d H:i:s',$clave);
              $consulta[] = $consulta[0]['usu_id']=$ID;

              echo  json_encode($consulta);
             }else{
                echo 402;
             }
            



     }else{
     echo $consulta;
 }




     //GUARDANDO EL TOQUEN
     //  $MU->Genera_token_Seccion($consulta[0]['usu_id'],$contra)

      //AÑADIENDO TOQUE AL LA RESPUESTA
     // $consulta[]=array("token"=>$token);

     //CAMBIANDO ID USUSRIO
   //  

     //array_splice($consulta,1);

     //unset($consulta['usu_id']);($consulta[0]['usu_id']);


     







     //$reqest = CryptoJsAes::encrypt($consulta, $clave);

     //Genera_token_Seccion($token);
//
   // echo json_encode($reqest);
    
    //guar arcivoss en php
/*$data = json_decode(file_get_contents('../../controlador/token_AES256.json'));
    file_put_contents('../../controlador/token_AES256.json',json_encode($token, JSON_PRETTY_PRINT));

*/



/*
    $decrypted = CryptoJsAes::decrypt(json_decode(file_get_contents('../../controlador/token_AES256.json')), $clave);

     $consulta = $MU->listar_combo_rol();


*/
   
  }



    # Limpiar cadenas de texto #
    function limpiar_cadena($cadena){
        $cadena=trim($cadena);
        $cadena=stripslashes($cadena);
        $cadena=str_ireplace("<script>", "", $cadena);
        $cadena=str_ireplace("</script>", "", $cadena);
        $cadena=str_ireplace("<script src", "", $cadena);
        $cadena=str_ireplace("<script type=", "", $cadena);
        $cadena=str_ireplace("SELECT * FROM", "", $cadena);
        $cadena=str_ireplace("DELETE FROM", "", $cadena);
        $cadena=str_ireplace("INSERT INTO", "", $cadena);
        $cadena=str_ireplace("DROP TABLE", "", $cadena);
        $cadena=str_ireplace("DROP DATABASE", "", $cadena);
        $cadena=str_ireplace("TRUNCATE TABLE", "", $cadena);
        $cadena=str_ireplace("SHOW TABLES;", "", $cadena);
        $cadena=str_ireplace("SHOW DATABASES;", "", $cadena);
        $cadena=str_ireplace("<?php", "", $cadena);
        $cadena=str_ireplace("?>", "", $cadena);
        $cadena=str_ireplace("--", "", $cadena);
        $cadena=str_ireplace("^", "", $cadena);
        $cadena=str_ireplace("<", "", $cadena);
        $cadena=str_ireplace("[", "", $cadena);
        $cadena=str_ireplace("]", "", $cadena);
        $cadena=str_ireplace("==", "", $cadena);
        $cadena=str_ireplace(";", "", $cadena);
        $cadena=str_ireplace("::", "", $cadena);
        $cadena=trim($cadena);
        $cadena=stripslashes($cadena);
        return $cadena;
    }

?>
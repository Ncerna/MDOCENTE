<?php

class Modelo_Usuario{
    private $conexion;
    function __construct(){
        require_once 'modelo_conexion.php';
        $this->conexion = new conexion();
        $this->conexion->conectar();
    }
        

     function VerificarUsuario($usuario,$contra){
      $sql = "select  usu_id,usu_usuario,usu_nombre,usu_contrasena,rol_nombre,usu_estatus from usuarios
             inner join  rol on rol.rol_id = usuarios.rol_id
             where usu_usuario='$usuario' ";

             $arreglo = array();
           if ($consulta = $this->conexion->conexion->query($sql)) {
              while ($consulta_VU = mysqli_fetch_array($consulta)) {
                if(password_verify($contra, $consulta_VU["usu_contrasena"]))
                {
                    $arreglo[] = $consulta_VU;
                }else{

                  return 403;
                }
              }
             return $arreglo;
            $this->conexion->cerrar();
        }
    }

function Genera_token_Seccion($usuario,$token){
 $sql = "UPDATE usuarios SET toke_loguin = '$token',date_sessio= NOW() WHERE usu_id = '$usuario'";
  if ($consulta = $this->conexion->conexion->query($sql)) {
    return 1;
    
  }else{
    return 0;
  }

}


function Registrar_Docente($id_docente,$nombre,$apellido,$usuario, $contra, $cbm_rol){
  $id_docente = $id_docente? $id_docente:'0';
    $sql = "INSERT INTO usuarios(identf,usu_usuario,usu_nombre,usu_apellidos,usu_contrasena,rol_id)
     VALUES ('$id_docente','$usuario','$nombre','$apellido','$contra','$cbm_rol')";
        if ($consulta = $this->conexion->conexion->query($sql)) {
       return 1;
        }else{
            return 0;
    }

}

function Registrar_Alumno($id_alumno,$nombre,$apellido,$usuario, $contra, $cbm_rol){
  $id_alumno = $id_alumno? $id_alumno:'0';
  $sql = "INSERT INTO usuarios(identf,usu_usuario,usu_nombre,usu_apellidos,usu_contrasena,rol_id)
   VALUES ('$id_alumno','$usuario','$nombre','$apellido','$contra',' $cbm_rol')";
        if ($consulta = $this->conexion->conexion->query($sql)) {
       return 1;
        }else{
            return 0;
    }
}
function Registrar_Usuario($id_otro,$nombre,$apellido,$usuario,$contra, $cbm_rol){
  $id_otro=$id_otro? $id_otro:'0';
  $sql = "INSERT INTO usuarios(identf,usu_usuario,usu_nombre,usu_apellidos,usu_contrasena,rol_id)
   VALUES ('$id_otro','$usuario','$nombre','$apellido','$contra',' $cbm_rol')";
        if ($consulta = $this->conexion->conexion->query($sql)) {
       return 1;
        }else{
            return 0;
    }
}

function Verificar_Existe_Usuario($cbm_rol,$usuario){
$sql=  "select usu_usuario,rol_id from usuarios where usu_usuario='$usuario' and rol_id='$cbm_rol' ";

        $arreglo = array();
        if ($consulta = $this->conexion->conexion->query($sql)) {
            while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
                $arreglo[]=$consulta_VU;
            }
            return count($arreglo);
            $this->conexion->cerrar();
        }

}

      function listar_usuario(){
       $sql=  "select usu_id,usu_usuario,usu_nombre,usu_apellidos, rol.rol_nombre,usu_estatus from usuarios

        inner join  rol on usuarios.rol_id= rol.rol_id";

        $arreglo = array();
        if ($consulta = $this->conexion->conexion->query($sql)) {
            while ($consulta_VU = mysqli_fetch_assoc($consulta)) {

                $arreglo["data"][]=$consulta_VU;

            }
            return $arreglo;
            $this->conexion->cerrar();
        }
    }

    function listar_combo_rol(){
         $sql = "SELECT rol_id,rol_nombre FROM rol";
        $arreglo = array();
        if ($consulta = $this->conexion->conexion->query($sql)) {
            while ($consulta_VU = mysqli_fetch_array($consulta)) {
                    $arreglo[] = $consulta_VU;
            }
            return $arreglo;
            $this->conexion->cerrar();
        }
    }


function Modificar_Estatus_Usuario($idusuario,$estatus){
   $sql = "UPDATE usuarios SET usu_estatus = '$estatus' WHERE usu_id = '$idusuario'";
	if ($consulta = $this->conexion->conexion->query($sql)) {
		return 1;
		
	}else{
		return 0;
	}
}

  function CambiarContra_Usuario($usuid,$contranew,$newfoto){
         $sql = "UPDATE usuarios SET usu_contrasena = '$contranew',usu_foto='$newfoto' WHERE usu_id = '$usuid'";
        if ($consulta = $this->conexion->conexion->query($sql)) {      
          return 1;
          
        }else{
          return 0;
        }
  }

  function CambiarContra_Usuario_sinfoto($usuid,$contranew,$fotoActual){
         $sql = "UPDATE usuarios SET usu_contrasena = '$contranew',usu_foto='$fotoActual' WHERE usu_id = '$usuid'";
        if ($consulta = $this->conexion->conexion->query($sql)) {      
          return 1;
          
        }else{
          return 0;
        }
  }


  function Datos_Usuario_eliminar( $idusuario){
        $sql=   "DELETE FROM usuarios WHERE usu_id = '$idusuario'";

  if ($consulta = $this->conexion->conexion->query($sql)) {
    return 1;
    
  }else{
    return 0;
  }
    }

   function Modificar_Datos_Usuario( $idusuario,$nombre,$apellido,$sexo,$rol){
       $sql = "UPDATE usuarios SET usu_nombre='$nombre', usu_sexo = '$sexo',rol_id = '$rol',usu_apellido='$apellido' WHERE usu_id = '$idusuario'";
      if ($consulta = $this->conexion->conexion->query($sql)) {
          return 1; 
      }else{
          return 0;
      }
  }


    function Extraer_contracena($usu_id){
         $sql = "SELECT usu_id,usu_contrasena,usu_foto FROM usuarios WHERE usu_id='$usu_id'";
      $arreglo = array();
      if ($consulta = $this->conexion->conexion->query($sql)) {
          while ($consulta_VU = mysqli_fetch_array($consulta)) {
             
                  $arreglo[] = $consulta_VU;
              
          }
          return $arreglo;
          $this->conexion->cerrar();
      }
  }

function Extraer_Datos_Alumno($idalumno){
  $sql=  " select apellidos, alumnonombre,dni,rolalumno from alumno where bajaAlumn='1' and idalumno='$idalumno'";
      $arreglo = array();
      if ($consulta = $this->conexion->conexion->query($sql)) {
          while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
              $arreglo[]=$consulta_VU;
          }
          return $arreglo;
          $this->conexion->cerrar();
      }
}


}
?>
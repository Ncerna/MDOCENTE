<?php

class Modelo_Docente{
    private $conexion;
    function __construct(){
        require_once 'modelo_conexion.php';
        $this->conexion = new conexion();
        $this->conexion->conectar();
    }

    function listar_docente(){
        $sql=  "select id_docente,nombres,apellidos,dni,email,telefono,codigo,tipo_docente,estado_baja,userSession,rol.rol_nombre,niveles.nombreNivell from docentes
        inner join  rol on docentes.rol_id=rol.rol_id inner join niveles on docentes.nivelId=niveles.idniveles";
 
         $arreglo = array();
         if ($consulta = $this->conexion->conexion->query($sql)) {
             while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
 
                 $arreglo["data"][]=$consulta_VU;
 
             }
             return $arreglo;
             $this->conexion->cerrar();
         }
     }

    function Registrar_Docente($id_docente,$nombres,$apellidos,$dni,$email, $telefono,$codigo, $tipo_docente,$estado_baja,$userSession,$rol_id,$nivelId){
        $id_docente=$id_docente? $id_docente:'0';
        $sql = "INSERT INTO docentes(id_docente,nombres,apellidos,dni,email,telefono,codigo,tipo_docente,estado_baja,userSession, rol_id, nivelId)
         VALUES ('$id_docente','$nombres','$apellidos','$dni','$email',' $telefono','$codigo','$tipo_docente','$estado_baja','$userSession','$rol_id','$nivelId')";
              if ($consulta = $this->conexion->conexion->query($sql)) {
             return 1;
              }else{
                  return 0;
          }
          $this->conexion->cerrar();
      }

}
?>
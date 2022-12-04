<?php
session_start();
if(isset($_SESSION['S_IDUSUARIO'])){
	header('Location: ../vista/index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>login</title>

    <link rel="stylesheet" type="text/css" href="css/plantilla.css">
</style>
</head>
<body>
    
<div class="contenido">
     <center>
      <fieldset>
        <div class="user-wrapper">
           <center>
            <img src="vendor/images.png" width="80px" height="80px" alt=""></center> 
            <div><br>

               <legend>Iniciar Sesi&oacute;n</legend>
               <p>sistema de gesti&oacute;n académico</p>
               
               <div class="loader" hidden>
                <img src="vendor/abc.gif" alt="" style="width: 50px;height:50px;">
            </div>
            <div id="pass_incorecto" class="alert alert-danger sm" role="alert" hidden>
                contraseña Es incorecto!
            </div>
            <div id="user_incorecto" class="alert alert-danger sm" role="alert" hidden>
                Usuario Es incorecto!
            </div>
            <div id="notif" class="alert alert-danger " role="alert" hidden>
                su cuenta esta inactivo!
            </div>

            <div id="llenecamp" class="alert alert-danger" role="alert" hidden>
              Llene los campos vacios!
          </div>

            <input type="text" name="email" placeholder="Usuario" autofocus id="txt_usuario" autocomplete="null" required 

            onkeypress = "return (event.charCode > 63 &&   event.charCode < 91) ||
             (event. charCode > 96 && event.charCode < 123)||(event. charCode >47 && event.charCode<58)||(event. charCode>44 && event. charCode<47)||(event. charCode==95)" value="CERNA_123">
                
            <input type="password" name="contra" placeholder="password" id="txt_contracena"  required onkeypress = "return (event.charCode > 63 &&   event.charCode < 91) ||
             (event. charCode > 96 && event.charCode < 123)||(event. charCode >34 && event.charCode<39)||(event. charCode>47 && event. charCode<58)||(event. charCode==42)" value="admin">
              <br>

              <input type="text" name="" id="tokenSHA256" hidden style="display: none">
              <input type="submit" name="login" value="INGRESAR" onclick="VerificarUsuario()">
 
      </fieldset>
      </center>
</div> 

 

	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--=================================================================-->
	<script src="../js/usuario.js"></script>



<script>
  $(document).ready(function() {
txt_usuario.focus();
generateToken();
} );


 function generateToken() {
            var pass = '';
            var str = 'AB$CD"#&[EF?GHI$y$J/KLMñNO8PQRSTUVWXYZ' + 
                    'ab4cde/fghijklmn4opqrstu4vwxyz0123456789@#$';
            for (i = 1; i <= 96; i++) {
                var char = Math.floor(Math.random()* str.length + 1);
                pass += str.charAt(char);
            }
            $("#tokenSHA256").val(pass);
        }
</script>


</body>

</html>
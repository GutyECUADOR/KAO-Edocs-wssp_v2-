<?php namespace controllers;

class loginController  {

    public $loginModel;

    public function __construct()
    {
        require_once 'config/global.php';
        require_once 'core/models/loginModel.php';
        $this->loginModel = new \models\loginModel();
    }
    
    public function loadtemplate() {
        require_once 'views\template.php';
    }
    
    public function actionCatcherController(){
        if (isset($_POST['txt_usuario'])&& isset($_POST['txt_password'])) {
            
            
                $arrayDatos = array("usuario"=>$_POST['txt_usuario'],"password"=>$_POST['txt_password']);
               
                //Verificacion de registro en base de datos
                $arrayResultados = $this->loginModel->validaIngreso($arrayDatos);
               
                //Funcion validar acceso retorna array de resultados
                    if (!empty($arrayResultados)) {
                        session_start();
                        
                        $_SESSION["usuarioRUC"] =  $arrayResultados[0]['ruc'] ;
                        $_SESSION["usuarioNOMBRE"] =  $arrayResultados[0]['nombre'] ;
                        $_SESSION["usuarioEMAIL"] =  $arrayResultados[0]['email'] ;
                        $_SESSION["usuarioESTADO"] =  $arrayResultados[0]['estado'] ;
                        
                        header("Location: index.php?&action=inicio");
                        
                      
                    }else{
                        echo '
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <p>Error al iniciar sesion: Usuario o contraseña incorrecta.</p>
                          </div>';
                       
                    }
                
               
        }
        
            
      
        
       
    }
    

    public function resetPassword(){

        if (isset($_POST['txt_recuperaMail'])&& isset($_POST['action'])) {

            $maildestinatario = $_POST['txt_recuperaMail'];
            $mailenDB = $maildestinatario.";".EDOCS_MAIL;
           
            $arrayResultados = $this->loginModel->validaMail($mailenDB);

            if ($arrayResultados){
                // Varios destinatarios
                $para  = $maildestinatario . ', '; // atención a la coma
                // título
                $título = 'RESTABLECIMIENTO DE CONTRASENA KAO';
                // mensaje
                $mensaje = '
                <html>
                    <head>
                    <title>RESTABLECIMIENTO DE PASSWORD - KAOSPORT</title>
                    </head>
                    <body>
                        <p>Estes es un mensaje de recuperacion!, no responda este mensaje</p>
                        <p>Nombre: '.$arrayResultados['nombre'].'</p>
                        <p>Usuario: '.$arrayResultados['ruc'].'</p>
                        <p>Password: '.$arrayResultados['password'].'</p>
                    </body>
                </html>
                <label><br>No comparta sus datos de acceso.</label>    ';

                // Para enviar un correo HTML, debe establecerse la cabecera Content-type
                $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                // Cabeceras adicionales
                $cabeceras .= 'To:'. $maildestinatario . "\r\n";
                $cabeceras .= 'From: KAOSPORTCENTER <admin@kaosport.com>' . "\r\n";


                // Enviarlo
                    if (mail($para, $título, $mensaje, $cabeceras)){
                       
                        echo '
                        <div class="alert alert-info alert-dismissible fade in" role="alert">
                            <p>Envio correcto a: '.$maildestinatario.'. verifique el mail en su bandeja de entrada.</p>
                            
                        </div>';            
                    }else{
                        echo '
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <p>Error, No se pudo enviar datos al correo '.$maildestinatario.'. Comuníquese con KAO Oficinas para reestablecer su acceso.</p>
                            
                        </div>';
                    }
            }
            else{
                    echo '
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <p>No se encontraron clientes registrados con: '.$mailenDB.'. Comuníquese con KAO Oficinas para reestablecer su acceso.</p>
                        
                    </div>';
                }

        }
    }
}

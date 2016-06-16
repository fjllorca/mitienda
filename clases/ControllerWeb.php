<?php

class ControllerWeb extends Controller {

    function principal() {
        $postcontenido = '';
        $precontenido = '';
        $carrito='';
        $contenido='';
        if(Request::req("login")==="ok"){
            $precontenido = '<div class="alert alert-success" role="alert">'.
                            '<strong>¡Correcto!</strong> Login realizado, identificación  completada.'.
                            '</div>';
        } elseif (Request::req("login")==="fail"){
            $precontenido = '<div class="alert alert-danger" role="alert">'.
                            '<strong>¡Inorrecto!</strong><br>Login no realizado, identificación no completada.'.
                            '</div>';
        }
        if($this->getSesion()->isLogged()){
            $this->setData('login', file_get_contents('theme/dpr/_logout.html'));
            $usuario = $this->getSesion()->getUser();
            $this->setData('usuario', $usuario->getNombre());
            if($usuario->getTipo() === "administrador"){
               $postcontenido =  file_get_contents('theme/dpr/_seleccionAdministradores.html');
            }
            if($usuario->getTipo() === "usuario"){
               $postcontenido =  file_get_contents('theme/dpr/_seleccionUsuarios.html');
              $carrito =  file_get_contents('theme/dpr/_carrito.html');
              
            }
            
            
        } else {
            $this->setData('login', file_get_contents('theme/dpr/_login.html'));
            if(Request::req("accion")==="registrar"){
               $contenido =  file_get_contents('theme/dpr/_registrar.html');
            }
            
            
            //$this->setData('login', false);
        }
        if(Request::req("insertar")==="1"){
            $precontenido = '<div class="alert alert-success" role="alert">'.
                            '<strong>Well done!</strong> successfully.'.
                            '</div>';
               }else  if(Request::req("insertar")==="-1"){  $precontenido = '<div class="alert alert-danger" role="alert">'.
                            '<strong>Bad done!</strong><br>You read this important alert message.'.
                            '</div>';
               
               }
               
        
       
        
        $this->setData('precontenido', $precontenido);
        $this->setData('contenido', $contenido);
        $this->setData('postcontenido',  $postcontenido);
        $this->setData('carrito',  $carrito);
        
    }
   
    
}
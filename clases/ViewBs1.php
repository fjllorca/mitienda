<?php

class ViewBs1 extends View{
     function render() {
        
        $contenido = file_get_contents('theme/dpr/_pre.html').$this->getModelo()->getText().file_get_contents('theme/dpr/_post.html');
        return $contenido;
     }
}

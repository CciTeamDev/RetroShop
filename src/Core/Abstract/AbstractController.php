<?php

namespace App\Core\Abstract;


abstract class AbstractController{

    const BASEPATH = 'templates/';

    public function render(string $path,array $datas){
        ob_start();//début de la mémoire tampon;
        include self::BASEPATH.'header.html';
        extract($datas);
        $absolutPath = self::BASEPATH.$path;
        include $absolutPath;
        include self::BASEPATH.'footer.html';
        echo ob_get_clean();//vidange de la mémoire tampon et fermeture;
        //dump(ob_get_clean());
    
        
    }

    
}

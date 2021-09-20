<?php

namespace App\Controller\Pages;

use App\Utils\View;

class Pages{

    /**
     * Método responsável por
     * retornar o header da
     * página
     * @return string
     */
    private static function getHeader(){
        return View::render('pages/header', [
            't_path' => T_PATH
        ]);
    }

    /**
     * Método responsável por
     * retornar o footer da
     * página
     * @return string
     */
    private static function getFooter(){
        return View::render('pages/footer');
    }

    /**
     * Método responsável por
     * retornar a página em si
     * @param string $title
     * @param string $content
     * @return string
     */
    public static function getPage($title, $content){
        return View::render('pages/page', [
            'css' => View::getCSS("global"),
            'title' => "$title | LuMath",
            'header' => self::getHeader(),
            'content' => $content,
            'footer' => self::getFooter(),
            'javascript' => View::getJS("global")
        ]);
    }

}


<?php

namespace App\Controller\Pages;

use \App\Controller\Pages\Pages;
use \App\Utils\View;

class Home extends Pages{

    /**
     * Método responsável por
     * retornar a página sobre
     * @return string
     */
    private static function getSobre(){
        return View::render('pages/sobre');
    }

    /**
     * Método responsável por
     * retornar a página ajuda
     * @return string
     */
    private static function getAjuda(){
        return View::render('pages/ajuda');
    }

    /**
     * Método responsável por
     * retornar os inputs
     * @return string
     */
    private static function getInputs(){
        $inputs = '';
        if (isset($_GET['nums'])){
            # limite de inputs
            $limit = 25;

            # número de inputs
            $nums = intval(filter_var(htmlspecialchars($_GET['nums']), FILTER_SANITIZE_NUMBER_INT));
            $nums = ($nums > $limit) ? $limit : $nums;

            for ($i=1; $i <= $nums; $i++)
                $inputs .= "<input type=\"number\" name=\"num$i\">";
        }
        return $inputs;
    }

    /**
     * Método responsável por retornar
     * a Home
     * @return string
     */
    public static function getHome(){
        $content = View::render("pages/home", [
            'inputs' => self::getInputs(),
            'sobre' => self::getSobre(),
            'ajuda' => self::getAjuda()
        ]);

        return self::getPage("Home", $content);
    }

}

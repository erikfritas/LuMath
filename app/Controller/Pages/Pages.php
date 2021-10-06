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
     * retornar a $dir das funções get
     * @param string $dir
     * @param void $get
     * @return string|array
     */
    private static function getDirs($dir){
        $dir_ = scandir(__DIR__ . "/../../../resources/view/$dir");
        if (sizeof($dir_) > 2){
            $files = [];
            foreach ($dir_ as $value) {
                # verifica se não é o . e nem o .. da pasta
                if ($value !== '.'
                && $value !== '..')
                    array_push($files, $value);
            }
            return View::getFiles($dir, $files);
        } else
            return View::getFiles($dir, "global");
    }

    /**
     * Método responsável por
     * retornar a página em si
     * @param string $title
     * @param string $content
     * @return string
     */
    public static function getPage($title, $content){
        /**
         * Substitui os elementos que tem o
         * nome de uma das keys do array
         * pelo valor dessa key
         */
        return View::render('pages/page', [
            'css' => self::getDirs("css"),
            'title' => "$title | LuMath",
            'header' => self::getHeader(),
            'content' => $content,
            'footer' => self::getFooter(),
            'javascript' => self::getDirs("js")
        ]);
    }

}


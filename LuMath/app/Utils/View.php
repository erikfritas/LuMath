<?php

namespace App\Utils;

class View{

    /**
     * Método responsável por
     * retornar o css da página
     * @var string $dir
     * @return string
     */
    public static function getCSS($dir){
        $local = __DIR__ . "/../../resources/view/css/$dir";
        $dir_css = scandir($local);
        if ($dir_css){
            $files_dir = sizeof($dir_css)-2;

            $css = "<!-- CSS (files = $files_dir) -->";
            foreach ($dir_css as $value){
                $ext = explode(".", $value);

                # verifica se o arquivo tem uma extensão do tipo .css
                if ($ext[sizeof($ext)-1] === "css")
                    $css .= "<link rel=\"stylesheet\" href=\"".T_PATH."resources/view/css/$dir/$value\">";
            }
            $css .= "<!-- END CSS -->";
            return $css;
        } else return '';
    }

    /**
     * Método responsável por
     * retornar o js da página
     * @var string $dir
     * @return string
     */
    public static function getJS($dir){
        $local = __DIR__ . "/../../resources/view/js/$dir";
        $dir_js = scandir($local);
        if ($dir_js){
            $files_dir = sizeof($dir_js)-2;

            $js = "<!-- JS (files = $files_dir) -->";
            foreach ($dir_js as $value){
                $ext = explode(".", $value);
                
                # verifica se o arquivo tem uma extensão do tipo .js
                if ($ext[sizeof($ext)-1] === "js")
                    $js .= "<script src=\"".T_PATH."resources/view/js/$dir/$value\"></script>";
            }
            $js .= "<!-- END JS -->";
            return $js;
        } else return '';
    }

    /**
     * Método responsável por retornar
     * o conteúdo da view se ela existir
     * @param string $view (tem que ter ext, ex: view.html ou view.css)
     * @return string
     */
    private static function getContentView($view){
        $file = __DIR__."/../../resources/view/$view.html";
        return (file_exists($file)) ? file_get_contents($file) : '';
    }

    /**
     * Método responsável por renderiar o conteúdo
     * @param string $view
     * @param array $vars
     * @return string
     */
    public static function render($view, $vars=[]){
        $contentView = self::getContentView($view);

        $vars_keys = array_map(function($v){
            return "{{{$v}}}";
        }, array_keys($vars));

        $vars_values = array_values($vars);

        return str_replace($vars_keys, $vars_values, $contentView);
    }

}

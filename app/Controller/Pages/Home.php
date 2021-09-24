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
     * Método responsável por
     * retornar a resposta da
     * calculadora
     * @return string
     */
    public static function getAnswer(){
        # retorna a resposta
        if (isset(
            $_POST['answer'],
            $_POST['operators']
            )){
            $operators = [
                "+ (adição)",
                "- (subtração)",
                "* (multiplicação)",
                "/ (divisão)",
                "% (porcentagem)",
                "** (potenciação)"
            ];

            $operator = filter_var(htmlspecialchars($_POST['operators']), FILTER_SANITIZE_STRING);
            if (!in_array($operator, $operators)){
                # se o operador não estiver no array de operadores
                # então por padrão ele é igual à adição
                $operator = $operators[0];
            }

            $nums = intval(filter_var(htmlspecialchars($_GET['nums']), FILTER_SANITIZE_NUMBER_INT));
            $arr_nums = [];
            for ($i=0; $i <= $nums; $i+=1)
                if (isset($_POST["num$i"]))
                    array_push($arr_nums, filter_var(htmlspecialchars($_POST["num$i"]), FILTER_SANITIZE_NUMBER_INT));

            $btn_resposta = '<button class="resposta" title="copiar" onclick="copiar(\'.resposta\')">';

            # ANSWER
            if (sizeof($arr_nums) > 0){
                # calcula
                $answer = 0;
                switch ($operator) {
                    case $operators[0]:
                        // Adição
                        $answer = $arr_nums[0];
                        array_shift($arr_nums);
                        foreach ($arr_nums as $value) {
                            // calculo
                            $answer += $value;
                        }
                        break;

                    case $operators[1]:
                        // Subtração
                        $answer = $arr_nums[0];
                        array_shift($arr_nums);
                        foreach ($arr_nums as $value) {
                            // calculo
                            $answer -= $value;
                        }
                        break;

                    case $operators[2]:
                        // Multiplicação
                        $answer = $arr_nums[0];
                        array_shift($arr_nums);
                        foreach ($arr_nums as $value) {
                            // calculo
                            $answer *= $value;
                        }
                        break;

                    case $operators[3]:
                        // Divisão
                        $answer = $arr_nums[0];
                        array_shift($arr_nums);
                        foreach ($arr_nums as $value) {
                            // calculo
                            $answer /= $value;
                        }
                        break;

                    case $operators[4]:
                        // Porcentagem
                        $answer = $arr_nums[0];
                        array_shift($arr_nums);
                        foreach ($arr_nums as $value) {
                            // calculo
                            $answer -= ($answer/100 * $value);
                        }
                        break;

                    case $operators[5]:
                        // Potenciação
                        $answer = $arr_nums[0];
                        array_shift($arr_nums);
                        foreach ($arr_nums as $value) {
                            // calculo
                            $answer **= $value;
                        }
                        break;
                    
                    default:
                        # Adição
                        foreach ($arr_nums as $value) {
                            // calculo
                            $answer += $value;
                        }
                        break;
                }
                return $btn_resposta.'Resposta: <span>'.$answer.'</span></button>';
            } else return $btn_resposta.'Resposta: <span>'.$arr_nums[0].'</span></button>';
        } else return '';
    }

    /**
     * Método responsável por retornar
     * a Home
     * @return string
     */
    public static function getHome(){
        $content = View::render("pages/home", [
            'inputs' => self::getInputs(),
            'answer' => self::getAnswer(),
            'sobre' => self::getSobre(),
            'ajuda' => self::getAjuda()
        ]);

        return self::getPage("Home", $content);
    }

}

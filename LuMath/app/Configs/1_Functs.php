<?php

/**
 * Redireciona para a url
 * colocada
 * @param string $url
 * @return void
 */
function redirect($url){
    echo "<script>window.location.href='$url'</script>";
}

/**
 * Cria a query, muito
 * útil para fazer redirect
 * de forma rápida e dinâmica
 * @param array $query
 * @return string
 */
function createQuery($query){
    $queries = [];

    foreach ($query as $value){
        $key = array_keys($value)[0];
        $value = $value[$key];
        $queries = array_merge($queries, [$key => $value]);
    }

    return "?".http_build_query($queries);
}

/**
 * Retorna a um array
 * preparado para o
 * createQuery
 * @param array $query
 * @return array
 */
function getQuery($query){
    $key = array_keys($query)[0];
    $value = $query[$key];

    if (isset($_GET[$key]))
        return [$key => $_GET[$key]];
    else
        return [$key => $value];
}

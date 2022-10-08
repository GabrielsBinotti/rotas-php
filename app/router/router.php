<?php

function exactRoutes($uri, $routes){
    return (array_key_exists($uri, $routes)) ?
        [$uri => $routes[$uri]] :
        [];
}

function regularExpressionUri($uri, $routes){
    
    return array_filter($routes, 
        function ($value) use ($uri){
            $regex = str_replace('/', '\/', ltrim($value, '/'));
            return preg_match("/^$regex$/", ltrim($uri, '/'));
        },
        ARRAY_FILTER_USE_KEY
    );

}

function params($uri, $matchedUri)
{
    if (!empty($matchedUri)) {
        $matchedToGetParams = array_keys($matchedUri)[0];
        return array_diff(
            $uri,
            explode('/', ltrim($matchedToGetParams, '/'))
        );
    }
    return [];
}

function paramsFormat($uri, $params)
{
    $paramsData = [];
    foreach ($params as $index => $param) {
        $paramsData[$uri[$index - 1]] = $param;
    }

    return $paramsData;
}

$params = [];

function router(){

    $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

    $requestMethod = $_SERVER["REQUEST_METHOD"];
    
    $routes = require "routes.php";

    $matchedUri = exactRoutes($uri, $routes[$requestMethod]); 

    if(empty($matchedUri)){
        $matchedUri = regularExpressionUri($uri, $routes[$requestMethod]);
        $uri = explode('/' , ltrim($uri , '/'));
        $params = params($uri, $matchedUri);
        $params = paramsFormat($uri, $params); 
    }

    if(!empty($matchedUri)){
        return "deu certo";
    }

    throw new Exception("Algo deu errado");
    
}
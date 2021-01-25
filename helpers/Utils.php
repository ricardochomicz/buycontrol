<?php

namespace Helpers;

class Utils
{
    public static function moedaBR($valor){
        return "R$ ".number_format($valor, 2, ',','.');
    }

    public static function formataData($valor)
    {
        return implode('/', array_reverse(explode('-', $valor)));
    }
}
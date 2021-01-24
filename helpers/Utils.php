<?php

namespace Helpers;

class Utils
{
    public static function moedaBR($valor){
        return "R$ ".number_format($valor, 2, ',','.');
    }
}
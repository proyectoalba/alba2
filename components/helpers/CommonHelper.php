<?php
namespace app\components\helpers;


class CommonHelper
{
    public static function startsWith($haystack, $needle)
    {
         $length = strlen($needle);
         return (substr($haystack, 0, $length) === $needle);
    }

    /**
     * Traduce una fecha en formato dd/mm/yyyy a Y-m-d para poder guardarla en la DB
     */ 
    public static function traducirFecha($fecha)
    {
        $partes = [];
        if (preg_match('#([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})#', $fecha, $partes)) {
            return $partes[3] . '-' . $partes[2] . '-' . $partes[1];
        }
        return $fecha;       
    }
    
}

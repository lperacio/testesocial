<?php // 

namespace App\Helpers;

class TrataArquivos
{
    public static function upload($pasta, $file)
    {
        $file->storeAs($pasta,  $file->getClientOriginalName());
        return $file->getClientOriginalName();

    }

    //verifica se o arquivo tem mais de 500b  bytes
    public static function validaTamanho500b($file)
    {
        if ($file->getSize() > 500){ 
            return false;
        }else{
            return true;
        }

    }
}
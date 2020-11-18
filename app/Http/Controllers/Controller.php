<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /*=============================================
    FUNCION QUE PERMITE SELECCIONAR EL LEGUAJE DE NUESTRA APLICACION
    =============================================*/
    public function setLanguage($language){

        if (array_key_exists($language, config('lenguages'))){
            session()->put('applocale',$language);
        }
        return back();
    }
}
